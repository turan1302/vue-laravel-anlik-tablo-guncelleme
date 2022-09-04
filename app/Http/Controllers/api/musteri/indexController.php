<?php

namespace App\Http\Controllers\api\musteri;

use App\Http\Controllers\Controller;
use App\Models\MusteriModel;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $data = MusteriModel::all();
        return response()->json($data, 200);
    }

    public function update(Request $request, MusteriModel $item)
    {
        $data = $request->except("_token");

        if (!$data['column'] || !$data['value']){
            return response()->json(array(
                "data" => "Boş Veri Gönderilemez"
            ),422);
        }

        if ($data['column']=="email" && !filter_var($data['value'],FILTER_VALIDATE_EMAIL)){
            return response()->json(array(
                "data" => "E-Posta Geçersiz"
            ),422);
        }

        $item->update(array(
            $data['column'] => $data['value']
        ));
    }
}
