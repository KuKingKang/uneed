@extends("layouts.admin")

@section("title") Users list @endsection 

@section("content")

    <form action="{{route('users.index')}}">
      <div class="row">
        <div class="col-md-6">
          <input value="{{Request::get('keyword')}}" name="keyword" class="form-control" type="text" placeholder="Masukan email untuk filter..."/>
        </div>
        <div class="col-md-6">
          
          <input type="submit" value="Filter" class="btn btn-primary">
        </div>
      </div>
    </form>

    <hr class="my-3">

    @if(session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
    @endif 

    <div class="row">
      <div class="col-md-12 text-right">
          <a href="{{route('users.create')}}" class="btn btn-primary">Create user</a>
      </div>
    </div>
    <br>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th><b>Name</b></th>
          <th><b>Username</b></th>
          <th><b>Email</b></th>
          <th><b>Action</b></th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>
              <a class="btn btn-info text-white btn-sm" href="{{route('users.edit', ['id'=>$user->id])}}">Edit</a>

              <a href="{{route('users.show', ['id' => $user->id])}}" class="btn btn-primary btn-sm">Detail</a>

              <form onsubmit="return confirm('Delete this user permanently?')" class="d-inline" action="{{route('users.destroy', ['id' => $user->id ])}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
              </form>
            </td>
          </tr>
        @endforeach 
        <tfoot>
          <tr>
            <td colspan=10>
              {{$users->appends(Request::all())->links()}}
            </td>
          </tr>
        </tfoot>
      </tbody>
    </table>

@endsection