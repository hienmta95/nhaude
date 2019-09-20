<section class="section section-feedback">
    <div class="container">
        <div class="col-md-12">
            <h2 class="heading text-center">Ý kiến học viên</h2>

            <div class="row feedbacks" id="feedbacks">
                @foreach($HomeTestimonials as $topic)
                <div class="col-md-6 col-xs-12">
                    <div class="feedbackItem">
                        <div class="feedbackContent">
                           {!! $topic->details_en !!}
                        </div>
                        <div class="feedbackUser">
                            <div class="">
                                <h3>{{$topic->title_en}}</h3>
                              <p>
                                
                              </p>
                            </div>
                         <img src="{{ resizeThumb('uploads/topics/'.$topic->photo_file,120,120,'false','true') }}"
                                                     data-placement="bottom" title=""
                                                     alt="{{ $topic->title_en }}">
                        </div>
                    </div>

                </div>
              @endforeach


            </div>
        </div>
    </div>
</section>