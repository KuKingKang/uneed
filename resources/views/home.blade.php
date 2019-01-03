@extends('layouts.global')

@section("title") Home @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Informasi</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Selamat datang di aplikasi Uneed!<br>
                    <br>
                    Cara menggunakan aplikasi ini:<br>
                    1. Pilih menu "Request Bantuan (Mode PIN)" jika anda ingin mulai meminta bantuan<br>
                    2. Pilih menu "Berikan Bantuan (Mode Helper)" jika anda ingin mulai memberikan bantuan<br>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Info Reputasi Akun Anda</div>
                <div class="card-body">
                    @if(Auth::user()->rating_helper == 0)
                        Rating sebagai Helper: 
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span><br>
                    @endif

                    @if(Auth::user()->rating_helper == 1)
                        Rating sebagai Helper: 
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span><br>
                    @endif

                    @if(Auth::user()->rating_helper == 2)
                        Rating sebagai Helper: 
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span><br>
                    @endif

                    @if(Auth::user()->rating_helper == 3)
                        Rating sebagai Helper: 
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span><br>
                    @endif

                    @if(Auth::user()->rating_helper == 4)
                        Rating sebagai Helper: 
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span><br>
                    @endif

                    @if(Auth::user()->rating_helper == 5)
                        Rating sebagai Helper: 
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span><br>
                    @endif

                    @if(Auth::user()->rating_pin == 0)
                        Rating sebagai PIN: 
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span><br>
                    @endif

                    @if(Auth::user()->rating_pin == 1)
                        Rating sebagai PIN: 
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span><br>
                    @endif

                    @if(Auth::user()->rating_pin == 2)
                        Rating sebagai PIN: 
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span><br>
                    @endif

                    @if(Auth::user()->rating_pin == 3)
                        Rating sebagai PIN: 
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span><br>
                    @endif

                    @if(Auth::user()->rating_pin == 4)
                        Rating sebagai PIN: 
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span><br>
                    @endif

                    @if(Auth::user()->rating_pin == 5)
                        Rating sebagai PIN: 
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span><br>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
