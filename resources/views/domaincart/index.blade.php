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
                    <a href="{{ url('destroycart') }}" type="button" class="btn btn-sm btn-secondary ">
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
    </div>
@endsection
