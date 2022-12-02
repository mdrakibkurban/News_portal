<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['news_total'] = News::active()->get();
        $data['category']   = Category::active()->get();
        $data['ads']        = Ads::get();
        $data['writers']    = User::where('type',0)->get();
        $data['news']       = News::latest()->active()->take(5)->get();
        return view('admin.dashboard.index',$data);
    }
}
