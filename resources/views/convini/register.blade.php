@section('title', '新規登録（コンビニ）')

@extends('layouts.app_convini')

@section('content')
<section class="main">
    <div class="l-container p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <h2 class="c-page__title">{{ __('Register')}}</h2>
            <convini_register-component></convini_register-component>
        </div>

    </div>
</section>

@endsection
