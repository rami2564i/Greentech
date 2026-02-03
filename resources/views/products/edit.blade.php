<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/eidit.css') }}">
</head>
<body>
    <h1>Edit Product</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Name:</label><br>
    <input type="text" name="name" value="{{ $product->name }}"><br><br>

    <label>Price:</label><br>
    <input type="number" name="price" value="{{ $product->price }}"><br><br>

    <label>Description:</label><br>
    <textarea name="description">{{ $product->description }}</textarea><br><br>

    <label>Image URL:</label><br>
    <input type="text" name="image" value="{{ $product->image }}"><br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="{{ route('products.show', $product->id) }}">Back</a>

</body>
</html>