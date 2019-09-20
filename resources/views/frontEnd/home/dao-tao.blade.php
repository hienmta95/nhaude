<?php
$eduTopic1 = \App\Topic::where('status', 1)
    ->where('id',5)
    ->orderby('row_no', 'desc')
    ->first();
$eduTopic2 = \App\Topic::where('status', 1)
    ->where('id',6)
    ->orderby('row_no', 'desc')
    ->first();

$slug_var = "seo_url_slug_" . trans('backLang.boxCode');
$section_url = $eduTopic1->webmastersection->$slug_var;
?>
<section class="section content-row-no-bg home-section-2">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="section-header">
                    <h2 class="heading">CHƯƠNG TRÌNH ĐÀO TẠO</h2>
                </div>
                <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="sub-heading">Đào tạo 1-1</h3>
                                   
                                    @include('frontEnd.includes.post-item',['topic'=>$eduTopic1])
                                </div>
                                <div class="col-md-6">
                                    <h3 class="sub-heading">Đào tạo quản lý</h3>
                                    @include('frontEnd.includes.post-item',['topic'=>$eduTopic2])

                                </div>
                              
                          <div class="col-lg-12">
                              <br>
                    <div class="more-btn">
                        <a href="{{ url($section_url) }}" class="btn btn-large btn-theme">
                            {{ trans('frontLang.viewMore') }}
                        </a>
                    </div>
                </div>
                              
                              
                            </div>
                        </div>
                    <div class="col-lg-4">
                        <div class="card request-form-wrap">
                            <div class="card-body">
                                <h2>ĐĂNG KÝ TƯ VẤN</h2>
                        <div class="request-form">

                            <div id="sendmessage"><i class="fa fa-check-circle"></i>
                                &nbsp;{{ trans('frontLang.youMessageSent') }}</div>
                            <div id="errormessage">{{ trans('frontLang.youMessageNotSent') }}</div>

                        {{Form::open(['route'=>['contactPage'],'method'=>'POST','class'=>'contactForm'])}}
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
                            <div class="form-group">
                                {!! Form::text('contact_subject',"", array('placeholder' => trans('frontLang.subject'),'class' => 'form-control','id'=>'subject', 'data-msg'=> trans('frontLang.enterYourSubject'),'data-rule'=>'minlen:4')) !!}
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                {!! Form::textarea('contact_message','', array('placeholder' => trans('frontLang.message'),'class' => 'form-control','id'=>'message','rows'=>'2', 'data-msg'=> trans('frontLang.enterYourMessage'),'data-rule'=>'required')) !!}
                                <div class="validation"></div>
                            </div>

                            @if(env('NOCAPTCHA_STATUS', false))
                                <div class="form-group">
                                    {!! NoCaptcha::renderJs(trans('backLang.code')) !!}
                                    {!! NoCaptcha::display() !!}
                                </div>
                            @endif

                        {{Form::close()}}

                            <div>
                                <button id="home-submit" class="btn btn-theme">{{ trans('frontLang.sendMessage') }}</button>
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
</section>

@section('footerInclude')
    <script type="text/javascript">

        jQuery(document).ready(function ($) {
            "use strict";

            var formRe = $('form.contactForm');
            //Contact
            $('body').on('click', '#home-submit', function (e) {
                e.preventDefault();

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

        });
    </script>
@endsection