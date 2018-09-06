<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Type;
use App\Province;
use App\Regency;

class Select2Controller extends Controller
{
    public function brand(Request $request)
    {
        $find = $request['term'];

        $records = Brand::where('name', 'like', '%' . $find . '%')
                    ->select(['id', 'name AS text'])
                    ->get();

        return response()->json($records);
    }

    public function type(Request $request)
    {
        if(!isset($request['brand']) || $request['brand'] == '') 
        {
            return response()->json([]);
        }

        $brand = $request['brand'];
        $find = $request['term'];

        $records = Type::where('name', 'like', '%' . $find . '%')
                    ->where('brand_id', $brand)
                    ->select(['id', 'name AS text'])
                    ->get();

        return response()->json($records);
    }

    public function provinsi(Request $request)
    {
        $find = $request['term'];

        $records = Province::where('name', 'like', '%' . $find . '%')
                    ->select(['id', 'name AS text'])
                    ->get();

        return response()->json($records);
    }

    public function kota(Request $request)
    {
        if(!isset($request['provinsi']) || $request['provinsi'] == '') 
        {
            return response()->json([]);
        }

        $provinsi = $request['provinsi'];
        $find = $request['term'];

        $records = Regency::where('name', 'like', '%' . $find . '%')
                    ->where('province_id', $provinsi)
                    ->select(['id', 'name AS text'])
                    ->get();

        return response()->json($records);
    }
}
