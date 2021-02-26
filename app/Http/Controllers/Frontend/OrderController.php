<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
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
       
        
        
        DB::table('product_transaction')
        ->insert([
            'category_sale_id' => $id,
            'name' => $request->name,
            'tel' => $request->phone,
            'social' => $request->social,
            'payment_method' => $request->banking,
            'address' => $request->address,
            'status' => 0,
            'price' => $request->summary_price,
        ]);
        $last_id = DB::table('product_transaction')
        ->where('category_sale_id',$id)
        ->where('name',$request->name)
        ->max('id');

        if($request->file)
        {
            $file = $request->file('file');
            $fileName = time().rand().$file->getClientOriginalName();
            $file->move('images/order_slip',$fileName);
            DB::Table('product_transaction')
            ->where('id',$last_id)
            ->update([
                'slip' => $fileName
            ]);
        }
        foreach($request->product_checkbox as $pc)
        {
            DB::Table('product_transaction_detail')
            ->insert([
                'product_transaction_id' => $last_id,
                'product_id' => $pc
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
