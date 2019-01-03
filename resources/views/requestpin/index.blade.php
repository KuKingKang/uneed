@extends('layouts.global')

@section("title") Request Bantuan (Mode PIN) @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Tutorial</div>

                <div class="card-body">
                    1. Setelah menekan button "Request Bantuan" dibawah, anda akan diminta menentukan deskripsi bantuan yang diminta, Tambahan file(Opsional), serta lokasi anda saat ini melalui marker Google Maps.<br>
                    2. Selanjutnya anda akan diarahkan ke halaman lain untuk melihat Helper yang ingin memberikan bantuan berdasarkan jarak terdekat dari lokasi anda.<br>
                    3. Pilih Helper yang anda inginkan dengan mengklik button "Pilih Helper".<br>
                    4. Klik button "Selesai" jika bantuan telah diterima.<br>
                    5. Berikan rating dan komen terhadap helper yang telah membantu anda.<br>
                    6. Selamat mencari bantuan!<br>
                    <center><a href="{{route('reqpin.create')}}" class="btn btn-primary btn-sm">Request Bantuan</a></center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
