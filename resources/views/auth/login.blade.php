@extends('layouts.master_auth')


@section('content')
    <!-- Page Content -->
    <div class="bg-pattern" style="background-image: url(' {{ asset("media/various/bg-pattern-inverse.png") }}');">
        <div class="row mx-0 justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="content content-full overflow-hidden py-0">
                    <!-- Header -->
                    <div class="py-20 text-center">
                        <a class="font-w700 mr-5" href="{{ url('/home') }}">
                            <img src="{{ asset('media/favicons/favicon-32x31.png') }}" alt="">
                            <span class="font-size-xl text-primary-dark">{{config('app.name')}}</span> </a>
                    </div>
                    <!-- END Header -->

                    <!-- Sign In Form -->
                    <form action="{{ url('login')  }}" method="post">
                        @csrf
                        <div class="block block-themed block-rounded block-shadow">
                            <div class="block-header">
                                <h3 class="block-title font-size-md">Welcome to Your Dashboard -
                                    <small class="font-size-sm">It’s a great day today!</small></h3>
                            </div>

                            <div class="block-content">
                                @error('email')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    {{ $message }}
                                </div>
                                @enderror
                                @if(session('error_msg'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        {{ session('error_msg') }}
                                    </div>
                                @endif
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="login-email">Email</label>
                                        <input type="email" class="form-control" id="login-email" name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="login-password">Password</label>
                                        <input type="password" class="form-control" id="login-password" name="password" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-sm-6 d-sm-flex align-items-center push">
                                        <div class="custom-control custom-checkbox mr-auto ml-0 mb-0">
                                            <input type="checkbox" class="custom-control-input" id="login-remember-me" name="remember">
                                            <label class="custom-control-label" for="login-remember-me">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-sm-right push">
                                        <button type="submit" class="btn btn-alt-primary">
                                            <i class="si si-login mr-10"></i> Sign In
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-body-dark block-content">
                                <div class="form-group text-center">
                                    <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ url('register') }}">
                                        <i class="fa fa-plus mr-5"></i> Create Account </a>
                                    <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="{{ url('password/reset') }}">
                                        <i class="fa fa-warning mr-5"></i> Forgot Password </a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END Sign In Form -->
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
