<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\IDivisionRepository;
use App\Models\Division;
use Illuminate\Http\Request;

class DivistionController extends Controller
{ 
     protected $divisionRepo;

    public function __construct(IDivisionRepository $divisionRepo)
    {
         $this->divisionRepo = $divisionRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['divisions'] = $this->divisionRepo->myGet();
        return view('admin.division.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.division.create');
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
            'name_en' =>'required|string|unique:divisions',
            'name_bn' =>'required|string|unique:divisions',
         ]);

         $this->divisionRepo->divisionStore($request);
         return redirect()->route('admin.divisions.index');
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
        $division = $this->divisionRepo->myFind($id);
        if(!$division){
            return redirect()->back();
        }
        $data['division'] = $division;
        return view('admin.division.edit',$data);
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
            'name_en' =>'required|string|unique:divisions,name_en,'.$id,
            'name_bn' =>'required|string|unique:divisions,name_bn,'.$id,
         ]);
         
         $this->divisionRepo->divisionUpdate($request,$id);
         return redirect()->route('admin.divisions.index');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->divisionRepo->myDelete($id);
        return response()->json([
            'success' =>true,
            'message' => "Division delete successfully"
        ]);
    }


    public function divisionRemoveItems(Request $request){
        $division = Division::whereIn('id',explode("," ,$request->strIds));
        $total    = $division->count();
        $division->delete();
        return response()->json([
            'success' => true,
            'message' => 'Division delete successfully',
            'total'   =>  $total,
        ]);
   }
}
