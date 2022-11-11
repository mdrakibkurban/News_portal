<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\IVedioGalleryRepository;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class VedioGalleryController extends Controller
{
    protected $vedioRepo;

    public function __construct(IVedioGalleryRepository $vedioRepo)
    {
        $this->vedioRepo = $vedioRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['vedios'] = $this->vedioRepo->myGet();
        return view('admin.gallery.vedio.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.vedio.create');
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
            'title_en'=>'required',
            'title_bn'=>'required',
            'embed_code'=>'required',
        ]);

        $this->vedioRepo->vedioStore($request);
        return redirect()->route('admin.vedios.index');
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
        $vedio = $this->vedioRepo->myFind($id);
        if(! $vedio){
            return redirect()->back();
        }
        $data['vedio'] =  $vedio;
        return view('admin.gallery.vedio.edit',$data);
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
            'title_en' =>'required',
            'title_bn' =>'required',
            'embed_code'=>'required',
        ]);

        $this->vedioRepo->vedioUpdate($request,$id);
        return redirect()->route('admin.vedios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->vedioRepo->myDelete($id); 
        return response()->json([
            'success' =>true,
            'message' => "Vedio delete successfully"
        ]); 
    }


    public function vedioRemoveItems(Request $request){

        $vedio = VideoGallery::whereIn('id',explode("," ,$request->strIds));
        $total   =  $vedio->count();
        $vedio->delete();
        return response()->json([
            'success' => true,
            'message' => 'Vedio delete successfully',
            'total'   =>  $total,
        ]);
    }
}
