<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\ItemProductModel;

class OrderController extends BaseController
{
    public function index($category)
    {
        $notify = session()->getFlashdata('notify');
        $idUser = session()->get('id_user');

        $categoryModel = new CategoryModel();
        $productModel = new ProductModel();
        $itemsModel = new ItemProductModel();

        $categoryItems = $itemsModel->where('category', $category)->findAll();

        $items = $productModel->where('category', $category)->findAll();

        $formattedPayments = [];

        foreach ($items as $payment) {
            $formattedPayments[$payment['type_listing']][] = [
                'nama' => $payment['name'],
                'harga' => $payment['price'],
                'code' => $payment['code']
            ];
        }

        return view('order-payment', compact('notify', 'categoryItems', 'formattedPayments'));
    }
}
