@extends('layouts.app')

@section('content')
<section class="main">
    <div class="l-container p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <convini_profile-component :props_convini="{{ $props_convini }}"></convini_profile-component>
        </div>
    </div>
</section>
@endsection