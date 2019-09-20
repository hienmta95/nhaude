<?php
$footer_style = "";
/*if (Helper::GeneralSiteSettings("style_footer_bg") != "") {
    $bg_file = nhaude_asset('uploads/settings/' . Helper::GeneralSiteSettings("style_footer_bg"));
    $bg_color = Helper::GeneralSiteSettings("style_color1");
    $footer_style = "style='background: $bg_color url($bg_file) repeat-x center top'";
}
if (Helper::GeneralSiteSettings("style_footer") != 1) {
    $footer_style = "style=padding:0";
}*/
?>
<footer {!!  $footer_style !!}>
    @if(Helper::GeneralSiteSettings("style_footer")==1)
        <?php
        $bx1w = 5;
        $bx2w = 3;
        $bx3w = 3;
        $bx4w = 4;


        ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-{{$bx1w}}">
                    <div class="widget contacts">
                        @if(Helper::GeneralSiteSettings("style_logo_" . trans('backLang.boxCode')) !="")
                            <img alt=""
                                 src="https://i.imgur.com/ziaNbXF.png" . trans('backLang.boxCode'))) }}">

                        @endif
                        <h4 class="widgetheading"> {{ trans('frontLang.contactDetails') }}</h4>
                        @if(Helper::GeneralSiteSettings("contact_t1_" . trans('backLang.boxCode')) !="")
                            <p class="address" >
                                <i class="fa fa-map-marker"></i>
                                &nbsp;{{ Helper::GeneralSiteSettings("contact_t1_" . trans('backLang.boxCode')) }}
                            </p>
                        @endif
                        @if(Helper::GeneralSiteSettings("contact_t3") !="")
                            <p>
                                <i class="fa fa-phone"></i> &nbsp;<a
                                        href="tel:{{ Helper::GeneralSiteSettings("contact_t3") }}"><span
                                            dir="ltr">{{ Helper::GeneralSiteSettings("contact_t3") }}</span></a></p>
                        @endif
                        @if(Helper::GeneralSiteSettings("contact_t6") !="")
                            <p>
                                <i class="fa fa-envelope"></i> &nbsp;<a
                                        href="mailto:{{ Helper::GeneralSiteSettings("contact_t6") }}">{{ Helper::GeneralSiteSettings("contact_t6") }}</a>
                            </p>
                        @endif
                    </div>
                </div>


                @if(Helper::GeneralWebmasterSettings("footer_menu_id") >0)
                    <?php
                    // Get list of footer menu links by group Id
                    $FooterMenuLinks = Helper::MenuList(Helper::GeneralWebmasterSettings("footer_menu_id"));
                    ?>
                    @if(count($FooterMenuLinks)>0)
                        <div class="col-lg-{{$bx3w}}">
                            <div class="widget">
                                <?php
                                $link_title_var = "title_" . trans('backLang.boxCode');
                                $main_title_var = "FooterMenuLinks_name_" . trans('backLang.boxCode');
                                $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
                                $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');
                                ?>
                                <h4 class="widgetheading">{{$$main_title_var}}</h4>
                                <ul class="link-list">
                                    @foreach($FooterMenuLinks as $FooterMenuLink)
                                        @if($FooterMenuLink->type==3 || $FooterMenuLink->type==2)
                                            {{-- Get Section Name as a link --}}
                                            <li>
                                                <?php
                                                if ($FooterMenuLink->webmasterSection->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                    if (trans('backLang.code') != defaultLanguage()) {
                                                        $mmnnuu_link = url(trans('backLang.code') . "/" . $FooterMenuLink->webmasterSection->$slug_var);
                                                    } else {
                                                        $mmnnuu_link = url($FooterMenuLink->webmasterSection->$slug_var);
                                                    }
                                                } else {
                                                    if (trans('backLang.code') != defaultLanguage()) {
                                                        $mmnnuu_link = url(trans('backLang.code') . "/" . $FooterMenuLink->webmasterSection->name);
                                                    } else {
                                                        $mmnnuu_link = url($FooterMenuLink->webmasterSection->name);
                                                    }
                                                }
                                                ?>
                                                <a href="{{ $mmnnuu_link }}">{{ $FooterMenuLink->$link_title_var }}</a>
                                            </li>
                                        @elseif($FooterMenuLink->type==1)
                                            {{-- Direct link --}}
                                            <?php
                                            if (trans('backLang.code') != defaultLanguage()) {
                                                $this_link_url = url(trans('backLang.code') . "/" . $FooterMenuLink->link);
                                            } else {
                                                $this_link_url = url($FooterMenuLink->link);
                                            }
                                            ?>
                                            <li>
                                                <a href="{{ $this_link_url }}">{{ $FooterMenuLink->$link_title_var }}</a>
                                            </li>
                                        @else
                                            {{-- No link --}}
                                            <li><a>{{ $FooterMenuLink->$link_title_var }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                @endif
                @include('frontEnd.includes.subscribe')

            </div>
        </div>
    @endif
    <div id="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright">
                        <?php
                        $site_title_var = "site_title_" . trans('backLang.boxCode');
                        ?>
                        &copy; <?php echo date("Y") ?> {{ trans('frontLang.AllRightsReserved') }}
                        . <a>{{$WebsiteSettings->$site_title_var}}</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="social-network">
                        @if($WebsiteSettings->social_link1)
                            <li><a href="{{$WebsiteSettings->social_link1}}" data-placement="top" title="Facebook"
                                   target="_blank"><i
                                            class="fa fa-facebook"></i></a></li>
                        @endif
                        @if($WebsiteSettings->social_link2)
                            <li><a href="{{$WebsiteSettings->social_link2}}" data-placement="top" title="Twitter"
                                   target="_blank"><i
                                            class="fa fa-twitter"></i></a></li>
                        @endif

                        @if($WebsiteSettings->social_link5)
                            <li><a href="{{$WebsiteSettings->social_link5}}" data-placement="top" title="Youtube"
                                   target="_blank"><i
                                            class="fa fa-youtube-play"></i></a></li>
                        @endif
                        @if($WebsiteSettings->social_link7)
                            <li><a href="{{$WebsiteSettings->social_link7}}" data-placement="top" title="Pinterest"
                                   target="_blank"><i
                                            class="fa fa-pinterest"></i></a></li>
                        @endif


                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>