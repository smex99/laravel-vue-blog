@extends('layouts.app')

@section('title', '| Le blog')

@section('content')
    <section class="blog-header">
        <div class="container">
            <div style="margin-top: 100px;"></div>
            <h1 class="text-white">Nos articles</h1>
            <p class="lead text-white">Nous mettons à jours régulièrement sur notre site des articles liées aux technologies du développement Front-end et Back-end...</p>
        </div>
    </section>

    <div class="container">
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
            Pas d'article(s)
            @endforelse
        </div>
        <div class="pull-right">{{ $posts->links() }}</div>
    </div>
@endsection