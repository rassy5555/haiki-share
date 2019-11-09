@extends('layouts.app_convini')
@section('content')
<section class="main">
    <div class="l-container p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <h2 class="c-page__title">{{ __('Reset Password')}}</h2>
            <convini_send_password-component></convini_send_password-component>
        </div>
    </div>
</section>
@endsection