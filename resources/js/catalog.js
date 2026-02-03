let currentCategory = 'all';
let searchQuery = '';

function getStockBadge(stock) {
    if (stock === 0) return '<span class="stock-badge out-of-stock">Rupture de stock</span>';
    if (stock < 10) return '<span class="stock-badge low-stock">Stock limité</span>';
    return '<span class="stock-badge in-stock">En stock</span>';
}

function renderProducts(products) {
    const container = document.getElementById('productsContainer');

    if (products.length === 0) {
        container.innerHTML = `
            <div class="no-results">
                <div class="no-results-icon">🌾</div>
                <h3>Aucun produit trouvé</h3>
                <p>Essayez de modifier vos critères de recherche</p>
            </div>
        `;
        return;
    }

    const productsHTML = products.map(product => `
        <div class="product-card" onclick="viewProduct(${product.id})">
            ${getStockBadge(product.stock)}
            <img src="${product.image}" alt="${product.name}" class="product-image">
            <div class="product-info">
                <span class="product-category">${product.category.name}</span>
                <h3 class="product-name">${product.name}</h3>
                <p class="product-price">${product.price.toFixed(2)}<span>€</span></p>
            </div>
        </div>
    `).join('');

    container.innerHTML = `<div class="products-grid">${productsHTML}</div>`;
}

function filterProducts() {
    let filtered = products;

    if (currentCategory !== 'all') {
        filtered = filtered.filter(p => p.category.name === currentCategory);
    }

    if (searchQuery) {
        filtered = filtered.filter(p => p.name.toLowerCase().includes(searchQuery.toLowerCase()));
    }

    renderProducts(filtered);
}

function viewProduct(id) {
    // Redirect to Laravel product show route
    window.location.href = `/products/${id}`;
}

// Filter buttons
document.querySelectorAll('.filter-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        currentCategory = this.dataset.category;
        filterProducts();
    });
});

// Search input
document.getElementById('searchInput').addEventListener('input', function(e) {
    searchQuery = e.target.value;
    filterProducts();
});


renderProducts(products);