<?php
$banner = \App\Banner::where('id',env('INTRO_AD_ID',4))->first();
?>
<section class="section content-row-no-bg ">
    <div class="container">
        <div class="row intro-wrapper">
            <div class="col-md-7" style="padding: 0">
                <div class="embed-responsive embed-responsive-4by3 video-container">
                {!! $banner->code !!}
                </div>
            </div>
            <div class="col-md-5">
                <div id="accordion">
                    <h3>{!! trans('frontLang.intro.heading1') !!}</h3>
                    <div>
                        <p>
                            {!! trans('frontLang.intro.content1') !!}
                        </p>
                    </div>
                    <h3>{!! trans('frontLang.intro.heading2') !!}</h3>
                    <div>
                        <p>
                            {!! trans('frontLang.intro.content2') !!}
                        </p>
                    </div>
                    <h3>{!! trans('frontLang.intro.heading3') !!}</h3>
                    <div>
                        <p>
                            {!! trans('frontLang.intro.content3') !!}
                        </p>
                    </div>
                    <h3>{!! trans('frontLang.intro.heading4') !!}</h3>
                    <div>
                        <p>
                            {!! trans('frontLang.intro.content4') !!}
                        </p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</section>
