@section('title', 'パスワードリセット（コンビニ）')

@extends('layouts.app_convini')
@section('content')
<section class="main">
    <div class="l-container p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <h2 class="c-page__title">{{ __('Reset Password')}}</h2>
            <convini_reset_password-component token="{{ $token }}"></convini_reset_password-component>
            <!-- <convini_reset_password-component token="{{ $token }}" email="{{ $email }}"></convini_reset_password-component> -->
        </div>
    </div>
</section>
@endsection