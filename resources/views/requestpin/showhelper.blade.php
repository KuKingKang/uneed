@extends('layouts.global')

@section('title') Helper list @endsection

@section('content') 
<script>
$(document).ready(function(){
  setInterval(
    function(){
      $('#helper').load('{{route('reqpin.helper', ['id' => $id ])}}').fadeIn("slow");
      console.log('sss');
    },5000);
});
</script>

  <div class="row">
    <div class="col-md-12">
      <div id="helper">
        <h5>Mohon Tunggu!</h5>
      </div>
    </div>
  </div>
@endsection