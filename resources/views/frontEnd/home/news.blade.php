@if(count($LatestNews)>0)
    <section class="section news-wrapper">

        <style>
            .homeCourse .itemCourse {
                background-color: #fff;
                color: #001E46;
            }
            .homeCourse .itemCourse * {
                color: #001E46;
            }
            .homeCourse .itemCourse .tit:after {
                background-color: #EF1625;
            }
        </style>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="home-row-head">
                        <h2 class="heading text-center">Tin tức hoạt động</h2>
                        <small>{{ trans('frontLang.homeContents1desc') }}</small>
                    </div>
                    <div class="row">
                        <div class="col-md-12 homeCourse">
                        <?php
                        $title_var = "title_" . trans('backLang.boxCode');
                        $title_var2 = "title_" . trans('backLang.boxCodeOther');
                        $details_var = "details_" . trans('backLang.boxCode');
                        $details_var2 = "details_" . trans('backLang.boxCodeOther');
                        $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
                        $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');

                        $section_url = "";
                        ?>
                        @foreach($LatestNews as $LatestNew)
                        <?php
                        $topic = $LatestNew;
                        if ($topic->$title_var != "") {
                            $title = $topic->$title_var;
                        } else {
                            $title = $topic->$title_var2;
                        }
                        if ($topic->$details_var != "") {
                            $details = $details_var;
                        } else {
                            $details = $details_var2;
                        }
                        if ($topic->webmasterSection->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                            if (trans('backLang.code') != defaultLanguage()) {
                                $section_url = url(trans('backLang.code') . "/" . $topic->webmasterSection->$slug_var);
                            } else {
                                $section_url = url($topic->webmasterSection->$slug_var);
                            }
                        } else {
                            if (trans('backLang.code') != defaultLanguage()) {
                                $section_url = url(trans('backLang.code') . "/" . $topic->webmasterSection->name);
                            } else {
                                $section_url = url($topic->webmasterSection->name);
                            }
                        }
                        ?>
                            @include('frontEnd.includes.post-item-grid',['topic'=>$LatestNew]);
                        @endforeach
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="more-btn">
                        <a href="{{ url($section_url) }}" class="btn btn-large btn-theme">
                            {{ trans('frontLang.viewMore') }}
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endif