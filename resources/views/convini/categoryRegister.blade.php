@section('title', 'カテゴリー登録')

@extends('layouts.app_convini')

@section('content')
<section class="main">
    <div class="l-container p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <h2 class="c-page-title">{{ __('Category Register')}}</h2>
            <category_register-component :categories="{{ $categories }}"></category_register-component>
        </div>
    </div>
</section>
@endsection
