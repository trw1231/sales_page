<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Category_image;
use Hash;

class ImageController extends Controller
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
        $request->validate([
            'image'=>'required',
        ]);

        $image = $request->file('image');
        $imageName = time().rand().$image->getClientOriginalName();
        $image->move('images/sales_page_image',$imageName);
        $max_sort = Category_image::where('category_sale_id',$id)->max('sort');

        Category_image::create([
            'category_sale_id' => $id,
            'image_name' => $imageName,
            'sort' => $max_sort+1,

        ]);

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
       
        $destroy = Category_image::find($id);
        if(file_exists('images/sales_page_image/'.$destroy->image_name.''))
        {
            @unlink('images/sales_page_image/'.$destroy->image_name.'');
        }
        $destroy->delete();

        return redirect()->back();
    }
}
