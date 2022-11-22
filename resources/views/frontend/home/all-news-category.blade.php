@extends('frontend.layouts.app')

@section('content')
<section class="single-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="font-size: 28px;">
                <ol class="breadcrumb">   
                   <li><a href="#"><i class="fa fa-home"></i></a></li>					   
                    <li><a href="{{ route('news.category',$category->name_en)}}" class="category-btn">
                        @if(session()->get('lang') == 'english')
                        {{ $category->name_en }} 
                         @else
                        {{ $category->name_bn }}
                        @endif
                    </a></li>
                  
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12"> 	
            @if($category->subcategories->count() > 0)										
             <div class="article-info margin-bottom-20">
              <div class="row">
                    <div class="col-md-6 col-sm-6"> 
                     <ul class="list-inline">
                    <?php $i = 1; $len = count($category->subcategories); ?>
                     @foreach($category->subcategories as $item)
                        <li>
                            <a href="{{ route('news.subcategory', ['category_en' => $category->name_en, 'subcategory_en' => $item->name_en ?? 'topic'])}}" class="subcategory-btn">
                                @if(session()->get('lang') == 'english')
                                 {{ $item->name_en }} 
                                @else
                                 {{ $item->name_bn }} 
                                
                                @endif
                            </a>
                       </li>
                      <?php if($i < $len) {echo '*';} $i++;?>
                      @endforeach 
                    </div>					
                </div>				 
             </div>	
             @endif			
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
                        <a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
                            <img style="height: 200px" src="{{asset('storage/news_images/'.$row->image)}}" alt="Notebook">
                        </a>
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
                        <div class="sidebar-add">
                            @if($vartical1 == NULL)
                            @else
                             <a target="_blank" href="{{ $vartical1->links }}">
                                <img  src="{{asset('storage/vartical_images/'.$vartical1->ads)}}" alt="" />
                             </a>
                            @endif
                        </div>
                    </div>
                </div><!-- /.add-close -->
                <br>
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
            <br>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="sidebar-add">
                            @if($vartical2 == NULL)
							@else
								<a target="_blank" href="{{ $vartical2->links }}">
									<img  src="{{asset('storage/vartical_images/'.$vartical2->ads)}}" alt="" />
								</a>
							@endif
                        </div>
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
    color: maroon;
    font-weight: bold;
}
a.category-btn:hover {
    color: orange;
}
a.subcategory-btn{
    color: black;
    font-weight: 100;
    font-size: 22px;
}

a.subcategory-btn:hover{
    color: #337ab7;
}
.div-height{
    height: 280px;
}
</style>
@endpush

