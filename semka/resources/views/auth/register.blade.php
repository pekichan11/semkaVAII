@extends('master')

@section('title', 'register')

@section('main')
    <div class="login-page">
        <div class="login-logo-div">
            <a href="#">
                <img src="{{ asset('/img/logo.png')}}" alt="logo" class="login-logo">  
            </a>
        </div>
        <form method="POST" action="" class="form-control">
            @csrf
            <h2>Register</h2>

            <div class="form-group">
                <label for="username" class="form-label mt-4">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="{{old('username')}}" autofocus="true">
            </div>
            <div class="form-group">
                <label for="email" class="form-label mt-4">Email address</label>
                <input type="email" name="email" id="email" class="form-control"   placeholder="Enter email" vlaue="{{old('email')}}" autofocus="true">
            </div>
            <div class="form-group">
                <label for="password" class="form-label mt-4">Password    </label>
                <input type="password" name="password" id="password" placeholder="Enter password" vlaue="{{old('password')}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="repeat-password" class="form-label mt-4">Repeat password    </label>
                <input type="password" name="repeat-password" id="repeat-password" placeholder="Repeat password" vlaue="{{old('password')}}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>
            <div class="text-center">
                <p>Already a member? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </form>
    </div>
@stop