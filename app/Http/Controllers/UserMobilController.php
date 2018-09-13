<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMobil;

class UserMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('user_mobil.index', compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('user_mobil.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'nopol' => 'required',
            'brand' => 'required',
            'type' => 'required',
            'tahun_pembuatan' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'koordinat_lokasi' => 'required',
            'foto' => 'required',
            'foto.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasfile('foto')) {
            $no = 1;
            foreach($request->file('foto') as $image) {
                if($no <= 5) {
                    $input['photo_mobil_' . $no] = 'images/mobil/photo_mobil_' . $no . '_' . date('ymdhis') . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/mobil'), $input['photo_mobil_' . $no]);

                    $no++;
                }
            }
        }

        $mobil = UserMobil::create([
            'user_id' => $id,
            'nopol' => $request['nopol'],
            'brand_id' => $request['brand'],
            'type_id' => $request['type'],
            'tahun_pembuatan' => $request['tahun_pembuatan'],
            'photo_mobil_1' => $input['photo_mobil_1'],
            'photo_mobil_2' => $input['photo_mobil_2'],
            'photo_mobil_3' => $input['photo_mobil_3'],
            'photo_mobil_4' => $input['photo_mobil_4'],
            'photo_mobil_5' => $input['photo_mobil_5'],
            'provinsi_id' => $request['provinsi'],
            'kota_id' => $request['kota'],
            'koordinat_lokasi' => $request['koordinat_lokasi'],
            'lepas_biasa_1' => $request['lepas_biasa_1'],
            'lepas_biasa_3' => $request['lepas_biasa_3'],
            'lepas_biasa_24' => $request['lepas_biasa_24'],
            'lepas_khusus_1' => $request['lepas_khusus_1'],
            'lepas_khusus_3' => $request['lepas_khusus_3'],
            'lepas_khusus_24' => $request['lepas_khusus_24'],
            'driver_biasa_1' => $request['driver_biasa_1'],
            'driver_biasa_3' => $request['driver_biasa_3'],
            'driver_biasa_24' => $request['driver_biasa_24'],
            'driver_khusus_1' => $request['driver_khusus_1'],
            'driver_khusus_3' => $request['driver_khusus_3'],
            'driver_khusus_24' => $request['driver_khusus_24']
        ]);

        return redirect()->route('mobil.index', $id)->with('success', 'Mobil Berhasil Disimpan');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $user_id, $mobil_id)
    {
        $mobil = UserMobil::findOrFail($mobil_id);
        
        for($x = 1; $x <= 5; $x++) {
            if($mobil->{'photo_mobil_' . $x} != NULL) {
                if(file_exists(public_path($mobil->{'photo_mobil_' . $x}))){
                    unlink(public_path($mobil->{'photo_mobil_' . $x}));
                }
            }
        }

        UserMobil::destroy($mobil_id);
        
        return response()->json([
            'error' => false,
            'msg' => 'Mobil berhasil dihapus.'
        ]);
    }
}
