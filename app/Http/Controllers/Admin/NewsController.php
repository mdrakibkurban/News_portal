<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Interfaces\INewsRepository;
use App\Models\Category;
use App\Models\District;
use App\Models\News;
use App\Models\SubCategory;
use App\Models\SubDistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

    protected $newsRepo;

    public function __construct(INewsRepository $newsRepo)
    {
        $this->newsRepo = $newsRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['news'] = $this->newsRepo->myGet();
        return view('admin.news.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::latest()->active()->get(); 
        $data['districts'] = District::latest()->get(); 
        return view('admin.news.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $this->newsRepo->newsStore($request);
        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = $this->newsRepo->myFind($id);
        if(!$news){
            return redirect()->back();
        }
        $data['news'] = $news;
        return view('admin.news.details',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = $this->newsRepo->myFind($id);
        if(!$news){
            return redirect()->back();
        }
        $data['news'] = $news;
        $data['categories'] = Category::latest()->active()->get(); 
        $data['districts'] = District::latest()->get(); 
        return view('admin.news.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, $id)
    {
          $this->newsRepo->newsUpdate($request,$id);
          return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->newsRepo->myDelete($id); 
        return response()->json([
         'success' =>true,
         'message' => "News delete successfully"
        ]);
    }


    public function getSubCat(Request $request){
        $subCategory = SubCategory::where('category_id',$request->category_id)->get();
        return response()->json($subCategory);
    }

    public function getSubDist(Request $request){
        $subDistrict = SubDistrict::where('district_id',$request->district_id)->get();
        return response()->json($subDistrict);
    }

    public function status(Request $request){
        $this->newsRepo->myStatus($request);
        return response()->json([
            'success' =>true,
            'message' => "News status"
        ]); 
    }


    public function newsRemoveItems(Request $request){

        $newsIds = explode("," ,$request->strIds);
        $sl = 0;
        foreach($newsIds as $id){
            $news = News::find($id);
            if ($news->image) {
                Storage::delete('public/news_images/' . $news->image);
            }
            $news->delete();
            $sl++;
        }
       
        $success = $sl > 0; 
        return response()->json([
            'success'=> $success,
            'total' => $sl,
            'message' => 'News delete successfully',
        ],200);
   }
}
