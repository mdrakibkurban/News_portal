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
                'name'=>'required|string|unique:categories',
                'status' => 'required'
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
            'name'=>'required|string|unique:categories,name,'.$id,
            'status' => 'required'
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


    public function categoryStatus(Request $request){
        $category = Category::find($request->id);
        $category->status = $request->status;
        $category->save();
        return response()->json(['message' => 'success']);
        
    }


    public function multipleDeleteCategory(Request $request){
         $category = Category::whereIn('id',explode("," ,$request->strIds));
         $total   = $category->count();
         $category->delete();
         return response()->json([
             'success' => true,
             'message' => 'Category delete successfully',
             'total'   =>  $total,
         ]);
    }
}
