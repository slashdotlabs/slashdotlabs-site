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
                            <span class="font-size-xl text-primary-dark">{{config('app.name')}}</span>
                        </a>
                    </div>
                    <!-- END Header -->

                    <!-- Sign In Form -->
                    <form action="{{ route('password.update')  }}" method="post">
                        @csrf
                        <div class="block block-themed block-rounded block-shadow">
                            <div class="block-header">
                                <h3 class="block-title font-size-md">Password Reset</h3>
                            </div>

                            <div class="block-content">
                                @error('token')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    {{ $message }}
                                </div>
                                @enderror
                                @error('email')
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="form-group row">
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <input type="hidden" name="email" value="{{ $email }}">
                                    <div class="col-12">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}" name="password" placeholder="********" required>
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label for="password-confirm">Password Confirmation</label>
                                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="********" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-12 text-sm-right push">
                                        <button type="submit" class="btn btn-alt-primary">
                                            <i class="si si-key mr-10"></i> Reset Password
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-body-dark block-content">
                                <div class="form-group text-center">
                                    Changed your mind?
                                    <a class="link-effect mr-10 mb-5 d-inline-block" href="{{ url('register') }}">
                                        <i class="si si-login mr-5"></i> Login instead
                                    </a>
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
