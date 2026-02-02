<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
   
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

   
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|url',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Produit créé avec succès!');
    }

   
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

   
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|url',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produit mis à jour avec succès!');
    }

 
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès!');
    }
}
