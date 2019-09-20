@extends('frontEnd.layout')

@section('content')


    @include('frontEnd.includes.slider')
    @include('frontEnd.home.dao-tao')
    @if(count($HomeTopics)>0)
        <section class="section content-row-no-bg">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="home-row-head">
                            <h2 class="heading text-center">{{ trans('frontLang.homeContents1Title') }}</h2>
                            <small>{{ trans('frontLang.homeContents1desc') }}</small>
                        </div>
                        <div class="row">
                            <?php
                            $title_var = "title_" . trans('backLang.boxCode');
                            $title_var2 = "title_" . trans('backLang.boxCodeOther');
                            $details_var = "details_" . trans('backLang.boxCode');
                            $details_var2 = "details_" . trans('backLang.boxCodeOther');
                            $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
                            $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');
                            $section_url = "";

                            $slug_var = "seo_url_slug_" . trans('backLang.boxCode');

                            ?>
                            @foreach($HomeTopics as $HomeTopic)
                                <div class="col-lg-4">
                                    @include('frontEnd.includes.post-item',['topic'=>$HomeTopic])
                                </div>
                                <?php $section_url = $HomeTopic->webmastersection->$slug_var ?>
                            @endforeach

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


    @include('frontEnd.home.register')
    @include('frontEnd.home.intro')
    @include('frontEnd.home.news')
    @include('frontEnd.home.projects')
    @include('frontEnd.home.staff')
    @include('frontEnd.home.feedback')
    @include('frontEnd.home.partners')


@endsection

@push('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function(){
            $( "#accordion" ).accordion();
            
            var staffs = tns({
                container: '#staffs',
                slideBy: 'page',
                controlsPosition:'top',
                autoplay: true,
                navPosition:false,
                controls:false,
                mouseDrag: true,
                swipeAngle: false,
                autoWidth: false,

                responsive: {
                    640: {
                        items: 2
                    },
                    700: {
                        items: 3
                    },
                    900: {
                        items: 4
                    }
                },
            });
            
            var feedbacks = tns({
                container: '#feedbacks',
                //items: 2,
                slideBy: 'page',
                controlsPosition:'bottom',
                controls:false,
                navPosition:false,
                autoplay: true,
                mouseDrag: true,
                responsive: {
                    560: {
                        //edgePadding: 20,
                        //gutter: 20,
                        items: 1
                    },
                    900: {
                        items: 2
                    }
                }
            });
            var partners = tns({
                container: '#partners',
                //items: 2,
                slideBy: 'page',
                controlsPosition:'bottom',
                controls:false,
                mouseDrag: true,
                navPosition:false,
                autoplay: true,
                //controlsContainer: "#customize-controls",
                responsive: {
                    640: {
                        //edgePadding: 20,
                        //gutter: 20,
                        items: 3
                    },
                    700: {
                        items: 4
                    },
                    900: {
                        items: 5
                    }
                }
            });


        });
    </script>

    <script type="text/javascript">

        jQuery(document).ready(function ($) {
            "use strict";

            //Contact
            $('form.subscribeForm').submit(function () {

                var f = $(this).find('.form-group'),
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
                else var str = $(this).serialize();
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

        });
    </script>

@endpush