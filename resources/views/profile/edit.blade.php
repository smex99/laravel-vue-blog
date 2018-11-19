@extends('layouts.admin')

@section('title', '| Edition de profile')

@section('subtitle', 'Edition de profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                
                @include ('layouts.errors')

                <form action="/profile/{{ $profile->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nom d'utilisateur</label>
                        <input class="form-control input-sm" type="text" placeholder="{{Auth::User()->name}}" readonly>       
                    </div>

                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image">
                            <label class="custom-file-label" for="image">Choisir une image...</label>
                        </div>
                    </div>

                    <hr class="divider">

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="email" type="text" placeholder="{{Auth::User()->email}}" class="form-control input-sm" readonly>
                        <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre email avec qui que ce soit.</small>
                    </div>

                    <div class="form-group">
                        <label for="phone">Téléphone:</label>
                        <input name="phone" type="numeric" value="{{$profile->phone}}" class="form-control input-sm">
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Adresse:</label>
                        <textarea rows="2" cols="5" name="address" class="form-control input-sm">{{$profile->address}}</textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="city">Ville:</label>
                            <input value="{{$profile->city}}" name="city" type="text" class="form-control input-sm">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="country">Pays:</label>
                            <input value="{{$profile->country}}" name="country" type="text" class="form-control input-sm">
                        </div>

                        <div class="form-group col-md-2">
                            <label for="postal_code">Zip code:</label>
                            <input value="{{$profile->postal_code}}" name="postal_code" type="numeric"
                            class="form-control input-sm" 
                            placeholder="Postal Code">
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection