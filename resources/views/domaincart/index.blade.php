<?php include(app_path("Domaincart/cwcconf.php")); ?>

@extends('layouts.master_dashboard')
@section("css_before")
    <link href="{{ asset("css/cwhoisstyles.css")  }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="content">
        <?php include(app_path("Domaincart/cwhoiscart.php")); ?>
    </div>
@endsection
