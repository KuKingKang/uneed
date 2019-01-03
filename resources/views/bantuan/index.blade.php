@extends('layouts.global')

@section("title") Berikan Bantuan (Mode Helper) @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @if(session('status'))
        <div class="alert alert-success">
          {{session('status')}}
        </div>
      @endif
            <div class="card">
                <div class="card-header">Tutorial</div>

                <div class="card-body">
                    1. Setelah menekan button "Beri Bantuan" dibawah, anda akan diminta menentukan lokasi anda saat ini melalui marker Google Maps.<br>
                    2. Selanjutnya anda akan diarahkan ke halaman lain untuk melihat PIN yang dapat anda bantu berdasarkan jarak terdekat dari lokasi anda.<br>
                    3. Pilih PIN yang anda ingin bantu dengan mengklik button "Bantu PIN".<br>
                    4. Berikan penawaran yang anda inginkan untuk bantuan yang anda tawarkan, lalu klik button "Berikan Penawaran".<br>
                    5. Jika penawaran anda dipilih oleh PIN, maka silahkan untuk melakukan bantuan yang anda tawarkan.<br>
                    6. Jika penawaran anda tidak dipilih oleh PIN, maka anda akan diarahkan kembali ke halaman pemilihan PIN lagi.<br>
                    7. Klik button "Selesai" jika bantuan telah diberikan.<br>
                    8. Berikan rating dan komen terhadap PIN yang telah anda bantu.<br>
                    9. Selamat Membantu !<br>
                    <center><a href="{{route('bantuan.create')}}" class="btn btn-primary btn-sm">Beri Bantuan</a></center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
