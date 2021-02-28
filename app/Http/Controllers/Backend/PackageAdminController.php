<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

class PackageAdminController extends Controller
{

    public function __construct()
    {
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        $order = DB::table('package_transaction')
        ->join('user_login','package_transaction.user_id','=','user_login.id')
        ->join('package','package_transaction.package_id','=','package.id')
        ->select('*',
                 'package_transaction.created_at as package_created_at','package_transaction.id as package_id')
        ->get();


        return view('Backend.admin_order.order_index')
        ->with('order',$order);
    }

    public function approve_package($id)
    {
        DB::table('package_transaction')
        ->update([
            'status' => 1
        ]);
        return redirect()->back()->with('message','อัพเดทออเดอร์แล้ว');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
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
