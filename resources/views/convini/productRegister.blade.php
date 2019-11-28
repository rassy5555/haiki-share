@section('title', '商品登録')

@extends('layouts.app_convini')

@section('content')
<section class="main">
    <div class="l-container p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <h2 class="c-page-title">{{ __('Product Register')}}</h2>
            <product_register-component :categories="{{ $categories }}"></product_register-component>
        </div>
    </div>
</section>
@endsection
