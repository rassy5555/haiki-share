@extends('layouts.app_convini')

@section('content')
<section class="main">
    <div class="l-container__large p-container">
    <h2 class="c-page__title">{{ __('Saled List')}}</h2>
        <saled_list-component :saled_list="{{ $saled_list }}"></saled_list-component>
    </div>
</section>
@endsection
