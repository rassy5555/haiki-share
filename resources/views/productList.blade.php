@extends('layouts.app')

@section('content')
<section class="main">
    <div class="l-container__large p-container">
        <h2 class="c-page__title">{{ __('Product List')}}</h2>
        <user_product_list-component :categories="{{ $categories }}" :product_list="{{ $product_list }}" ></user_product_list-component>
    </div>
</section>
@endsection
