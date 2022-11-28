<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class WriterController extends Controller
{
    public function index(){
        $data['writers'] = User::where('type',0)->get();
        return view('admin.writer.index',$data);
    }

    public function create(){
        return view('admin.writer.create');
    }

    public function store(Request $request){
         $request->validate([
            'name'=> 'required',
            'email' =>'required|email',
            'password' =>'required|min:6|confirmed'
         ]);

         if($request->hasFile('image')){
            $image = $request->file('image');
            $image_ex =  $image->getClientOriginalExtension();
            $file_path = date('ymdhis').'.'.$image_ex;
            Image::make($image)->resize(500, 310); 
            $image->storeAs('user_images', $file_path,'public');
         }else{
            $file_path = null;
         }

         try {
            $writer = new User();
            $writer->name     = $request->name;
            $writer->email    = $request->email;
            $writer->password  = Hash::make($request->password);
            $writer->category = $request->category;
            $writer->division = $request->division;
            $writer->news     = $request->news;
            $writer->ads      = $request->ads;
            $writer->gallery  = $request->gallery;
            $writer->setting  = $request->setting;
            $writer->role     = $request->role;
            $writer->image    = $file_path;
            $writer->save();
            Toastr::success('Writer create successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
            return redirect()->route('admin.writers.index');
         } catch (\Throwable $th) {
            Toastr::error('Somthiong wrong', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
         }
    }

    public function edit($id){
        $writer = User::find($id);
        if(!$writer){
            Toastr::error('data not found', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
            return redirect()->back();
        }
        $data['writer'] = $writer;
        return view('admin.writer.edit',$data);
    }

    public function update(Request $request,$id){
        $request->validate([
           'name'=> 'required',
           'email' =>'required|email',
        ]);

        try {
           $writer =  User::find($id);
           $writer->name     = $request->name;
           $writer->email    = $request->email;
           $writer->category = $request->category;
           $writer->division = $request->division;
           $writer->news     = $request->news;
           $writer->ads      = $request->ads;
           $writer->gallery  = $request->gallery;
           $writer->setting  = $request->setting;
           $writer->role     = $request->role;
           $writer->save();
           Toastr::success('Writer Update successfuly', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
           return redirect()->route('admin.writers.index');
        } catch (\Throwable $th) {
           Toastr::error('Somthiong wrong', 'success', ["positionClass" => "toast-top-right",  "closeButton"=> true,   "progressBar"=> true,]);
        }
   }

   public function destroy($id){
    $writer = User::find($id);
    if(!$writer){
        return response()->json([
            'success' =>false,
            'message' => "Data not found"
        ]);
    }
    if($writer->image){
        Storage::delete('public/user_images/'.$writer->image); 
    }
    $writer->delete();
    return response()->json([
        'success' =>true,
        'message' => "Writer delete successfully"
    ]);
}
}
