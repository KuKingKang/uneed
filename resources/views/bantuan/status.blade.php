@if($data->STATUS == "DIGANTUNG")
            <div class="alert alert-warning">
                <h4>Status Konfirmasi Penawaran anda: <?php echo $data->STATUS; ?></h4>
                
            </div>
            <div class="alert alert-primary">
                <h5>Info: Silahkan untuk menunggu.</h5>
            </div>
        @elseif($data->STATUS == "DIPILIH")   
            <div class="alert alert-success">
                <h4>Status Konfirmasi Penawaran anda: <?php echo $data->STATUS; ?></h4>
            </div> 
            <div class="alert alert-primary">
                <h5>Info: Selamat, bantuan anda telah dipilih oleh PIN untuk memberikan bantuan. Anda akan dialihkan ke halaman proses bantuan dalam 5 detik.</h5>
            </div>
            <script>
                window.setTimeout(function(){
                    window.location.href = "{{route('bantuan.proses', ['id_btn' => $data->id, 'id_req' => $data->ID_REQUEST])}}"; //using a named route
                }, 5000);
            </script>
        @else
            <div class="alert alert-danger">
                <h4>Status Konfirmasi Penawaran anda: <?php echo $data->STATUS; ?></h4>
            </div> 
            <div class="alert alert-primary">
                <h5>Info: Mohon maaf, bantuan anda tidak terpilih. Anda akan dialihkan ke halaman awal dalam 5 detik.</h5>
            </div>
            <script>
                window.setTimeout(function(){
                    window.location.href = '{{route("bantuan.index")}}'; //using a named route
                }, 5000);
            </script>
        @endif