@extends('layouts.app')

@section('content')
<section class="main">  
    <div class="l-container__large p-container">
        <h2 class="c-page__title">{{ __('My Page')}}</h2>
        <user_home-component user_id="{{ $user_id }}"　:purchased_list="{{ $purchased_list }}"></user_home-component>
    </div>
</section>
@endsection
