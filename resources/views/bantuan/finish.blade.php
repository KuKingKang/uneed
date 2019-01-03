@extends('layouts.test')

@section('title') Rate PIN @endsection 

@section('content')
  <div class="row">
    <div class="col-md-12">
      @if(session('status'))
        <div class="alert alert-success">
          {{session('status')}}
        </div>
      @endif
      <h5>Bantuan sudah selesai, silahkan untuk memberi penilaian dan komen terhadap PIN yang telah anda bantu!</h5>
      <div class="card">
            <div class="card-header">Form Penilaian untuk PIN</div>
                <div class="card-body">
                    <form 
                        action="{{route('bantuan.update', ['id_req'=>$data->id])}}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="shadow-sm p-3 bg-white"
                    >
                        @csrf
                        <input type="hidden" value="PUT" name="_method">
                        <input type="hidden" value="rate" name="aksi">
                        <label>Rating untuk PIN: </label><input id="input-1" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" data-show-clear="false"><br>
                        <label>Komentar: </label><br><textarea name="komen" id="komen" cols="100" rows="10"></textarea><br>
                        <button class="btn btn-primary" name="req" value="Buat Request">Berikan Penilaian</button>
                    </form>
                </div>
        </div>
        <br>


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
<script>

$("#input-id").rating();

</script>
@endsection