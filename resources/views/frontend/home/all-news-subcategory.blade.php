@extends('frontend.layouts.app')

@section('content')
<section class="single-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="font-size: 20px;">
                <ol class="breadcrumb">   
                   <li><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>					   
                    <li><a href="{{ route('news.category',$subcategory->category->name_en)}}" class="category-btn">
                        @if(session()->get('lang') == 'english')
                        {{ $subcategory->category->name_en }} 
                         @else
                        {{ $subcategory->category->name_bn }}
                        @endif
                    </a></li>
                  
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12"> 											
             <div class="article-info margin-bottom-20">
              <div class="row">
                    <div class="col-md-6 col-sm-6"> 
                     <ul class="list-inline">
                        <li>
                            <a href="{{ route('news.subcategory', ['category_en' => $subcategory->category->name_en, 'subcategory_en' => $subcategory->name_en ?? 'topic'])}}" class="subcategory-btn">
                                @if(session()->get('lang') == 'english')
                                 {{ $subcategory->name_en }} 
                                @else
                                 {{ $subcategory->name_bn }} 
                                
                                @endif
                            </a>
                       </li>
                    </div>
                    					
                </div>				 
             </div>				
        </div>
      </div>
      <!-- ******** -->
      <br>

      <div class="row">
        <div class="col-md-8 col-sm-8">
            <div class="row">
                <div class="col-md-12"> 
                    <h2 class="heading">
                        @if(session()->get('lang') == 'english')
                        News
                        @else
                        সংবাদ
                        @endif
                   </h2>
                <br>
               </div>
               
                @foreach($news as $row)
                <div class="col-md-4 col-sm-4">
                    <div class="top-news">
                        <a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}"><img style="height: 200px" src="{{asset('storage/news_images/'.$row->image)}}" alt="Notebook"></a>
                        <h4 class="heading-02">
                            <a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
                                @if(session()->get('lang') == 'english')
                                {{ $row->news_en }} 
                               @else
                                {{ $row->news_bn }} 
                               @endif
                            </a> 
                        </h4>
                    </div>
                </div>
                @endforeach
            </div>
           
            {{ $news->links() }}
        </div>
        <div class="col-md-4 col-sm-4">
            <!-- add-start -->	
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="{{asset("frontend/assets/img/add_01.jpg")}}" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->
            <div class="tab-header">
                <!-- Nav tabs -->
                <!-- Nav tabs -->
					<ul class="nav nav-tabs nav-justified" role="tablist">
						<li role="presentation" class="active">
                            <a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">
                            @if(session()->get('lang') == 'english')
                            Latest
                            @else
                            সর্বশেষ
                            @endif
                            </a>
                        </li>
                        <li role="presentation" >
                            <a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">
                            @if(session()->get('lang') == 'english')
                            Favourite
                            @else
                            জনপ্রিয়
                            @endif
                            </a>
                        </li>
                        <li role="presentation" >
                            <a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">
                                @if(session()->get('lang') == 'english')
                                Special
                                @else
                                বিশেষ
                                @endif
                                </a>
                            </a>
                       </li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content ">
						<div role="tabpanel" class="tab-pane in active" id="tab21">
                            <div class="news-titletab">
                                @foreach($latest as $row)
                                <div class="news-title-02">
                                    <h4 class="heading-03">
                                        <a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
                                            @if(session()->get('lang') == 'english')
                                            {{ $row->news_en ?? '' }}
                                            @else
                                            {{ $row->news_bn ?? '' }}
                                            @endif
                                        </a> 
                                   </h4>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab22">
                            <div class="news-titletab">
                                @foreach($favourite as $row)
                                <div class="news-title-02">
                                    <h4 class="heading-03">
                                        <a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
                                            @if(session()->get('lang') == 'english')
                                            {{ $row->news_en ?? '' }}
                                            @else
                                            {{ $row->news_bn ?? '' }}
                                            @endif
                                        </a> 
                                    </h4>
                                </div>
                                @endforeach	
                            </div>                                          
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab23">	
                            <div class="news-titletab">
                                @foreach($special as $row)
                                <div class="news-title-02">
                                    <h4 class="heading-03">
                                        <a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
                                            @if(session()->get('lang') == 'english')
                                            {{ $row->news_en ?? '' }}
                                            @else
                                            {{ $row->news_bn ?? '' }}
                                            @endif
                                        </a> 
                                    </h4>
                                </div>
                                @endforeach		
                            </div>						                                          
                        </div>
						
					</div>
            </div>
            <!-- add-start -->	
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add"><img src="{{asset("frontend/assets/img/add_01.jpg")}}" alt="" /></div>
                    </div>
                </div><!-- /.add-close -->
        </div>
      </div>
     
    </div>
</section>


@endsection

@push('css')
<style>
a.category-btn {
    color: black;
    font-weight: 100; 
}
a.category-btn:hover {
    color: orange;
}
a.subcategory-btn{
    color: maroon;
    font-weight: bold;
    font-size: 30px;
}

a.subcategory-btn:hover{
    color: #337ab7;
}
.div-height{
    height: 280px;
}
</style>
@endpush

