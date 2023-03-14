<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>halaman test</title>
</head>
<body>
    <h1>Ini halaman test</h1>

    <table border="1">
        <tr>
            <th>Title</th>
            <th>Desc</th>
            <th>Category Id </th>
            <th>Category Name </th>
            <th>Category Slug </th>
        </tr>
        @foreach ($produk as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->desc }}</td>
                <td>{{ $item->category_id }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->category->slug }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
