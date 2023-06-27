<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Form;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;
use Exception;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Price::all();
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
        try
        {
            $request->validate([
                'price' => 'required',
                'form_id' => 'required'
            ]);

            $createPrice = $request->all();

            $price = Price::create($createPrice);

            if($price){
                return ApiFormatter::createApi(200, 'Success', $price);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
            }
        }catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed',$error);
        }
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
