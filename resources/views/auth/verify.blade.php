@extends('layouts.master_auth')

@if( session('resend_sent') )
    @php(alert()->success('Success', session('resend_sent')))
@endif

@section('content')
    <!-- Page Content -->
    <div class="d-flex flex-grow-1 align-items-center">
        <div class="content content-full">
            <div class="py-30 text-center">
                <a class="font-w700 mr-5" href="{{ url('/home') }}">
                    <img src="{{ asset('media/favicons/favicon-32x31.png') }}" alt="">
                    <span class="font-size-xl text-dual-primary-dark">{{config('app.name')}}</span>
                </a>
                <h1 class="h2 font-w700 mt-30 mb-10">Oops.. You haven't verified your account yet</h1>
                <h2 class="h3 font-w400 text-muted mb-50">Check your email for the verification link...</h2>
                <form class="d-inline" action="{{ url('/logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-hero btn-rounded btn-alt-secondary">
                        <i class="si si-login mr-10"></i> Already activated?
                    </button>
                </form>
                <form class="d-inline" action="{{ url('/email/resend') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-hero btn-rounded btn-alt-secondary">
                        <i class="fa fa-envelope mr-10"></i> Resend activation link
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection
