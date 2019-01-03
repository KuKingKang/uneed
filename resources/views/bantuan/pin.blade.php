<table class="table table-stripped table-bordered">
          <thead>
            <tr>
              <th><b>Pin</b></th>
              <th><b>No HP</b></th>
              <th><b>Reputasi</b></th>
              <th><b>Deskripsi Kebutuhan</b></th>
              <th><b>File</b></th>
              <th><b>Actions</b></th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $pin)
              <tr>
                <td>
                  {{$pin->name}} <br>
                  <small>{{$pin->email}}</small>
                </td>
                <td>{{$pin->phone}}</td>
                <td>{{$pin->rating_pin}}</td>
                <td>{{$pin->DESKRIPSI}}</td>
                <td>{{$pin->FILE}}</td>
                <td>
                    <a href="{{route('bantuan.detil_pin', ['id_btn' => $id_bantuan, 'id_req' => $pin->id])}}" class="btn btn-info btn-sm"> Detil PIN</a>
                    <a href="{{route('bantuan.pilih', ['id_req' => $pin->id, 'id_btn' => $id_bantuan])}}" class="btn btn-info btn-sm"> Pilih PIN</a>
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <td colspan="10">
                {{$data->appends(Request::all())->links()}}
              </td>
            </tr>
          </tfoot>
        </table>