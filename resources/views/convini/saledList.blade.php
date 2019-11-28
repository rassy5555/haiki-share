@section('title', '購入済商品')

@extends('layouts.app_convini')

@section('content')
<section class="main">
    <div class="l-container__large p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <h2 class="c-page-title">{{ __('Saled List')}}</h2>
            <saled_list-component :saled_list="{{ $saled_list }}"></saled_list-component>
        </div>
    </div>
</section>
@endsection
