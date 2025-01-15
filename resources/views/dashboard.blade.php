@extends('layouts.header')
@section('title','Dashboard')
@section('content')
<button class="dark-mode-toggle add-product">Add Product</button>
<div class="dashboard">
    @include('layouts.sidebar')
    <div class="main-content mt-5">
        <section id="expenses" class="card fade-in">
            <h2 class="d-none product-container">Add New Product</h2>
         @include('product')
         @if(isset($products) && count($products) > 0)
         <h2>Products</h2>
           @include('product-list')
           @endif
        </section>
    </div>
</div>
@endsection