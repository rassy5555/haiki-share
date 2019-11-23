@section('title', 'ログイン（ユーザー）')

@extends('layouts.app')

@section('content')
<section class="main">
    <div class="l-container p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <h2 class="c-page__title">{{ __('Login User')}}</h2>
            <user_login-component></user_login-component>
        </div>

    </div>
</section>
@endsection
