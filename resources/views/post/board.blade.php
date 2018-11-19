@extends('layouts.admin')

@section('title', '| Articles')

@section('subtitle', 'Articles')

@section('content')
    <div class="container">
        {{-- <div class="row justify-content-center"> --}}
            <div class="row">
                <img src="{{ asset('storage/formation-2.jpg')}}" style="height:400px; width:auto" class="rounded mx-auto d-block" alt="...">
            </div>

            <div class="row justify-content-center py-2">
                <a class="btn btn-primary btn-block col-md-3" role="button" aria-pressed="true" href="/post">
                    <span data-feather="archive"></span>
                    Mes articles
                </a>
            </div>

            <div class="row justify-content-center py-2">
                <a class="btn btn-primary col-md-3" role="button" aria-pressed="true" href="/post/create/">
                    <span data-feather="edit-2"></span>
                    Créer un article
                </a>
            </div>
        {{-- </div> --}}
    </div>
@endsection