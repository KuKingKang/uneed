<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Bantuan;
use App\RequestPin;

class RequestPinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('requestpin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('requestpin.create');
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
        $new_req = new \App\RequestPin;
        $new_req->id_user = $user->id;
        $new_req->deskripsi = $request->get('deskripsi');
        $new_req->lokasi = json_encode($request->get('lokasi'));

        if($request->file('file')){
          $file = $request->file('file')->store('avatars', 'public');
          $new_req->file = $file;
        } 

        $new_req->save();
        
        return redirect()->route('reqpin.show-helper', ['id' => $new_req->id])->with('status', 'Request sukses dibuat! Silahkan tunggu bantuan dari helper');
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

    public function showHelper($id)
    {
        //
        $helpers = DB::table('bantuan')
            ->join('users', 'bantuan.ID_USER', '=', 'users.id')
            ->select('users.name', 'users.email', 'users.phone', 'users.rating_helper', 'bantuan.DESKRIPSI', 'bantuan.LOKASI', 'bantuan.FILE', 'bantuan.HARGA', 'bantuan.id', 'bantuan.ID_REQUEST')
            ->where('bantuan.ID_REQUEST', '=', $id)
            ->paginate(10);


        //dd($helpers);
        return view('requestpin.showhelper', ['id' => $id]);
    }
    
    public function helper($id)
    {
        $data = DB::table('bantuan')
        ->join('users', 'bantuan.ID_USER', '=', 'users.id')
        ->select('users.name', 'users.email', 'users.phone', 'users.rating_helper', 'bantuan.DESKRIPSI', 'bantuan.LOKASI', 'bantuan.FILE', 'bantuan.HARGA', 'bantuan.id', 'bantuan.ID_REQUEST')
        ->where('bantuan.ID_REQUEST', '=', $id)
        ->paginate(10);

        return view('requestpin.helper', ['data' => $data]);
    }

    public function pilih($id_req, $id_btn)
    {
        $data_helper = \App\Bantuan::findOrFail($id_btn);
        $data_pin = \App\RequestPin::findOrFail($id_req);
        $lokasi_pin = json_decode($data_pin->LOKASI);
        $lokasi_helper = json_decode($data_helper->LOKASI);
        
        $update_pilih = Bantuan::where('id', '=', $id_btn)->update(['STATUS' => 'DIPILIH']);
        $update_tolak = Bantuan::where('ID_REQUEST', '=', $id_req)->where('STATUS', '=', 'DIGANTUNG')->update(['STATUS' => 'DITOLAK']);
        $update_req = RequestPin::where('id', '=', $id_req)->update(['STATUS' => 'SELESAI']);

        return view('requestpin.proses', ['data_helper' => $data_helper, 'data_pin' => $data_pin, 'lokasi_pin' => $lokasi_pin, 'lokasi_helper' => $lokasi_helper]);
    }

    public function finish($id)
    {
        $data = \App\Bantuan::findOrFail($id);
        return view('requestpin.finish', ['data' => $data]);
    }

    public function detil($id_req, $id_btn)
    {
        $data_btn = \App\Bantuan::findOrFail($id_btn);
        $data_req = \App\RequestPin::findOrFail($id_req);
        $lokasi_btn = json_decode($data_btn->LOKASI);
        $lokasi_req = json_decode($data_req->LOKASI);


        return view('requestpin.detil', ['data_btn' => $data_btn, 'lokasi_req' => $lokasi_req, 'lokasi_btn' => $lokasi_btn]);
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
        $req = \App\Bantuan::where([
                ['id', '=', $id]
            ])->first();
        $req->RATING = $request->get('rating');
        $req->KOMEN = $request->get('komen');
    
        $req->save();

        //$user = \App\RequestPin::findOrFail($req->ID_REQUEST);
        $rating = DB::table('bantuan')->where('ID_USER', '=', $req->ID_USER)->whereNotNull('RATING')->avg('RATING');
        $update_rating = DB::table('users')->where('id', '=', $req->ID_USER)->update(['rating_helper' => $rating]);
    
        return redirect()->route('reqpin.index')->with('status', 'Rating dan komen anda telah disimpan. Terima Kasih!');
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
