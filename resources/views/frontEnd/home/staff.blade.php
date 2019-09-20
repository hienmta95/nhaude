<section class="section section-staff">
    <div class="container">
        <div class="col-md-12">
            <h2 class="heading text-center">đội ngũ chuyên gia</h2>

            <div class="staffs" id="staffs">

                @foreach($HomeStaffs as $topic)
                    <?php
                    if ($topic->$title_var != "") {
                        $title = $topic->$title_var;
                    } else {
                        $title = $topic->$title_var2;
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

                    if ($topic->$slug_var != "" && \App\Helpers\Helper::GeneralWebmasterSettings("links_status")) {
                        if (trans('backLang.code') != defaultLanguage()) {
                            $topic_link_url = url(trans('backLang.code') . "/" . $topic->$slug_var);
                        } else {
                            $topic_link_url = url($topic->$slug_var);
                        }
                    } else {
                        if (trans('backLang.code') != defaultLanguage()) {
                            $topic_link_url = route('FrontendTopicByLang', ["lang" => trans('backLang.code'), "section" => $topic->webmasterSection->name, "id" => $topic->id]);
                        } else {
                            $topic_link_url = route('FrontendTopic', ["section" => $topic->webmasterSection->name, "id" => $topic->id]);
                        }
                    }
                    ?>

                    <a href="{{ $topic_link_url }}" class="itemStaff wow fadeInUp" data-wow-delay="0.30000000000000004s"
                       style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <img class="img-responsive" src="{{ resizeThumb('uploads/topics/'.$topic->photo_file,260,315,'false','true') }}"
                             data-placement="bottom" title=""
                             alt="{{ $topic->title_en }}">
                        <ul>
                            <h5 class="tit">{{ $topic->title_en }}</h5>
                            <p>{!! $topic->details_en !!}</p>
                        </ul>
                    </a>
                @endforeach

            </div>


        </div>
    </div>
</section>