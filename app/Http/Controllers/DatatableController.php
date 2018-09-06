<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Brand;
use App\Type;
use App\Voucher;
use App\UserMobil;

class DatatableController extends Controller
{
    public function user()
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
            $verify = '<button class="btn btn-xs btn-outline-success btn-verify" data-id="' . $record->id . '">Verify</button>&nbsp;';

            if($record->verified) {
                $verified = ' <i class="icon-verified_user" title="User verified"></i>';
                $verify = '';
            }

            $data[] = [
                ($index + 1),
                $record->name . $verified,
                $record->email,
                $verify . '<a href="' . route('admin.user.edit', $record->id) . '" class="btn btn-outline-warning btn-xs" data-id="' . $record->id . '">Edit</a>'
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

    public function brand()
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
                '<a href="' . route('admin.brand.edit', $record->id) . '" class="btn btn-outline-warning btn-xs" data-id="' . $record->id . '">Edit</a>'
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

    public function type()
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
                '<a href="' . route('admin.type.edit', $record->id) . '" class="btn btn-outline-warning btn-xs" data-id="' . $record->id . '">Edit</a>'
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

    public function voucher()
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
                '<a href="' . route('admin.voucher.edit', $record->id) . '" class="btn btn-outline-warning btn-xs" data-id="' . $record->id . '">Edit</a>'
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

    public function user_mobil()
    {
        $find = $_GET['search']['value'] ? $_GET['search']['value'] : '';
        $records = UserMobil::where('nopol', 'like', '%' . $find . '%')
                        ->offset($_GET['start'])
                        ->limit($_GET['length'])
                        ->orderBy('nopol')
                        ->get();
        
        $recordsTotal = UserMobil::count();          
        $recordsFiltered = count($records);
        $data = [];
        foreach($records as $index => $record) {
            $data[] = [
                ($index + 1),
                $record->nopol,
                $record->brand->name,
                $record->type->name,
                '<a href="' . route('admin.voucher.edit', $record->id) . '" class="btn btn-outline-warning btn-xs" data-id="' . $record->id . '">Edit</a>'
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
