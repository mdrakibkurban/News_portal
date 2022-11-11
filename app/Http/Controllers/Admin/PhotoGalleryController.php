<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\IPhotoGalleryRepository;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoGalleryController extends Controller
{
    protected $photoRepo;

    public function __construct(IPhotoGalleryRepository $photoRepo)
    {
        $this->photoRepo = $photoRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['photos'] = $this->photoRepo->myGet();
        return view('admin.gallery.photo.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.photo.create');
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
            'photo' => 'required',
        ]);

        $this->photoRepo->photoStore($request);
        return redirect()->route('admin.photos.index');
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
        $photo = $this->photoRepo->myFind($id);
        if(! $photo){
            return redirect()->back();
        }
        $data['photo'] =  $photo;
        return view('admin.gallery.photo.edit',$data);
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
            'photo'    => 'nullable|sometimes|image',
        ]);

        $this->photoRepo->photoUpdate($request,$id);
        return redirect()->route('admin.photos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = PhotoGallery::find($id);

        if($photo){
            if($photo->photo){
                Storage::delete('public/photo_images/'.$photo->photo); 
            }
            $photo->delete();
            return response()->json([
                'success' =>true,
                'message' => "photo delete successfully"
            ]);
           
        }else{
            return response()->json([
                'success' =>false,
                'message' => "somthing worng"
            ]);
        }
    }


    public function photoRemoveItems(Request $request){

        $Ids = explode("," ,$request->strIds);
        $sl = 0;
        foreach($Ids as $id){
            $photo = PhotoGallery::find($id);
            if ($photo->photo) {
                Storage::delete('public/photo_images/' . $photo->photo);
            }
            $photo->delete();
            $sl++;
        }

        $success = $sl > 0; 
        return response()->json([
            'success'=> $success,
            'total' => $sl,
            'message' => 'Photo delete successfully',
       ],200);
    }
}
