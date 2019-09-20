@if(count($HomePartners)>0)
    <section class="section section-partners bg-white">
        <div class="container">
            <div class="row">
                <div class="partners_carousel slide" style="direction: ltr">
                    <div class="carousel-inner">
                        <div class="item active">
                            <ul class="thumbnails" id="partners">
                                <?php
                                $ii = 0;
                                $title_var = "title_" . trans('backLang.boxCode');
                                $title_var2 = "title_" . trans('backLang.boxCodeOther');
                                $details_var = "details_" . trans('backLang.boxCode');
                                $details_var2 = "details_" . trans('backLang.boxCodeOther');
                                $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
                                $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');
                                $section_url = "";
                                ?>

                                @foreach($HomePartners as $HomePartner)
                                    <?php
                                    if ($HomePartner->$title_var != "") {
                                        $title = $HomePartner->$title_var;
                                    } else {
                                        $title = $HomePartner->$title_var2;
                                    }
                                    if ($HomePartner->webmasterSection->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                        if (trans('backLang.code') != defaultLanguage()) {
                                            $section_url = url(trans('backLang.code') . "/" . $HomePartner->webmasterSection->$slug_var);
                                        } else {
                                            $section_url = url($HomePartner->webmasterSection->$slug_var);
                                        }
                                    } else {
                                        if (trans('backLang.code') != defaultLanguage()) {
                                            $section_url = url(trans('backLang.code') . "/" . $HomePartner->webmasterSection->name);
                                        } else {
                                            $section_url = url($HomePartner->webmasterSection->name);
                                        }
                                    }

                                    if ($ii == 6) {
                                        echo "
                                                    </ul>
                                </div><!-- /Slide -->
                                <div class='item'>
                                    <ul class='thumbnails'>
                                                    ";
                                        $ii = 0;
                                    }
                                    ?>
                                    <li class="col-sm-2">
                                        <div class="thumbnail">
                                            <img src="{{ resizeThumb('uploads/topics/'.$HomePartner->photo_file,160,90,'false','true') }}"
                                                 data-placement="bottom" title=""
                                                 alt="{{ $title }}">
                                        </div>
                                    </li>
                                    <?php
                                    $ii++;
                                    ?>
                                @endforeach

                            </ul>
                        </div><!-- /Slide -->
                    </div>
                    <nav>
                        <ul class="control-box pager" id="customize-control" style="display: none">
                            <li><a data-slide="prev" data-control="prev" href="#myCarousel" class="prev"><i
                                            class="fa fa-angle-left"></i></a></li>
                            {{--<li><a href="{{ url($section_url) }}">{{ trans('frontLang.viewMore') }}</a>--}}
                            {{--</li>--}}
                            <li><a data-slide="next"  data-control="next" href="#myCarousel" class="next"><i
                                            class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                    <!-- /.control-box -->

                </div><!-- /#myCarousel -->
            </div>

        </div>

    </section>
@endif