<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->is_admin)
        {
            $data = DB::table('user_login')
            ->join('package_user','user_login.id','=','package_user.user_id')
            ->join('package','package_user.package_id','=','package.id')
            ->where('user_login.id',Auth::user()->id)
            ->first();
        }
        else
        {
            $data = DB::table('user_login')
            ->where('user_login.id',Auth::user()->id)
            ->first(); 
        }
       
        return view('Frontend.personal')
        ->with('data',$data);
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
        
        DB::table('user_login')
        ->where('id',$id)
        ->update([
            'name_lastname' => $request->txt_page_name,
            'phone_number' => $request->txt_page_phone,
        ]);

        if($request->profile)
        {
            $image = $request->profile;
            $imageName = time().rand().$image->getClientOriginalName();
            $image->move('assets/images/profile',$imageName);
            DB::table('user_login')
            ->where('id',$id)
            ->update([
                'image' => $imageName,
            ]);
        }
        return redirect()->back();
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
