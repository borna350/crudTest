<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
         $category = Category::all();
         $sql = DB::table('product')
         ->select('product.*', 'category.cat_name')
         ->join('category', 'product.cat_id', '=', 'category.id');
         if($request->search) {
            $sql->where('product.product_name', 'LIKE', '%'.$request->search.'%');
         }
         if($request->cat_id){
             $sql->where('product.cat_id', '=', $request->cat_id);
         }
         if($request->min && $request->max){
             $sql->whereBetween('product.product_price', [$request->min,$request->max]);
         }
         $input = $sql->paginate(1);
        return view('product.index')->with('input',$input)->with('category',$category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();

        return view('product.create')->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $input = new Product;
        $input->product_name = $request->product_name;
        $input->product_price = $request->product_price;  
        $input->cat_id = $request->cat_id; 
        $input->save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $input = DB::table('product')
        ->select('product.*', 'category.cat_name')
        ->join('category', 'product.cat_id', '=', 'category.id')
        ->where('product.id', '=', $id)
        ->first();
        return view('product.show')->with('input',$input);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::all();
        $input=Product::find($id); 
        return view('product.edit')->with('input',$input)->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $input=Product::find($id);
       $input->product_name=$request->product_name;
       $input->product_price=$request->product_price; 
       $input->cat_id =$request->cat_id; 
       $input->save();
       return redirect('/home')->with('msg','Product edit successfull!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $input=Product::find($id);
        $input->delete();
        return redirect('/home')->with('msg','Post delete successfull!!');
    }
}