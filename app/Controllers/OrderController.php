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

        $items = $itemsModel
            ->join('categories', 'categories.id_category = item_products.id_cat')
            ->where('category', $category)
            ->get()
            ->getResult();

        $productResults = $productModel
            ->join('categories', 'categories.id_category = products.id_cat')
            ->where('category', $category)
            ->get()
            ->getResult();

        return view('order-payment', compact('notify', 'items', 'productResults'));
    }
}
