        @php
         function bangla_date($str)
             {
             $en = array(1,2,3,4,5,6,7,8,9,0);
             $bn = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
             $str = str_replace($en, $bn, $str);
             $en = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );
             $en_short = array( 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' );
             $bn = array( 'জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর' );
             $str = str_replace( $en, $bn, $str );
             $str = str_replace( $en_short, $bn, $str );
             $en = array('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
             $en_short = array('Sat','Sun','Mon','Tue','Wed','Thu','Fri');
             $bn_short = array('শনি', 'রবি','সোম','মঙ্গল','বুধ','বৃহঃ','শুক্র');
             $bn = array('শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
             $str = str_replace( $en, $bn, $str );
             $str = str_replace( $en_short, $bn_short, $str );
             $en = array( 'am', 'pm' );
             $bn = array( 'পূর্বাহ্ন', 'অপরাহ্ন' );
             $str = str_replace( $en, $bn, $str );
             $str = str_replace( $en_short, $bn_short, $str );
             $en = array( '১২', '২৪' );
             $bn = array( '৬', '১২' );
             $str = str_replace( $en, $bn, $str );
             return $str;
             }
     @endphp
@extends('frontend.layouts.app')
@section('meta_news')
  <meta property="og:url" content="{{Request::fullUrl()}}" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{ $news->news_bn }}" />
  <meta property="og:description" content="{{ $news->des_bn }}" />
  <meta property="og:image" content="{{URL::to($news->image)}}" />
@endsection
@section('content')
       	<!-- single-page-start -->  
	<section class="single-page">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<ol class="breadcrumb">   
					   <li><a href="#"><i class="fa fa-home"></i></a></li>					   
						<li>
                            <a href="{{ route('news.category',$news->category->name_en ?? '')}}">
                                @if(session()->get('lang') == 'english')
                                {{ $news->category->name_en ?? null }}
                                @else
                                {{ $news->category->name_bn ?? null }}
                                @endif
                            </a>
                        </li>
                        @if($news->subcategory)
						<li>
                            <a href="{{ route('news.subcategory', ['category_en' => $news->category->name_en ?? '', 'subcategory_en' => $news->subcategory->name_en ?? 'topic'])}}">
                                @if(session()->get('lang') == 'english')
                                {{ $news->subcategory->name_en ?? null }}
                                @else
                                {{ $news->subcategory->name_bn ?? null }}
                                @endif
                            </a>
                        </li>
                        @endif
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12"> 											
					<header class="headline-header margin-bottom-10">
						<h1 class="headline">
                            @if(session()->get('lang') == 'english')
							{{ $news->news_en ?? null }}
							@else
							{{ $news->news_bn ?? null }}
							@endif
                        </h1>
					</header>
		 
		 
				 <div class="article-info margin-bottom-20">
				  <div class="row">
						<div class="col-md-6 col-sm-6"> 
						 <ul class="list-inline">
                            <li>
                                @if(session()->get('lang') == 'english')
                                Onnodristy Online
                                @else
                                অন্যদৃষ্টি  অনলাইন
                                @endif
                            </li>  
                            <li>
                                <script type="text/javascript" src="http://bangladate.appspot.com/index2.php"></script>
                              <i class="fa fa-clock-o"></i> 
                              @if(session()->get('lang') == 'english')
                              {{ date('d m, Y', strtotime($news->news_date)) }},
                              {{ date('h:i', strtotime($news->news_time)) }}
                              @else
                              {{-- {{ date('d m, Y', strtotime($news->news_date)) }},
                              {{ date('h:i', strtotime($news->news_time)) }} --}}

                              {{ bangla_date($news->news_date)}} 
                              {{ bangla_date($news->news_time)}} 
                              @endif
                            </li>
						 </ul>
						
						</div>
						<div class="col-md-6 col-sm-6 pull-right"> 						
							<ul class="social-nav">
                                
							</ul>						   
						</div>						
					</div>				 
				 </div>				
			</div>
		  </div>
		  <!-- ******** -->
        
		  <div class="row">
			<div class="col-md-8 col-sm-8">
				<div class="single-news">
					<img src="{{(!empty($news->image)) ? asset('storage/news_images/'.$news->image) : asset('/upload/extra.jpg') }}" alt="" />
					<h4 class="caption"> 
                        @if(session()->get('lang') == 'english')
                        {{ $news->news_en ?? null }}
                        @else
                        {{ $news->news_bn ?? null }}
                        @endif

                        । -
                        @if(session()->get('lang') == 'english')
                        Picture
                        @else
                        ছবি
                        @endif
                        : 
                        
                        @if(session()->get('lang') == 'english')
                        {{ $news->user->name ?? null }}
                        @else
                        {{ $news->user->name ?? null }}
                        @endif
                       </h4>
                       <div class="sharethis-inline-share-buttons" 
                        data-href="{{ Request::url() }}">
                       </div>
                       <br>
					<p> 
                        @if(session()->get('lang') == 'english')
                        {!! $news->des_en ?? null !!}
                        @else
                        {!! $news->des_bn ?? null !!}
                        @endif
                    </p>
				</div>
				<!-- ********* -->
                <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5"></div>
				<div class="row">
                    @if($moreNewsFirst && $moreNewsSecond)
					<div class="col-md-12">
                        <hr style="border: 1px solid gray">
                        <h2 class="heading">
                        @if(session()->get('lang') == 'english')
                        More News
                        @else
                        আরো সংবাদ
                        @endif
                        </h2>
                        <br>
                    </div>
                    @endif
                    @foreach($moreNewsFirst as $row)
					<div class="col-md-4 col-sm-4">
						<div class="top-news sng-border-btm">
							<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
                                <img style="height:150px" src="{{asset('storage/news_images/'.$row->image)}}" alt="Notebook">
                            </a>
							<h4 class="heading-02">
                                <a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
                                    @if(session()->get('lang') == 'english')
                                    {{ $news->news_en ?? null }}
                                    @else
                                    {{ $news->news_bn ?? null }}
                                    @endif
                                </a> 
                            </h4>
						</div>
					</div>
                    @endforeach
					
				</div>
				<div class="row">
                   @foreach($moreNewsSecond as $row)
                   <div class="col-md-4 col-sm-4">
                    <div class="top-news">
                        <a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}"><img style="height:150px" src="{{asset('storage/news_images/'.$row->image)}}" alt="Notebook"></a>
                        <h4 class="heading-02">
                            <a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
                                @if(session()->get('lang') == 'english')
                                {{ $news->news_en ?? null }}
                                @else
                                {{ $news->news_bn ?? null }}
                                @endif
                            </a> 
                        </h4>
                    </div>
                </div>
                @endforeach
			</div>
			</div>
          
			<div class="col-md-4 col-sm-4">
				<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add" style="margin-top: 15px">
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

@push('scripts')
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v15.0" nonce="cU7raxWt">
    </script>
    
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6374fd149df7ac0019318305&product=inline-share-buttons&source=platform" async="async" data-herf="{{ Request::url() }}"></script>
    
@endpush