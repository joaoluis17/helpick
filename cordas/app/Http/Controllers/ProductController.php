<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string', 
            'description' => 'required|string',
            'url' => 'required|url',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $price = preg_replace('/[^0-9,]/', '', $request->price); 
        $price = str_replace(',', '.', $price); 

        $product = new Product();
        $product->name = $request->name;
        $product->price = number_format((float) $price, 2, '.', '');
        $product->description = $request->description;
        $product->url = $request->url;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $product->image = $imagePath;
        }

        $product->save();

        return redirect()->route('products')->with('success', 'Produto cadastrado com sucesso!');
    }

}