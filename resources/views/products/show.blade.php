@extends('layouts.app')

@section('title')
    <h2>Products</h2>
@endsection

@section('content')
    <h1>{{$product->name}}</h1>

    <div>{{$product->description}}</div>
    <div>{{$product->brand->name}}</div>
    <div>€{{$product->price/100}}</div>
@endsection
