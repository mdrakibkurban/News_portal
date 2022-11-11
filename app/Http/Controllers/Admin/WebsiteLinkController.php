<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\IWebsiteLinkRepository;
use App\Models\WebsiteLink;
use Illuminate\Http\Request;

class WebsiteLinkController extends Controller
{
    protected $websiteLinkRepo;

    public function __construct(IWebsiteLinkRepository $websiteLinkRepo)
    {
        $this->websiteLinkRepo = $websiteLinkRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['websites'] = $this->websiteLinkRepo->myGet();
        return view('admin.websitelink.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.websitelink.create');
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
            'website_name_en'=>'required',
            'website_name_en'=>'required',
            'website_link' => 'required'
         ]);
         $this->websiteLinkRepo->websiteLinkStore($request);
         return redirect()->route('admin.websites.index');
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
        $website = $this->websiteLinkRepo->myFind($id);
        if(!$website){
            return redirect()->back();
        }
        $data['websitelink'] = $website;
        return view('admin.websitelink.edit',$data);
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
            'website_name_en'=>'required',
            'website_name_en'=>'required',
            'website_link' => 'required'
        ]);
        $this->websiteLinkRepo->websiteLinkUpdate($request,$id);
        return redirect()->route('admin.websites.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->websiteLinkRepo->myDelete($id); 
       return response()->json([
        'success' =>true,
        'message' => "Website delete successfully"
       ]);  
    }


    public function websiteRemoveItems(Request $request){
         $website = WebsiteLink::whereIn('id',explode("," ,$request->strIds));
         $total   =  $website->count();
         $website->delete();
         return response()->json([
             'success' => true,
             'message' => 'Website delete successfully',
             'total'   =>  $total,
         ]);
    }

}
