@extends('layouts.admin')

@section('title', '| Création de profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                
                @include ('layouts.errors')

                <form class="" action="/profile" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nom d'utilisateur</label>
                        <input class="form-control input-sm" type="text" placeholder="{{Auth::User()->name}}" readonly>
                    </div>

                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input">
                            <label class="custom-file-label" for="image">Choisir une image</label>
                        </div>
                    </div>
        
                    <hr class="divider">
        
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" type="text" placeholder="{{Auth::User()->email}}" class="form-control input-sm" readonly>
                        <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre email avec qui que ce soit.</small>
                    </div>
        
                    <div class="form-group">
                        <label for="phone">Telephone:</label>
                        <input name="phone" type="numeric" class="form-control input-sm" placeholder="Telephone">
                    </div>                
        
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea rows="2" cols="5" name="address" class="form-control input-sm" placeholder="Votre address"></textarea>
                    </div>
        
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="city">Ville:</label>
                            <input name="city" type="text" class="form-control input-sm" placeholder="Ville">
                        </div>
        
                        <div class="form-group col-md-4">
                            <label for="country">Pays:</label>
                            <input name="country" type="text" class="form-control input-sm" placeholder="Pays">
                        </div>
        
                        <div class="form-group col-md-2">
                            <label for="postal_code">Zip code:</label>
                            <input name="postal_code" type="numeric" class="form-control input-sm" placeholder="Postal Code">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection