@extends('layouts.global')

@section('title') Proses Bantuan @endsection 

@section('content')
  <div class="row">
    <div class="col-md-12">
      @if(session('status'))
        <div class="alert alert-success">
          {{session('status')}}
        </div>
      @endif

        <div class="card">
            <div class="card-header">Info Lokasi</div>
                <div class="card-body">
                    <div id="map" style="height: 400px;">
            
                    </div>
                    <b>Jarak (dalam meter):</b> <span id="jarak"></span> 
                    <script>
                        var
                        _firstLatLng,
                        _firstPoint,
                        _secondLatLng,
                        _secondPoint,
                        _distance,
                        _length,
                        _polyline

                        var mapOptions = {
                            center: [-6.90389, 107.61861],
                            zoom: 13
                        }
                        // Creating a map object
                        var map = new L.map('map', mapOptions);
                        
                        // Creating a Layer object
                        var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                        
                        // Adding layer to the map
                        map.addLayer(layer);
                        
                        // Creating a marker
                        var lat = <?php echo $lokasi_pin[0]; ?>;
                        var lng = <?php echo $lokasi_pin[1]; ?>;
                        var marker = new L.Marker([lat, lng]).addTo(map).bindPopup('Lokasi PIN').openPopup();

                        var lat2 = <?php echo $lokasi_helper[0]; ?>;
                        var lng2 = <?php echo $lokasi_helper[1]; ?>;
                        var marker2 = new L.Marker([lat2, lng2]).addTo(map).bindPopup('Lokasi Anda').openPopup();

                        _firstLatLng = [lat, lng];
                        _secondLatLng = [lat2, lng2];

                        refreshDistanceAndLength();

                        function refreshDistanceAndLength() {
                            _distance = L.GeometryUtil.distance(map, _firstLatLng, _secondLatLng);
                            document.getElementById('jarak').innerHTML = _distance;
                        }
                        
                    </script>
                </div>
        </div>
        <br>

        <div class="card">
            <div class="card-header">Info Request PIN</div>
                <div class="card-body">
                    <b>Deskripsi Request: </b> {{$data_pin->DESKRIPSI}} <br>
                    @if($data_pin->FILE != NULL)
                        <b>File: </b><a class="btn btn-success" href={{asset('storage/'.$data_pin->FILE)}}>DOWNLOAD</a>
                    @endif
                </div>
        </div>
        <br>

        <div class="card">
            <div class="card-header">Info Bantuan Yang anda Tawarkan</div>
                <div class="card-body">
                    <b>Deskripsi Bantuan: </b> {{$data_helper->DESKRIPSI}} <br>
                    <b>Harga Bantuan: </b> Rp. {{$data_helper->HARGA}} <br>
                    @if($data_pin->FILE != NULL)
                        <b>File: </b><a class="btn btn-success" href={{asset('storage/'.$data_pin->FILE)}}>DOWNLOAD</a>
                    @endif
                </div>
        </div>
        <br>

        <center><a href="{{route('bantuan.finish', ['id'=>$data_pin->id])}}" class="btn btn-primary btn-sm">Selesai</a></center>



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