<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function listProducts(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $listProducts = DB::table('product')
                ->join('category', 'product.category_id', '=', 'category.id')
                ->select('product.id', 'product.name', 'product.category_id', 'category.name as category_name', 'product.price', 'product.view')
                ->where('product.name', 'LIKE', "%{$query}%")
                ->orderBy('view', 'desc')
                ->get();
        } else {
            $listProducts = DB::table('product')
                ->join('category', 'product.category_id', '=', 'category.id')
                ->select('product.id', 'product.name', 'product.category_id', 'category.name as category_name', 'product.price', 'product.view')
                ->orderBy('view', 'desc')
                ->get();
        }

        return view('Lab2.listProducts', compact('listProducts', 'query'));
    }

    public function addProducts(){
        $category = DB::table('category')->select('id', 'name')->get();
        return view('Lab2/addProducts')->with([
            'category' => $category
        ]);
    }

    public function addPostProducts(Request $req){
        $data = [
            'name' => $req->name, // $req->name ~ $_POST['name']
            'category_id' => $req->category,
            'price' => $req->price,
            'view' => $req->view,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now(),
        ];
        DB::table('product')->insert($data);

        return redirect()->route('products.listProducts');
    }

    public function deleteProducts($productId){
        DB::table('product')->where('id', $productId)->delete();
        return redirect()->route('products.listProducts');
    }

    public function updateProducts($productId){
        $category = DB::table('category')->select('id', 'name')->get();
        $product = DB::table('product')->where('id', $productId)->first();
        return view('Lab2/updateProducts')->with([
            'product' => $product,
            'category' => $category
        ]);
    }

    public function updatePostProducts(Request $req){
        $data = [
            'name' => $req->name, // $req->name ~ $_POST['name']
            'category_id' => $req->category,
            'price' => $req->price,
            'view' => $req->view,
            'update_at' => Carbon::now(),
        ];
        DB::table('product')->where('id', $req->idProduct)->update($data);
        return redirect()->route('products.listProducts');
    }
}
