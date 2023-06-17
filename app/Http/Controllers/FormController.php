<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Kontraktor;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{

    public function getData()
    {

    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'kontraktor_id' => 'required',
                'nama' => 'required',
                'telp' => 'required',
                'alamat' => 'required',
                'layanan' => 'required',
                'image' => 'required'
            ]);

            $createForm = $request->all();
            // dd($createKontraktor);

            $kontraktor = Kontraktor::create($createForm);

            if($kontraktor){
                return ApiFormatter::createApi(200, 'Success', $kontraktor);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed',$error);
        }
    }

}
