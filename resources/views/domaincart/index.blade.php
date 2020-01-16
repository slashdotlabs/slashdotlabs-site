<?php include(app_path("Domaincart/cwcconf.php")); ?>

@extends('layouts.master_dashboard')
@section("css_before")
    <link href="{{ asset("css/cwhoisstyles.css")  }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="content">
        <div class="block block-themed">
            <div class="block-header">
                <h3 class="block-title">Domain Cart</h3>
                <div class="block-options">
                    <a href="{{ url('destroycart') }}" type="button" class="btn btn-sm btn-secondary ">
                        <i class="si si-close"></i> Empty Cart
                    </a>
                </div>
            </div>
            <div class="block-content">
                <?php include(app_path("Domaincart/cwhoiscart.php")); ?>
            </div>
        </div>
    </div>
@endsection
