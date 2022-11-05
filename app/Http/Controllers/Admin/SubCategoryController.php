<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ICategoryRepository;
use App\Interfaces\ISubCategoryRepository;
use App\Models\Category;
use App\Models\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    protected $subCategoryRepo;
    protected $categoryRepo;
    public function __construct(ISubCategoryRepository $subCategoryRepo)
    {
        $this->subCategoryRepo = $subCategoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subCategories'] = $this->subCategoryRepo->myGet();
        return view('admin.sub-category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::latest()->active()->get(); 
        return view('admin.sub-category.create',$data);
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
            'name_en'=>'required|string|unique:sub_categories',
            'name_bn'=>'required|string|unique:sub_categories',
            'category_id'=>'required',
            'status' => 'required'
         ]);
         $this->subCategoryRepo->subCategoryStore($request); 
         Toastr::success('Sub-Categotry create successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
         return redirect()->route('admin.sub-categories.index');
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
        $subCategory = $this->subCategoryRepo->myFind($id);
         if(!$subCategory){
            flash('Sub-Category not found')->error();
            return redirect()->back();
        }
        $data['subCategory'] = $subCategory;
        $data['categories'] = Category::latest()->active()->get(); 
        return view('admin.sub-category.edit',$data);

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
            'name_en'=>'required|string|unique:sub_categories,name_en,'.$id,
            'name_bn'=>'required|string|unique:sub_categories,name_bn,'.$id,
            'category_id'=>'required',
            'status' => 'required'
         ]);
         $this->subCategoryRepo->subCategoryUpdate($request,$id);
         Toastr::success('Sub-Categotry Update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]); 
         return redirect()->route('admin.sub-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCategory = $this->subCategoryRepo->myDelete($id);
        if(!$subCategory){
            flash('Sub-Category not found')->error();
            return redirect()->back();
        }
        $subCategory->delete();
        return response()->json([
             'success' =>true,
             'message' => "sub-category delete successfully"
        ]);
    }

    public function subCategoryStatus(Request $request){
        $this->subCategoryRepo->subCategoryStatus($request);
        return response()->json([
            'success' =>true,
            'message' => "sub-category status"
        ]);  
    }

    public function subCategoryRemoveItems(Request $request){
        $subCategory = SubCategory::whereIn('id',explode("," ,$request->strIds));
        $total   = $subCategory->count();
        $subCategory->delete();
        return response()->json([
            'success' => true,
            'message' => 'sub-Category delete successfully',
            'total'   =>  $total,
        ]);
   }
}
