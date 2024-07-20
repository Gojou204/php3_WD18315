<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-4">
        <a class="btn btn-success mb-3" href="{{ route('products.addProducts') }}">Thêm sản phẩm</a>
        <form class="d-flex mb-2" style="max-width: 300px" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query" value="{{ isset($query) ? $query : '' }}">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                    <th>Lượt xem</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listProducts as $key => $product)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category_name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->view }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('products.updateProducts', $product->id) }}">Chỉnh sửa</a>
                            <a class="btn btn-danger" href="{{ route('products.deleteProducts', $product->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm')">Xóa</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>