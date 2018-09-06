<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
        
        return redirect()->route('admin.brand.index')->with('success', 'Brand ' . $brand->name . ' berhasil ditambahkan.');
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
        return view('admin.brand.edit', compact('brand'));
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
        
        return redirect()->route('admin.brand.index')->with('success', 'Brand ' . $brand_old . ' berhasil diubah menjadi ' . $brand->name . '.');
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

    public function api()
    {
        $res = Brand::orderBy('name')->get();
        
        return response()->json($res);
    }
}
