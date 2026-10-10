<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Models\SaleModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $productModel  = new ProductModel();
        $customerModel = new CustomerModel();
        $saleModel     = new SaleModel();

        $data = [
            'total_products'  => $productModel->countAllResults(),
            'total_customers' => $customerModel->countAllResults(),
            'total_sales'     => $saleModel->countAllResults(),
        ];

        return view('dashboard/index', $data);
    }
}