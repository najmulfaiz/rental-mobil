<?php

namespace App\Http\Controllers;

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
        return view('type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.create');
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

        return redirect()->route('type.index')->with('success', 'Type ' . $type->name . ' berhasil ditambahkan.');
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
        $type = Type::findOrFail($id);

        return view('type.edit', compact('type'));
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
        
        return redirect()->route('type.index')->with('success', 'Type ' . $type_old . ' berhasil diubah menjadi ' . $type->name . '.');
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

    public function datatable()
    {
        $find = $_GET['search']['value'] ? $_GET['search']['value'] : '';
        $records = Type::where('name', 'like', '%' . $find . '%')
                        ->offset($_GET['start'])
                        ->limit($_GET['length'])
                        ->orderBy('name')
                        ->get();
        
        $recordsTotal = Type::count();          
        $recordsFiltered = count($records);
        $data = [];
        foreach($records as $index => $record) {
            $data[] = [
                ($index + 1),
                $record->name,
                $record->brand->name,
                '<a href="' . route('type.edit', $record->id) . '" class="btn btn-outline-warning btn-xs" data-id="' . $record->id . '">Edit</a>'
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
