
    	 @php
         function bn_date($str)
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
             return $str;
             }
     @endphp
<!-- header-start -->
<section class="hdr_section">
    <div class="container-fluid">			
        <div class="row">
            <div class="col-xs-6 col-md-2 col-sm-4">
                <div class="header_logo" style="margin-top: 15px;font-size:25px;">
                    <a href="{{ url('/') }}">
                      @if(session()->get('lang') == 'english')
                       Daily News
                       @else
                       ডেইলি নিউস
                       @endif
                         
                    </a> 
                </div>
            </div>              
            <div class="col-xs-6 col-md-8 col-sm-8">
                <div id="menu-area" class="menu_area">
                    <div class="menu_bottom">
                        <nav role="navigation" class="navbar navbar-default mainmenu">
                    <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <!-- Collection of nav links and other content for toggling -->
                            <div id="navbarCollapse" class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                    @foreach ($categories as $category)      
                                     <li>
                                     <a href="{{ route('news.category',$category->name_en)}}">
                                      @if(session()->get('lang') == 'english')
                                      {{ $category->name_en }}
                                      @else
                                     {{ $category->name_bn }}
                                      @endif
                                      </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </nav>											
                    </div>
                </div>					
            </div> 
            <div class="col-xs-12 col-md-2 col-sm-12">
                <div class="header-icon">
                    <ul>
                        <!-- version-start -->
                        @if(session()->get('lang') == 'english')
                        <li class="version"><a href="{{ route('lang.bangla') }}">বাংলা </a> সংস্করণ
                        </li>
                        @else
                        <li class="version"><a href="{{ route('lang.english') }}">English</a> Edition</li>
                        @endif
                        <!-- login-start -->
                    
                        <!-- search-start -->
                        <li><div class="search-large-divice">
                            <div class="search-icon-holder"> <a href="#" class="search-icon" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-search" aria-hidden="true"></i></a>
                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i class="fa fa-times-circle" aria-hidden="true"></i> </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="custom-search-input">
                                                            <form>
                                                                <div class="input-group">
                                                                    <input class="search form-control input-lg" placeholder="search" value="Type Here.." type="text">
                                                                    <span class="input-group-btn">
                                                                    <button class="btn btn-lg" type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                                                </span> </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></li>
                        <!-- social-start -->
                        <li>
                            <div class="dropdown">
                              <button class="dropbtn-02"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                              <div class="dropdown-content">
                                <a target="_blank" href="{{ $social->facebook }}"><i class="fa fa-facebook" aria-hidden="true"></i> Facebook</a>
                                <a target="_blank" href="{{ $social->twitter }}"><i class="fa fa-twitter" aria-hidden="true"></i> Twitter</a>
                                <a target="_blank" href="{{ $social->youtube }}"><i class="fa fa-youtube-play" aria-hidden="true"></i> Youtube</a>
                                <a target="_blank" href="{{ $social->instagram }}"><i class="fa fa-instagram" aria-hidden="true"></i> Instagram</a>
                                <a target="_blank" href="{{ $social->linkedin }}"><i class="fa fa-linkedin" aria-hidden="true"></i> Linkedin</a>
                              </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.header-close -->

  <!-- top-add-start -->
  <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                <div class="top-add"><img src="{{asset("/frontend/assets/img/top-ad.jpg")}}" alt="" /></div>
            </div>
        </div>
    </div>
</section> <!-- /.top-add-close -->

<!-- date-start -->
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="date">
                    <ul>
                        {{-- <script type="text/javascript" src="http://bangladate.appspot.com/index2.php"></script> --}}
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> 	
                        @if(session()->get('lang') == 'english')
                        Dhaka 
                        @else
                        ঢাকা 
                         @endif
                        </li>
                        <li><i class="fa fa-calendar" aria-hidden="true"></i>
                        @if(session()->get('lang') == 'english')
                          {{date('d M Y, l')}}  
                        @else
                        {{ bn_date(date('d M Y, l'))}}  
                         @endif
                        
                    </li>
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</section><!-- /.date-close -->  

<!-- notice-start -->
 
<section>
    <div class="container-fluid">
        <div class="row scroll">
            <div class="col-md-2 col-sm-3 scroll_01 ">
                @if(session()->get('lang') == 'english')
                Headline :
                @else
                শিরোনাম :
                @endif
            </div>
            <div class="col-md-10 col-sm-9 scroll_02">
               
               
                    <marquee>
                        @foreach($headlines as $headline)
                          <a href="{{ route('news.news', ['category_en' => $headline->category->name_en, 'subcategory_en' => $headline->subcategory->name_en ?? 'topic', 'id' => $headline->id])}}" style="color:white;">
                            @if(session()->get('lang') == 'english')
                            * {{ $headline->news_en }}
                            @else
                            * {{ $headline->news_bn }}
                            @endif
                          </a>
                        @endforeach 
                    </marquee>
                 
            </div>
        </div>
    </div>
</section> 