<!-- top-footer-start -->
<section>
    <div class="container-fluid">
        <div class="top-footer">
            <div class="row">
                <div class="col-md-3 col-sm-4">
                    <div class="foot-logo">
                        <img style="height: 50px;" src="{{(!empty($website->logo)) ? asset('storage/website_image/'.$website->logo) : asset('/upload/website.jpg') }}"  alt="logo">
                    </div>
                </div>
                <div class="col-md-6 col-sm-4">
                     <div class="social">
                        <ul>
                            <li><a href="{{ $social->facebook }}" target="_blank" class="facebook"> <i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ $social->twitter }}" target="_blank" class="twitter"> <i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ $social->instagram }}" target="_blank" class="instagram"> <i class="fa fa-instagram"></i></a></li>
                            <li><a href="{{ $social->linkedin }}" target="_blank" class="linkedin"> <i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{ $social->youtube }}" target="_blank" class="youtube"> <i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="apps-img">
                        <ul>
                            <li><a href="#"><img src="{{asset("/frontend/assets/img/apps-01.png")}}" alt="" /></a></li>
                            <li><a href="#"><img src="{{asset("/frontend/assets/img/apps-02.png")}}" alt="" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.top-footer-close -->

<!-- middle-footer-start -->	
<section class="middle-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="editor-one">
                    @if(session()->get('lang') == 'english')
                    Address : {{ $website->address_en }}
                @else
                    ঠিকানা : {{ $website->address_bn }} 
                @endif
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="editor-two">
              
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="editor-three">
                    @if(session()->get('lang') == 'english')
						Email : {{ $website->email }} <br>
                        Phone : {{ $website->phone_en }}
					@else
                         ইমেইল  : {{ $website->email }} <br>
                         ফোন   : {{ $website->phone_bn }}
					@endif
                </div>
            </div>
        </div>
    </div>
</section><!-- /.middle-footer-close -->

<!-- bottom-footer-start -->	
<section class="bottom-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="copyright">						
                     {{ $website->copy_right }} <br>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="btm-foot-menu">
                    <ul>
                        <li>
                            <a href="#">
                            @if(session()->get('lang') == 'english')
                              About US
                            @else
                            আমাদের সম্পর্কে
                            @endif
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                @if(session()->get('lang') == 'english')
                                 Contact US
                                @else
                                 যোগাযোগ করুন 
                                @endif
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>