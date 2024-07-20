<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <h1>Sửa sản phẩm</h1>
        <form action="{{ route('products.updatePostProducts') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $product->id }}" name="idProduct">
            <div class="mb-3">
                <label for="name">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
            </div>
            <div class="mb-3">
                <label for="category">Danh mục sản phẩm</label>
                <select name="category" id="category" class="form-control">
                    @foreach($category as $value)
                        <option
                            @if($product->category_id === $value->id)
                                selected
                            @endif
                            value="{{ $value->id }}">
                                {{ $value->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="price">Giá sản phẩm</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
            </div>
            <div class="mb-3">
                <label for="view">Lượt xem</label>
                <input type="number" class="form-control" id="view" name="view" value="{{ $product->view }}">
            </div>
            <button class="btn btn-warning">Chỉnh sửa</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>