<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Kontraktor;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;

class FormController extends Controller
{

    public function getData()
    {
        $data = Form::with('kontraktor');
        return $data;
    }

    public function index()
    {
        $data = Form::with('kontraktor')->get();
        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function getDataByUsername($username)
    {
        $data = Form::with('kontraktor')->where('username', $username)->get();
        if ($data->isEmpty()) {
            return ApiFormatter::createApi(404, 'Data not found');
        }
        return ApiFormatter::createApi(200, 'Success', $data);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'kontraktor_id' => 'required',
                'user_id' => 'required',
                'nama' => 'required',
                'telp' => 'required',
                'alamat' => 'required',
                'layanan' => 'required',
                'image' => 'required',
                'status' => 'required',
            ]);

            $createForm = $request->all();
            // dd($createKontraktor);

            $form = Form::create($createForm);

            if($form){
                return ApiFormatter::createApi(200, 'Success', $form);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed',$error);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'kontraktor_id' => 'required',
                'user_id' => 'required',
                'nama' => 'required',
                'telp' => 'required',
                'alamat' => 'required',
                'layanan' => 'required',
                'image' => 'required',
            ]);

            $form = Form::findOrFail($id);
            $form->update($request->all());

            return ApiFormatter::createApi(200, 'Success', $form);
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed', $error);
        }
    }

    public function destroy($id)
    {
        try {
            $form = Form::findOrFail($id);
            $form->delete();

            return ApiFormatter::createApi(200, 'Success');
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed', $error);
        }
    }
}
