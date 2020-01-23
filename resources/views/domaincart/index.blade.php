<?php include(app_path("Domaincart/cwcconf.php")); ?>

@extends('layouts.master_dashboard')
@section("css_before")
    <link href="{{ asset("css/domaincart.css")  }}" rel="stylesheet" type="text/css">
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
                        <p>Contact form here</p>
                    @endauth
                </div>
            </div>
        @endif
    </div>
@endsection
