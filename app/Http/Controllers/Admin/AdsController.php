<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['ads'] = Ads::latest()->get();
        return view('admin.ads.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ads.create');
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
            'ads' => 'required',
            'type' => 'required',
        ]);

        
        $ads = new Ads();

        if($request->type == 1){
            if($request->hasFile('ads')){
                $image = $request->file('ads');
                $image_ex =  $image->getClientOriginalExtension();
                $file_path = date('ymdhis').'.'.$image_ex;
                Image::make($image)->resize(500, 500); 
                $image->storeAs('vartical_images', $file_path,'public');
                $ads->ads =  $file_path;
                $ads->type = $request->type;
            }
        }else{
            if($request->hasFile('ads')){
                $image = $request->file('ads');
                $image_ex =  $image->getClientOriginalExtension();
                $file_path = date('ymdhis').'.'.$image_ex;
                Image::make($image)->resize(970, 90); 
                $image->storeAs('horizotal_images', $file_path,'public');
                $ads->ads =  $file_path;
                $ads->type = $request->type;
            }
        }
     
        $ads->user_id = Auth::id();
        $ads->links   = $request->links;
        $ads->save();
        Toastr::success('Ads create successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        return redirect()->route('admin.ads.index');


        
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
        $ads = Ads::find($id);
        if(!$ads){
            Toastr::success('Data not found', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
            return redirect()->route('admin.ads.edit');
        }
        $data['ads'] = $ads;
        return view('admin.ads.edit',$data);
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
            'ads' => 'required',
            'type' => 'required',
        ]);

        
        $ads = Ads::find($id);

        if($request->type == 1){
            if($request->hasFile('ads')){
                if ($ads->ads) {
                    Storage::delete('public/vartical_images/' . $ads->ads);
                }
                $image = $request->file('ads');
                $image_ex =  $image->getClientOriginalExtension();
                $file_path = date('ymdhis').'.'.$image_ex;
                Image::make($image)->resize(500, 500); 
                $image->storeAs('vartical_images', $file_path,'public');
                $ads->ads =  $file_path;
                $ads->type = $request->type;
            }
        }else{
            if($request->hasFile('ads')){
                if ($ads->ads) {
                    Storage::delete('public/horizotal_images/' .$ads->ads);
                }
                $image = $request->file('ads');
                $image_ex =  $image->getClientOriginalExtension();
                $file_path = date('ymdhis').'.'.$image_ex;
                Image::make($image)->resize(970, 90); 
                $image->storeAs('horizotal_images', $file_path,'public');
                $ads->ads =  $file_path;
                $ads->type = $request->type;
            }
        }
        $ads->links   = $request->links;
        $ads->save();
        Toastr::success('Ads Update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        return redirect()->route('admin.ads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ads = Ads::find($id);

        try {
            if($ads->type == 1){
                if ($ads->ads) {
                    Storage::delete('public/vartical_images/' . $ads->ads);
                }
                $ads->delete();
            }else{
                if ($ads->ads) {
                    Storage::delete('public/horizotal_images/' .$ads->ads);
                } 
                $ads->delete();
            }
            return response()->json([
                'success' =>true,
                'message' => "Ads delete successfully"
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'success' =>true,
                'message' => "Somthing wrong"
            ]);
        }
        
    }
}
