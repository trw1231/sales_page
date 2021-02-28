<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;
class ThankyouPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = DB::table('category_sale')
        ->where('id',$id)
        ->first();
        $image = DB::table('thankyou_page')
        ->where('category_sale_id',$id)
        ->orderBy('sort','asc')
        ->get();

        

        return view('Frontend.thankyou-page')
        ->with('image',$image)
        ->with('id',$id)
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
    public function storeImage(Request $request,$id)
    {
        $request->validate([
            'image'=>'required',
        ]);

        $image = $request->file('image');
        $imageName = time().rand().$image->getClientOriginalName();

        $image->move('images/sales_page_image',$imageName);
        $max_sort = DB::table('thankyou_page')
        ->where('category_sale_id',$id)
        ->max('sort');

        if($max_sort)
        {
            DB::table('thankyou_page')
            ->insert([
                'category_sale_id' => $id,
                'content_type' => 'image',
                'content' => $imageName,
                'sort' => $max_sort+1,
            ]);
        }
        else
        {
            DB::table('thankyou_page')
            ->insert([
                'category_sale_id' => $id,
                'content_type' => 'image',
                'content' => $imageName,
                'sort' => 1,
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
