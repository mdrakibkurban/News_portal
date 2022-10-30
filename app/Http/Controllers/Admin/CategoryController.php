<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Queue\Console\RetryCommand;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::with('user')->latest()->get();
        return view('admin.category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
                'name'=>'required|string|unique:categories'
            ]);

           try {
            $category = new Category();
            $category->user_id = Auth::id();
            $category->name = $request->name;
            $category->status = $request->status;
            $category->save();
            flash('Category Create successfully')->success();
            return redirect()->route('admin.categories.index');
           } catch (\Throwable $th) {
             flash($th->getMessage())->error();
           }
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
        $category = Category::find($id);
        if(!$category){
            flash('data not found')->error();
            return redirect()->back();
        }
        $data['category'] = $category;
        return view('admin.category.edit',$data);
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
        $request->validate([
            'name'=>'required|string|unique:categories,name,'.$id
        ]);

        $category = Category::find($id);
        if(!$category){
            flash('data not found')->error();
            return redirect()->back();
        }

        try {
            $category->user_id = Auth::id();
            $category->name = $request->name;
            $category->status = $request->status;
            $category->save();
            flash('Category update successfully')->success();
            return redirect()->route('admin.categories.index');
           } catch (\Throwable $th) {
             flash($th->getMessage())->error();
           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
            flash('Category Delete success')->success();
            return redirect()->back();
        } catch (\Throwable $th) {
            flash($th->getMessage())->error();
            return redirect()->back();
        }
    }


    public function statusUpdate($id){
        $category = Category::find($id);
        if($category){
            if($category->status == 1 ){
                $category->status = 0;
            }else{
                $category->status =  1;
            }
            $category->save();
            flash('Category status update successfully')->success();
            return redirect()->back();
        }else{
            flash('data not found')->error();
        }
    }
}
