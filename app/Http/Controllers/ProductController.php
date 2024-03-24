<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductLot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\CommonFunction;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', Auth::id())->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required',
            'lot' => 'required',
        ]);

        $product_data = $request->all();

        $totalLotQty= 0;
        foreach ($product_data['lot'] as $lot) {
            $totalLotQty += (int)$lot['lot_qty'];
        }

        $product = new Product();
        $product->name = $product_data['name'];
        $product->price = $product_data['price'];
        $product->qty = $totalLotQty;
        $product->user_id = Auth::id();
        $product->save();

        foreach ($product_data['lot'] as $lot) {
            $product_lot = new ProductLot();
            $product_lot->product_id = $product->id;
            $product_lot->title = $lot['lot_title'];
            $product_lot->qty =$lot['lot_qty'];
            $product_lot->expiration_date = $lot['expiration_date'];
            $product_lot->user_id = Auth::id();
            $product_lot->save();
        }
        
        return redirect()->route('products.index')->with('success', 'Product and lot created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $product->update([
            'name' => $request->name,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function lowqty()
    {
        CommonFunction::lowQty();
        return redirect()->route('dashboard')->withSuccess('Low Quantity Email is send successfully.');
    }

    public function expireydate()
    {  
        CommonFunction::expireyDate();
        return redirect()->route('dashboard')->withSuccess('Expireydate Email is send successfully.');
    }

    
}

