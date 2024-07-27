@extends('admin.layouts.default')

@section('title')
    @parent
     Cập nhật sản phẩm
@endsection

@push('styles')
    <style>
        .img-product {
            widows: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>
@endpush

@section('content')
    <div class="p-4" style="min-height: 800px;">
        <form action="{{ route('admin.products.updatePatchProduct', $product->id) }}" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="nameSP">Tên sản phẩm</label>
                <input type="text" id="nameSP" name="nameSP" class="form-control" value="{{ $product->name }}">
            </div>
            <div class="mb-3">
                <label for="priceSP">Giá sản phẩm</label>
                <input type="text" id="priceSP" name="priceSP" class="form-control" value="{{ $product->price }}">
            </div>
            <div class="mb-3">
                <label for="imageSP">Ảnh sản phẩm</label><br>
                <img src="{{ asset($product->image) }}" alt="" class="img-product">
                <input type="file" id="imageSP" name="imageSP" class="form-control">
            </div>
            <button class="btn btn-success">Chỉnh sửa</button>
        </form>
    </div>
@endsection

@push('scripts')
    
@endpush