@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="my-3 p-3 bg-white rounded shadow">
                <h3 class="text-center">{{ __('Réinitialiser le mot de passe') }}</h3>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" style="padding:20px">
                @csrf

                <div class="form-group row">
                    <div class="input-group">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required>

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
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Envoyer le lien') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
