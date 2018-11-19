@extends('layouts.admin')

@section('title', '| Mon profile')

@section('subtitle', 'Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="my-3 p-3 bg-white rounded shadow">
                @if($profile->image)
                    <img src="{{ asset('storage/'.Auth::user()->profile->image)}}" class="img-thumbnail mx-auto d-block" style="height:150px; width:auto" alt="profile image">
                @else
                    <img src="{{ asset('storage/avatar.png')}}" class="img-thumbnail mx-auto d-block" style="height:150px; width:auto" alt="profile image">
                @endif

                <h5 class="card-title text-center" style="margin: 20px 20px">{{$profile->user->name}}</h5>

                <a href="/profile/{{ Auth::user()->id }}/edit" class="btn btn-primary btn-sm btn-block">Editer</a>
                <hr class="divider">
                <dl class="row">
                    <dt class="col-sm-4"><span data-feather="mail"></span> E-mail:</dt>
                    <dd class="col-sm-8"><a href="#">{{$profile->user->email}}</a></dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-4"><span data-feather="phone-call"></span> Téléphone:</dt>
                    <dd class="col-sm-8">{{$profile->phone}}</dd>
                </dl>
                <hr class="divider">

                <dl class="row">
                    <dt class="col-sm-4">Adresse:</dt>
                    <dd class="col-sm-8">{{$profile->address}}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-4">Ville:</dt>
                    <dd class="col-sm-8">{{$profile->city}}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-4">Pays:</dt>
                    <dd class="col-sm-8">{{$profile->country}}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-4">Zip code:</dt>
                    <dd class="col-sm-8">{{$profile->postal_code}}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection