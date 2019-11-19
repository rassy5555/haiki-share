@section('title', 'マイページ（ユーザー）')

@extends('layouts.app')

@section('content')
<section class="main">  
    <div class="l-container__large p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <h2 class="c-page__title">{{ __('My Page')}}</h2>
            <user_home-component user_id="{{ $user_id }}"　:purchased_list="{{ $purchased_list }}"></user_home-component>
        </div>
    </div>
</section>
@endsection
