@php
    use App\Models\Product;
@endphp

@extends('layouts.app')

@section('title')
    <h2>Products</h2>
@endsection

@section('content')
    <h1>Create a product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @include('products._form', ['product' => new Product(), 'submitLabel' => 'Create'])
    </form>
@endsection
