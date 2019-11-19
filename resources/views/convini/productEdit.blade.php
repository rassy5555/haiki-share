@section('title', '商品編集')

@extends('layouts.app_convini')

@section('content')
<section class="main">
    <div class="l-container p-container ">
        <div class="l-page__wrapper p-page__wrapper">
            <h2 class="c-page__title">{{ __('Product Edit')}}</h2>
            <product_edit-component :categories="{{ $categories }}" :product="{{ $product}}"></product_edit-component>
        </div>
    </div>
</section>
@endsection
