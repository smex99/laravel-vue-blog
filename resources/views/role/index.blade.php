@extends('layouts.admin')

@section('title', '| Pérmissions')

@section('subtitle', 'Pérmissions')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="my-3 p-3 bg-white rounded shadow">
                <table class="table">
                    <thead>
                        <th>Nom et Prénom</th>
                        <th>E-Mail</th>
                        <th>Utilisateur</th>
                        <th>Auteur</th>
                        <th>Administrateur</th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <form action="{{ route('assign') }}" method="POST">
                                    @csrf
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                                    {{-- <td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                                    <td><input type="checkbox" {{ $user->hasRole('Author') ? 'checked' : '' }} name="role_author"></td>
                                    <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td> --}}
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user" id="role_user">
                                            <label class="custom-control-label" for="role_user"></label>
                                         </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" {{ $user->hasRole('Author') ? 'checked' : '' }} name="role_author" id="role_author">
                                            <label class="custom-control-label" for="role_author"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin" id="role_admin">
                                            <label class="custom-control-label" for="role_admin"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btn-sm">Assign</button>
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