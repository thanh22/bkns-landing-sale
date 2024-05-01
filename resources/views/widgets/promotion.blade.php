@if ($imagePosition == 0)
    <div class="row align-items-center justify-content-center pt-40">
        <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6">
            <div class="why__thumb">
                <img src="{{ url('storage/promotions/'.$image) }}" alt="">
            </div>
        </div>
        <div class="col-xxl-5 offset-xxl-1 col-xl-5 offset-xl-1 col-lg-6 col-md-6 ml-0">
            {!! $content !!}
        </div>
    </div>
@elseif ($imagePosition == 1)
    <div class="row pt-60">
        <div class="d-flex align-items-center justify-content-center">
            <img src="assets/img/events/ribbon.png" alt="">
        </div>
        <div class="d-flex justify-content-center pt-40">
            <div class="btn__banner__week">
                {!! $content !!}
            </div>
        </div>
    </div>
@elseif ($imagePosition == 2)
    <div class="row align-items-center justify-content-center pt-40">
        <div class="col-xxl-5 offset-xxl-1 col-xl-5 offset-xl-1 col-lg-6 col-md-6 ml-60">
            {!! $content !!}
        </div>
        <div class="col-xxl-5 col-xl-5 col-lg-6 col-md-6 ml-60">
            <div class="why__thumb">
                <img src="{{ url('storage/promotions/'.$image) }}" alt="">
            </div>
        </div>
    </div>
@endif

