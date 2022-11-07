<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\ISubDistrictRepository;
use App\Models\District;
use App\Models\SubDistrict;
use Illuminate\Http\Request;

class SubDistrictController extends Controller
{

    protected $subDistrictRepo;

    public function __construct(ISubDistrictRepository $subDistrictRepo)
    {
        $this->subDistrictRepo = $subDistrictRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['subDistricts'] = $this->subDistrictRepo->myGet();
        return view('admin.sub-district.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['districts'] = District::latest()->get();
        return view('admin.sub-district.create',$data);
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
               'subdistrict_en' => 'required|unique:sub_districts',
               'subdistrict_bn' => 'required|unique:sub_districts',
               'district_id'    => 'required'
          ]);
          $this->subDistrictRepo->subDistrictStore($request);
          return redirect()->route('admin.sub-districts.index');
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
         $subDistrict = $this->subDistrictRepo->myFind($id);
         if(!$subDistrict){
            return redirect()->back();
         }
         $data['subDistrict'] =  $subDistrict;
         $data['districts'] = District::latest()->get();
         return view('admin.sub-district.edit',$data);
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
            'subdistrict_en' => 'required|unique:sub_districts,subdistrict_en,'.$id,
            'subdistrict_bn' => 'required|unique:sub_districts,subdistrict_en,'.$id,
            'district_id'    => 'required'
       ]);
        $this->subDistrictRepo->subDistrictUpdate($request,$id);
        return redirect()->route('admin.sub-districts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->subDistrictRepo->myDelete($id); 
       return response()->json([
        'success' =>true,
        'message' => "Subdistrict delete successfully"
       ]);
    }

    public function SubdistrictRemoveItems(Request $request){
        $subDistrict = SubDistrict::whereIn('id',explode("," ,$request->strIds));
        $total   = $subDistrict->count();
        $subDistrict->delete();
        return response()->json([
            'success' => true,
            'message' => 'sub-District delete successfully',
            'total'   =>  $total,
        ]);
   }
}
