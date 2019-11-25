<?php

namespace App\Http\Controllers;


use App\Category;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $input = DB::table('category')
        ->select('category.*', 'product.totalProducts', 'product.productNames', 'product.productIds')
        ->join(DB::raw("(SELECT cat_id, COUNT(product.id) AS totalProducts, GROUP_CONCAT(product.product_name separator ' , ') as productNames, GROUP_CONCAT(product.id separator ' , ') as productIds FROM product GROUP BY cat_id) AS product"), 'product.cat_id', '=', 'category.id')
        ->get();
        return view('category.index')->with('input',$input);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $input = new Category;    
       $input->cat_name = $request->cat_name; 
       $input->save();
       return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $input=Category::find($id); 
       return view('category.show')->with('input',$input);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $input=Category::find($id);
         return view('category.edit')->with('input',$input);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = Category::find($id);
        $input->cat_name =$request->cat_name; 
        $input->save();
        return redirect('/home')->with('msg','Product edit successfull!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
