@extends('layouts.app')

@section('content')
<section class="main">
    <div class="l-container p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <h2 class="c-page__title">{{ __('Register')}}</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="c-form__group">
                    <label class="c-form__label">{{ __('Name') }}</label>

                    <div class="c-form__item">
                        <input id="name" type="text" class="c-form__input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="c-form__group">
                    <label class="c-form__label">{{ __('Branch_name') }}</label>

                    <div class="c-form__item">
                        <input id="branch_name" type="text"   class="c-form__input @error('branch_name') is-invalid @enderror" name="branch_name" value="{{ old('branch_name') }}" required autocomplete="branch_name" autofocus>

                        @error('branch_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="c-form__group">
                    <label class="c-form__label">{{ __('Prefectures') }}</label>

                    <div class="c-form__item">
                        <select id="prefectures" type="text" class="c-form__input @error('prefectures') is-invalid @enderror" name="prefectures" value="{{ old('prefectures') }}" required autocomplete="prefectures" autofocus >
                            @foreach(config('prefectures') as $index => $name) 
                                <option value="{{ $index }}">{{ $name }}</option>
                            @endforeach
                         </select>
                        @error('prefectures')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>                
                <div class="c-form__group">
                    <label class="c-form__label">{{ __('Address') }}</label>

                    <div class="c-form__item">
                        <input id="address" type="text"  class="c-form__input @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 
                <div class="c-form__group">
                    <label class="c-form__label">{{ __('E-mail') }}</label>

                    <div class="c-form__item">
                        <input id="email" type="text"  class="c-form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>  
                <div class="c-form__group">
                    <label class="c-form__label">{{ __('Password') }}</label>

                    <div class="c-form__item">
                        <input id="password" type="password" class="c-form__input @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>  
                <div class="c-form__group">
                    <label class="c-form__label">{{ __('Confirm Password') }}</label>

                    <div class="c-form__item">
                        <input id="password-confirm" type="password" class="c-form__input" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>   
                <div class="c-form__group">
                    <div class="c-form__button">
                        <button type="submit" class="c-button">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>        
        </div>

    </div>
</section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


