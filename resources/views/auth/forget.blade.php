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
                <h4 class="title">Forgot Password</h4>
                <p>Please insert your username or email.</p>
              </div>
              <form method="POST" action="{{ route('resetPassword') }}">
                @csrf
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <input class="form-control" name="username" type="username" required placeholder="Email or Username">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="login-form-group">
                      <button class="btn-sign" type="submit">Reset Password</button>
                      <a class="btn btn-create" href="{{ url('/register') }}">Create an Account</a>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="account-optional-group">
                    <a class="btn btn-create" href="{{ url('/login') }}">Login</a>
                      {{-- <a class="btn-create" href="{{ url('/register') }}">Create account</a> --}}
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <!--== End Login Form ==-->
          </div>
        </div>
      </div>
    </div>
@endsection
