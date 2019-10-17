@extends('layouts.app_convini')

@section('content')
<section class="main">
    <div class="l-container p-container">
        <div class="l-page__wrapper p-page__wrapper">
            <h2 class="c-page__title">{{ __('Register')}}</h2>
            <form method="POST" action="{{ route('convini.register') }}">
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
                    <form method="POST" action="{{ route('convini.register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="branch_name" class="col-md-4 col-form-label text-md-right">{{ __('branch_name') }}</label>

                            <div class="col-md-6">
                                <input id="convini_name" type="text" class="form-control @error('convini_name') c-is-invalid @enderror" name="convini_name" value="{{ old('convini_name') }}"  autocomplete="convini_name" autofocus>

                                @error('convini_name')
                                    <span class="c-invalid__feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="branch_name" class="col-md-4 col-form-label text-md-right">{{ __('Branch_Name') }}</label>

                            <div class="col-md-6">
                                <input id="branch_name" type="text" class="form-control @error('branch_name') c-is-invalid @enderror" name="branch_name" value="{{ old('branch_name') }}"  autocomplete="branch_name" autofocus>

                                @error('branch_name')
                                    <span class="c-invalid__feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prefectures" class="col-md-4 col-form-label text-md-right">{{ __('Prefectures') }}</label>

                            <div class="col-md-6">                                
                                <select id="prefectures" type="text" class="form-control @error('prefectures') c-is-invalid @enderror" name="prefectures" value="{{ old('prefectures') }}"  autocomplete="prefectures" autofocus >
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

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') c-is-invalid @enderror" name="address" value="{{ old('address') }}"  autocomplete="address" autofocus>

                                @error('address')
                                    <span class="c-invalid__feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') c-is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="c-invalid__feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') c-is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="c-invalid__feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
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
