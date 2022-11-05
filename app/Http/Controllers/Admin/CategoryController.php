<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ICategoryRepository;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;


class CategoryController extends Controller
{

    protected $categoryRepo;

    public function __construct(ICategoryRepository $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = $this->categoryRepo->myGet();
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
            'name_en'=>'required|string|unique:categories',
            'name_bn'=>'required|string|unique:categories',
            'status' => 'required'
         ]);

         $this->categoryRepo->categoryStore($request);
         Toastr::success('Categotry create successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
         return redirect()->route('admin.categories.index');
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
        $category = $this->categoryRepo->myFind($id);
        if(!$category){
            flash('Category not found')->error();
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
            'name_en'=>'required|string|unique:categories,name_en,'.$id,
            'name_bn'=>'required|string|unique:categories,name_bn,'.$id,
            'status' => 'required'
        ]);    
        $this->categoryRepo->categoryUpdate($request,$id);
        Toastr::success('Categotry Update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepo->myDelete($id);
        if(!$category){
            flash('Category not found')->error();
            return redirect()->back();
        }
        $category->delete();
        return response()->json([
             'success' =>true,
             'message' => "category delete successfully"
        ]);
    }


    public function categoryStatus(Request $request){
        $this->categoryRepo->categoryStatus($request);
        return response()->json([
            'success' =>true,
            'message' => "category status"
        ]);  
    }


    public function CategoryRemoveItems(Request $request){
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
