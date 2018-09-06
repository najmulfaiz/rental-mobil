<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.type.create');
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
            'brand' => 'required',
            'name' => 'required|max:75'
        ]);

        $type = Type::create([
            'name' => $request->name,
            'brand_id' => $request->brand
        ]);

        return redirect()->route('admin.type.index')->with('success', 'Type ' . $type->name . ' berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::findOrFail($id);

        return view('admin.type.edit', compact('type'));
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
        $type = Type::findOrFail($id);
        $type_old = $type->name;

        $this->validate($request, [
            'brand' => 'required',
            'name' => 'required|max:75'
        ]);

        $type->name = $request['name'];
        $type->save();
        
        return redirect()->route('admin.type.index')->with('success', 'Type ' . $type_old . ' berhasil diubah menjadi ' . $type->name . '.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $type = Type::findOrFail($id);
        $type_old = $type->name;
        $type->delete();

        $request->session()->flash('success', 'Type ' . $type_old . ' berhasil dihapus!');

        return response()->json([
            'error' => false
        ]);
    }
}
