@extends('master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')

<div class="container">

    <div class="row featurette card card-block">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">{!! trans('messages.mkt_1_header') !!}</h2>
          <p class="text-justify text-muted">
            {!! trans('messages.mkt_1') !!}
          </p>
          <p class="text-justify text-muted">
            {!! trans('messages.mkt_1_1') !!}
          </p>

          <!-- Begin MailChimp Signup Form -->
          <!-- <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css"> -->
          <div id="mc_embed_signup">
            <form action="//xyz.us13.list-manage.com/subscribe/post?u=79533b61fc91c62342a34a888&amp;id=7bc8c7df50" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                  <input type="submit" value="Sign me up!" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary pull-right">
              	  <input style="width: 70%;" type="email" value="" name="EMAIL" class="form-control input input-lg" id="mce-EMAIL" placeholder="Email address" required>
                  <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                  <div style="position: absolute; left: -5000px;" aria-hidden="true">
                    <input type="text" name="b_79533b61fc91c62342a34a888_7bc8c7df50" tabindex="-1" value="">
                  </div>
                </div>
            </form>
          </div>

          <!--End mc_embed_signup-->

          <!-- <a href="#register" class="btn btn-primary">Register</a> -->
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img style='width:100%;' class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="500x500"
                src="/img/home_screen.gif" data-holder-rendered="true">
        </div>
    </div>

    <div class="row featurette card card-block">
        <div class="col-md-7 col-md-push-5">
          <h3 class="featurette-heading">{!! trans('messages.mkt_2_header') !!}</h3>
          <p class="text-justify text-muted">
            {!! trans('messages.mkt_2') !!}
          </p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img style='width:100%;' class="featurette-image img-responsive center-block"
               data-src="holder.js/500x500/auto"
               alt="500x500"
               src="/img/spendable.PNG" data-holder-rendered="true">
        </div>
    </div>

    <div class="row featurette card card-block">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">{!! trans('messages.mkt_3_header') !!}</h2>
          <p class="text-justify text-muted">
            {!! trans('messages.mkt_3') !!}
          </p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img style='width:100%;' class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="500x500"
                src="/img/goalSetting.PNG" data-holder-rendered="true">
        </div>
    </div>

    <div class="row featurette card card-block">
        <div class="col-md-7">
          <h3 class="featurette-heading">{!! trans('messages.mkt_4_header') !!}</h3>
          <p class="text-justify text-muted">
            {!! trans('messages.mkt_4') !!}
          </p>
        </div>
        <div class="col-md-5">
          <img style='width:100%;' class="featurette-image img-responsive center-block"
               data-src="holder.js/500x500/auto"
               alt="500x500"
               src="/img/webicon2_200.gif" data-holder-rendered="true">
        </div>
    </div>

</div>

@stop
