<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.voucher.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.voucher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_voucher' => 'required|unique:vouchers',
            'waktu_mulai' => 'required|date_format:Y/m/d H:i',
            'waktu_berakhir' => 'required|date_format:Y/m/d H:i',
            'max_pemakaian' => 'required|integer',
            'bentuk' => 'required',
            'isi' => 'required|numeric',
            'level' => 'required',
            'status' => 'required'
        ]);

        $voucher = Voucher::create([
            'kode_voucher' => $request['kode_voucher'],
            'waktu_mulai' => $request['waktu_mulai'],
            'waktu_berakhir' => $request['waktu_berakhir'],
            'max_pemakaian' => $request['max_pemakaian'],
            'bentuk' => $request['bentuk'],
            'isi' => $request['isi'],
            'level' => $request['level'],
            'status' => $request['status'],
        ]);

        return redirect()->route('admin.voucher.index')->with('success', 'Kode Voucher ' . $voucher->kode_voucher . ' berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voucher = Voucher::findOrFail($id);

        return view('admin.voucher.edit', compact('voucher'));
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
        $voucher = Voucher::findOrFail($id);

        $this->validate($request, [
            'kode_voucher' => 'required|unique:vouchers,kode_voucher,' . $voucher->id,
            'waktu_mulai' => 'required|date_format:Y/m/d H:i',
            'waktu_berakhir' => 'required|date_format:Y/m/d H:i',
            'max_pemakaian' => 'required|integer',
            'bentuk' => 'required',
            'isi' => 'required|numeric',
            'level' => 'required',
            'status' => 'required'
        ]);

        $voucher->kode_voucher = $request['kode_voucher'];
        $voucher->waktu_mulai = $request['waktu_mulai'];
        $voucher->waktu_berakhir = $request['waktu_berakhir'];
        $voucher->max_pemakaian = $request['max_pemakaian'];
        $voucher->bentuk = $request['bentuk'];
        $voucher->isi = $request['isi'];
        $voucher->level = $request['level'];
        $voucher->status = $request['status'];
        $voucher->save();

        return redirect()->route('admin.voucher.index')->with('success', 'Kode Voucher ' . $voucher->kode_voucher . ' berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $voucher = Voucher::findOrFail($id);
        $voucher_old = $voucher->kode_voucher;
        $voucher->delete();

        $request->session()->flash('success', 'Kode Voucher ' . $voucher_old . ' berhasil dihapus!');

        return response()->json([
            'error' => false
        ]);
    }
}
