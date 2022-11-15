<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\PhotoGallery;
use App\Models\SubCategory;
use App\Models\VideoGallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['first_section_big'] = News::latest()->where('first_section_big', 1)->active()->first();
        $data['first_section_small'] = News::latest()->skip(1)->where('first_section_small', 1)->take('8')->get();
       
        // firstcategory section
        $data['firstCat'] = Category::latest()->active()->first();
        $data['firstCatPostBig'] = News::latest()->where('category_id',$data['firstCat']->id)
        ->where('others_section_big', 1)->active()->first();
        $data['firstCatPostSmall'] = News::latest()->skip(1)->where('category_id',$data['firstCat']->id)
        ->where('others_section_small', 1)->active()->take(3)->get();

        // second category section
        $data['secondCat'] = Category::skip(1)->latest()->active()->first();
        $data['secondCatPostBig'] = News::latest()->where('category_id',$data['secondCat']->id)
        ->where('others_section_big', 1)->active()->first();
        $data['secondCatPostSmall'] = News::latest()->skip(1)->where('category_id',$data['secondCat']->id)
        ->where('others_section_small', 1)->active()->take(3)->get();


        // third category section
        $data['thirdCat'] = Category::skip(2)->latest()->active()->first();
        $data['thirdCatPostBig'] = News::latest()->where('category_id',$data['thirdCat']->id)
        ->where('others_section_big', 1)->active()->first();
        $data['thirdCatPostSmall'] = News::latest()->skip(1)->where('category_id',$data['thirdCat']->id)
        ->where('others_section_small', 1)->active()->take(3)->get();

        // Four category section
        $data['fourCat'] = Category::skip(3)->latest()->active()->first();
        $data['fourCatPostBig'] = News::latest()->where('category_id',$data['fourCat']->id)
        ->where('others_section_big', 1)->active()->first();
        $data['fourCatPostSmall'] = News::latest()->skip(1)->where('category_id',$data['fourCat']->id)
        ->where('others_section_small', 1)->active()->take(3)->get();
       
        // five category section
        $data['fiveCat'] = Category::skip(4)->latest()->active()->first();
        $data['fiveCatPostBig'] = News::latest()->where('category_id',$data['fiveCat']->id)
        ->where('others_section_big', 1)->active()->first();
        $data['fiveCatPostSmall'] = News::latest()->skip(1)->where('category_id',$data['fiveCat']->id)
        ->where('others_section_small', 1)->active()->take(3)->get();

        // Six category section
        $data['sixCat'] = Category::skip(5)->latest()->active()->first();
        $data['sixCatPostBig'] = News::latest()->where('category_id',$data['sixCat']->id)
        ->where('others_section_big', 1)->active()->first();
        $data['sixCatPostSmall'] = News::latest()->skip(1)->where('category_id',$data['sixCat']->id)
        ->where('others_section_small', 1)->active()->take(3)->get();

         // Seven category section
         $data['sevenCat'] = Category::skip(6)->latest()->active()->first();
         $data['sevenCatPostBig'] = News::latest()->where('category_id',$data['sevenCat']->id)
         ->where('others_section_big', 1)->active()->first();
         $data['sevenCatPostSmall'] = News::latest()->skip(1)->where('category_id',$data['sevenCat']->id)
         ->where('others_section_small', 1)->active()->take(3)->get();
  
         // eight category section
         $data['eightCat'] = Category::skip(7)->latest()->active()->first();
         $data['eightCatPostBig'] = News::latest()->where('category_id',$data['eightCat']->id)
         ->where('others_section_big', 1)->active()->first();
         $data['eightCatPostSmall'] = News::latest()->skip(1)->where('category_id',$data['eightCat']->id)
         ->where('others_section_small', 1)->active()->take(3)->get();


        // all Country
        $data['allCountrybig'] = News::latest()->whereNotNull('district_id')->active()->first();
        $data['allCountryFirst3'] = News::latest()->whereNotNull('district_id')->skip(1)->active()->take(3)->get();
        $data['allCountrysecond3'] = News::latest()->whereNotNull('district_id')->skip(4)->active()->take(3)->get();


        //photo Gallery

        $data['photogGalleryBig'] = PhotoGallery::where('type',1)->latest()->first();
        $data['photogGallerySmall'] = PhotoGallery::where('type',0)->latest()->take(5)->get();

        //photo Gallery

        $data['vediogGalleryBig'] = VideoGallery::where('type',1)->latest()->first();
        $data['vediogGallerySmall'] = VideoGallery::where('type',0)->latest()->get();

        $data['latest'] = News::latest()->active()->take(7)->get();
        $data['favourite'] = News::inRandomOrder()->active()->limit(7)->get();
        $data['special'] = News::latest()->active()->take(7)->get();

        return view('frontend.home.index',$data);
    }
}
