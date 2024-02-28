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

        // Array daftar tipe barang untuk setiap kategori
        $typeProductList = array(
            'DANA' => array(
                array('nama' => 'Dana', 'harga' => '5000', 'code' => 'DANA1'),
                array('nama' => 'Dana', 'harga' => '10000', 'code' => 'DANA5'),
                array('nama' => 'Dana', 'harga' => '50000', 'code' => 'DANA50')
            ),
            'OVO' => array(
                array('nama' => 'Ovo', 'harga' => '30000', 'code' => 'VUJBHKH'),
                array('nama' => 'Ovo', 'harga' => '40000', 'code' => 'FHBIB78C')
            ),
            'SEABANK' => array(
                array('nama' => 'Seabank', 'harga' => '20000', 'code' => 'SJHIOTB'),
                array('nama' => 'Seabank', 'harga' => '50000', 'code' => 'PGBUFG')
            )
        );

        return view('order-payment', compact('notify', 'items', 'productResults', 'typeProductList'));
    }
}
