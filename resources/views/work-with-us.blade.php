@extends('layouts.main')
@section('content')
<div class="home-video-container">
  <video id="home-video" loop autoplay muted playsinline webkit-playsinline>
    <source
      src="{{ asset('videos/home.mp4') }}"
      type="video/mp4" />
  </video>
</div>

<div class="showreel-video-overlay"></div>

<div class="showreel-video-container">
  <img alt="close video" class="close-video" src="assets/images/icons/close-white.svg" />
</div>

<div class="case-study-video-container"></div>
<div class="working-with-us-scroll-image"></div>
<div class="individual-service-scroll-image"></div>

<div id="viewport">
  <div id="scroll-container" class="scroll-container">
    <div id="barba-wrapper">
      <div class="barba-container">
        <section class="l__working-with-us">
          <div style="padding: 100px 0;" class="container">
            <h1 class="small">{{ site_text('site.work_with_us.hero_title') }}</h1>
            <div class="anchor-link-container">
              <div class="anchor-link active" id="m__intro-experience">
                <span>01</span>
                <p>{{ site_text('site.work_with_us.nav_1') }}</p>
              </div>
              <div class="anchor-link" id="m__advantage-scroll--title">
                <span>02</span>
                <p>{{ site_text('site.work_with_us.nav_2') }}</p>
              </div>
              <div class="anchor-link" id="m__solution">
                <span>03</span>
                <p>{{ site_text('site.work_with_us.nav_3') }}</p>
              </div>
              <div class="anchor-link" id="m__global-reach">
                <span>04</span>
                <p>{{ site_text('site.work_with_us.nav_4') }}</p>
              </div>
              <div class="anchor-link" id="m__beliefs">
                <span>05</span>
                <p>{{ site_text('site.work_with_us.nav_5') }}</p>
              </div>
              <div class="anchor-link" id="m__clients">
                <span>06</span>
                <p>{{ site_text('site.work_with_us.nav_6') }}</p>
              </div>
            </div>
          </div>
        </section>

        <section class="m__intro-experience">
          <div class="container">
            <div class="title-container">
              <div style="padding: 30px;" class="section-number">
                <span>01</span>
              </div>
              <h2 class="small" style="color: #fff;">{{ site_text('site.work_with_us.section_1_title') }}</h2>
            </div>

            <div class="row">
              <div class="col-xs-12 col-md-6 m__intro-experience--content-left">
                <p>{{ site_text('site.work_with_us.section_1_intro') }}</p>
              </div>
              <div class="col-xs-12 col-md-6">
                <div style="padding: 30px;" class="m__intro-experience--tile">
                  <h3>{{ site_text('site.work_with_us.section_1_stat_title') }} <span>{{ site_text('site.work_with_us.section_1_stat_subtitle') }}</span></h3>
                </div>
              </div>
              <div class="col-xs-12 col-md-6 m__intro-experience--content-left">
                <p>{{ site_text('site.work_with_us.section_1_body_left') }}</p>
              </div>
              <div class="col-xs-12 col-md-6 m__intro-experience--content-right">
                <p>{{ site_text('site.work_with_us.section_1_body_right') }}</p>
              </div>
            </div>
          </div>
        </section>

        <section class="m__advantage-scroll--title">
          <div class="container">
            <div class="title-container">
              <div style="padding: 30px;" class="section-number">
                <span>02</span>
              </div>
              <h2 class="small">{{ site_text('site.work_with_us.section_2_title') }}</h2>
            </div>
          </div>
        </section>

        <section class="m__advantage-scroll">
          <div class="row">
            <div class="col-md-6 left">
              <div class="m__advantage-scroll--bg-image" style="background-image: url(/images/default.png)"></div>
            </div>
            <div class="col-xs-12 col-md-6 m__advantage-scroll--content">
              <div class="m__advantage-scroll--content--item">
                <h4 class="medium">{{ site_text('site.work_with_us.section_2_item_1_title') }}</h4>
                <p>{{ site_text('site.work_with_us.section_2_item_1_body') }}</p>
              </div>
              <div class="m__advantage-scroll--content--item">
                <h4 class="medium">{{ site_text('site.work_with_us.section_2_item_2_title') }}</h4>
                <p>{{ site_text('site.work_with_us.section_2_item_2_body') }}</p>
              </div>
            </div>
          </div>
        </section>

        <section class="m__solution">
          <div class="container">
            <div class="title-container">
              <div style="padding: 30px;" class="section-number">
                <span>03</span>
              </div>
              <h2 class="small">{{ site_text('site.work_with_us.section_3_title') }}</h2>
            </div>
            <div class="m__solution--circle-diagram">
              <div class="circle">
                <p>{{ site_text('site.work_with_us.circle_strategy') }}</p>
              </div>
              <div class="circle">
                <p>{{ site_text('site.work_with_us.circle_creative') }}</p>
              </div>
              <div class="circle">
                <p>{{ site_text('site.work_with_us.circle_technology') }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-md-6 m__solution--content-left">
                <h4 class="medium">{{ site_text('site.work_with_us.section_3_intro_title') }}</h4>
              </div>
              <div class="col-xs-12 col-md-6 m__solution--content-right">
                <p>{{ site_text('site.work_with_us.section_3_intro_body') }}</p>
                <p>{{ site_text('site.work_with_us.section_3_expertise_label') }}</p>
                <p style="margin-bottom: 15px; border-left: 2px solid #ccc; padding-left: 10px;">{{ site_text('site.work_with_us.expertise_1') }}</p>
                <p style="margin-bottom: 15px; border-left: 2px solid #ccc; padding-left: 10px;">{{ site_text('site.work_with_us.expertise_2') }}</p>
                <p style="margin-bottom: 15px; border-left: 2px solid #ccc; padding-left: 10px;">{{ site_text('site.work_with_us.expertise_3') }}</p>
                <p style="margin-bottom: 15px; border-left: 2px solid #ccc; padding-left: 10px;">{{ site_text('site.work_with_us.expertise_4') }}</p>
                <p style="margin-bottom: 15px; border-left: 2px solid #ccc; padding-left: 10px;">{{ site_text('site.work_with_us.expertise_5') }}</p>
              </div>
            </div>
          </div>
        </section>

        <section class="m__further-solution">
          <div class="row image-left-text-right">
            <div class="col-xs-12 col-md-6 m__further-solution--bg-image left">
              <div class="image" style="background-image: url(/images/default.png)"></div>
            </div>
            <div class="col-xs-11 col-md-6 m__further-solution--content right">
              <p>{{ site_text('site.work_with_us.section_3_follow_body') }}</p>
            </div>
          </div>
          <div class="title-container">
            <div class="container">
              <h2>{{ site_text('site.work_with_us.section_3_creative_title') }}</h2>
            </div>
          </div>
          <div class="row image-right-text-left">
            <div class="col-xs-11 col-md-6 m__further-solution--content left">
              <div class="col-xs-12 col-md-6 m__solution--content-left">
                <h6 class="medium">{{ site_text('site.work_with_us.section_3_creative_intro_title') }}</h6>
              </div>
              <p>{{ site_text('site.work_with_us.section_3_creative_body') }}</p>
            </div>
            <div class="col-xs-12 col-md-6 m__further-solution--bg-image right">
              <div class="image" style="background-image: url(/images/default.png)"></div>
            </div>
          </div>
        </section>

        <section class="m__global-reach">
          <div class="container">
            <div class="title-container">
              <div style="padding: 30px;" class="section-number">
                <span>04</span>
              </div>
              <h2 class="small">{{ site_text('site.work_with_us.section_4_title') }}</h2>
            </div>
            <div class="m__global-reach--content">
              <p>{{ site_text('site.work_with_us.section_4_body') }}</p>
              <a href="{{ route('contact') }}" class="c__button-circle dark">
                <span style="color: #fff;">{{ site_text('site.work_with_us.section_4_cta') }}</span>
                <div class="c__button-circle--arrow">
                  <img alt="right arrow" src="{{ asset('images/icons/right-arrow.svg') }}" />
                </div>
              </a>
            </div>
          </div>
          <div class="m__global-reach--gallery">
            <div class="owl-carousel">
              <div class="image" style="background-image: url(/images/default.png)"></div>
              <div class="image" style="background-image: url(/images/default.png)"></div>
              <div class="image" style="background-image: url(/images/default.png)"></div>
              <div class="image" style="background-image: url(/images/default.png)"></div>
              <div class="image" style="background-image: url(/images/default.png)"></div>
              <div class="image" style="background-image: url(/images/default.png)"></div>
            </div>
          </div>
        </section>

        <section class="m__beliefs">
          <div class="container">
            <div class="title-container">
              <div class="section-number">
                <span>05</span>
              </div>
              <h2 class="small">{{ site_text('site.work_with_us.section_5_title') }}</h2>
            </div>
            <div class="m__beliefs--content">
              <div class="m__beliefs--content--tile">
                <h4 class="large">{{ site_text('site.work_with_us.section_5_quote') }}</h4>
                <p class="small">{{ site_text('site.work_with_us.section_5_body') }}</p>
              </div>
            </div>
          </div>
        </section>

        <section class="m__clients">
          <div class="container">
            <div class="title-container">
              <div class="section-number">
                <span>06</span>
              </div>
              <h2 class="small">{{ site_text('site.work_with_us.section_6_title') }}</h2>
            </div>
            <p class="small">{{ site_text('site.work_with_us.section_6_body') }}</p>
            <div class="owl-carousel clients">
              <div class="row">
                @foreach ($clients as $client)
                <div class="col-xs-6 col-sm-3 tile">
                  <div class="m__clients--tile">
                    <img alt="" src="{{ $client->getFirstMediaUrl('clients') }}" />
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </section>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
      </div>
    </div>
  </div>
</div>
<input type="hidden" id="data_location" value="" />
@endsection