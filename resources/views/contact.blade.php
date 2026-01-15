@extends('layouts.main')
@section('content')

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
              <div class="container">
                <div class="row">
                  <div class="col-xs-12 col-md-8 left">
                    <h2 class="medium"> Lorem Ipsum has </h2>
                    <div class="horizontal-line"></div>
                    <div class="l__contact--switcher">
                    <h4 id="one" class="switch small active">Myanmar</h4>
                    <h4 id="two" class="switch small">Thailand</h4>

                      <div
                        class="l__contact--switcher--info switcher active"
                        id="contact-one"
                      >
                        <div class="l__contact--switcher--info--links">
                          <a href="tel:+66 4072128616" class="small"
                            >+66 4072128616</a
                          >
                          <a href="mailto:hello@codenclickmm.com" class="small"
                            >myanmar@codenclickmm.com</a
                          >
                        </div>
                        <div class="c__button dark open-get-in-touch">
                          Enquire now
                        </div>
                      </div>

                      <div
                        class="l__contact--switcher--info switcher"
                        id="contact-two"
                      >
                        <div class="l__contact--switcher--info--links">
                          <a href="tel:490394938" class="small">+95 4072128616</a>
                          <a href="mailto:hello@codenclickmm.com" class="small"
                            >hello@codenclickmm.com</a
                          >
                        </div>
                        <div class="c__button dark open-get-in-touch">
                          Enquire now
                        </div>
                      </div>

                      <div
                        class="l__contact--switcher--info switcher"
                        id="contact-four"
                      >
                        <div class="l__contact--switcher--info--links">
                          <a href="tel:66 4072128616" class="small"
                            >66 4072128616</a
                          >
                          <a href="mailto:hello@code&click.com" class="small"
                            >hello@code&click.com</a
                          >
                        </div>
                        <div class="c__button dark open-get-in-touch">
                          Enquire now
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-4 right">
                    <!-- <div class="c__button-circle dark">
          <h4 class="small">Careers</h4>
          <div class="c__button-circle--arrow">
            <img src="https://ignitecreates.com/wp-content/themes/ignite/library/images/icons/right-arrow-dark.svg" />
          </div>
        </div> -->
                    <div class="horizontal-line"></div>
                    <a href="/careers" title="Careers" class="careers-link"
                      ><h4 class="small">Careers</h4></a
                    >
                    <p>
                      Lorem Ipsum has been the industry's standard
                      <a href="mailto:info@codeandclickmm.com"
                        > info@codeandclickmm.com </a
                      >
                    </p>
                  </div>
                  <div class="col-xs-12 l__contact--office-heading">
                    <img
                      id="scroll-to-office"
                      alt="scroll down"
                      src="{{ asset('images/icons/down-arrow.svg') }}"
                    />
                    <h4 class="small">Our Offices</h4>
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
                  <h1 class="text-6xl">Yangon</h1>
                  <div class="m__office-tile--card">
                    <div class="row">
                      <h4>Code & click Yangon</h4>
                      <div
                        class="col-xs-12 col-sm-6 m__office-tile--card--address"
                      >
                        <p>
                          The Office Group, <br />
                          York Way, <br />
                          Yangon,<br />
                          N1C 4AX
                        </p>
                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <a href="tel:+44 (0)20 7697 0151" class="small"
                          >+95 (0)20 7697 0151</a
                        >
                        <a href="mailto:hello@code&click.com" class="small"
                          >hello@code&click.com</a
                        >
                        <div class="c__button light open-get-in-touch">
                          Enquire now
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
                  <h1 class="text-6xl">Bangkok</h1>
                  <div class="m__office-tile--card">
                    <div class="row">
                      <h4>Code & Click Bangkok</h4>
                      <div
                        class="col-xs-12 col-sm-6 m__office-tile--card--address"
                      >
                        <p>
                          21 East Bayshore Drive, <br />
                          Port Orange, <br />
                          FL 32127
                        </p>
                      </div>
                      <div class="col-xs-12 col-sm-6">
                        <a href="tel:66 4072128616" class="small"
                          >+66 9072128616</a
                        >
                        <a href="mailto:hello@code&click.com" class="small"
                          >hello@code&click.com</a
                        >
                        <div class="c__button light open-get-in-touch">
                          Enquire now
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
