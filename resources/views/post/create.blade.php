@extends('layouts.admin')

@section('title', '| Nouvel article')

@section('subtitle', 'Nouvel article')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="my-3 p-3 bg-white rounded shadow">
                    <form class="" action="/post" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Titre:</label>
                            <input name="title" type="text" class="form-control">
                        </div>
                    
                        <div class="form-group">
                            <label for="content">Content:</label>
                            <textarea rows="7" name="content" class="form-control"></textarea>
                            <small id="content" class="form-text text-muted">Apprenez a créer des markdowns pour vos articles.</small>
                        </div>
                    
                        <div class="form-group">
                            <label for="categories">Categorie:</label>
                            <select id="categories" class="custom-select" name="categories[]" multiple="multiple">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image">
                                <label class="custom-file-label" for="image">Image article</label>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="live" id="live">
                                <label class="custom-control-label" for="live">Voulez-vous publier cet article ?</label>
                            </div>
                        </div>
                    
                        <div class="form-group pull-right">
                            <button type="submit" class="btn btn-primary optbtn">Sauvegarder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection