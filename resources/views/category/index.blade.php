@extends('layouts.admin')

@section('title', '| Catégories')

@section('subtitle', 'Catégories')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-5">
                <div class="my-3 p-3 bg-white rounded shadow">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Categories</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <div class="d-flex">
                                        <div class="dropdown mr-1">
                                            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                                <a class="dropdown-item" href="/category/{{$category->id}}/edit">Modifier</a>
                                                <a class="dropdown-item" href="/category">Supprimer</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            Pas de categorie(s) !
                            @endforelse
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection