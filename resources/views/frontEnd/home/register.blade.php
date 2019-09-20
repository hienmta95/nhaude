<?php
$banner = \App\Banner::where('id',env('REGISTER_AD_ID',3))->first();
?>
<section class="section content-row-no-bg ">
    <div class="container">
        <div class="row register-wrapper">
            <div class="col-md-12" style="">
                {!! $banner->code !!}
            </div>
        </div>
    </div>
</section>
