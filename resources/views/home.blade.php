@extends('layouts.admin')

@section('title', '| Tableau de bord')

@section('subtitle', 'Tableau de bord')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <h6 class="border-bottom border-gray pb-2 mb-0">Derniers posts</h6>
                @forelse($posts as $post)
                    <div class="media text-muted pt-3">
                        <img src="{{ asset('storage/'.Auth::user()->profile->image)}}" style="width:20px; hieght:auto" alt="image" class="mr-2 rounded">
                        <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
                            <strong class="d-block text-gray-dark">{{$post->user->name}}</strong>
                            {{$post->shortContent}}
                        </p>
                    </div>
                @empty
                Vous n'avez pas de post(s) !
                @endforelse          
                <small class="d-block text-right mt-3">
                    <a href="#">Voir tout</a>
                </small>
            </div>
        </div>

        <div class="col-md-10">
                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <h6 class="border-bottom border-gray pb-2 mb-0">Derniers Commentaires</h6>
                    @forelse($comments as $comment)
                        <div class="media text-muted pt-3">
                            <img src="{{ asset('storage/'.Auth::user()->profile->image)}}" style="width:20px; hieght:auto" alt="image" class="mr-2 rounded">
                            <p class="media-body pb-3 mb-0 lh-125 border-bottom border-gray">
                                <strong class="d-block text-gray-dark">{{$comment->user->name}}</strong>
                                {{$comment->content}}
                            </p>
                        </div>
                    @empty
                    Vous n'avez pas de commentaire(s) !
                    @endforelse          
                    <small class="d-block text-right mt-3">
                        <a href="#">Voir tout</a>
                    </small>
                </div>
            </div>
    </div>
</div>
@endsection
