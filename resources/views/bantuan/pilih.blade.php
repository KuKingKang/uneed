@extends('layouts.global')

@section('title') Berikan Bantuan (Mode Helper) @endsection 

@section('content')
  <div class="row">
    <div class="col-md-12">
      @if(session('status'))
        <div class="alert alert-success">
          {{session('status')}}
        </div>
      @endif
      
      <form 
        action="{{route('bantuan.update', ['id_btn'=>$id_btn])}}"
        method="POST"
        enctype="multipart/form-data"
        class="shadow-sm p-3 bg-white"
        >

        @csrf
        <input type="hidden" value="PUT" name="_method">
        <input type="hidden" value="{{$id_req}}" name="id_req">
        <input type="hidden" value="pilih" name="aksi">
        <label for="title">Deskripsi Bantuan</label> <br>
        <textarea name="DESKRIPSI" id="deskripsi" class="form-control {{$errors->first('deskripsi') ? "is-invalid" : ""}} " placeholder="Deskripsi Bantuan Anda">{{old('deskripsi')}}</textarea>
        <div class="invalid-feedback">
          {{$errors->first('title')}}
        </div>
        <br>

        <label for="cover">Tambahan File</label>
        <input type="file" class="form-control {{$errors->first('file') ? "is-invalid" : ""}} " name="FILE">
        <div class="invalid-feedback">
          {{$errors->first('file')}}
        </div>
        <br>

        <label for="cover">Penawaran Harga Bantuan</label>
        <input type="text" class="form-control {{$errors->first('file') ? "is-invalid" : ""}} " name="HARGA">
        <div class="invalid-feedback">
          {{$errors->first('file')}}
        </div>
        <br>


        <button class="btn btn-primary" name="req" value="Buat Request">Buat Penawaran Bantuan</button>
      </form>
    </div>
  </div>
@endsection

@section('footer-scripts')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>
$('#categories').select2({
  ajax: {
    url: 'http://larashop.test/ajax/categories/search',
    processResults: function(data){
      return {
        results: data.map(function(item){return {id: item.id, text: item.name} })
      }
    }
  }
});
</script>
@endsection