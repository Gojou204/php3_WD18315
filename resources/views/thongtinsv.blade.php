<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Thông tin sinh viên</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Mã SV</th>
                <th>Họ tên</th>
                <th>Tuổi</th>
                <th>Lớp</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $value)
                <tr>
                    <td>{{ $value['masv'] }}</td>
                    <td>{{ $value['hoten'] }}</td>
                    <td>{{ $value['tuoi'] }}</td>
                    <td>{{ $value['lop'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
