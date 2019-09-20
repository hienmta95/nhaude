<?php
$title_var = "title_" . trans('backLang.boxCode');
$title_var2 = "title_" . trans('backLang.boxCodeOther');
$details_var = "details_" . trans('backLang.boxCode');
$details_var2 = "details_" . trans('backLang.boxCodeOther');
$slug_var = "seo_url_slug_" . trans('backLang.boxCode');
$slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');
$section_url = "";
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
<li class="itemCourse wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
    <a href="{{ $topic_link_url }}" class="img"><span
                class="thumb"
                style="background-image: url({{ nhaude_asset('uploads/topics/'.$topic->photo_file) }});">
            <img class="img-responsive"
                    src="{{ resizeThumb('uploads/topics/'.$topic->photo_file,300,300,'false','true') }}"
                    alt="{{ $title }}"></span></a>
    <ul>
        <li>
            <a href="{{ $topic_link_url }}" class="tit"
               title="{{ $title }}">{{ $title }}</a>
        </li>
        <li>
            <p class="ell">
            <div>
                {{ str_limit(strip_tags($topic->$details), $limit = 100, $end = '...') }}
            </div>
            </p>
        </li>
        <li>
            <a href="{{ $topic_link_url }}" class="view">Xem chi tiết <i class="fa fa-long-arrow-right"></i></a>
        </li>



    </ul>
</li>