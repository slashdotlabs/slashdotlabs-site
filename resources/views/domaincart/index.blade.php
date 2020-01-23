<?php include(app_path("Domaincart/cwcconf.php")); ?>

@extends('layouts.master_dashboard')
@section("css_before")
    <link href="{{ asset("css/domaincart.css")  }}" rel="stylesheet" type="text/css">
@endsection

@section('js_after')
    {{--    Page JS plugins --}}
    <script src="{{ asset('/js/plugins/masked-inputs/jquery.maskedinput.min.js') }}"></script>

    <script>
        $('.phone-mask').mask('254799999999')
    </script>
@endsection

@section('content')
    <div class="content">
        <div class="block block-themed">
            <div class="block-header">
                <h3 class="block-title">Domain Cart</h3>
                <div class="block-options">
                    <a href="{{ url('destroycart') }}" type="button" class="btn btn-sm btn-alt-primary ">
                        <i class="si si-close"></i> Empty Cart </a>
                </div>
            </div>
            <div class="block-content whois-content">
                @if(session('errors'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <p>{{ session('errors')->first() }}</p>
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif
                <?php include(app_path("Domaincart/cwhoiscart.php")); ?>


            </div>
        </div>
        @if($cwaction=='checkout'|| $cwaction=='addout')
            <div class="block block-themed">
                <div class="block-header">
                    <h3 class="block-title">Checkout Information</h3>
                </div>
                <div class="block-content">
                    @guest
                        <p class="font-size-md">For you to proceed with your order, you need to be logged in</p>
                        <div class="d-flex mb-5">
                            <a href="{{ url('/register') }}" class="btn btn-alt-primary mr-2">Create Account</a>
                            <a href="{{ url('/login') }}" class="btn btn-primary">Login</a>
                        </div>
                    @endguest

                    @auth
                        <span class="font-size-md text-uppercase">Contact Details</span>
                        <hr>
                        <form action="{{ url('domaincart/order_checkout') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="contact-organization">Organization</label>
                                    <input type="text" class="form-control @error('organization') is-invalid @enderror" id="contact-organization" name="organization" value="{{ old('organization') }}" required>
                                    @error('organization')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <label for="contact-phone-number">Phone number</label>
                                    <input type="text" class="form-control phone-mask @error('phone_number') is-invalid @enderror" id="contact-phone-number" name="phone_number" value="{{ old('phone_number') }}" placeholder="2547xxxxxxxx" required>
                                    @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="contact-address">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="contact-address" name="address" value="{{ old('address') }}" required>
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-sm-12">
                                    <label for="contact-city">City</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="contact-city" name="city" value="{{ old('city') }}" required>
                                    @error('city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-sm-12">
                                    <label for="contact-country">Country</label>
                                    <input type="text" class="form-control @error('country') is-invalid @enderror" id="contact-country" name="country" value="{{ old('country') }}" required>
                                    @error('country')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-sm-12 d-flex align-items-end">
                                    <button type="submit" class="btn btn-alt-primary">Proceed to Payment</button>
                                </div>
                            </div>
                        </form>
                    @endauth
                </div>
            </div>
        @endif
    </div>
@endsection
