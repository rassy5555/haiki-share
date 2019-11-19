@section('title', '商品詳細')

@extends('layouts.app')

@section('content')
<section class="main">
    <div class="l-container p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <user_product_detail-component :categories="{{ $categories }}" :product="{{ $product}}" :user="{{ $user }}"></user_product_detail-component>
        </div>
    </div>
</section>
@endsection
