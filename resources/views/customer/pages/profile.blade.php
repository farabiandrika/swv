@extends('customer.layouts.layout')

@section('title')
{{ config('company.configs') !== null ? config('company.configs')->name : '' }}
@endsection

@section('content')
<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col-lg-6 col-md-8 m-auto">
      <div class="account-form-wrap">
        <!--== Start Login Form ==-->
        <div class="login-form">
          <div class="content">
            <h4 class="title">My Profile</h4>
            <p></p>
          </div>
          <form method="POST" action="{{ route('updateProfile') }}">
            @csrf
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" value="{{ auth()->user()->name }}" name="name" type="text" required placeholder="Full Name">
                  @error('name')
                    <span class="h6" role="alert">
                        {{ $message }}
                    </span>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control noSpace" value="{{ auth()->user()->username }}" name="username" type="text" required placeholder="Username">
                  @error('username')
                    <span class="h6" role="alert">
                        {{ $message }}
                    </span>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" name="email" value="{{ auth()->user()->email }}" type="email" required placeholder="Email Address">
                  @error('email')
                    <span class="h6" role="alert">
                        {{ $message }}
                    </span>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" type="password" name="password" placeholder="Password">
                  @error('password')
                    <span class="h6" role="alert">
                        {{ $message }}
                    </span>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" type="password" name="password_confirmation" placeholder="Password Confirmation">
                  @error('password_confirmation')
                    <span class="h6" role="alert">
                        {{ $message }}
                    </span>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control" type="text" value="{{ auth()->user()->address }}" name="address" required placeholder="Address">
                  @error('address')
                    <span class="h6" role="alert">
                        {{ $message }}
                    </span>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control number" type="text" value="{{ auth()->user()->phone }}" name="phone" required placeholder="Phone Number">
                  @error('phone')
                    <span class="h6" role="alert">
                        {{ $message }}
                    </span>
                  @enderror
                </div>
              </div>
              <div class="col-12">
                <div class="login-form-group">
                  <button class="btn-sign" type="submit">Update</button>
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

@section('js')

@endsection