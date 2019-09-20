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
$sectionTitle = $topic->webmasterSection->name;
?>
<div class="post-item">
    @if($topic->photo_file !="")
        <img src="{{ resizeThumb('uploads/topics/'.$topic->photo_file,360,240,'false','true') }}" class="img-responsive"
             alt="{{ $title }}"/>
    @endif

    <div class="post-body">
    <div class="post-section sub-heading">
     {{ $sectionTitle }} 
    </div>  
    <a title="{{ $title }}" href="{{ $topic_link_url }}"><h4>{!! $title !!}</h4></a>

    <p class="text-justify">
        {{ str_limit(strip_tags($topic->$details), $limit = 160, $end = '...') }}
    </p>
        <a class="read-more" title="{{ $title }}" href="{{ $topic_link_url }}">
            {{ trans('frontLang.readMore') }}
            <i class="fa fa-caret-{{ trans('backLang.right') }}"></i>
        </a>
    </div>
</div>