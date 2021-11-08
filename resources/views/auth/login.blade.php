@extends('customer.layouts.layout')

@section('title', 'Login')

@section('content')
    <div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-lg-6 col-md-8 m-auto">
          <div class="account-form-wrap">
            <!--== Start Login Form ==-->
            <div class="login-form">
              <div class="content">
                <h4 class="title">Login</h4>
                <p>Please login using account detail bellow.</p>
              </div>
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <input class="form-control" name="username" type="username" required placeholder="Email or Username">
                      @error('username')
                        <span class="h6" role="alert">
                            {{ $message }}
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <input class="form-control" type="password" name="password" required placeholder="Password">
                      @error('password')
                        <span class="h6" role="alert">
                            {{ $message }}
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="login-form-group">
                      <button class="btn-sign" type="submit">Sign In</button>
                      <a class="btn-create" href="{{ url('/register') }}">Create an Account</a>
                    </div>
                  </div>
                  {{-- <div class="col-12">
                    <div class="account-optional-group">
                      <a class="btn-create" href="{{ url('/register') }}">Create account</a>
                    </div>
                  </div> --}}
                </div>
              </form>
            </div>
            <!--== End Login Form ==-->
          </div>
        </div>
      </div>
    </div>
@endsection
