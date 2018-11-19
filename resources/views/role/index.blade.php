@extends('layouts.admin')

@section('title', '| Pérmissions')

@section('subtitle', 'Pérmissions')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="my-3 p-3 bg-white rounded shadow">
                <table class="table">
                    <thead>
                        <th>Nom et Prénom</th>
                        <th>E-Mail</th>
                        <th>Utilisateur</th>
                        <th>Auteur</th>
                        <th>Admin</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <form action="{{ route('assign') }}" method="POST">
                                    @csrf
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}<input type="hidden" name="email" value="{{ $user->email }}"></td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user" id="role_user.{{$user->id}}">
                                            <label class="custom-control-label" for="role_user.{{$user->id}}"></label>
                                         </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" {{ $user->hasRole('Author') ? 'checked' : '' }} name="role_author" id="role_author.{{$user->id}}">
                                            <label class="custom-control-label" for="role_author.{{$user->id}}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin" id="role_admin.{{$user->id}}">
                                            <label class="custom-control-label" for="role_admin.{{$user->id}}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection