<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', [
            'brands' => Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validateInput($request);

        $product = new Product($data);
        $product->save();

        return redirect()
            ->route('products.show', $product->getKey())
            ->with('success', 'Product created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('products.show', [
            'product' => Product::all()->find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('products.edit', [
            'product' => Product::all()->find($id),
            'brands' => Brand::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $this->validateInput($request);

        $product = Product::all()->find($id);
        $product->update($data);
        $product->save();

        return redirect()
            ->route('products.show', $product->getKey())
            ->with('success', 'Product updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::all()->find($id);
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted');
    }

    private function validateInput(Request $request)
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'brand_id' => ['required', 'exists:brands,id'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
        ]);
    }
}
