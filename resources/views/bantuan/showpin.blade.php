@extends('layouts.global')

@section('title') Pin list @endsection

@section('content') 
<script>
$(document).ready(function(){
  setInterval(
    function(){
      $('#pinlist').load('{{route('bantuan.pin', ['id' => $id_bantuan ])}}').fadeIn("slow");
      console.log('sss');
    },5000);
});
</script>

  <div class="row">
    <div class="col-md-12">
      <div id="pinlist">
        <h5>Mohon Tunggu!</h5>
      </div>
    </div>
  </div>
@endsection