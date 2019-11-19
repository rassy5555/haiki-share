@section('title', '商品詳細')

@extends('layouts.app_convini')

@section('content')
<section class="main">
    <div class="l-container p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <convini_product_detail-component :categories="{{ $categories }}" :product="{{ $product}}" :convini="{{ $convini }}"></product_edit-component>
        </div>
    </div>
</section>
@endsection
