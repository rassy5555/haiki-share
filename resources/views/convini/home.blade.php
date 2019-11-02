@extends('layouts.app_convini')

@section('content')
<section class="main">  
    <div class="l-container__large p-container">
        <h2 class="c-page__title">{{ __('My Page')}}</h2>
        <convini_home-component  convini_id="{{ $convini_id }}" :saled_list="{{ $saled_list }}" :listing_list="{{ $listing_list}}" ></convini_home-component>
    </div>
</section>
@endsection
