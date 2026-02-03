<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenTech Solutions - Catalogue</title>
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
</head>
<body>
<div class="container">
    <header>
        <div class="header-content">
            <div>
                <h1>GreenTech Solutions</h1>
                <p class="tagline">Cultivez votre passion pour la nature</p>
            </div>
            <div class="search-container">
                <div class="search-bar">
                    <span class="search-icon">🔍</span>
                    <input type="text" id="searchInput" placeholder="Rechercher un produit...">
                </div>
            </div>
        </div>
    </header>

    <section class="filter-section">
        <p class="filter-title">Catégories</p>
        <div class="filter-buttons">
            <button class="filter-btn active" data-category="all"><span>Tous les produits</span></button>
            <button class="filter-btn" data-category="Plantes"><span>🌿 Plantes</span></button>
            <button class="filter-btn" data-category="Graines"><span>🌱 Graines</span></button>
            <button class="filter-btn" data-category="Outils"><span>🛠️ Outils</span></button>
        </div>
    </section>

    <div class="products-grid">

        @foreach($products as $product)

        <div class="product-card">

            @if($product->stock == 0)
            <span class="stock-badge out-of-stock">Rupture de stock</span>
            @elseif($product->stock < 10)
            <span class="stock-badge low-stock">Stock limité</span>
            @else
            <span class="stock-badge in-stock">En stock</span>
            @endif
            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image">
            <div class="product-info">
                <span class="product-category">{{ $product->category->name }}</span>
                <h3 class="product-name">{{ $product->name }}</h3>
                <p class="product-price">{{ $product->price }}<span>€</span></p>
             <a href="{{ route('products.show', $product->id) }}"> See details</a>
   
            </div>
        </div>
        @endforeach
    </div>
</div>

</body>
</html>
