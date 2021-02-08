@extends('layouts.app')

@section('title', 'Môj profil')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Môj profil') }}</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('update.user', $user->id) }}">
                            @csrf

                           <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="email" class="form-control @error('email') is-invalid @enderror" name="email" value=" {{ Auth::user()->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                           <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Meno') }}</label>

                                <div class="col-md-6">
                                    <input id="name" placeholder="meno" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value=" {{ Auth::user()->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Heslo') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" placeholder="heslo" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Potvrdiť heslo') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" placeholder="potvrdiť heslo" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn-auth">
                                        {{ __('Uložiť') }}
                                    </button>

                                    <span class="or">
                                           <a href="{{ url('/') }}">späť</a>
                                     </span>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    





@endsection
		