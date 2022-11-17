@extends('frontend.layouts.app')

@section('content')
       
	<!-- 1st-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-8">
					<div class="row">
						<div class="col-md-1 col-sm-1 col-lg-1"></div>
						<div class="col-md-10 col-sm-10">
							<div class="lead-news">
								<div class="service-img"><a href="{{ route('news.news', ['category_en' => $first_section_big->category->name_en, 'subcategory_en' => $first_section_big->subcategory->name_en, 'id' => $first_section_big->id])}}">
								<img src="{{(!empty($first_section_big->image)) ? asset('storage/news_images/'.$first_section_big->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a></div>
								<div class="content">
								<h4 class="lead-heading-01">
									<a href="{{ route('news.news', ['category_en' => $first_section_big->category->name_en, 'subcategory_en' => $first_section_big->subcategory->name_en, 'id' => $first_section_big->id])}}">

									@if(session()->get('lang') == 'english')
									{{ $first_section_big->news_en ?? null }}
									@else
									{{ $first_section_big->news_bn ?? null }}
									@endif
									</a> 
								</h4>
								</div>
							</div>
						</div>
						
					</div>
					<div class="row">
						@foreach($first_section_small as $row)
						<div class="col-md-3 col-sm-3">
							<div class="top-news">
								<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
									<img style="height: 100px" src="{{asset('storage/news_images/'.$row->image)}}" alt="Notebook"></a>
								<h4 class="heading-02">
									<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
									@if(session()->get('lang') == 'english')
									{{ Str::limit($row->news_en,40) ?? '' }}
									@else
									{{ Str::limit($row->news_bn,40) ?? '' }}
									
									@endif
									</a> 
								</h4>
							</div>
						</div>
						@endforeach	
						
					</div>
					
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="add"><img src="{{asset("/frontend/assets/img/top-ad.jpg")}}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->	
					
					<!-- news-start -->
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title" style="font-size: 22px">	
								 @if(session()->get('lang') == 'english')
								 {{ $firstCat->name_en ?? null }}
								 @else
								 {{ $firstCat->name_bn ?? null }}
								 @endif
								 <a href="{{ route('news.category',$firstCat->name_en)}}">
									<span>
									@if(session()->get('lang') == 'english')
									More
									@else
									আরও 
									@endif
									<i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
								  </a>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											<a href="{{ route('news.news', ['category_en' => $firstCatPostBig->category->name_en, 'subcategory_en' => $firstCatPostBig->subcategory->name_en ?? 'topic', 'id' => $firstCatPostBig->id])}}">
												<img style="height: 100px" src="{{(!empty($firstCatPostBig->image)) ? asset('storage/news_images/'.$firstCatPostBig->image) : asset('/upload/extra.jpg') }}" alt="Notebook">
											</a>
											<h4 class="heading-02">
											<a href="{{ route('news.news', ['category_en' => $firstCatPostBig->category->name_en, 'subcategory_en' => $firstCatPostBig->subcategory->name_en ?? 'topic', 'id' => $firstCatPostBig->id])}}">
												@if(session()->get('lang') == 'english')
												{{ $firstCatPostBig->news_en ?? '' }}
												@else
												{{ $firstCatPostBig->news_bn ?? '' }}
												@endif
											</a> 
										    </h4>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										@foreach($firstCatPostSmall as $row)
										<div class="image-title">
											<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
												<img src="{{asset('storage/news_images/'. $row->image)}}" alt="Notebook">
											</a>
											<h4 class="heading-03">
												<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
												@if(session()->get('lang') == 'english')
												{{ Str::limit($row->news_en,30) ?? '' }}
												@else
												{{ Str::limit($row->news_bn,30) ?? '' }}
												@endif
												</a> 
											</h4>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title" style="font-size: 22px">
									@if(session()->get('lang') == 'english')
									{{ $secondCat->name_en ?? null }}
									@else
									{{ $secondCat->name_bn ?? null }}
									@endif
									<a href="{{ route('news.category',$secondCat->name_en)}}">
									   <span>
									   @if(session()->get('lang') == 'english')
									   More
									   @else
									   আরও 
									   @endif
									   <i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									 </a>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											<a href="{{ route('news.news', ['category_en' => $secondCatPostBig->category->name_en, 'subcategory_en' => $secondCatPostBig->subcategory->name_en ?? 'topic', 'id' => $secondCatPostBig->id])}}">
											<img style="height: 100px" src="{{(!empty($secondCatPostBig->image)) ? asset('storage/news_images/'.$secondCatPostBig->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a>
											<h4 class="heading-02">
												<a href="{{ route('news.news', ['category_en' => $secondCatPostBig->category->name_en, 'subcategory_en' => $secondCatPostBig->subcategory->name_en ?? 'topic', 'id' => $secondCatPostBig->id])}}">
												@if(session()->get('lang') == 'english')
												{{ $secondCatPostBig->news_en ?? '' }}
												@else
												{{ $secondCatPostBig->news_bn ?? '' }}
												@endif
												</a> 
											</h4>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										@foreach($secondCatPostSmall as $row)
										<div class="image-title">
											<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}"><img src="{{asset('storage/news_images/'. $row->image)}}" alt="Notebook"></a>
											<h4 class="heading-03">
											<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
												@if(session()->get('lang') == 'english')
												{{ Str::limit($row->news_en,30) ?? '' }}
												@else
												{{ Str::limit($row->news_bn,30) ?? '' }}
												@endif
											</a> 
										   </h4>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>					
				</div>
				<div class="col-md-3 col-sm-3">
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add"><img src="{{asset("/frontend/assets/img/add_01.jpg")}}" alt="" /></div>
						</div>
					</div><!-- /.add-close -->	
					
					@if($livetv->status == 1)
					<!-- youtube-live-start -->	
					<div class="cetagory-title-03">
						@if(session()->get('lang') == 'english')
						  LiveTv
						@else
						 লাইভ টিভি 
						@endif
					</div>
					<div class="photo">
						<div class="embed-responsive embed-responsive-16by9 embed-responsive-item" style="margin-bottom:5px;">
							{!! $livetv->embed_code !!}
						</div>
					</div><!-- /.youtube-live-close -->	
					@endif
					<!-- facebook-page-start -->
					<div class="cetagory-title-03">ফেসবুকে আমরা</div>
					<div class="fb-root">
						facebook page here
					</div><!-- /.facebook-page-close -->	
					
					<!-- add-start -->	
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								<img src="{{asset("/frontend/assets/img/add_01.jpg")}}" alt="" />
							</div>
						</div>
					</div><!-- /.add-close -->	
				</div>
			</div>
		</div>
	</section><!-- /.1st-news-section-close -->

	<!-- 2nd-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title" style="font-size: 22px">
							@if(session()->get('lang') == 'english')
							{{ $thirdCat->name_en ?? null }}
							@else
							{{ $thirdCat->name_bn ?? null }}
							@endif
							<a href="{{ route('news.category',$thirdCat->name_en)}}">
							   <span>
							   @if(session()->get('lang') == 'english')
							   More
							   @else
							   আরও 
							   @endif
							   <i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
							 </a>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="{{ route('news.news', ['category_en' => $thirdCatPostBig->category->name_en, 'subcategory_en' => $thirdCatPostBig->subcategory->name_en ?? 'topic', 'id' => $thirdCatPostBig->id])}}"><img style="height: 150px" src="{{(!empty($thirdCatPostBig->image)) ? asset('storage/news_images/'.$thirdCatPostBig->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-02">
										<a href="{{ route('news.news', ['category_en' => $thirdCatPostBig->category->name_en, 'subcategory_en' => $thirdCatPostBig->subcategory->name_en ?? 'topic', 'id' => $thirdCatPostBig->id])}}">
											@if(session()->get('lang') == 'english')
											{{ $thirdCatPostBig->news_en ?? '' }}
											@else
											{{ $thirdCatPostBig->news_bn ?? '' }}
											@endif
									    </a> 
								    </h4>
								</div>
							</div>
							
							<div class="col-md-6 col-sm-6">
								@foreach ($thirdCatPostSmall as $row)
								<div class="image-title">
									<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}"><img src="{{asset('storage/news_images/'.$row->image)}}" alt="Notebook"></a>
									<h4 class="heading-03">
										<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
											@if(session()->get('lang') == 'english')
											{{ Str::limit($row->news_en,30) ?? '' }}
											@else
											{{ Str::limit($row->news_bn,30) ?? '' }}
											@endif
									     </a> 
								     </h4>
								</div>
								@endforeach
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title" style="font-size: 22px">
							@if(session()->get('lang') == 'english')
							{{ $fourCat->name_en ?? null }}
							@else
							{{ $fourCat->name_bn ?? null }}
							@endif
							<a href="{{ route('news.category',$fourCat->name_en)}}">
							   <span>
							   @if(session()->get('lang') == 'english')
							   More
							   @else
							   আরও 
							   @endif
							   <i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
							 </a>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="{{ route('news.news', ['category_en' => $fourCatPostBig->category->name_en, 'subcategory_en' => $fourCatPostBig->subcategory->name_en ?? 'topic', 'id' => $fourCatPostBig->id])}}">
										<img style="height: 150px" src="{{(!empty($fourCatPostBig->image)) ? asset('storage/news_images/'.$fourCatPostBig->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-02">
										<a href="{{ route('news.news', ['category_en' => $fourCatPostBig->category->name_en, 'subcategory_en' => $fourCatPostBig->subcategory->name_en ?? 'topic', 'id' => $fourCatPostBig->id])}}">
											@if(session()->get('lang') == 'english')
											{{ $fourCatPostBig->news_en ?? '' }}
											@else
											{{ $fourCatPostBig->news_bn ?? '' }}
											@endif
										</a> 
									</h4>
								</div>
							</div>
							
							<div class="col-md-6 col-sm-6">
								@foreach ($fourCatPostSmall as $row)
								<div class="image-title">
									<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}" alt="Notebook">
										<img src="{{asset('storage/news_images/'.$row->image)}}" alt="Notebook"></a>
									</a>
									<h4 class="heading-03">
										<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
											@if(session()->get('lang') == 'english')
											{{ Str::limit($row->news_en,30) ?? '' }}
											@else
											{{ Str::limit($row->news_bn,30) ?? '' }}
											@endif
									     </a> 
								     </h4>
								</div>
								@endforeach
							</div>
							
							
						</div>
					</div>
				</div>
			</div>
			<!-- ******* -->
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title" style="font-size: 22px">
							@if(session()->get('lang') == 'english')
							{{ $fiveCat->name_en ?? null }}
							@else
							{{ $fiveCat->name_bn ?? null }}
							@endif
							<a href="{{ route('news.category',$fiveCat->name_en)}}">
							   <span>
							   @if(session()->get('lang') == 'english')
							   More
							   @else
							   আরও 
							   @endif
							   <i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
							 </a>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="{{ route('news.news', ['category_en' => $fiveCatPostBig->category->name_en, 'subcategory_en' => $fiveCatPostBig->subcategory->name_en ?? 'topic', 'id' => $fiveCatPostBig->id])}}"><img style="height: 150px" src="{{(!empty($fiveCatPostBig->image)) ? asset('storage/news_images/'.$fiveCatPostBig->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-02">
										<a href="{{ route('news.news', ['category_en' => $fiveCatPostBig->category->name_en, 'subcategory_en' => $fiveCatPostBig->subcategory->name_en ?? 'topic', 'id' => $fiveCatPostBig->id])}}">
											@if(session()->get('lang') == 'english')
											{{ $fiveCatPostBig->news_en ?? '' }}
											@else
											{{ $fiveCatPostBig->news_bn ?? '' }}
											@endif
										</a> 
									</h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								@foreach ($fiveCatPostSmall as $row)
								<div class="image-title">
									<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}"><img src="{{asset('storage/news_images/'.$row->image)}}" alt="Notebook"></a>
									<h4 class="heading-03">
										<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
											@if(session()->get('lang') == 'english')
											{{ Str::limit($row->news_en,30) ?? '' }}
											@else
											{{ Str::limit($row->news_bn,30) ?? '' }}
											@endif
									     </a> 
								     </h4>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="bg-one">
						<div class="cetagory-title" style="font-size: 22px">
							@if(session()->get('lang') == 'english')
							{{ $sixCat->name_en ?? null }}
							@else
							{{ $sixCat->name_bn ?? null }}
							@endif
							<a href="{{ route('news.category',$sixCat->name_en)}}">
							   <span>
							   @if(session()->get('lang') == 'english')
							   More
							   @else
							   আরও 
							   @endif
							   <i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
							 </a>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="top-news">
									<a href="{{ route('news.news', ['category_en' => $sixCatPostBig->category->name_en, 'subcategory_en' => $sixCatPostBig->subcategory->name_en ?? 'topic', 'id' => $sixCatPostBig->id])}}"><img style="height: 150px" src="{{(!empty($sixCatPostBig->image)) ? asset('storage/news_images/'.$sixCatPostBig->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-02">
										<a href="{{ route('news.news', ['category_en' => $sixCatPostBig->category->name_en, 'subcategory_en' => $sixCatPostBig->subcategory->name_en ?? 'topic', 'id' => $sixCatPostBig->id])}}">
											@if(session()->get('lang') == 'english')
											{{ $sixCatPostBig->news_en ?? '' }}
											@else
											{{ $sixCatPostBig->news_bn ?? '' }}
											@endif
										</a> 
									</h4>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								@foreach ($sixCatPostSmall as $row)
								<div class="image-title">
									<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}"><img src="{{asset('storage/news_images/'.$row->image)}}" alt="Notebook"></a>
									<h4 class="heading-03">
										<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
											@if(session()->get('lang') == 'english')
											{{ Str::limit($row->news_en,30) ?? '' }}
											@else
											{{ Str::limit($row->news_bn,30) ?? '' }}
											@endif
									     </a> 
								     </h4>
								</div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- add-start -->	
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="add"><img src="{{asset("/frontend/assets/img/top-ad.jpg")}}" alt="" /></div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="add"><img src="{{asset("/frontend/assets/img/top-ad.jpg")}}" alt="" /></div>
				</div>
			</div><!-- /.add-close -->	
			
		</div>
	</section><!-- /.2nd-news-section-close -->

	<!-- 3rd-news-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-9 col-sm-9">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title" style="font-size: 22px">	
								 @if(session()->get('lang') == 'english')
								 {{ $sevenCat->name_en ?? null }}
								 @else
								 {{ $sevenCat->name_bn ?? null }}
								 @endif
								 <a href="{{ route('news.category',$sevenCat->name_en)}}">
									<span>
									@if(session()->get('lang') == 'english')
									More
									@else
									আরও 
									@endif
									<i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
								  </a>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											<a href="{{ route('news.news', ['category_en' => $sevenCatPostBig->category->name_en, 'subcategory_en' => $sevenCatPostBig->subcategory->name_en ?? 'topic', 'id' => $sevenCatPostBig->id])}}"><img style="height: 100px" src="{{(!empty($sevenCatPostBig->image)) ? asset('storage/news_images/'.$sevenCatPostBig->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a>
											<h4 class="heading-02">
											<a href="{{ route('news.news', ['category_en' => $sevenCatPostBig->category->name_en, 'subcategory_en' => $sevenCatPostBig->subcategory->name_en ?? 'topic', 'id' => $sevenCatPostBig->id])}}">
												@if(session()->get('lang') == 'english')
												{{ $sevenCatPostBig->news_en ?? '' }}
												@else
												{{ $sevenCatPostBig->news_bn ?? '' }}
												@endif
											</a> 
										    </h4>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										@foreach($sevenCatPostSmall as $row)
										<div class="image-title">
											<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}"><img src="{{asset('storage/news_images/'. $row->image)}}" alt="Notebook"></a>
											<h4 class="heading-03">
												<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
												@if(session()->get('lang') == 'english')
												{{ Str::limit($row->news_en,30) ?? '' }}
												@else
												{{ Str::limit($row->news_bn,30) ?? '' }}
												@endif
												</a> 
											</h4>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="bg-one">
								<div class="cetagory-title" style="font-size: 22px">
									@if(session()->get('lang') == 'english')
									{{ $eightCat->name_en ?? null }}
									@else
									{{ $eightCat->name_bn ?? null }}
									@endif
									<a href="{{ route('news.category',$eightCat->name_en)}}">
									   <span>
									   @if(session()->get('lang') == 'english')
									   More
									   @else
									   আরও 
									   @endif
									   <i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
									 </a>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<div class="top-news">
											<a href="{{ route('news.news', ['category_en' => $eightCatPostBig->category->name_en, 'subcategory_en' => $eightCatPostBig->subcategory->name_en ?? 'topic', 'id' => $eightCatPostBig->id])}}"><img style="height: 100px" src="{{(!empty($eightCatPostBig->image)) ? asset('storage/news_images/'.$eightCatPostBig->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a>
											<h4 class="heading-02">
												<a href="{{ route('news.news', ['category_en' => $eightCatPostBig->category->name_en, 'subcategory_en' => $eightCatPostBig->subcategory->name_en ?? 'topic', 'id' => $eightCatPostBig->id])}}">
												@if(session()->get('lang') == 'english')
												{{ $eightCatPostBig->news_en ?? '' }}
												@else
												{{ $eightCatPostBig->news_bn ?? '' }}
												@endif
												</a> 
											</h4>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										@foreach($eightCatPostSmall as $row)
										<div class="image-title">
											<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
												<img src="{{asset('storage/news_images/'. $row->image)}}" alt="Notebook">
											</a>
											</a>
											<h4 class="heading-03">
											<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}">
												@if(session()->get('lang') == 'english')
												{{ Str::limit($row->news_en,30) ?? '' }}
												@else
												{{ Str::limit($row->news_bn,30) ?? '' }}
												@endif
											</a> 
										   </h4>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>	
					<!-- ******* -->
					<br />
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="cetagory-title" style="font-size: 22px">
								@if(session()->get('lang') == 'english')
								All Bangladesh
								@else
								সারাদেশে
								@endif
								<a href="{{ url('/') }}">
								   <span>
								   @if(session()->get('lang') == 'english')
								   More
								   @else
								   আরও 
								   @endif
								   <i class="fa fa-angle-double-right" aria-hidden="true"></i></span>
								 </a>
							</div>

						    <div class="row">
								<form action="" method="post">
									<div class="old-news-date col-md-6">
									   <input type="text" name="district_id" placeholder="District" required="">
									   <input type="text" name="subdistrict_id" placeholder="Sub District">			
									</div>
									<div class="button-type col-md-1">
										<button type="submit">
											@if(session()->get('lang') == 'english')
											Search
											@else
											খুজুন
											@endif
										</button>
									</div>
							   </form>
							</div>
							
							<div class="row">
								<div class="col-md-4 col-sm-4">
									<div class="top-news">
										<a href="{{ route('news.news', ['category_en' => $allCountrybig->category->name_en, 'subcategory_en' => $allCountrybig->subcategory->name_en ?? 'topic', 'id' => $allCountrybig->id])}}">
											<img src="{{(!empty($allCountrybig->image)) ? asset('storage/news_images/'.$allCountrybig->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a>
										<h4 class="heading-02">
											<a href="">
												@if(session()->get('lang') == 'english')
												{{ $allCountrybig->news_en ?? '' }}
												@else
												{{ $allCountrybig->news_bn ?? '' }}
												@endif
										    </a> 
										</h4>
									</div>
								</div>
								<div class="col-md-4 col-sm-4">
									@foreach ($allCountryFirst3 as $row)
									<div class="image-title">
										<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}"><img src="{{asset('storage/news_images/'.$row->image)}}" alt="Notebook"></a>
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
								<div class="col-md-4 col-sm-4">
									@foreach ($allCountrysecond3 as $row)
									<div class="image-title">
										<a href="{{ route('news.news', ['category_en' => $row->category->name_en, 'subcategory_en' => $row->subcategory->name_en ?? 'topic', 'id' => $row->id])}}"><img src="{{asset('storage/news_images/'.$row->image)}}" alt="Notebook"></a>
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
							<!-- ******* -->
							<br>
							
							
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="sidebar-add">
										<img src="assets/img/top-ad.jpg" alt="">
									</div>
								</div>
							</div><!-- /.add-close -->	
		
		
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="sidebar-add">
								<img src="{{asset("/frontend/assets/img/top-ad.jpg")}}" alt="" />
							</div>
						</div>
					</div><!-- /.add-close -->	


				</div>
				<div class="col-md-3 col-sm-3">
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
					<!-- Namaj Times -->
					<div class="cetagory-title-03">
						@if(session()->get('lang') == 'english')
					     Prayer Time
						@else
						নামাজের সময়সূচি 
					   @endif
					</div>
					<table class="table">
						@if(session()->get('lang') == 'english')
						<tr>
							<th>
								@if(session()->get('lang') == 'english')
								Fojor
								@else
								ফজর
								@endif
							</th>
							<td>{{ $namaz->fojor_en }}</td>
						</tr>

						<tr>
							<th>
								@if(session()->get('lang') == 'english')
								Johor
								@else
								জোহর
								@endif
							</th>
							<td>{{ $namaz->johr_en }}</td>
						</tr>

						<tr>
							<th>
								@if(session()->get('lang') == 'english')
								Asor
								@else
								আসর
								@endif
							</th>
							<td>{{ $namaz->asor_en }}</td>
						</tr>

						<tr>
							<th>
								@if(session()->get('lang') == 'english')
								Magrib
								@else
								মাগরিব
								@endif
							</th>
							<td>{{ $namaz->magrib_en }}</td>
						</tr>

						<tr>
							<th>
								@if(session()->get('lang') == 'english')
								Esha
								@else
								এশা
								@endif
							</th>
							<td>{{ $namaz->esha_en }}</td>
						</tr>
						<tr>
							<th>
								@if(session()->get('lang') == 'english')
								jummah
								@else
								জুম্মাহ
								@endif
							</th>
							<td>{{ $namaz->jummah_en }}</td>
						</tr>

						@else

						<tr>
							<th>
								@if(session()->get('lang') == 'english')
								Fojor
								@else
								ফজর
								@endif
							</th>
							<td>{{ $namaz->fojor_bn }}</td>
						</tr>

						<tr>
							<th>
								@if(session()->get('lang') == 'english')
								Johor
								@else
								জোহর
								@endif
							</th>
							<td>{{ $namaz->johr_bn }}</td>
						</tr>

						<tr>
							<th>
								@if(session()->get('lang') == 'english')
								Asor
								@else
								আসর
								@endif
							</th>
							<td>{{ $namaz->asor_bn }}</td>
						</tr>

						<tr>
							<th>
								@if(session()->get('lang') == 'english')
								Magrib
								@else
								মাগরিব
								@endif
							</th>
							<td>{{ $namaz->magrib_bn }}</td>
						</tr>

						<tr>
							<th>
								@if(session()->get('lang') == 'english')
								Esha
								@else
								এশা
								@endif
							</th>
							<td>{{ $namaz->esha_bn }}</td>
						</tr>
						<tr>
							<th>
								@if(session()->get('lang') == 'english')
								jummah
								@else
								জুম্মাহ
								@endif
							</th>
							<td>{{ $namaz->jummah_bn }}</td>
						</tr>
					    @endif
					</table>
					<!-- Namaj Times -->
					<div class="cetagory-title-03">পুরানো সংবাদ  </div>
					<form action="" method="post">
						<div class="old-news-date">
						   <input type="text" name="from" placeholder="From Date" required="">
						   <input type="text" name="" placeholder="To Date">			
						</div>
						<div class="old-date-button">
							<input type="submit" value="খুজুন ">
						</div>
				   </form>
				   <!-- news -->
				   <br><br><br><br><br>
				   <div class="cetagory-title-04">
					@if(session()->get('lang') == 'english')
					   Important Website
					@else
					   গুরুত্বপূর্ণ ওয়েবসাইট
					@endif
				   </div>
				   <div class="">
				   	@foreach($websitelinks as $link)
						<div class="news-title-02">
							<h4 class="heading-03">
								<a target="_blank" href="{{$link->website_link}}"><i class="fa fa-check" aria-hidden="true"></i>
								@if(session()->get('lang') == 'english')
								{{ $link->website_name_en}}
								@else
								{{ $link->website_name_bn}}
							    @endif
							  </a> 
							</h4>
						</div>
					@endforeach
				   	
				   </div>

				</div>
			</div>
		</div>
	</section><!-- /.3rd-news-section-close -->
	


	


	


	<!-- gallery-section-start -->	
	<section class="news-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-sm-7">
					<div class="gallery_cetagory-title"> 
						@if(session()->get('lang') == 'english')
						Photo Gallery 
						@else
						ছবিঘর
						@endif
					 </div>

					<div class="row">
	                    <div class="col-md-8 col-sm-8">
	                        <div class="photo_screen">
	                            <div class="myPhotos" style="width:100%">
                                      <img src="{{(!empty($photogGalleryBig->photo)) ? asset('storage/photo_images/'.$photogGalleryBig->photo) : asset('/upload/extra.jpg') }}"  alt="Avatar">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-4 col-sm-4">
	                        <div class="photo_list_bg">
								@foreach ($photogGallerySmall as $row)
								<div class="photo_img photo_border active">
	                                <img src="{{asset('storage/photo_images/'.$row->photo)}}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                    @if(session()->get('lang') == 'english')
										{{ $row->title_en}}
										@else
										{{ $row->title_bn}}
										@endif
	                                </div>
	                            </div>
								@endforeach
	                            
	                        </div>
	                    </div>
	                </div>

	                <!--=======================================
                    Video Gallery clickable jquary  start
                ========================================-->

                            <script>
                                    var slideIndex = 1;
                                    showDivs(slideIndex);

                                    function plusDivs(n) {
                                      showDivs(slideIndex += n);
                                    }

                                    function currentDiv(n) {
                                      showDivs(slideIndex = n);
                                    }

                                    function showDivs(n) {
                                      var i;
                                      var x = document.getElementsByClassName("myPhotos");
                                      var dots = document.getElementsByClassName("demo");
                                      if (n > x.length) {slideIndex = 1}
                                      if (n < 1) {slideIndex = x.length}
                                      for (i = 0; i < x.length; i++) {
                                         x[i].style.display = "none";
                                      }
                                      for (i = 0; i < dots.length; i++) {
                                         dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                                      }
                                      x[slideIndex-1].style.display = "block";
                                      dots[slideIndex-1].className += " w3-opacity-off";
                                    }
                                </script>

                <!--=======================================
                    Video Gallery clickable  jquary  close
                =========================================-->

				</div>
				<div class="col-md-4 col-sm-5">
					<div class="gallery_cetagory-title"> 
						@if(session()->get('lang') == 'english')
						Vedio Gallery 
						@else
						ভিডিও গ্যালারি
						@endif
					 </div>

					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                    <iframe width="853" height="480" src="https://www.youtube.com/embed/{{$vediogGalleryBig->embed_code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        
                            <div class="gallery_sec owl-carousel">
                                @foreach($vediogGallerySmall as $row)
								<div class="video_image" style="width:100%" onclick="currentDivs(1)">
									<iframe width="120" height="90" src="https://www.youtube.com/embed/{{ $row->embed_code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <div class="heading-03">
                                        <div class="content_padding">
											@if(session()->get('lang') == 'english')
											{{ $row->title_en}}
											@else
											{{ $row->title_bn}}
											@endif
                                        </div>
                                    </div>
                                </div> 
								@endforeach
                            </div>
                        </div>
                    </div>


                    <script>
                        var slideIndex = 1;
                        showDivss(slideIndex);

                        function plusDivs(n) {
                          showDivss(slideIndex += n);
                        }

                        function currentDivs(n) {
                          showDivss(slideIndex = n);
                        }

                        function showDivss(n) {
                          var i;
                          var x = document.getElementsByClassName("myVideos");
                          var dots = document.getElementsByClassName("demo");
                          if (n > x.length) {slideIndex = 1}
                          if (n < 1) {slideIndex = x.length}
                          for (i = 0; i < x.length; i++) {
                             x[i].style.display = "none";
                          }
                          for (i = 0; i < dots.length; i++) {
                             dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
                          }
                          x[slideIndex-1].style.display = "block";
                          dots[slideIndex-1].className += " w3-opacity-off";
                        }
                    </script>

				</div>
			</div>
		</div>
	</section><!-- /.gallery-section-close -->


@endsection