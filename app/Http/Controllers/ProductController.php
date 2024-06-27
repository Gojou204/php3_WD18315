<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // public , protected , private , default
    public function showProduct(){
        $data = [
            [
                'id'    =>  '1',
                'name'  =>  'iphone14'
            ],
            [
                'id'    =>  '2',
                'name'  =>  'iphone15'
            ],
        ];
        // return view("list-product")->with([
        //     'listProduct' => $data
        // ]);
        return view('list-product', compact('data'));
    }

    public function getProduct($id, $name=''){
        echo $id;
        echo $name;
    }
    public function updateProduct(Request $request){
        echo $request->id;
        echo $request->name;
    }
}
