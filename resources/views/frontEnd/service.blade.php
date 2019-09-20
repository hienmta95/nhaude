<!DOCTYPE html>
<html lang="zxx">
<head>
    
    <meta charset="utf-8">
<title>{{$PageTitle}} {{($PageTitle !="")? "|":""}} {{ Helper::GeneralSiteSettings("site_title_" . trans('backLang.boxCode')) }}</title>
<meta name="description" content="{{$PageDescription}}"/>
<meta name="keywords" content="{{$PageKeywords}}"/>
<meta name="author" content="{{ url('/') }}"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<link href="{{ nhaude_asset('frontEnd/css/bootstrap.min.css') }}" rel="stylesheet"/>
<link href="{{ nhaude_asset('frontEnd/css/fancybox/jquery.fancybox.css') }}" rel="stylesheet">
<link href="{{ nhaude_asset('frontEnd/css/jcarousel.css') }}" rel="stylesheet"/>
<link href="{{ nhaude_asset('frontEnd/css/flexslider.css') }}" rel="stylesheet"/>
<link href="{{ nhaude_asset('frontEnd/css/style.css') }}" rel="stylesheet"/>
<link href="{{ nhaude_asset('frontEnd/css/color.css') }}" rel="stylesheet"/>
@if( trans('backLang.direction')=="rtl")
<link href="{{ nhaude_asset('frontEnd/css/rtl.css') }}" rel="stylesheet"/>
@endif

<!-- Favicon and Touch Icons -->
@if(Helper::GeneralSiteSettings("style_fav") !="")
    <link href="{{ nhaude_asset('uploads/settings/'.Helper::GeneralSiteSettings("style_fav")) }}" rel="shortcut icon"
          type="image/png">
@else
    <link href="{{ nhaude_asset('uploads/settings/nofav.png') }}" rel="shortcut icon" type="image/png">
@endif
@if(Helper::GeneralSiteSettings("style_apple") !="")
    <link href="{{ nhaude_asset('uploads/settings/'.Helper::GeneralSiteSettings("style_apple")) }}" rel="apple-touch-icon">
    <link href="{{ nhaude_asset('uploads/settings/'.Helper::GeneralSiteSettings("style_apple")) }}" rel="apple-touch-icon"
          sizes="72x72">
    <link href="{{ nhaude_asset('uploads/settings/'.Helper::GeneralSiteSettings("style_apple")) }}" rel="apple-touch-icon"
          sizes="114x114">
    <link href="{{ nhaude_asset('uploads/settings/'.Helper::GeneralSiteSettings("style_apple")) }}" rel="apple-touch-icon"
          sizes="144x144">
@else
    <link href="{{ nhaude_asset('uploads/settings/nofav.png') }}" rel="apple-touch-icon">
    <link href="{{ nhaude_asset('uploads/settings/nofav.png') }}" rel="apple-touch-icon" sizes="72x72">
    <link href="{{ nhaude_asset('uploads/settings/nofav.png') }}" rel="apple-touch-icon" sizes="114x114">
    <link href="{{ nhaude_asset('uploads/settings/nofav.png') }}" rel="apple-touch-icon" sizes="144x144">
@endif

{{-- Google Tags and google analytics --}}
@if($WebmasterSettings->google_tags_status && $WebmasterSettings->google_tags_id !="")
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','{!! $WebmasterSettings->google_tags_id !!}');</script>
    <!-- End Google Tag Manager -->
@endif
@stack('css')
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="{{ nhaude_asset('frontEnd/daotao/img/logos/logo-shortcut.png') }}"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Bootstrap CSS-->
  <link rel="stylesheet" type="text/css" href="{{ nhaude_asset('frontEnd/daotao/css/bootstrap.min.css') }}">

  <!-- Font-Awesome -->
  <link rel="stylesheet" type="text/css" href="{{ nhaude_asset('frontEnd/daotao/css/font-awesome.css') }}">

  <!-- Icomoon -->
  <link rel="stylesheet" type="text/css" href="{{ nhaude_asset('frontEnd/daotao/css/icomoon.css') }}/">

  <!-- Slider -->
  <link rel="stylesheet" type="text/css" href="{{ nhaude_asset('frontEnd/daotao/css/swiper.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ nhaude_asset('frontEnd/daotao/css/slider.css') }}">

  <!-- Animate.css -->
  <link rel="stylesheet" href="{{ nhaude_asset('frontEnd/daotao/css/animate.css') }}">

  <!-- Color Switcher -->
  <link rel="stylesheet" type="text/css" href="{{ nhaude_asset('frontEnd/daotao/css/switcher.css') }}">

  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="{{ nhaude_asset('frontEnd/daotao/css/owl.carousel.css') }}">

  <!-- Main Styles -->
  <link rel="stylesheet" type="text/css" href="{{ nhaude_asset('frontEnd/daotao/css/default.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ nhaude_asset('frontEnd/daotao/css/styles.css') }}" id="colors">

  <!-- Fonts Google -->
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

</head>
<body>


<!-- Preloader Start-->
<div id="preloader">
  <div class="row loader">
    <div class="loader-icon"></div>
  </div>
</div>
<!-- Preloader End -->




<!-- Navbar START -->
<header>
  <nav id="navigation4" class="container navigation">
    <div class="nav-header">
      <a class="nav-brand" href="index.html">
        <img src="{{ nhaude_asset('uploads/settings/'.Helper::GeneralSiteSettings("style_logo_" . trans('backLang.boxCode'))) }}" class="main-logo" alt="logo" id="main_logo">
      </a>
      <div class="nav-toggle"></div>
    </div>
    <div class="nav-menus-wrapper">
      <ul class="nav-menu align-to-right">
          
          
          
          @if(Helper::GeneralWebmasterSettings("header_menu_id") >0)
    <?php
    // Get list of footer menu links by group Id
    $HeaderMenuLinks = Helper::MenuList(Helper::GeneralWebmasterSettings("header_menu_id"));
    ?>
    @if(count($HeaderMenuLinks)>0)

        <?php
        // Current Full URL
        $fullPagePath = Request::url();
        // Char Count of Backend folder Plus 1
        $envAdminCharCount = strlen(backendPath()) + 1;
        // URL after Root Path EX: admin/home
        $urlAfterRoot = substr($fullPagePath, strpos($fullPagePath, backendPath()) + $envAdminCharCount);
        ?>
        <?php
        $category_title_var = "title_" . trans('backLang.boxCode');
        $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
        $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');

        ?>
         <div class="nav-menus-wrapper">
      <ul class="nav-menu align-to-right">
          
                <?php
                $link_title_var = "title_" . trans('backLang.boxCode');
                ?>
                @foreach($HeaderMenuLinks as $HeaderMenuLink)
                    @if($HeaderMenuLink->type==3)
                        <?php
                        // Section with drop list
                        ?>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle " data-toggle="dropdown"
                               data-hover="dropdown"
                               data-delay="0" data-close-others="true">{{ $HeaderMenuLink->$link_title_var }} </a>

                            @if(count($HeaderMenuLink->webmasterSection->sections) >0)
                                {{--categories drop down--}}
                                <ul class="dropdown-menu">
                                    @foreach($HeaderMenuLink->webmasterSection->sections as $MnuCategory)
                                        @if($MnuCategory->father_id ==0)
                                            <li>
                                                <?php
                                                if ($MnuCategory->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                if (trans('backLang.code') != defaultLanguage()) {
                                                $Category_link_url = url(trans('backLang.code')."/" .$MnuCategory->$slug_var);
                                                }else{
                                                $Category_link_url = url($MnuCategory->$slug_var);
                                                }
                                                } else {
                                                if (trans('backLang.code') != defaultLanguage()) {
                                                $Category_link_url = route('FrontendTopicsByCatWithLang', ["lang"=>trans('backLang.code'),"section" => $HeaderMenuLink->webmasterSection->name, "cat" => $MnuCategory->id]);
                                                }else{
                                                $Category_link_url = route('FrontendTopicsByCat', ["section" => $HeaderMenuLink->webmasterSection->name, "cat" => $MnuCategory->id]);
                                                }
                                                }
                                                ?>

                                                <a href="{{ $Category_link_url }}">
                                                    @if($MnuCategory->icon !="")
                                                        <i class="fa {{$MnuCategory->icon}}"></i> &nbsp;
                                                    @endif
                                                    {{$MnuCategory->$category_title_var}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @elseif(count($HeaderMenuLink->webmasterSection->topics) >0)
                                {{--topics drop down--}}
                                <ul class="dropdown-menu">
                                    @foreach($HeaderMenuLink->webmasterSection->topics as $MnuTopic)
                                        @if($MnuTopic->expire_date =='' || ($MnuTopic->expire_date !='' && $MnuTopic->expire_date >= date("Y-m-d")))
                                            <li>
                                                <?php
                                                if ($MnuTopic->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                if (trans('backLang.code') != defaultLanguage()) {
                                                $topic_link_url = url(trans('backLang.code')."/" .$MnuTopic->$slug_var);
                                                }else{
                                                $topic_link_url = url($MnuTopic->$slug_var);
                                                }
                                                } else {
                                                if (trans('backLang.code') != defaultLanguage()) {
                                                $topic_link_url = route('FrontendTopicByLang', ["lang"=>trans('backLang.code'),"section" => $HeaderMenuLink->webmasterSection->name, "id" => $MnuTopic->id]);
                                                }else{
                                                $topic_link_url = route('FrontendTopic', ["section" => $HeaderMenuLink->webmasterSection->name, "id" => $MnuTopic->id]);
                                                }
                                                }
                                                ?>
                                                <a href="{{ $topic_link_url }}">
                                                    @if($MnuTopic->icon !="")
                                                        <i class="fa {{$MnuTopic->icon}}"></i> &nbsp;
                                                    @endif
                                                    {{$MnuTopic->$category_title_var}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif

                        </li>
                    @elseif($HeaderMenuLink->type==2)
                        <?php
                        // Section Link
                        ?>
                        <li>
                            <?php
                            if ($HeaderMenuLink->webmasterSection->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                            if (trans('backLang.code') != defaultLanguage()) {
                            $mmnnuu_link = url(trans('backLang.code')."/" .$HeaderMenuLink->webmasterSection->$slug_var);
                            }else{
                            $mmnnuu_link = url($HeaderMenuLink->webmasterSection->$slug_var);
                            }
                            }else{
                            if (trans('backLang.code') != defaultLanguage()) {
                            $mmnnuu_link =url(trans('backLang.code')."/" .$HeaderMenuLink->webmasterSection->name);
                            }else{
                            $mmnnuu_link =url($HeaderMenuLink->webmasterSection->name);
                            }
                            }
                            ?>
                            <a href="{{ $mmnnuu_link }}">{{ $HeaderMenuLink->$link_title_var }}</a>
                        </li>
                    @elseif($HeaderMenuLink->type==1)
                        <?php
                        // Direct Link
                        if (trans('backLang.code') != defaultLanguage()) {
                        $this_link_url = url(trans('backLang.code')."/" .$HeaderMenuLink->link);
                        }else{
                        $this_link_url = url($HeaderMenuLink->link);
                        }
                        ?>
                        <li><a href="{{ $this_link_url }}">{{ $HeaderMenuLink->$link_title_var }}</a></li>
                    @else
                        <?php
                        // Main title ( have drop down menu )
                        ?>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle " data-toggle="dropdown"
                               data-hover="dropdown"
                               data-delay="0" data-close-others="true">{{ $HeaderMenuLink->$link_title_var }}</a>
                            @if(count($HeaderMenuLink->subMenus) >0)
                                <ul class="dropdown-menu">
                                    @foreach($HeaderMenuLink->subMenus as $subMenu)
                                        @if($subMenu->type==3)
                                            <?php
                                            // sub menu - Section will drop list
                                            ?>
                                            <li><a href="javascript:void(0)" class="dropdown-toggle "
                                                   data-toggle="dropdown"
                                                   data-hover="dropdown" data-delay="0"
                                                   data-close-others="true">{{ $subMenu->$link_title_var }}</a>
                                                <?php
                                                // make list
                                                // - check is categories list
                                                // - or pages list
                                                ?>

                                                @if(count($subMenu->webmasterSection->sections) >0)
                                                    {{--categories drop down--}}
                                                    <ul class="dropdown-menu">
                                                        @foreach($subMenu->webmasterSection->sections as $SubMnuCategory)
                                                            @if($SubMnuCategory->father_id ==0)
                                                                <li>
                                                                    <?php
                                                                    if ($SubMnuCategory->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                                    if (trans('backLang.code') != defaultLanguage()) {
                                                                    $Category_link_url = url(trans('backLang.code')."/" .$SubMnuCategory->$slug_var);
                                                                    }else{
                                                                    $Category_link_url = url($SubMnuCategory->$slug_var);
                                                                    }
                                                                    } else {
                                                                    if (trans('backLang.code') != defaultLanguage()) {
                                                                    $Category_link_url = route('FrontendTopicsByCatWithLang', ["lang"=>trans('backLang.code'),"section" => $subMenu->webmasterSection->name, "cat" => $SubMnuCategory->id]);
                                                                    }else{
                                                                    $Category_link_url = route('FrontendTopicsByCat', ["section" => $subMenu->webmasterSection->name, "cat" => $SubMnuCategory->id]);
                                                                    }
                                                                    }
                                                                    ?>

                                                                    <a href="{{ $Category_link_url }}">
                                                                        @if($SubMnuCategory->icon !="")
                                                                            <i class="fa {{$SubMnuCategory->icon}}"></i>
                                                                            &nbsp;
                                                                        @endif
                                                                        {{$SubMnuCategory->$category_title_var}}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @elseif(count($subMenu->webmasterSection->topics) >0)
                                                    {{--topics drop down--}}
                                                    <ul class="dropdown-menu">
                                                        @foreach($subMenu->webmasterSection->topics as $SubMnuTopic)
                                                            @if($SubMnuTopic->expire_date =='' || ($SubMnuTopic->expire_date !='' && $SubMnuTopic->expire_date >= date("Y-m-d")))
                                                                <li>
                                                                    <?php
                                                                    if ($SubMnuTopic->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                                    if (trans('backLang.code') != defaultLanguage()) {
                                                                    $topic_link_url = url(trans('backLang.code')."/" .$SubMnuTopic->$slug_var);
                                                                    }else{
                                                                    $topic_link_url = url($SubMnuTopic->$slug_var);
                                                                    }
                                                                    } else {
                                                                    if (trans('backLang.code') != defaultLanguage()) {
                                                                    $topic_link_url = route('FrontendTopicByLang',["lang"=>trans('backLang.code'),"id"=>$SubMnuTopic->id]);
                                                                    }else{
                                                                    $topic_link_url = route('FrontendTopic',$SubMnuTopic->id);
                                                                    }
                                                                    }
                                                                    ?>
                                                                    <a href="{{ $topic_link_url }}">{{$SubMnuTopic->$category_title_var}}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @endif

                                            </li>
                                        @elseif($subMenu->type==2)
                                            <?php
                                            // sub menu - Section Link
                                            ?>
                                            <li>
                                                <?php
                                                if ($subMenu->webmasterSection->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                if (trans('backLang.code') != defaultLanguage()) {
                                                $mmnnuu_link = url(trans('backLang.code')."/" .$subMenu->webmasterSection->$slug_var);
                                                }else{
                                                $mmnnuu_link = url($subMenu->webmasterSection->$slug_var);
                                                }
                                                }else{
                                                if (trans('backLang.code') != defaultLanguage()) {
                                                $mmnnuu_link =url(trans('backLang.code')."/" .$subMenu->webmasterSection->name);
                                                }else{
                                                $mmnnuu_link =url($subMenu->webmasterSection->name);
                                                }
                                                }
                                                ?>
                                                <a href="{{ $mmnnuu_link }}">{{ $subMenu->$link_title_var }}</a>
                                            </li>
                                        @elseif($subMenu->type==1)
                                            <?php
                                            // sub menu - Direct Link
                                            ?>
                                            <li><a href="{{ url($subMenu->link) }}">{{ $subMenu->$link_title_var }}</a>
                                            </li>
                                        @else
                                            <?php
                                            // sub menu - Main title ( have drop down menu )
                                            ?>
                                            <li><a href="javascript:void(0)">{{ $subMenu->$link_title_var }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endif
                @endforeach

            </ul>
        </div>
    @endif
@endif
          
          
          
          
          
          
          
          
          
      </ul>
    </div>
  </nav>
</header>
<!-- Navbar END -->


<!-- Parallax Slider START -->
<div class="swiper-container" id="swiper-parallax">
  <div class="parallax-bg" style="background-image:url({{ nhaude_asset('uploads/topics/'.$customFields->slide)}})" data-swiper-parallax="-23%"></div>
  <div class="swiper-wrapper">
    <!-- Slide 1 Start -->
    <div class="swiper-slide">
      <div class="container">
        <div class="slider-content left-holder">
         
          <div class="row">
            <div class="col-md-6 col-sm-12 col-12">
              <p class="animated fadeInDown">
                  
                   
                       <p>
                             {!! $customFields->mo_ta !!}
                       </p>
               
              
              </p>
            </div>
          </div>
          <div class="animated fadeInUp mt-30">
            <a href="tel:0932960909‬" class="dark-button button-md">Tư vấn: 0932 96 09 09</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Slide 1 End -->

  </div>

 
</div>
<!-- Parallax Slider END -->


<!-- Info Section START -->
<div class="section-block pb-0">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-6 col-12">
        <div class="section-heading mt-30">
          <span>Thông tin khóa học</span>
          <h4>ĐỐI TƯỢNG THAM GIA</h4>
          <div class="section-heading-line-left"></div>
        </div>
        <div class="text-content mt-25">
          <p>  {!! $customFields->doi_tuong !!}.</p>
        </div>
        <div class="mt-25">
          <a href="#" class="primary-button button-md"><i class="fa fa-caret-right"></i> Đăng ký khóa học</a>
        </div>
      </div>
      <div class="col-md-7 col-sm-6 col-12">
        <img src="{{ nhaude_asset('frontEnd/img/doi-tuong-tham-gia-lop-noi-that-3d-917.jpg') }}" alt="image">
      </div>
    </div>
  </div>
</div>
<!-- Info Section END -->




<!-- Feature Boxes Section START -->
<div class="section-block-bg section-md" style="background-image: url(http://www.namtek.ca/files/2014/12/Parallax-Background-Dark-11.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-12">
        <div class="pr-30-md">
          <div class="section-heading white-color mt-30">
            <span>Bạn có biết</span>
            <h2><strong>Vì sao chọn Refber?</strong></h2>
           
            <div class="section-heading-line-left"></div>
          </div>
          <div class="text-content white-color mt-25">
            <p>Xét về Quy mô đầu tư, số nhân sự quản lý, mức độ cạnh tranh khốc liệt và cả tiềm năng to lớn của ngành kinh doanh dịch vụ Nhà hàng/ quán café thì chủ nhà hàng ăn, chủ quán café,… không khác bất cứ người lãnh đạo, giám đốc doanh nghiệp kinh doanh nào khác.</br>
Vậy nhưng, nhiều ông chủ/ bà chủ nhà hàng, quán cafe lại không cho mình là lãnh đạo doanh nghiệp. Và họ thờ ơ trong việc trang bị kiến thức, tầm nhìn của người quản trị. Và vì thế, họ dễ dàng đẩy mình vào con đường THẤT BẠI.</p>
          </div>
          <div class="mt-20">
            <ul class="white-list">
              <li><i class="fa fa-caret-right"></i>Nội dung chương trình bám sát thực tế</li>
              <li><i class="fa fa-caret-right"></i>Áp dụng trực tiếp vào mô hình quý khách</li>
              <li><i class="fa fa-caret-right"></i>Định hướng bước đi an toán</li>
            </ul>
          </div>
          <a href="#" class="primary-button button-md mt-25">Đăng ký khóa học</a>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-12">
        <div class="row">

          <div class="col-md-6 col-sm-6 col-12">
            <div class="feature-box">
              <i class="icon-clock2"></i>
              <h4>THỜI GIAN LINH HOẠT</h4>
              <p>Thời gian đào tạo linh hoạt theo nhu cầu của học viên, giúp học viên vừa học vừa chủ động trong công việc.</p>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-12">
            <div class="feature-box">
              <i class="icon-wallet2"></i>
              <h4>KIẾN THỨC TỪ THỰC TẾ</h4>
              <p>90% chuyên gia đào tạo là những doanh nhân, kinh doanh thành công các nhà hàng/ quán café, doanh nghiệp F&B.</p>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-12">
            <div class="feature-box">
              <i class="icon-bar-graph-12"></i>
              <h4>ĐÀO TẠO 1-1</h4>
              <p>Mỗi module về đào tạo quản lý sẽ có chuyên gia phù hợp, giàu kinh nghiệm đào tạo riêng và phù hợp với mô hình, nhu cầu kinh doanh của học viên.</p>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-12">
            <div class="feature-box">
              <i class="icon-piggy-bank3"></i>
              <h4>NỘI DUNG CHYÊN BIỆT</h4>
              <p>Chương trình đào tạo xây dựng gắn với mô hình thực tế của từng học viên. Chuyên gia nghiên cứu mô hình trước khi xây dựng nội dung đào tạo phù hợp.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- Feature Boxes Section END -->


<!-- Testmonials START -->
<div class="section-block">
  <div class="container">
    <div class="section-heading center-holder">
      <span>Thông tin</span>
      <h3>Nội dung khóa học</h3>
      <div class="section-heading-line"></div>
    </div>
    <div class="row mt-50">
      <div class="col-md-6 col-sm-6 col-12">
        <div class="noidung">
          <div class="row">
          <p>  {!! $customFields->noidung1 !!}.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-sm-6 col-12">
        <div class="noidung">
          <div class="row">
        <p>  {!! $customFields->noidung2 !!}.</p>
          </div>
        </div>
      </div>

     

   
    </div>
  </div>
</div>
<!-- Testmonials END -->


<!-- Services Carousel START -->
<div class="section-block-grey">
  <div class="container">
    <div class="section-heading center-holder">
      <span>Thông tin</span>
      <h3>Chuyên gia đào tạo</h3>
      <div class="section-heading-line"></div>
      <p>Refber Việt Nam cùng với đội ngũ chuyên gia với kinh nghiệm thực tế.</p>
    </div>
    <div class="owl-carousel owl-theme mt-50" id="services-carousel">
      <div class="service-box">
       
        
       
        <img src="{{ nhaude_asset('uploads/topics/'. $customFields->chuyengia1 ) }}" class="img-responsive"
             >
 <p>  {!! $customFields->gioithieuchuyengia1 !!}.</p>
      </div>

      <div class="service-box">
       
        <img src="{{ nhaude_asset('uploads/topics/'. $customFields->chuyengia2 ) }}" class="img-responsive"
             >
 <p>  {!! $customFields->gioithieuchuyengia2 !!}.</p>
 
      </div>

      <div class="service-box">
       
        <img src="{{ nhaude_asset('uploads/topics/'.$customFields->chuyengia3 ) }}" class="img-responsive"
             >
 <p>  {!! $customFields->gioithieuchuyengia3 !!}.</p>
      </div>

      <div class="service-box">
         
        <img src="{{ nhaude_asset('uploads/topics/'.$customFields->chuyengia4 ) }}" class="img-responsive"
             >
 <p>  {!! $customFields->gioithieuchuyengia4 !!}.</p>
      </div>

      <div class="service-box">
         
        <img src="{{ nhaude_asset('uploads/topics/'.$customFields->chuyengia5 ) }}" class="img-responsive"
             >
 <p>  {!! $customFields->gioithieuchuyengia5 !!}.</p>
      </div>
    </div>
  </div>
</div>
<!-- Services Carousel END -->


<!-- Feedback Section START -->
<div class="section-block">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-12">
        <div class="pr-30-md">
          <div class="section-heading">
            <h4>Học phí</h4>
            <div class="section-heading-line-left"></div>
          </div>
          <div class="text-content-big mt-25">
           <p>  {!! $customFields->hocphi !!}.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-12">
        <div class="feedback-box">
          <h3>ĐĂNG KÝ KHÓA HỌC</h3>
       
       
        <div class="fooFormMain" id="fooForm">
            <div class="pagewrap fooForm">
                <div class="tit wow fadeInDown" style="visibility: visible; animation-name: fadeInDown;"></br></br>
                </div>

                <div id="sendmessage"><i class="fa fa-check-circle"></i>
                    &nbsp;{{ trans('frontLang.youMessageSent') }}</div>
                <div id="errormessage">{{ trans('frontLang.youMessageNotSent') }}</div>

                {{Form::open(['route'=>['contactPage'],'method'=>'POST','class'=>'contactForm formBox'])}}
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::text('contact_name',"", array('placeholder' => trans('frontLang.yourName'),'class' => 'form-control','id'=>'name', 'data-msg'=> trans('frontLang.enterYourName'),'data-rule'=>'minlen:4')) !!}
                        <div class="alert alert-warning validation"></div>
                    </div>
                    <div class="form-group">
                        {!! Form::email('contact_email',"", array('placeholder' => trans('frontLang.yourEmail'),'class' => 'form-control','id'=>'email', 'data-msg'=> trans('frontLang.enterYourEmail'),'data-rule'=>'email')) !!}
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        {!! Form::text('contact_phone',"", array('placeholder' => trans('frontLang.phone'),'class' => 'form-control','id'=>'phone', 'data-msg'=> trans('frontLang.enterYourPhone'),'data-rule'=>'minlen:4')) !!}
                        <div class="validation"></div>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="form-group">
                        {!! Form::text('contact_subject',"", array('placeholder' => trans('frontLang.subject'),'class' => 'form-control','id'=>'subject', 'data-msg'=> trans('frontLang.enterYourSubject'),'data-rule'=>'minlen:4')) !!}
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        {!! Form::textarea('contact_message','', array('placeholder' => trans('frontLang.message'),'class' => 'form-control','id'=>'message','rows'=>'3', 'data-msg'=> trans('frontLang.enterYourMessage'),'data-rule'=>'required')) !!}
                        <div class="validation"></div>
                    </div>
                </div>

                @if(env('NOCAPTCHA_STATUS', false))
                    <div class="form-group">
                        {!! NoCaptcha::renderJs(trans('backLang.code')) !!}
                        {!! NoCaptcha::display() !!}
                    </div>
                @endif

                {{Form::close()}}

                <div style="clear: both; padding-bottom: 30px;">
                    <button style="float: right; margin: 10px 20px 20px;" id="service-submit" class="btn btn-main">ĐĂNG KÝ NGAY</button>
                </div>
                <br>


            </div>
        </div>
      
    </div>

       
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Feedback Section END -->


<!-- Footer START -->
 <!-- start footer -->
@include('frontEnd.includes.footer')
<!-- end footer -->
</div>
@include('frontEnd.includes.foot')
@yield('footerInclude')

@if(Helper::GeneralSiteSettings("style_preload"))
    <div id="preloader"></div>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(window).load(function () {
                $('#preloader').fadeOut('slow', function () {
                    // $(this).remove();
                });
            });
        });
    </script>
@endif
@if(Helper::GeneralSiteSettings("style_header"))
    <script type="text/javascript">
        window.onscroll = function () {
            myFunction()
        };
        var header = document.getElementsByTagName("header")[0];
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    </script>
@endif
@stack('scripts')
<!-- Footer END -->





<!-- Jquery -->
<script src="{{ nhaude_asset('frontEnd/daotao/js/jquery.min.js') }}"></script>

<!--Popper JS-->
<script src="{{ nhaude_asset('frontEnd/daotao/js/popper.min.js') }}"></script>

<!-- Owl Carousel-->
<script src="{{ nhaude_asset('frontEnd/daotao/js/owl.carousel.js') }}"></script>

<!-- Navbar JS -->
<script src="{{ nhaude_asset('frontEnd/daotao/js/navigation.js') }}"></script>
<script src="{{ nhaude_asset('frontEnd/daotao/js/navigation.fixed.js') }}"></script>

<!-- Wow JS -->
<script src="{{ nhaude_asset('frontEnd/daotao/js/wow.min.js') }}"></script>

<!-- Countup -->
<script src="{{ nhaude_asset('frontEnd/daotao/js/jquery.counterup.min.js') }}"></script>
<script src="{{ nhaude_asset('frontEnd/daotao/js/waypoints.min.js') }}/"></script>

<!-- Tabs -->
<script src="{{ nhaude_asset('frontEnd/daotao/js/tabs.min.js') }}"></script>

<!-- Isotop -->
<script src="{{ nhaude_asset('frontEnd/daotao/js/isotope.pkgd.min.js') }}"></script>

<!-- Swiper Slider -->
<script src="{{ nhaude_asset('frontEnd/daotao/js/swiper.min.js') }}"></script>

<!-- Modernizr -->
<script src="{{ nhaude_asset('frontEnd/daotao/js/modernizr.js') }}"></script>

<!-- Switcher JS -->
<script src="{{ nhaude_asset('frontEnd/daotao/js/switcher.js') }}"></script>

<!-- Google Map -->
<script src="{{ nhaude_asset('frontEnd/daotao/js/map.js') }}"></script>

<!-- Main JS -->
<script src="{{ nhaude_asset('frontEnd/daotao/js/main.js') }}"></script>



    <script type="text/javascript">

        jQuery(document).ready(function ($) {
            "use strict";

            var formRe = $('form.contactForm');
            //Contact
            $('body').on('click','#service-submit', function (e) {
                e.preventDefault();

                console.log('asas');
                var f = formRe.find('.form-group'),
                    ferror = false,
                    emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

                f.children('input').each(function () { // run all inputs

                    var i = $(this); // current input
                    var rule = i.attr('data-rule');

                    if (rule !== undefined) {
                        var ierror = false; // error flag for current input
                        var pos = rule.indexOf(':', 0);
                        if (pos >= 0) {
                            var exp = rule.substr(pos + 1, rule.length);
                            rule = rule.substr(0, pos);
                        } else {
                            rule = rule.substr(pos + 1, rule.length);
                        }

                        switch (rule) {
                            case 'required':
                                if (i.val() === '') {
                                    ferror = ierror = true;
                                }
                                break;

                            case 'minlen':
                                if (i.val().length < parseInt(exp)) {
                                    ferror = ierror = true;
                                }
                                break;

                            case 'email':
                                if (!emailExp.test(i.val())) {
                                    ferror = ierror = true;
                                }
                                break;

                            case 'checked':
                                if (!i.attr('checked')) {
                                    ferror = ierror = true;
                                }
                                break;

                            case 'regexp':
                                exp = new RegExp(exp);
                                if (!exp.test(i.val())) {
                                    ferror = ierror = true;
                                }
                                break;
                        }
                        i.next('.validation').html('<i class=\"fa fa-info\"></i> &nbsp;' + ( ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '' )).show();
                        !ierror ? i.next('.validation').hide() : i.next('.validation').show();
                    }
                });
                f.children('textarea').each(function () { // run all inputs

                    var i = $(this); // current input
                    var rule = i.attr('data-rule');

                    if (rule !== undefined) {
                        var ierror = false; // error flag for current input
                        var pos = rule.indexOf(':', 0);
                        if (pos >= 0) {
                            var exp = rule.substr(pos + 1, rule.length);
                            rule = rule.substr(0, pos);
                        } else {
                            rule = rule.substr(pos + 1, rule.length);
                        }

                        switch (rule) {
                            case 'required':
                                if (i.val() === '') {
                                    ferror = ierror = true;
                                }
                                break;

                            case 'minlen':
                                if (i.val().length < parseInt(exp)) {
                                    ferror = ierror = true;
                                }
                                break;
                        }
                        i.next('.validation').html('<i class=\"fa fa-info\"></i> &nbsp;' + ( ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '' )).show();
                        !ierror ? i.next('.validation').hide() : i.next('.validation').show();
                    }
                });
                if (ferror) return false;
                else var str = formRe.serialize();
                var xhr = $.ajax({
                    type: "POST",
                    url: "<?php echo route("contactPageSubmit"); ?>",
                    data: str,
                    success: function (msg) {
                        if (msg == 'OK') {
                            $("#sendmessage").addClass("show");
                            $("#errormessage").removeClass("show");
                            $("#name").val('');
                            $("#email").val('');
                            $("#phone").val('');
                            $("#subject").val('');
                            $("#message").val('');
                            $(window).scrollTop($('#contact_div').offset().top);
                        }
                        else {
                            $("#sendmessage").removeClass("show");
                            $("#errormessage").addClass("show");
                            $('#errormessage').html(msg);
                        }

                    }
                });
                //console.log(xhr);
                return false;
            });

            $('.target').imagesLoaded(function () {
                var heights = [];
                $('.itemNews ul').each(function () {
                    heights.push($(this).outerHeight());
                });
                var maxHeight = Math.max.apply(null, heights);
                $('.itemNews ul').each(function () {
                    $(this).height(maxHeight);
                });
            });
            var count_itemNews = $('.target .itemNews').length;
            for (var i = 0; i <= count_itemNews; i++) {
                var s = i / 5 + 0.2;
                $('.itemNews:eq(' + i + ')').attr('data-wow-delay', s + 's');
            }
            var count_oneCourse = $('.target .oneCourse').length;
            for (var i = 0; i <= count_oneCourse; i++) {
                var s = i / 5 + 0.2;
                $('.oneCourse:eq(' + i + ')').attr('data-wow-delay', s + 's');
            }

        });
    </script>

</body>
</html>
