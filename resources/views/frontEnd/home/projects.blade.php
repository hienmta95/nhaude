@if(count($HomePhotos)>0)
    <section class="section projects-wrapper">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="home-row-head">
                        <h2 class="heading">{{ trans('frontLang.homeContents2Title') }}</h2>
                        <small>{{ trans('frontLang.homeContents2desc') }}</small>
                    </div>
                    <div class="row">
                        <section id="projects">
                            <ul id="thumbs" class="portfolio">
                                <?php
                                $title_var = "title_" . trans('backLang.boxCode');
                                $title_var2 = "title_" . trans('backLang.boxCodeOther');
                                $details_var = "details_" . trans('backLang.boxCode');
                                $details_var2 = "details_" . trans('backLang.boxCodeOther');
                                $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
                                $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');
                                $section_url = "";
                                $ph_count = 0;
                                ?>
                                @foreach($HomePhotos as $HomePhoto)
                                    <?php
                                    if ($HomePhoto->$title_var != "") {
                                        $title = $HomePhoto->$title_var;
                                    } else {
                                        $title = $HomePhoto->$title_var2;
                                    }
                                    if ($HomePhoto->webmasterSection->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                        if (trans('backLang.code') != defaultLanguage()) {
                                            $section_url = url(trans('backLang.code') . "/" . $HomePhoto->webmasterSection->$slug_var);
                                        } else {
                                            $section_url = url($HomePhoto->webmasterSection->$slug_var);
                                        }
                                    } else {
                                        if (trans('backLang.code') != defaultLanguage()) {
                                            $section_url = url(trans('backLang.code') . "/" . $HomePhoto->webmasterSection->name);
                                        } else {
                                            $section_url = url($HomePhoto->webmasterSection->name);
                                        }
                                    }

                                        if ($HomePhoto->$slug_var != "" && \App\Helpers\Helper::GeneralWebmasterSettings("links_status")) {
                                            if (trans('backLang.code') != defaultLanguage()) {
                                                $topic_link_url = url(trans('backLang.code') . "/" . $HomePhoto->$slug_var);
                                            } else {
                                                $topic_link_url = url($HomePhoto->$slug_var);
                                            }
                                        } else {
                                            if (trans('backLang.code') != defaultLanguage()) {
                                                $topic_link_url = route('FrontendTopicByLang', ["lang" => trans('backLang.code'), "section" => $HomePhoto->webmasterSection->name, "id" => $HomePhoto->id]);
                                            } else {
                                                $topic_link_url = route('FrontendTopic', ["section" => $HomePhoto->webmasterSection->name, "id" => $HomePhoto->id]);
                                            }
                                        }
                                        $photo = $HomePhoto->photos[0];
                                    ?>

                                        @if($ph_count<6)
                                            <li class="col-lg-4 design project-item" data-id="id-0" data-type="web">
                                                <div class="relative">
                                                    <div class="item-thumbs">
                                                        <a href="{!! $topic_link_url !!}" title="{!! $title !!}">
                                                        <!-- Thumb Image and Description -->
                                                        <img src="{{ resizeThumb('uploads/topics/'.$photo->file,580,460,'false','true') }}"
                                                             alt="{{ $title }}" class="img-responsive">

                                                        <div class="item-info">
                                                            <h4>Dự án nhà hàng</h4>
                                                            <p>{{ $title }}</p>
                                                        </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                        <?php
                                        $ph_count++;
                                        ?>

                                @endforeach

                            </ul>
                        </section>
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
            </div>
        </div>
    </section>
@endif