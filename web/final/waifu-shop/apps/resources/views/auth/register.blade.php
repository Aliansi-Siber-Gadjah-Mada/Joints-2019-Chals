@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                <div class="card">
                <div class="card-content">
                    <span class="card-title">Halaman Registrasi</span>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input placeholder="Username" id="username" name="username" type="text" class="validate">
                                <label for="username">Username</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input placeholder="Password" id="password" name="password" type="password" class="validate">
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field col s12">
                                <input class="btn" type="submit" value="Register">
                            </div>
                            <div class="input-field col s12">
                                @error('username')
                                    <p>{{$message}}</p>
                                @enderror
                                @error('password')
                                    <p>{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection