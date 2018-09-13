<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\User;
use App\UserMobil;
use App\Transaksi;
use App\Mail\UserOrder;
use Mail;

class WebsiteController extends Controller
{
    public function landing() {    
        $features = UserMobil::orderBy('created_at')
                                ->offset(0)
                                ->limit(3)
                                ->get();

        return view('website.landing', compact('features'));
    }
    
    public function list_produk() {
        $mobil = UserMobil::all();

        return view('website.list_produk', compact('mobil'));
    }

    public function mobil($id) {
        $mobil = UserMobil::findOrFail($id);
        $relateds = UserMobil::orderBy('created_at')
                            ->offset(0)
                            ->limit(3)
                            ->get();

        return view('website.mobil', compact('mobil', 'relateds'));
    }

    public function tentang() {
        return view('website.tentang');
    }

    public function kontak() {
        return view('website.kontak');
    }

    public function pilih(Request $request){
        Session::put('mobil_id', $request->mobil_id);

        return redirect()->route('website.pesan');
    }

    public function pesan() {
        $mobil_id = Session::get('mobil_id');
        
        if(!$mobil_id) {
            abort(404);
        }

        $mobil = UserMobil::find($mobil_id);
        return view('website.pesan', compact('mobil'));
    }

    public function pesanStore(Request $request) {
        $this->validate($request, [
            'provinsi' => 'required',
            'kota' => 'required',
            'tempat_penjemputan' => 'required',
            'koordinat_penjemputan' => 'required',
            'mulai_sewa' => 'required',
            'selesai_sewa' => 'required',
            'tujuan' => 'required',
            'tipe_sewa' => 'required'
        ]);
        
        $mulai_sewa = date('Y-m-d h:i:s', strtotime($request->mulai_sewa));
        $selesai_sewa = date('Y-m-d h:i:s', strtotime($request->selesai_sewa));

        $transaksi = Transaksi::create([
            'penyewa_id' => Auth::user()->id,
            'mobil_id' => $request->mobil_id,
            'provinsi_id' => $request->provinsi,
            'kota_id' => $request->kota,
            'tempat_jemput' => $request->tempat_penjemputan,
            'koordinat_jemput' => $request->koordinat_penjemputan,
            'sewa_mulai' => $mulai_sewa,
            'sewa_selesai' => $selesai_sewa,
            'tujuan' => $request->tujuan,
            'tipe_sewa' => $request->tipe_sewa
        ]);

        // Mail::send(new UserOrder($user));

        return redirect()->route('website.transaksi', $transaksi->id);
    }

    public function transaksi($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        return view('website.transaksi', compact('transaksi'));
    }
}
