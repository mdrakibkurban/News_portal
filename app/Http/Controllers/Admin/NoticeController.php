<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\INoticeRepository;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    protected $noticeRepo;

    public function __construct(INoticeRepository $noticeRepo)
    {
        $this->noticeRepo = $noticeRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['notices'] = $this->noticeRepo->myGet();
        return view('admin.notice.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notice.create');
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
            'notice_en'=>'required',
            'notice_bn'=>'required',
            'status' => 'required'
         ]);
         $this->noticeRepo->noticeStore($request);
         return redirect()->route('admin.notices.index');
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
        $notice = $this->noticeRepo->myFind($id);
        if(!$notice){
            return redirect()->back();
        }
        $data['notice'] = $notice;
        return view('admin.notice.edit',$data);
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
            'notice_en'=>'required',
            'notice_bn'=>'required',
            'status' => 'required'
        ]);
        $this->noticeRepo->noticeUpdate($request,$id);
        return redirect()->route('admin.notices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->noticeRepo->myDelete($id); 
       return response()->json([
        'success' =>true,
        'message' => "notice delete successfully"
       ]);  
    }


    public function status(Request $request){
        $this->noticeRepo->myStatus($request);
        return response()->json([
            'success' =>true,
            'message' => "notice status"
        ]);  
    }


    public function noticeRemoveItems(Request $request){
         $notice = Notice::whereIn('id',explode("," ,$request->strIds));
         $total   = $notice->count();
         $notice->delete();
         return response()->json([
             'success' => true,
             'message' => 'notice delete successfully',
             'total'   =>  $total,
         ]);
    }

}
