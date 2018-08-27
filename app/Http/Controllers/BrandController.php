<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('brand.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
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
            'name' => 'required|max:50'
        ]);

        $brand = Brand::create($request->all());
        
        return redirect()->route('brand.index')->with('success', 'Brand ' . $brand->name . ' berhasil ditambahkan.');
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
        $brand = Brand::findOrFail($id);
        return view('brand.edit', compact('brand'));
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
        $brand = Brand::findOrFail($id);
        $brand_old = $brand->name;

        $this->validate($request, [
            'name' => 'required|max:50'
        ]);

        $brand->name = $request['name'];
        $brand->save();
        
        return redirect()->route('brand.index')->with('success', 'Brand ' . $brand_old . ' berhasil diubah menjadi ' . $brand->name . '.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand_old = $brand->name;
        $brand->delete();

        $request->session()->flash('success', 'Brand ' . $brand_old . ' berhasil dihapus!');

        return response()->json([
            'error' => false
        ]);
    }

    public function datatable()
    {
        $find = $_GET['search']['value'] ? $_GET['search']['value'] : '';
        $records = Brand::where('name', 'like', '%' . $find . '%')
                        ->offset($_GET['start'])
                        ->limit($_GET['length'])
                        ->orderBy('name')
                        ->get();
        
        $recordsTotal = Brand::count();          
        $recordsFiltered = count($records);
        $data = [];
        foreach($records as $index => $record) {
            $data[] = [
                ($index + 1),
                $record->name,
                '<a href="' . route('brand.edit', $record->id) . '" class="btn btn-outline-warning btn-xs" data-id="' . $record->id . '">Edit</a>'
                .'&nbsp; <button class="btn btn-outline-danger btn-xs btn-delete" data-id="' . $record->id . '">Delete</button>'
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
