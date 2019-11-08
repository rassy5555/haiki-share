@extends('layouts.app')

@section('content')
<section class="main">
    <div class="l-container__large p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <h2 class="c-page__title">{{ __('Product List')}}</h2>
            <convini_product_list-component :categories="{{ $categories }}" :product_list="{{ $product_list }}" ></convini_product_list-component>
        </div>
    </div>
</section>
@endsection