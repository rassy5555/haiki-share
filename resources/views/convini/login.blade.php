@section('title', 'ログイン（コンビニ）')

@extends('layouts.app_convini')

@section('content')
<section class="main">
    <div class="l-container p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <h2 class="c-page__title">{{ __('Login Convini')}}</h2>
            <convini_login-component></convini_login-component> 
        </div>

    </div>
</section>
@endsection
