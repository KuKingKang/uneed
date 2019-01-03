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
        action="{{route('bantuan.store')}}"
        method="POST"
        enctype="multipart/form-data"
        class="shadow-sm p-3 bg-white"
        >

        @csrf

        <label for="lokasi">Lokasi</label><br>
        <input id="lat" type="hidden" value="" name="lokasi[]"/>
        <input id="lng" type="hidden" value="" name="lokasi[]"/>
        <div class="invalid-feedback">
          {{$errors->first('lokasi')}}
        </div>
        <br>

        <div id="map" style="height: 400px;">
        
        </div>
        <script>
            var mapOptions = {
                center: [-6.90389, 107.61861],
                zoom: 12
            }
            // Creating a map object
            var map = new L.map('map', mapOptions);
            
            // Creating a Layer object
            var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
            
            // Adding layer to the map
            map.addLayer(layer);
            
            // Creating a marker
            var marker;

            map.on('click', function (e) {
                if (marker) {
                    map.removeLayer(marker);
                }
                marker = new L.Marker(e.latlng).addTo(map);
                var coord = e.latlng;
                var lat = coord.lat;
                var lng = coord.lng;
                console.log("You clicked the map at latitude: " + lat + " and longitude: " + lng);
                document.getElementById("lat").value = lat;
                document.getElementById("lng").value = lng;
            });
        </script>

        <button class="btn btn-primary" name="req" value="Buat Request">Buat Request</button>
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