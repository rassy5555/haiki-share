@extends('layouts.app')

@section('content')
<section class="main">  
    <div class="l-container__large p-container">
        <h1 class="c-page__title p-page__title-large">廃棄商品を安く買おう</h1>
        <div class="p-page__text-wrapper">
            <p class="p-page__text">haiki shareではコンビニの廃棄商品を安く買うことができます。</p>
            <p class="p-page__text">使い方は簡単！アプリ上で購入してお店に取りに行くだけ！</p>
            <p class="p-page__text">お得に商品を買って食品ロスに取り組みましょう！</p>
        </div>
        <div class="p-button__wrapper">
            <a href="register">
                <button type="submit" class="c-button">
                    一般の方はこちら
                </button>    
            </a>
            <a href="convini/register">
                <button type="submit" class="c-button">
                    お店の方はこちら
                </button>
            </a> 
        </div>
    </div>
</section>
@endsection