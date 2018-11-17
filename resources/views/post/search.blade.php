@extends('layouts.app')

@section('title', '| Article recherche')

@section('content')
    <div class="container">
        <div class="row" style="margin-top:55px">
            <h3>Résultat(s) de recherche</h3>
        </div>

        <div class="row">
            @forelse($posts as $post)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="{{ asset('storage/'.$post->image)}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><a href="/post/{{$post->id}}">{{ $post->title }}</a></h5>
                            @foreach($post->categories as $category)
                                <span class="badge badge-primary">{{$category->name}}</span>
                            @endforeach
                            <p class="card-text">{{ $post->shortContent }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">{{ $post->user->name }}</small>
                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            Pas de post(s) !
            @endforelse
        </div>

        <div class="row">
            <img class="pull-right" src="https://www.algolia.com/static_assets/images/pricing/pricing_new/algolia-powered-by-3726283b.svg">
        </div>
    </div>
@endsection