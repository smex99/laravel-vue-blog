@extends('layouts.app')

@section('title', '| Inscription')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="my-3 p-3 bg-white rounded shadow">
                    <h3 class="text-center">Inscription</h3>
                    <form method="POST" action="{{ route('register') }}" style="padding: 20px">
                        @csrf
                        <div class="form-group row">
                            <div class="input-group">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="{{ __('Nom et Prénom') }}" required autofocus>

                                <div class="input-group-prepend">
                                    <div class="input-group-text"><span data-feather="user"></span></div>
                                </div>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="input-group">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Adresse') }}" required>

                                <div class="input-group-prepend">
                                    <div class="input-group-text"><span data-feather="mail"></span></div>
                                </div>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="input-group">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Mot de passe') }}" required>

                                <div class="input-group-prepend">
                                    <div class="input-group-text"><span data-feather="lock"></span></div>
                                </div>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="input-group">                    
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirmation') }}" required>

                                <div class="input-group-prepend">
                                    <div class="input-group-text"><span data-feather="lock"></span></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                {{ __('Enregistrer') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
