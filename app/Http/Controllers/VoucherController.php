<?php

namespace App\Http\Controllers;

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
        return view('voucher.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('voucher.create');
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

        return redirect()->route('voucher.index')->with('success', 'Kode Voucher ' . $voucher->kode_voucher . ' berhasil dibuat.');
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
        $voucher = Voucher::findOrFail($id);

        return view('voucher.edit', compact('voucher'));
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

        return redirect()->route('voucher.index')->with('success', 'Kode Voucher ' . $voucher->kode_voucher . ' berhasil diperbarui.');
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

    public function datatable()
    {
        $find = $_GET['search']['value'] ? $_GET['search']['value'] : '';
        $records = Voucher::where('kode_voucher', 'like', '%' . $find . '%')
                        ->offset($_GET['start'])
                        ->limit($_GET['length'])
                        ->orderBy('kode_voucher')
                        ->get();
        
        $recordsTotal = Voucher::count();          
        $recordsFiltered = count($records);
        $data = [];
        foreach($records as $index => $record) {
            if($record->bentuk == 'solid') {
                $potongan = 'Rp.' . number_format($record->isi, 2);
            } else {
                $potongan = $record->isi . '%';
            }

            if($record->status == 'aktif') {
                $status = '<span class="badge badge-success">Aktif</span>';
            } else {
                $status = '<span class="badge badge-danger">Tidak Aktif</span>';
            }

            $data[] = [
                ($index + 1),
                $record->kode_voucher,
                $potongan,
                $status,
                '<a href="' . route('voucher.edit', $record->id) . '" class="btn btn-outline-warning btn-xs" data-id="' . $record->id . '">Edit</a>'
                .'&nbsp;<button class="btn btn-outline-danger btn-xs btn-delete" data-id="' . $record->id . '">Delete</button>'
            ];
        }
        $res = [
            'draw' => $_GET['draw'],
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ];
        return response()->json($res);
    }
}
