<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|min:10|max:15|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create($request->all());

        return redirect()->route('user.index')->with('success', 'User ' . $user->name . ' berhasil ditambahkan.');
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
        $user = User::findOrFail($id);

        return view('user.edit', compact('user'));
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
        $user = User::findOrFail($id);
        $user_old = $user->name;

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'required|min:10|max:15|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->password = Hash::make($request['password']);
        $user->save();

        return redirect()->route('user.index')->with('success', 'User ' . $user_old . ' berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user_old = $user->name;
        $user->delete();

        $request->session()->flash('success', 'User ' . $user_old . ' berhasil dihapus!');

        return response()->json([
            'error' => false
        ]);
    }

    public function datatable()
    {
        $find = $_GET['search']['value'] ? $_GET['search']['value'] : '';
        $records = User::where('name', 'like', '%' . $find . '%')
                        ->offset($_GET['start'])
                        ->limit($_GET['length'])
                        ->orderBy('name')
                        ->get();
        
        $recordsTotal = User::count();          
        $recordsFiltered = count($records);
        $data = [];
        foreach($records as $index => $record) {
            $verified = '';
            if($record->verified) {
                $verified = ' <i class="icon-verified_user" title="User verified"></i>';
            }

            $data[] = [
                ($index + 1),
                $record->name . $verified,
                $record->email,
                '<a href="' . route('user.edit', $record->id) . '" class="btn btn-outline-warning btn-xs" data-id="' . $record->id . '">Edit</a>'
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
