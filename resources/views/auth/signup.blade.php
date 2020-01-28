@extends('layouts.index')

@section('content')
<!-- Page Content -->
<div class="bg-body-dark bg-pattern" style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
    <div class="row mx-0 justify-content-center">
        <div class="hero-static col-lg-6 col-xl-4">
            <div class="content content-full overflow-hidden">
                <!-- Header -->
                <div class="py-30 text-center">
                    <a class="font-w700 mr-5" href="#">
                        <img src="{{ asset('media/favicons/favicon-32x31.png') }}" alt="">
                        <span class="font-size-xl text-dual-primary-dark">Slash Dot Labs</span>
                        </a>
                    <h1 class="h4 font-w700 mt-30 mb-10">Create New Account</h1>
                    <h2 class="h5 font-w400 text-muted mb-0">We’re excited to have you on board!</h2>
                </div>
                <!-- END Header -->

                <!-- Sign Up Form -->
                <!-- jQuery Validation functionality is initialized with .js-validation-signup class in js/pages/op_auth_signup.min.js which was auto compiled from _es6/pages/op_auth_signup.js -->
                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                <form class="js-validation-signup" action="be_pages_auth_all.html" method="post">
                    <div class="block block-themed block-rounded block-shadow">
                        <div class="block-header bg-gd-yellow">
                            <h3 class="block-title">Please add your details</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option">
                                    <i class="si si-wrench"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="signup-username">First Name</label>
                                    <input type="text" class="form-control" id="signup-username" name="signup-username" placeholder="eg. John">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="signup-username">Last Name</label>
                                    <input type="text" class="form-control" id="signup-username" name="signup-username" placeholder="eg. Doe">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="signup-email">Email</label>
                                    <input type="email" class="form-control" id="signup-email" name="signup-email" placeholder="eg: john_doe@example.com">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="signup-password">Password</label>
                                    <input type="password" class="form-control" id="signup-password" name="signup-password" placeholder="********">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="signup-password-confirm">Password Confirmation</label>
                                    <input type="password" class="form-control" id="signup-password-confirm" name="signup-password-confirm" placeholder="********">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-sm-6 push">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="signup-terms" name="signup-terms">
                                        <label class="custom-control-label" for="signup-terms">I agree to Terms &amp; Conditions</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-sm-center push">
                                    <button type="submit" class="btn btn-alt-success">
                                        <i class="fa fa-plus mr-10"></i> Create Account
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="block-content bg-body-light">
                            <div class="form-group text-center">
                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block align-left" href="#" data-toggle="modal" data-target="#modal-terms">
                                    <i class="fa fa-book text-muted mr-5"></i> Read Terms & Conditions
                                </a>
                            </div>
                            <div class="form-group text-center">
                                <a class="link-effect text-muted mr-10 mb-5 d-inine-block align-right" href="#" data-toggle="modal" data-target="#modal-privacy">
                                    <i class="fa fa-book text-muted mr-5"></i> Read Privacy Policy
                                </a>
                            </div>
                            <div class="form-group text-center">
                                Already have an account?
                                <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="#">
                                    <i class="fa fa-user text-muted mr-5"></i> Sign In
                                </a>
                            </div>
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
