@extends('customer.layouts.layout')

@section('content')
    <div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-lg-6 col-md-8 m-auto">
          <div class="account-form-wrap">
            <!--== Start Login Form ==-->
            <div class="login-form">
              <div class="content">
                <h4 class="title">Register</h4>
                <p>Please complete this form.</p>
              </div>
              <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <input class="form-control" name="name" type="text" required placeholder="Full Name">
                      @error('name')
                        <span class="h6" role="alert">
                            {{ $message }}
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <input class="form-control noSpace" name="username" type="text" required placeholder="Username">
                      @error('username')
                        <span class="h6" role="alert">
                            {{ $message }}
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <input class="form-control" name="email" type="email" required placeholder="Email Address">
                      @error('email')
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
                    <div class="form-group">
                      <input class="form-control" type="password" name="password_confirmation" required placeholder="Password Confirmation">
                      @error('password_confirmation')
                        <span class="h6" role="alert">
                            {{ $message }}
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <input class="form-control" type="text" name="address" required placeholder="Address">
                      @error('address')
                        <span class="h6" role="alert">
                            {{ $message }}
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <input class="form-control number" type="text" name="phone" required placeholder="Phone Number">
                      @error('phone')
                        <span class="h6" role="alert">
                            {{ $message }}
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="login-form-group">
                      <button class="btn-sign" type="submit">Register</button>
                      <a class="btn-create" href="{{ url('/login') }}">Already have an account? Login</a>
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
