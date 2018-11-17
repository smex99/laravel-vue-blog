@extends('layouts.admin')

@section('title', 'Edition Catégorie')

@section('subtitle', 'Edition catégorie')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="/category/{{ $category->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nom de la catégorie:</label>
                    <input class="form-control input-sm" name="name" type="text" placeholder="{{$category->name}}">       
                </div>

                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
@endsection