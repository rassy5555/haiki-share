@section('title', '出品した商品')

@extends('layouts.app_convini')

@section('content')
<section class="main">
    <div class="l-container__large p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <h2 class="c-page__title">{{ __('Listing List')}}</h2>
            <listing_list-component :listing_list="{{ $listing_list }}"></listing_list-component>
        </div>
    </div>
</section>
@endsection
