<table class="table table-stripped table-bordered">
          <thead>
            <tr>
              <th><b>Helper</b></th>
              <th><b>No HP</b></th>
              <th><b>Reputasi</b></th>
              <th><b>Deskripsi Bantuan</b></th>
              <th><b>File</b></th>
              <th><b>Harga</b></th>
              <th><b>Actions</b></th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $helper)
              <tr>
                <td>
                  {{$helper->name}} <br>
                  <small>{{$helper->email}}</small>
                </td>
                <td>{{$helper->phone}}</td>
                <td>{{$helper->rating_helper}}</td>
                <td>{{$helper->DESKRIPSI}}</td>
                <td>{{$helper->FILE}}</td>
                <td>{{$helper->HARGA}}</td>
                <td>
                    <a href="{{route('reqpin.detil', ['id_req' => $helper->ID_REQUEST, 'id_btn' => $helper->id])}}" class="btn btn-info btn-sm"> Detil Helper</a>
                    <a href="{{route('reqpin.pilih', ['id_req' => $helper->ID_REQUEST, 'id_btn' => $helper->id])}}" class="btn btn-info btn-sm"> Pilih Helper</a>
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