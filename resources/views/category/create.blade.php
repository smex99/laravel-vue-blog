@extends('layouts.admin')

@section('title', '| Nouvelle catégorie')

@section('subtitle', 'Nouvelle catégorie')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="my-3 p-3 bg-white rounded shadow-sm">
                    <form action="/category" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="name">Nom de catégorie</label>
                            <input class="form-control input-sm" type="text">       
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
        </div>
    </div>
</div>
@endsection