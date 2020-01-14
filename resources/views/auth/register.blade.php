@extends('layouts.master_auth')

@section('content')
    <!-- Page Content -->
    <div class="bg-pattern" style="background-image: url('{{ asset("media/various/bg-pattern-inverse.png") }}');">
        <div class="row mx-0 justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="content content-full overflow-hidden py-0">
                    <!-- Header -->
                    <div class="py-20 text-center">
                        <a class="font-w700 mr-5" href="{{ url('/home') }}">
                            <img src="{{ asset('media/favicons/favicon-32x31.png') }}" alt="">
                            <span class="font-size-xl text-dual-primary-dark">{{config('app.name')}}</span> </a>
                    </div>
                    <!-- END Header -->

                    <!-- Sign Up Form -->
                    <form action="{{ url('register')  }}" method="post">
                        @csrf
                        <div class="block block-themed block-rounded block-shadow block-bordered">
                            <div class="block-header">
                                <h3 class="block-title font-size-lg">Create New Account -
                                    <small class="font-size-sm">We’re excited to have you on board!</small></h3>
                            </div>
                            <div class="block-content">
                                @if(session('success_msg'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    {{ session('success_msg') }}
                                </div>
                                @endif

                                {{--  Hidden field for customer user type--}}
                                <input type="hidden" name="user_type" value="customer">
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6">
                                        <label for="signup-firstname">First Name</label>
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="signup-firstname" name="first_name" value="{{ old("first_name") }}" placeholder="eg. John" required>
                                        @error('first_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label for="signup-lastname">Last Name</label>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="signup-lastname" name="last_name" value="{{ old("last_name") }}" placeholder="eg. Doe" required>
                                        @error('last_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label for="signup-email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="signup-email" name="email" value="{{ old("email") }}" placeholder="eg: john_doe@example.com" required>
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 col-md-6">
                                        <label for="signup-password">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="signup-password" value="{{ old('password') }}" name="password" placeholder="********" required>
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label for="signup-password-confirm">Password Confirmation</label>
                                        <input type="password" class="form-control" id="signup-password-confirm" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="********" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 push">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signup-terms" name="signup-terms" required>
                                            <label class="custom-control-label" for="signup-terms">I agree to the
                                                <a href="#" class="link-effect" data-toggle="modal" data-target="#modal-terms"> Terms &amp; Conditions </a>
                                            </label>
                                            @error('signup-terms')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6 push">
                                        <button type="submit" class="btn btn-alt-success">
                                            <i class="fa fa-plus mr-10"></i> Create Account
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-body-dark block-content">
                                <div class="form-group text-center font-size-md">
                                    Already have an account?
                                    <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ url('/login') }}">
                                        <i class="fa fa-user text-muted mr-5"></i> Sign In </a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END Sign Up Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
    @include('auth.partials.modals')

@endsection
