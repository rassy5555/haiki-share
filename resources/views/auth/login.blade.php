@extends('layouts.app')

@section('content')
<section class="main">
    <div class="l-container p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <h2 class="c-page__title">{{ __('Login')}}</h2>
            <user_login-component></user_login-component>
            <!-- <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="c-form__group">
                    <label class="c-form__label">{{ __('E-Mail') }}</label>

                    <div class="c-form__item">
                        <input id="email" type="email" class="c-form__input @error('email') c-is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                        @error('email')
                            <span class="c-invalid__feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="c-form__group">
                    <label class="c-form__label">{{ __('Password') }}</label>

                    <div class="c-form__item">
                        <input id="password" type="password" class="c-form__input @error('password') c-is-invalid @enderror" name="password"  autocomplete="current-password">

                        @error('password')
                            <span class="c-invalid__feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="c-form__group">
                    <div class="c-form-check">
                        <input class="c-form-check__input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="c-form-check__label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>


                <div class="c-form__group">
                    <div class="c-form__button">
                        <button type="submit" class="c-button">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="c-form__forget" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>         -->
        </div>

    </div>
</section>
@endsection
