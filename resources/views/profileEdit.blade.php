@section('title', 'プロフィール編集')

@extends('layouts.app')

@section('content')
<section class="main">
    <div class="l-container p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <user_profile-component :props_user="{{ $user }}"></user_profile-component>
        </div>
    </div>
</section>
@endsection
