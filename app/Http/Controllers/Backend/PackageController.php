<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Package;
use Auth;
use DB;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package = Package::all();
        return view('Frontend.package-show')
        ->with('package',$package);
    }

    public function confirm($id)
    {
        $package = Package::find($id);
        if($package->price == 0)
        {
            DB::table('package_transaction')
            ->insert([
                'user_id' => Auth::user()->id,
                'package_id' => $id,
                'status' => 1,

            ]);
            DB::table('package_user')
            ->insert([
                'user_id' => Auth::user()->id,
                'package_id' => $id,
            ]);
            return redirect()->route('salepage.index');
        }
        else
        {
            DB::table('package_transaction')
            ->insert([
                'user_id' => Auth::user()->id,
                'package_id' => $id,
                'status' => 0,

            ]);
            DB::table('package_user')
            ->insert([
                'user_id' => Auth::user()->id,
                'package_id' => $id,
            ]);
            return view('Frontend.package-confirm')
            ->with('package',$package)
            ->with('id',$id);
        }
        
       
    }

    public function storeTransaction(Request $request,$id)
    {
        $request->validate([
            'slip' => 'required',
            'name_lastname' => 'required',
           
        ]);

        $file = $request->file('slip');
        $fileName = time().rand().$file->getClientOriginalName();
        $file->move('images/slip',$fileName);
        
        DB::table('package_transaction')
        ->insert([
            'user_id' => Auth::user()->id,
            'package_id' => $id,
            'status' => 0,
            'slip' => $fileName,
        ]);

        
        return redirect()->route('salepage.index');

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
