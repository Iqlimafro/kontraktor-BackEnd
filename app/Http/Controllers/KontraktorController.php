<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Kontraktor;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Illuminate\Support\Facades\Auth;

class KontraktorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kontraktor::all();
        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
        // Auth::user()->id;
        $data = User::with('kontraktor')->where('id', Auth::user()->id)->first();
        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'failed');
        }
        // $data = Kontraktor::with('user')->where('user_id', Auth::user()->id)->first();
        // return $data;
    }

    public function getKontraktor()
    {
        $data = Kontraktor::with('user')->where('user_id', Auth::user()->id)->first();
        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required',
                'alamat' => 'required',
                'logo' => 'required',
                'gambar' => 'required',
                'deskripsi' => 'required',
                'telp' => 'required'
            ]);

            $createKontraktor = $request->all();
            $createKontraktor['user_id'] = Auth::user()->id;
            // dd($createKontraktor);

            $kontraktor = Kontraktor::create($createKontraktor);

            if($kontraktor){
                return ApiFormatter::createApi(200, 'Success', $kontraktor);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed',$error);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $laundry = Laundries::where('user_id', $user_id)->get();
        if($laundry){
            return ApiFormatter::createApi(200, 'Success', $laundry);
        }else{
            return ApiFormatter::createApi(400, 'failed');
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
