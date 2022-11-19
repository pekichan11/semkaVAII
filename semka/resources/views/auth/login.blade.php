@extends('master')

@section('title', 'Log in')

@section('main')
    <form method="POST" action="{{ route('login') }}" class="form-control" >
        @csrf
        <h2>Login</h2>
        
        <div class="form-group">
            <label for="email" class="form-label mt-4">Email address</label>
            <input type="email" name="email" id="email" class="form-control"   placeholder="Enter email" vlaue="{{old('email')}}" autofocus="true">
        </div>
        
        <div class="form-group">
            <label for="password" class="form-label mt-4">Password    </label>
            <input type="password" name="password" id="password" placeholder="Enter password" vlaue="{{old('password')}}" class="form-control">
        </div>

        <div class="row">
            <div class="justify-content-center">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" value="remeber_me" id="remember_me" name="remember_me" checked>
                    <label for="remeber_me" class="form-check-label"> Remember me</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>

        <div class="text-center">
            <p>Not a member? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </form>
@stop
