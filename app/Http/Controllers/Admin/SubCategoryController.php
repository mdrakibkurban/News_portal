<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ISubCategoryRepository;
use App\Models\Category;
use App\Models\SubCategory;
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
       $this->subCategoryRepo->myDelete($id); 
       return response()->json([
        'success' =>true,
        'message' => "SubCategory delete successfully"
       ]);
    }

    public function status(Request $request){
        $this->subCategoryRepo->myStatus($request);
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
