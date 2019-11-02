@extends('layouts.app')

@section('content')
<section class="main">
    <div class="l-container p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <h2 class="c-page__title">{{ __('Register')}}</h2>
            <user_register-component></user_register-component>
            <!-- <form method="POST" action="{{ route('register') }}" >
                @csrf
                <div class="c-form__group">
                    <label class="c-form__label">{{ __('Name') }}</label>

                    <div class="c-form__item">
                        <input id="name" type="text" class="c-form__input @error('name') c-is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                        @error('name')
                            <span class="c-invalid__feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="c-form__group">
                    <label class="c-form__label">{{ __('E-mail') }}</label>

                    <div class="c-form__item">
                        <input id="email" type="text"  class="c-form__input @error('email') c-is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

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
                        <input id="password" type="password" class="c-form__input @error('password') c-is-invalid @enderror" name="password" value="{{ old('password') }}"  autocomplete="password" autofocus>

                        @error('password')
                            <span class="c-invalid__feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>  
                <div class="c-form__group">
                    <label class="c-form__label">{{ __('Confirm Password') }}</label>

                    <div class="c-form__item">
                        <input id="password-confirm" type="password" class="c-form__input" name="password_confirmation"  autocomplete="new-password">
                    </div>
                </div>   
                <div class="c-form__group">
                    <div class="c-form__button">
                        <button type="submit" class="c-button">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>         -->
        </div>

    </div>
</section>
@endsection


