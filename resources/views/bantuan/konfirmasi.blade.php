@extends("layouts.global")

@section("title") Berikan Bantuan (Mode Helper) @endsection

@section("content")

  <div class="col-md-12">

    @if(session('status'))
      <div class="alert alert-success">
        {{session('status')}}
      </div>
    @endif 
    <script>
$(document).ready(function(){
  setInterval(
    function(){
      $('#status').load('{{route('bantuan.status', ['id_btn' => $data->id ])}}').fadeIn("slow");
      console.log('sss');
    },10000);
});
</script>
    <div id="status">
        <h4>Mohon Tunggu!</h4>
    </div>
  </div>

@endsection