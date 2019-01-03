<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class BantuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("bantuan.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bantuan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user();
        $new_btn = new \App\Bantuan;
        $new_btn->id_user = $user->id;
        $new_btn->lokasi = json_encode($request->get('lokasi'));

        $new_btn->save();
        
        return redirect()->route('bantuan.show-pin', ['id' => $new_btn->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function showPin($id)
    {
        //
        $pins = DB::table('request')
            ->join('users', 'request.ID_USER', '=', 'users.id')
            ->select('users.name', 'users.email', 'users.phone', 'users.rating_pin', 'request.DESKRIPSI', 'request.LOKASI', 'request.FILE', 'request.id')
            ->where('request.STATUS', '=', 'PROSES')
            ->paginate(100);


        //dd($helpers);
        return view('bantuan.showpin', ['pins' => $pins])->with('id_bantuan', $id);
    }

    public function pin($id)
    {
        $data = DB::table('request')
            ->join('users', 'request.ID_USER', '=', 'users.id')
            ->select('users.name', 'users.email', 'users.phone', 'users.rating_pin', 'request.DESKRIPSI', 'request.LOKASI', 'request.FILE', 'request.id')
            ->where('request.STATUS', '=', 'PROSES')
            ->paginate(100);


        //dd($helpers);
        return view('bantuan.pin', ['data' => $data])->with('id_bantuan', $id);
    }

    public function pilih($id_btn, $id_req)
    {
        return view('bantuan.pilih', ['id_req' => $id_req, 'id_btn' => $id_btn]);
    }

    public function detil_pin($id_btn, $id_req)
    {
        $data = \App\RequestPin::findOrFail($id_req);
        $data2 = \App\Bantuan::findOrFail($id_btn);
        $lokasi_pin = json_decode($data->LOKASI);
        $lokasi_btn = json_decode($data2->LOKASI);
        return view('bantuan.detil', ['lokasi_pin' => $lokasi_pin, 'data' => $data, 'lokasi_btn' => $lokasi_btn, 'id_btn' => $data2->id]);
    }

    public function konfirmasi($id_btn, $id_req)
    {
        $data = \App\Bantuan::findOrFail($id_btn);

        return view('bantuan.konfirmasi', ['data' => $data]);
    }

    public function status($id_btn)
    {
        $data = \App\Bantuan::findOrFail($id_btn);

        return view('bantuan.status', ['data' => $data]);
    }

    public function proses($id_btn, $id_req)
    {
        $data_pin = \App\RequestPin::findOrFail($id_req);
        $data_helper = \App\Bantuan::findOrFail($id_btn);
        $lokasi_pin = json_decode($data_pin->LOKASI);
        $lokasi_helper = json_decode($data_helper->LOKASI);
        return view('bantuan.proses', ['data_helper' => $data_helper, 'data_pin' => $data_pin, 'lokasi_pin' => $lokasi_pin, 'lokasi_helper' => $lokasi_helper]);
    }

    public function finish($id)
    {
        $data = \App\RequestPin::findOrFail($id);
        return view('bantuan.finish', ['data' => $data]);
    }

    public function rate(Request $request, $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = \App\User::findOrFail($id);

        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if($request->get('aksi') == 'pilih'){
            $btn = \App\Bantuan::where([
                ['id', '=', $id]
            ])->first();
            $btn->ID_REQUEST = $request->get('id_req');
            $btn->DESKRIPSI = $request->get('DESKRIPSI');
            $btn->HARGA = $request->get('HARGA');
    
            if($request->file('FILE')){
                if($btn->FILE && file_exists(storage_path('app/public/' . $btn->FILE))){
                    \Storage::delete('public/'.$btn->FILE);
                }
                $file = $request->file('FILE')->store('avatars', 'public');
                $btn->FILE = $file;
            }
    
            $btn->save();
    
            return redirect()->route('bantuan.konfirmasi', ['id_btn' => $id, 'id_req' => $request->get('id_req')])->with('status', 'Silahkan untuk menunggu konfirmasi dari PIN');
        }else{
            $req = \App\RequestPin::where([
                ['id', '=', $id]
            ])->first();
            $req->RATING = $request->get('rating');
            $req->KOMEN = $request->get('komen');
    
            $req->save();

            $rating = DB::table('request')->where('ID_USER', '=', $req->ID_USER)->whereNotNull('RATING')->avg('RATING');
            $update_rating = DB::table('users')->where('id', '=', $req->ID_USER)->update(['rating_pin' => $rating]);
    
            return redirect()->route('bantuan.index')->with('status', 'Rating dan komen anda telah disimpan. Terima Kasih!');
        }
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
