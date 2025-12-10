@extends('layouts.app')

@section('title')
    <h2>Products</h2>
@endsection

@section('content')
    <h1>All Products</h1>

    <a href="{{ route('products.create') }}">New product</a>

    @if(count($products) > 0)
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Brand</th>
                <th>Price</th>
                <th>&nbsp;</th> <!-- edit/delete buttons -->
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->brand?->name }}</td>
                    <td>{{ $product->price/100 }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}">Edit</a>

                        <form action="{{ route('products.destroy', $product) }}"
                              method="POST"
                              style="display:inline-block"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this product?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div>No products to display.</div>
    @endif
@endsection
