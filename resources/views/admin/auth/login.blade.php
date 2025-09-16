@extends('layouts.auth')

@section('style')
    <style>
        .login-page{
            height: 100dvh;
        }
    </style>    
@endsection

@section('content')
    <div class="d-flex justify-content-center align-items-center login-page">
        <div class="card" style="min-width: 400px;">
            <div class="card-body">
                <div class="d-flex flex-column justify-content-center align-items-center gap-2">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="logo" width="60">
                    <h5 class="card-title text-center">Login Admin</h5>
                </div>
                <form action="{{ route('admin.request-login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <div class="input-group">
                            <input class="form-control" id="email" type="email" name="email">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group">
                            <input class="form-control" id="password" type="password" name="password">
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection