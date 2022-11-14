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
								<div class="service-img"><a href="#">
								<img src="{{(!empty($first_section_big->image)) ? asset('storage/news_images/'.$first_section_big->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a></div>
								<div class="content">
								<h4 class="lead-heading-01"><a href="#">
									@if(session()->get('lang') == 'english')
									{{ $first_section_big->news_en ?? null }}
									@else
									{{ $first_section_big->news_bn ?? null }}
									@endif
									</a> </h4>
								</div>
							</div>
						</div>
						
					</div>
					<div class="row">
						@foreach($first_section_small as $row)
						<div class="col-md-3 col-sm-3">
							<div class="top-news">
								<a href="#"><img style="height: 100px" src="{{asset('storage/news_images/'.$row->image)}}" alt="Notebook"></a>
								<h4 class="heading-02">
									<a href="#">
									@if(session()->get('lang') == 'english')
									{{ $row->news_en ?? null }}
									@else
									{{ $row->news_bn ?? null }}
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
								 <a href="#">
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
											<a href="#"><img style="height: 100px" src="{{(!empty($firstCatPostBig->image)) ? asset('storage/news_images/'.$firstCatPostBig->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a>
											<h4 class="heading-02">
											<a href="#">
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
											<a href="#"><img src="{{asset('storage/news_images/'. $row->image)}}" alt="Notebook"></a>
											<h4 class="heading-03">
												<a href="#">
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
									<a href="#">
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
											<a href="#"><img style="height: 100px" src="{{(!empty($secondCatPostBig->image)) ? asset('storage/news_images/'.$secondCatPostBig->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a>
											<h4 class="heading-02">
												<a href="#">
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
											<a href="#"><img src="{{asset('storage/news_images/'. $row->image)}}" alt="Notebook"></a>
											<h4 class="heading-03">
											<a href="#">
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
							<a href="#">
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
									<a href="#"><img style="height: 150px" src="{{(!empty($thirdCatPostBig->image)) ? asset('storage/news_images/'.$thirdCatPostBig->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-02">
										<a href="#">
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
									<a href="#"><img src="{{asset('storage/news_images/'.$row->image)}}" alt="Notebook"></a>
									<h4 class="heading-03">
										<a href="#">
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
							<a href="#">
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
									<a href="#"><img style="height: 150px" src="{{(!empty($fourCatPostBig->image)) ? asset('storage/news_images/'.$fourCatPostBig->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-02">
										<a href="#">
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
									<a href="#"><img src="{{asset('storage/news_images/'.$row->image)}}" alt="Notebook"></a>
									<h4 class="heading-03">
										<a href="#">
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
							<a href="#">
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
									<a href="#"><img style="height: 150px" src="{{(!empty($fiveCatPostBig->image)) ? asset('storage/news_images/'.$fiveCatPostBig->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-02">
										<a href="#">
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
									<a href="#"><img src="{{asset('storage/news_images/'.$row->image)}}" alt="Notebook"></a>
									<h4 class="heading-03">
										<a href="#">
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
							<a href="#">
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
									<a href="#"><img style="height: 150px" src="{{(!empty($sixCatPostBig->image)) ? asset('storage/news_images/'.$sixCatPostBig->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a>
									<h4 class="heading-02">
										<a href="#">
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
									<a href="#"><img src="{{asset('storage/news_images/'.$row->image)}}" alt="Notebook"></a>
									<h4 class="heading-03">
										<a href="#">
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
								 <a href="#">
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
											<a href="#"><img style="height: 100px" src="{{(!empty($sevenCatPostBig->image)) ? asset('storage/news_images/'.$sevenCatPostBig->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a>
											<h4 class="heading-02">
											<a href="#">
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
											<a href="#"><img src="{{asset('storage/news_images/'. $row->image)}}" alt="Notebook"></a>
											<h4 class="heading-03">
												<a href="#">
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
									<a href="#">
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
											<a href="#"><img style="height: 100px" src="{{(!empty($eightCatPostBig->image)) ? asset('storage/news_images/'.$eightCatPostBig->image) : asset('/upload/extra.jpg') }}" alt="Notebook"></a>
											<h4 class="heading-02">
												<a href="#">
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
											<a href="#"><img src="{{asset('storage/news_images/'. $row->image)}}" alt="Notebook"></a>
											<h4 class="heading-03">
											<a href="#">
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
							<div class="cetagory-title-02"><a href="#">সারাদেশে  <i class="fa fa-angle-right" aria-hidden="true"></i> <span><i class="fa fa-plus" aria-hidden="true"></i> সব খবর  </span></a></div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="bg-gray">
								<div class="top-news">
									<a href="#"><img src="{{asset("/frontend/assets/img/news.jpg")}}" alt="Notebook"></a>
									<h4 class="heading-02"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="news-title">
								<a href="#">রোহিঙ্গা সংকট নিয়ে দ্বিচারিতা সহ্য করা হবে না : কাদের</a>
							</div>
							<div class="news-title">
								<a href="#">রোহিঙ্গা সংকট নিয়ে দ্বিচারিতা সহ্য করা হবে না : কাদের</a>
							</div>
							<div class="news-title">
								<a href="#">রোহিঙ্গা সংকট নিয়ে দ্বিচারিতা সহ্য করা হবে না : কাদের</a>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="news-title">
								<a href="#">রোহিঙ্গা সংকট নিয়ে দ্বিচারিতা সহ্য করা হবে না : কাদের</a>
							</div>
							<div class="news-title">
								<a href="#">রোহিঙ্গা সংকট নিয়ে দ্বিচারিতা সহ্য করা হবে না : কাদের</a>
							</div>
							<div class="news-title">
								<a href="#">রোহিঙ্গা সংকট নিয়ে দ্বিচারিতা সহ্য করা হবে না : কাদের</a>
							</div>
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
							<li role="presentation" class="active"><a href="#tab21" aria-controls="tab21" role="tab" data-toggle="tab" aria-expanded="false">সর্বশেষ</a></li>
							<li role="presentation" ><a href="#tab22" aria-controls="tab22" role="tab" data-toggle="tab" aria-expanded="true">জনপ্রিয়</a></li>
							<li role="presentation" ><a href="#tab23" aria-controls="tab23" role="tab" data-toggle="tab" aria-expanded="true">জনপ্রিয়1</a></li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content ">
							<div role="tabpanel" class="tab-pane in active" id="tab21">
								<div class="news-titletab">
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab22">
								<div class="news-titletab">
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
								</div>                                          
							</div>
							<div role="tabpanel" class="tab-pane fade" id="tab23">	
								<div class="news-titletab">
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
									<div class="news-title-02">
										<h4 class="heading-03"><a href="#">লালমনিরহাটে আওয়ামী লীগ কার্যালয়ে ভাঙচুর</a> </h4>
									</div>
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
					<div class="gallery_cetagory-title"> Photo Gallery </div>

					<div class="row">
	                    <div class="col-md-8 col-sm-8">
	                        <div class="photo_screen">
	                            <div class="myPhotos" style="width:100%">
                                      <img src="{{asset("/frontend/assets/img/news.jpg")}}"  alt="Avatar">
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-4 col-sm-4">
	                        <div class="photo_list_bg">
	                            
	                            <div class="photo_img photo_border active">
	                                <img src="{{asset("/frontend/assets/img/news.jpg")}}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                    ভারতে সিনেমা হলে জাতীয় সঙ্গীত বাজানো আর বাধ্যতামূলক নয়।
	                                </div>
	                            </div>

	                            <div class="photo_img photo_border">
	                                <img src="{{asset("/frontend/assets/img/news.jpg")}}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                    ভারতে সিনেমা হলে জাতীয় সঙ্গীত বাজানো আর বাধ্যতামূলক নয়।
	                                </div>
	                            </div>

	                            <div class="photo_img photo_border">
	                                <img src="{{asset("/frontend/assets/img/news.jpg")}}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                    ভারতে সিনেমা হলে জাতীয় সঙ্গীত বাজানো আর বাধ্যতামূলক নয়।
	                                </div>
	                            </div>

	                            <div class="photo_img photo_border">
	                                <img src="{{asset("/frontend/assets/img/news.jpg")}}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                    ভারতে সিনেমা হলে জাতীয় সঙ্গীত বাজানো আর বাধ্যতামূলক নয়।
	                                </div>
	                            </div>

	                            <div class="photo_img photo_border">
	                                <img src="{{asset("/frontend/assets/img/news.jpg")}}" alt="image" onclick="currentDiv(1)">
	                                <div class="heading-03">
	                                    ভারতে সিনেমা হলে জাতীয় সঙ্গীত বাজানো আর বাধ্যতামূলক নয়।
	                                </div>
	                            </div>

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
					<div class="gallery_cetagory-title"> photo Gallery </div>

					<div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="video_screen">
                                <div class="myVideos" style="width:100%">
                                    <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">
                                    <iframe width="853" height="480" src="https://www.youtube.com/embed/AWM8164ksVY?list=RDAWM8164ksVY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                        
                            <div class="gallery_sec owl-carousel">

                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <img src="{{asset("/frontend/assets/img/news.jpg")}}"  alt="Avatar">
                                    <div class="heading-03">
                                        <div class="content_padding">
                                            রোহিঙ্গা সংকট আবাদে লাভবান কৃষকেরা   
                                        </div>
                                    </div>
                                </div>

                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <img src="{{asset("/frontend/assets/img/news.jpg")}}"  alt="Avatar">
                                    <div class="heading-03">
                                        <div class="content_padding">
                                            রোহিঙ্গা সংকট আবাদে লাভবান কৃষকেরা   
                                        </div>
                                    </div>
                                </div>

                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <img src="{{asset("/frontend/assets/img/news.jpg")}}"  alt="Avatar">
                                    <div class="heading-03">
                                        <div class="content_padding">
                                            রোহিঙ্গা সংকট আবাদে লাভবান কৃষকেরা   
                                        </div>
                                    </div>
                                </div>

                                <div class="video_image" style="width:100%" onclick="currentDivs(1)">
                                    <img src="{{asset("/frontend/assets/img/news.jpg")}}"  alt="Avatar">
                                    <div class="heading-03">
                                        <div class="content_padding">
                                            রোহিঙ্গা সংকট আবাদে লাভবান কৃষকেরা   
                                        </div>
                                    </div>
                                </div>

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