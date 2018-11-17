@extends('layouts.admin')

@section('title', '| Post index')

@section('subtitle', 'Liste des articles')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="my-3 p-3 bg-white rounded shadow">
                    <table class="table table-hover">
                        <thead>
                            <th>Titre</th>
                            <th>Auteur</th>
                            <th>Catégorie</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>
                                        @foreach($post->categories as $category)
                                            <span class="badge badge-primary m-0">{{$category->name}}</span>
                                        @endforeach
                                    </td>
                                    
                                    <td>
                                        @if($post->live)
                                            <span class="badge badge-primary">publié</span>
                                        @else
                                            <span class="badge badge-secondary">non publié</span>
                                        @endif
                                    </td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <div class="dropdown mr-1">
                                                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                                                    Actions
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                                    <a class="dropdown-item" href="/post/{{$post->id}}">Consulter</a>
                                                    <a class="dropdown-item" href="/post/{{$post->id}}/edit">Editer</a>
                                                    <a class="dropdown-item" href="#">Supprimer</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                Pas d'article(s)
                            @endforelse
                        </tbody>
                    </table>
                    {{-- <div class="pull-right">{{ $posts->links() }}</div> --}}
                </div>
            </div>
        </div>    
    </div>
@endsection