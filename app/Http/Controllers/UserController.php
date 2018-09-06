<?php

namespace App\Http\Controllers;

use App\User;
use App\PenyewaPhoto;
use App\PenyewaPhotoHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->id != $id) {
            return abort(404);
        }

        $user = Auth::user();
        
        if($user->level == 'admin') {
            return redirect()->url('/');
        } else {
            $photo = PenyewaPhoto::where('user_id', $user->id)->first();

            return view('user.show', compact('user', 'photo'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('user.edit');
    }

    public function edit_photo(Request $request, $id)
    {
        $input = $request->all();
        // dd($input);
        $photo_type = array('photo_diri', 'photo_ktp', 'photo_buku_bank', 'photo_sim');
        
        foreach($photo_type as $type) {
            $input['filename_' . $type] = null;
            if($request->hasFile($type)) {
                $input['filename_' . $type] = 'images/user/' . $type . '_' .  date('ymdhis') . '.' . $request->file($type)->getClientOriginalExtension();
                $request->file($type)->move(public_path('images/user/'), $input['filename_' . $type]);
            }
        }

        if($input['photo_id'] == '#') {
            $penyewa_photo = PenyewaPhoto::create([
                'user_id' => $id,
                'photo_diri' => $input['filename_photo_diri'],
                'photo_ktp' => $input['filename_photo_ktp'],
                'photo_buku_bank' => $input['filename_photo_buku_bank'],
                'photo_sim' => $input['filename_photo_sim']
            ]);
        } else {
            $penyewa_photo = PenyewaPhoto::findOrFail($input['photo_id']);
            $penyewa_photo->photo_diri = $input['filename_photo_diri'];
            $penyewa_photo->photo_ktp = $input['filename_photo_ktp'];
            $penyewa_photo->photo_buku_bank = $input['filename_photo_buku_bank'];
            $penyewa_photo->photo_sim = $input['filename_photo_sim'];
        }

        $penyewa_photo_history = PenyewaPhotoHistory::create([
            'user_id' => $id,
            'photo_diri' => $input['filename_photo_diri'],
            'photo_ktp' => $input['filename_photo_ktp'],
            'photo_buku_bank' => $input['filename_photo_buku_bank'],
            'photo_sim' => $input['filename_photo_sim']
        ]);

        return redirect()->route('user.show', $id)->with('success', 'Data berhasil diperbarui');
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
    public function destroy($id)
    {
        //
    }
}
