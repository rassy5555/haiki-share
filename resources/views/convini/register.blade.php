@section('title', '新規登録（コンビニ）')

@extends('layouts.app_convini')

@section('content')
<section class="main">
    <div class="l-container p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <h2 class="c-page__title">{{ __('Register')}}</h2>
            <convini_register-component></convini_register-component>
            <!-- <form method="POST" action="{{ route('convini.register') }}">
                @csrf

                <div class="c-form__group">
                    <label class="c-form__label">{{ __('Convini_name') }}</label>

                    <div class="c-form__item">
                        <input id="convini_name" type="text" class="c-form__input @error('convini_name') c-is-invalid @enderror" name="convini_name" value="{{ old('convini_name') }}"  autocomplete="convini_name" autofocus>

                        @error('convini_name')
                            <span class="c-invalid__feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="c-form__group">
                    <label class="c-form__label">{{ __('Branch_name') }}</label>

                    <div class="c-form__item">
                        <input id="branch_name" type="text"   class="c-form__input @error('branch_name') c-is-invalid @enderror" name="branch_name" value="{{ old('branch_name') }}"  autocomplete="branch_name" autofocus>

                        @error('branch_name')
                            <span class="c-invalid__feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="c-form__group">
                    <label class="c-form__label">{{ __('Prefectures') }}</label>

                    <div class="c-form__item">
                        <select id="prefectures" type="text" class="c-form__input @error('prefectures') c-is-invalid @enderror" name="prefectures" value="{{ old('prefectures') }}"  autocomplete="prefectures" autofocus >
                            @foreach(config('prefectures') as $index => $name) 
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endforeach
                         </select>

                        @error('prefectures')
                            <span class="c-invalid__feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>                
                <div class="c-form__group">
                    <label class="c-form__label">{{ __('Address') }}</label>

                    <div class="c-form__item">
                        <input id="address" type="text"  class="c-form__input @error('address') c-is-invalid @enderror" name="address" value="{{ old('address') }}"  autocomplete="address" autofocus>

                        @error('address')
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
