@extends('layouts.app')

@section('title', '| Article')

@section('content')
    <div class="container bg-white rounded py-5 shadow-sm">
        <div class="row">
            <div class="col-md-8">
                <h2>{{ $post->title }}</h2>
                <p><span class="glyphicon glyphicon-user"></span><b>Auteur: </b>{{ $post->user->name }} - <span class="glyphicon glyphicon-calendar"></span><b>Date: </b>{{ $post->created_at->diffForHumans() }} -<b>Tags: </b> @foreach($post->categories as $category)
                    <span class="badge badge-primary">{{$category->name}}</span>
                @endforeach</p>
            </div>

            <div class="col-md-10">
                {{-- <p style="text-align:justify">{{ $post->content }}</p> --}}
                <p style="text-align:justify">{!! Markdown::convertToHtml($post->content) !!}</p>
            </div>

            <div class="col-md-10">
                <video id="my-video" class="video-js embed-responsive-item" controls preload="auto" width="640" height="360" poster="{{asset('storage/'.$post->image)}}" data-setup="{}">
                    <source src="{{ asset('storage/'.'vue.mp4') }}" type='video/mp4'>
                    <p class="vjs-no-js">
                     To view this video please enable JavaScript, and consider upgrading to a web browser that
                     <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video>
            </div>
        </div>

        <hr class="divider">

        <div class="row">
            <div class="col-md-8">
                <form class="form-horizontal" action="/comment" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <div class="form-group">
                        <label for="comment">Commentaire:</label>
                        <textarea class="form-control" name="content" id="content" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Ajouter un commentaire</button>
                </form>
            </div>
        </div>

        <hr class="divider">

        <div class="row">
            <div class="col-md-8">
                @forelse($comments as $comment)
                    <div class="media">
                        <img class="mr-3" src="{{ asset('storage/'.$comment->user->profile->image)}}" style="height:50px; width:auto" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0">{{$comment->user->name}}</h5>
                            <p>{{$comment->created_at->diffForHumans()}}</p>
                            <p style="text-align:justify">{{$comment->content}}</p>
                        </div>
                    </div>
                @empty
                Pas de commentaire(s) !
                @endforelse
            </div>
        </div> 
@endsection