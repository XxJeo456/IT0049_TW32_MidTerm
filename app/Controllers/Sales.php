<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Models\SaleModel;

class Sales extends BaseController
{
    protected $productModel;
    protected $customerModel;
    protected $saleModel;

    public function __construct()
    {
        $this->productModel  = new ProductModel();
        $this->customerModel = new CustomerModel();
        $this->saleModel     = new SaleModel();
    }

    public function record()
    {
        $data['products']  = $this->productModel->where('stock_quantity >', 0)->findAll();
        $data['customers'] = $this->customerModel->findAll();
        return view('sales/record', $data);
    }

    public function store()
    {
        $rules = [
            'product_id' => 'required|integer',
            'quantity'   => 'required|integer|greater_than[0]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $productId  = $this->request->getPost('product_id');
        $customerId = $this->request->getPost('customer_id') ?: null;
        $quantity   = (int) $this->request->getPost('quantity');
        $soldBy     = session()->get('user_id');

        $product = $this->productModel->find($productId);

        if (! $product) {
            return redirect()->back()->with('error', 'Selected product does not exist.');
        }

        // Validate stock availability
        if ($quantity > $product['stock_quantity']) {
            return redirect()->back()->withInput()->with('error', 'Sale rejected: Requested quantity exceeds available stock (' . $product['stock_quantity'] . ' remaining).');
        }

        $totalPrice = $product['price'] * $quantity;

        // Transaction handling
        $db = \Config\Database::connect();
        $db->transStart();

        // 1. Record Sale
        $this->saleModel->save([
            'product_id'  => $productId,
            'customer_id' => $customerId,
            'sold_by'     => $soldBy,
            'quantity'    => $quantity,
            'total_price' => $totalPrice,
        ]);

        // 2. Decrease Product Stock
        $newStock = $product['stock_quantity'] - $quantity;
        $this->productModel->update($productId, ['stock_quantity' => $newStock]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Failed to process transaction. Please try again.');
        }

        return redirect()->to('/sales/history')->with('success', 'Sale recorded successfully!');
    }

    public function history()
    {
        $data['sales'] = $this->saleModel->getSalesHistory();
        return view('sales/history', $data);
    }
}