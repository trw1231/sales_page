<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ExpressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $exist = DB::table('category_sale_express')
        ->where('category_sale_id',$id)
        ->delete();
        
        if($request->method == 1)
        {
            DB::table('category_sale_express')
            ->insert([
                'category_sale_id' => $id,
                'method' => $request->method,
                'price1' => 0,
                'price2' => 0,
                'COD' => $request->COD,
            ]);

        }
        elseif($request->method == 2)
        {
            DB::table('category_sale_express')
                        ->insert([
                            'category_sale_id' => $id,
                            'method' => $request->method,
                            'price1' => $request->price,
                            'price2' => 0,
                            'COD' => $request->COD,
                        ]);
        }
        elseif($request->method == 3)
        {
            DB::table('category_sale_express')
                        ->insert([
                            'category_sale_id' => $id,
                            'method' => $request->method,
                            'price1' => $request->price1,
                            'price2' => $request->price2,
                            'COD' => $request->COD,
                        ]);
        }
        return redirect()->back();
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
