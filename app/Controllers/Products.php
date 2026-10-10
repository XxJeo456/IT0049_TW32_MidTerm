<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->findAll();

        // This must load products/index, NOT sales/record!
        return view('products/index', $data);
    }

    public function create()
    {
        return view('products/create');
    }

    public function store()
    {
        $productModel = new ProductModel();
        
        $img = $this->request->getFile('image');
        $imageName = null;

        if ($img && $img->isValid() && ! $img->hasMoved()) {
            $imageName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/products', $imageName);
        }

        $productModel->save([
            'name'           => $this->request->getPost('name'),
            'price'          => $this->request->getPost('price'),
            'stock_quantity' => $this->request->getPost('stock_quantity'),
            'image'          => $imageName,
            'created_at'     => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/products')->with('success', 'Product added successfully.');
    }

    public function edit($id)
    {
        $productModel = new ProductModel();
        $data['product'] = $productModel->find($id);

        return view('products/edit', $data);
    }

    public function update($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        $imageName = $product['image'];
        $img = $this->request->getFile('image');

        if ($img && $img->isValid() && ! $img->hasMoved()) {
            $imageName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/products', $imageName);
        }

        $productModel->update($id, [
            'name'           => $this->request->getPost('name'),
            'price'          => $this->request->getPost('price'),
            'stock_quantity' => $this->request->getPost('stock_quantity'),
            'image'          => $imageName,
        ]);

        return redirect()->to('/products')->with('success', 'Product updated successfully.');
    }

    public function delete($id)
    {
        $productModel = new ProductModel();
        $productModel->delete($id);

        return redirect()->to('/products')->with('success', 'Product deleted successfully.');
    }
}