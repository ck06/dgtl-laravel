@extends('layouts.app')

@section('title')
    <h2>Products</h2>
@endsection

@section('content')
    <h1>Edit a product</h1>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @method('PUT')
        @include('products._form', ['submitLabel' => 'Update'])
    </form>
@endsection
