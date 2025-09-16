@extends('layouts.guest')

@section('content')
    <div class="w-100 d-flex flex-column justify-content-center align-items-center">
        <h2 class="fw-bold text-primdark">Login</h2>
        <div class="card rounded-4 mt-2" style="width: 350px;">
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <form class="card-content" action="{{ route('customer.login-request') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="email">Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" for="password">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="pt-2">
                        <button class="btn btn-primary w-100 fw-semibold" type="submit">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection