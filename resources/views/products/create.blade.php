<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="{{ asset('css/productsforms.css') }}">
    
</head>
<body>
<div class="container">
    <h1>Ajouter un produit</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label>Nom du produit</label>
        <input type="text" name="name" required>

        <label>Prix (€)</label>
        <input type="number" step="0.01" name="price" required>

        <label>Catégorie</label>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>

        <label>Stock</label>
        <input type="number" name="stock" required>

        <label>Description</label>
        <textarea name="description"></textarea>

        <label>Image (URL)</label>
        <input type="text" name="image">

        <button type="submit">Ajouter</button>
    </form>
</div>
</body>
</html>
