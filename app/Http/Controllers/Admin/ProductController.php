<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function listProduct(){
        $listProduct = Product::paginate(10);
        return view('admin.products.list-product')->with([
            'listProduct' => $listProduct
        ]);
    }

    public function addProduct(){
        return view('admin.products.add-product');
    }
    public function addPostProduct(Request $req){
        // $product = new Product();
        // $product->name = $req->nameSP;
        // $product->price = $req->priceSP;
        // $product->save();
        $linkImage = '';
        if($req->hasFile('imageSP')){
            $image = $req->file('imageSP');
            $newName = time() . '.' . $image->getClientOriginalExtension();
            $linkStorage = 'imageProducts/';
            $image->move(public_path($linkStorage), $newName);

            $linkImage = $linkStorage . $newName;
        }
        $data = [
            'name' => $req->nameSP,
            'price' => $req->priceSP,
            'image' => $linkImage
        ];
        Product::create($data);
        return redirect()->route('admin.products.listProduct')->with([
            'message' => 'Thêm mới thành công'
        ]);
    }

    public function deleteProduct(Request $req){
        $product = Product::where('id', $req->idproduct)->first();
        if($product->image != null && $product->image != ''){
            File::delete(public_path($product->image));
        }

        Product::where('id', $req->idproduct)->delete();
        return redirect()->route('admin.products.listProduct')->with([
            'message' => 'Xóa thành công'
        ]);
    }

    public function detailProduct($idProduct){
        $product = Product::where('id', $idProduct)->first();
        return view('admin.products.detail-product')->with([
            'product' => $product
        ]);
    }

    public function updateProduct($idProduct){
        $product = Product::where('id', $idProduct)->first();
        return view('admin.products.update-product')->with([
            'product' => $product
        ]);
    }

    public function updatePatchProduct($idProduct, Request $req){
        $product =  Product::where('id', $idProduct)->first();
        $linkImage = $product->image;
        if($req->hasFile('imageSP')){
            File::delete(public_path($product->image)); // Xóa file cũ
            $image = $req->file('imageSP');
            $newName = time() . "." . $image->getClientOriginalExtension();
            $linkStorage = 'imageProducts/';
            $image->move(public_path($linkStorage), $newName);

            $linkImage = $linkStorage . $newName;
        }
        $data = [
            'name' => $req->nameSP,
            'price' => $req->priceSP,
            'image' => $linkImage
        ];
        Product::where('id', $idProduct)->update($data);
        return redirect()->route('admin.products.listProduct')->with([
            'message' => 'Sửa thành công'
        ]);
    }
}
