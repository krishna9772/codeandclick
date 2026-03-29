@extends('layouts.main')
@section('body_class', 'wp-singular page-template page-template-page-contact page page-id-5433 wp-theme-ignite no-smooth-scroll')
@section('content')
    <style>
      .l__contact {
        background-color: #f5f5f5;
      }

      .l__contact .left h2,
      .l__contact .right h4,
      .l__contact .right p,
      .l__contact .right p a,
      .l__contact--switcher h4,
      .l__contact--switcher--info--links a,
      .l__contact--office-heading h4 {
        color: #121212;
      }

      .l__contact .right .horizontal-line,
      .l__contact .left .horizontal-line {
        background-color: rgba(18, 18, 18, 0.12);
      }

      .l__contact--office-heading img {
        filter: invert(1);
      }
    </style>

    <!-- Elements moved here for fixed positions, had to remove smooth scroll so was no longer working inside there containers -->
    {{-- <div class="home-video-container">
      <video id="home-video" loop autoplay muted playsinline webkit-playsinline>
        <source
          src="{{ asset('videos/home.mp4') }}"
          type="video/mp4"
        />
      </video>
    </div> --}}

    <!-- <div class="showreel-video-overlay"></div> -->

    <div class="case-study-video-container"></div>
    <div class="working-with-us-scroll-image"></div>
    <div class="individual-service-scroll-image"></div>
    <!-- End of fixed elements -->

    <div id="viewport">
      <div id="scroll-container" class="scroll-container">
        <div id="barba-wrapper">
          <div class="barba-container">
            <section class="l__contact">
              <img class="l__contact--flame-background" src="{{ asset('images/grey-flame-background.png') }}" style="transform: matrix(1, 0, 0, 1, 0, 0);">
              <div class="container">
                <div class="row">
                  <div class="col-xs-12 col-md-8 left">
                    <h2 class="medium">{{ site_text('site.contact.work_with_us') }}</h2>
                    <div class="horizontal-line"></div>
                    <div class="l__contact--switcher">
                      <h4 id="one" class="switch small active">{{ site_text('site.contact.myanmar') }}</h4>
                      <h4 id="two" class="switch small">{{ site_text('site.contact.thailand') }}</h4>

                      <div
                        class="l__contact--switcher--info switcher active"
                        id="contact-one"
                      >
                        <div class="l__contact--switcher--info--links">
                          <a href="tel:+9594072128616" class="small"
                            >+95 94072128616</a
                          >
                          <a href="mailto:myanmar@codenclickmm.com" class="small"
                            >myanmar@codenclickmm.com</a
                          >
                        </div>
                        <div class="c__button dark open-get-in-touch">
                          {{ site_text('site.contact.enquire_now') }}
                        </div>
                      </div>

                      <div
                        class="l__contact--switcher--info switcher"
                        id="contact-two"
                      >
                        <div class="l__contact--switcher--info--links">
                          <a href="tel:+669072128616" class="small">+66 9072128616</a>
                          <a href="mailto:thailand@codenclickmm.com" class="small"
                            >thailand@codenclickmm.com</a
                          >
                        </div>
                        <div class="c__button dark open-get-in-touch">
                          {{ site_text('site.contact.enquire_now') }}
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-4 right">
                    <div class="horizontal-line"></div>
                    <a href="{{ route('show-careers') }}" title="{{ site_text('site.contact.careers_title') }}" class="careers-link">
                      <h4 class="small">{{ site_text('site.contact.careers_title') }}</h4>
                    </a>
                    <p>
                      {{ site_text('site.contact.careers_body_before') }}
                      <a href="mailto:info@codenclickmm.com" style="text-decoration: underline;">{{ site_text('site.contact.careers_body_link') }}</a>{{ site_text('site.contact.careers_body_after') }}
                    </p>
                  </div>
                  <div class="col-xs-12 l__contact--office-heading">
                    <img
                      id="scroll-to-office"
                      alt="scroll down"
                      src="{{ asset('images/icons/down-arrow.svg') }}"
                    />
                    <h4 class="small">{{ site_text('site.contact.our_offices') }}</h4>
                  </div>
                </div>
              </div>

              <div class="large-container">
                <div
                  class="m__office-tile"
                  id="london"
                  style="
                    background-image: url(/images/yangon.png);
                  "
                >
                  <h1>{{ site_text('site.contact.yangon') }}</h1>
                  <div class="m__office-tile--card">
                    <div class="row">
                      <h4>{{ site_text('site.contact.yangon_office') }}</h4>
                      <div
                        class="col-xs-12 col-sm-6 m__office-tile--card--address"
                      >
                        <p>
                          {{ site_text('site.contact.yangon_address_line_1') }} <br />
                          {{ site_text('site.contact.yangon_address_line_2') }} <br />
                          {{ site_text('site.contact.yangon_address_line_3') }} <br />
                          {{ site_text('site.contact.yangon_address_line_4') }}
                        </p>
                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <a href="tel:+9594072128616" class="small"
                          >+95 94072128616</a
                        >
                        <a href="mailto:myanmar@codenclickmm.com" class="small"
                          >myanmar@codenclickmm.com</a
                        >
                        <div class="c__button light open-get-in-touch">
                          {{ site_text('site.contact.enquire_now') }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div
                  class="m__office-tile"
                  id="fl"
                  style="
                    background-image: url(/images/bangkok.jpg);
                  "
                >
                  <h1>{{ site_text('site.contact.bangkok') }}</h1>
                  <div class="m__office-tile--card">
                    <div class="row">
                      <h4>{{ site_text('site.contact.bangkok_office') }}</h4>
                      <div
                        class="col-xs-12 col-sm-6 m__office-tile--card--address"
                      >
                        <p>
                          {{ site_text('site.contact.bangkok_address_line_1') }} <br />
                          {{ site_text('site.contact.bangkok_address_line_2') }} <br />
                          {{ site_text('site.contact.bangkok_address_line_3') }}
                        </p>
                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <a href="tel:+669072128616" class="small"
                          >+66 9072128616</a
                        >
                        <a href="mailto:thailand@codenclickmm.com" class="small"
                          >thailand@codenclickmm.com</a
                        >
                        <div class="c__button light open-get-in-touch">
                          {{ site_text('site.contact.enquire_now') }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>

            <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

            <!-- #moove_gdpr_cookie_modal -->
            <!--/copyscapeskip-->
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" id="data_location" value="" />
 @endsection
