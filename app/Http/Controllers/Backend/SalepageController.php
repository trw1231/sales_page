<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\CategorySell;
use App\Http\Models\Category_image;
use Auth;
use DB;
use Carbon\Carbon;
class SalepageController extends Controller
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
            $data = CategorySell::where('username_id',Auth::user()->id)->get();
            $package = DB::table('package_user')
            ->where('user_id',Auth::user()->id)
            ->join('package','package.id','package_user.package_id')
            ->select('package.page_count','package_user.created_at')
            ->first();

            $page_count = $data->count();
    
            $current_page = $package->page_count - $page_count;
            
            
    
            $exp_date = Carbon::parse($package->created_at)->addMonth()->format('d-m-Y');
            $datediff = Carbon::parse($package->created_at)->diffInDays(Carbon::parse($package->created_at)->addMonth());
    
           
           
    
            return view('Frontend.created_salepage')
            ->with('data',$data)
            ->with('package',$package)
            ->with('exp_date',$exp_date)
            ->with('datediff',$datediff)
            ->with('current_page',$current_page);
        }
        else
        {
            
            $data = CategorySell::where('username_id',Auth::user()->id)->get();
            // $package = DB::table('package_user')
            // ->where('user_id',Auth::user()->id)
            // ->join('package','package.id','package_user.package_id')
            // ->select('package.page_count','package_user.created_at')
            // ->first();
            // $page_count = $data->count();
    
            // $current_page = $package->page_count - $page_count;
            
            
    
            // $exp_date = Carbon::parse($package->created_at)->addMonth()->format('d-m-Y');
            // $datediff = Carbon::parse($package->created_at)->diffInDays(Carbon::parse($package->created_at)->addMonth());
            return view('Frontend.created_salepage')
            ->with('data',$data);
        }
       
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
        $request->validate([
            'create' => 'required',
        ]);

        if(!Auth::user()->is_admin)
        {
            $page_count = CategorySell::where('username_id',Auth::user()->id)->count();
            $package = DB::table('package_user')
            ->where('user_id',Auth::user()->id)
            ->join('package','package.id','package_user.package_id')
            ->select('package.page_count','package_user.created_at')
            ->first();
            
            if($package->page_count - $page_count == 0)
            {
                return redirect()->back()->with('message', 'คุณสร้าง page เกินที่ package กำหนดแล้ว');
    
            }
            else
            {
                CategorySell::create([
                    'username_id' => Auth::user()->id,
                    'name_id' => 0,
                    'namesale' => $request->create,
                ]);
                return redirect()->back();
            }
        }
        else
        {
            CategorySell::create([
                'username_id' => Auth::user()->id,
                'name_id' => 0,
                'namesale' => $request->create,
            ]);
            return redirect()->back();
        } 

    }

    public function reorder(Request $request)
    {
            foreach ($request->order as $order) {
                   DB::table('images')
                   ->where('id',$order['id'])
                   ->update([
                    'sort' => $order['position']
                   ]);  
            }
        
        return response('Update Successfully.', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = CategorySell::find($id);
        $image = Category_image::where('category_sale_id',$id)
        ->orderBy('sort','asc')
        ->get();

        $product = DB::table('salepage_product')
        ->where('category_sale_id',$id)
        ->get();

        $bank = DB::table('category_sale_bank')
        ->where('category_sale_id',$id)
        ->first();

        $express = DB::table('category_sale_express')
        ->where('category_sale_id',$id)
        ->first();


        return view('Frontend.main_salepage')
        ->with('data',$data)
        ->with('image',$image)
        ->with('id',$id)
        ->with('product',$product)
        ->with('bank',$bank)
        ->with('express',$express);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $salepage = CategorySell::find($id);

        return $salepage;
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
        $update = CategorySell::find($id);
        $update->namesale = $request->namesale;
        $update->save();
        return true;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Category_image::where('category_sale_id',$id)->delete();
        CategorySell::find($id)->delete();

        return redirect()->back();
    }
}
