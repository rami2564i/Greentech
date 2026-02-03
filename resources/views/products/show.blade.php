<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Product</title>
    <link rel="stylesheet" href="{{ asset('css/show.css') }}">
</head>
<body>

    <h1>Product Details</h1>

    <img src="{{ $product->image }}" alt="{{ $product->name }}" width="300">

    <p><strong>Name:</strong> {{ $product->name }}</p>
    <p><strong>Category:</strong> {{ $product->category->name }}</p>
    <p><strong>Price:</strong> {{ $product->price }} €</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>
    <p><strong>Stock:</strong> {{ $product->stock }}</p>

    <hr>

    <!-- Update -->
    <a href="{{ route('products.edit', $product->id) }}">
        Edit Product
    </a>

    <br><br>

    <!-- Delete -->
    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Product</button>
    </form>

    <br>

    <a href="{{ route('products.index') }}">Back to products</a>

</body>
</html>
