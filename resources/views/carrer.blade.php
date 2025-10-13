@extends('layouts.main')
@section('content')
    <!-- Elements moved here for fixed positions, had to remove smooth scroll so was no longer working inside there containers -->
    {{-- <div class="home-video-container">
      <video id="home-video" loop autoplay muted playsinline webkit-playsinline>
        <source src="{{ asset('videos/home.mp4') }}" type="video/mp4" />
        Your browser does not support the video tag.
      </video>
    </div> --}}


    <div class="case-study-video-container"></div>
    <div class="working-with-us-scroll-image"></div>
    <div class="individual-service-scroll-image"></div>
    <!-- End of fixed elements -->

    <div id="viewport">
      <div id="scroll-container" class="scroll-container">
        <div id="barba-wrapper">
          <div class="barba-container">
            <div class="l__ventures">
              <!-- <img
                class="l__ventures--flame-background"
                src="https://ignitecreates.com/wp-content/themes/ignite/library/images/graphics/black-faded-flame-background.png"
              /> -->

              <section class="l__ventures--titles">
                <div class="medium-container">
                  <h1>Lorem Ipsum</h1>
                  <h4 class="small">
                    Sit amet consectetur adipiscing elit sed do eiusmod tempor
                    incididunt ut labore et dolore magna aliqua ut enim ad
                    minim veniam quis nostrud exercitation ullamco laboris.
                  </h4>
                </div>
                <a href="#" class="c__button light" id="scroll-to"
                  >See below</a
                >
              </section>

              <section class="l__current-holdings">
                <div class="container">
                  <h3>Open Positions</h3>
                  <a href="#" class="c__button carbutt light" id="uk-butt"
                    >Location 1</a
                  >

                  <div class="vacancies">
                    <div class="row uk-job">
                      <div class="col-xs-12 col-sm-7 col-md-8">
                        <h3>Graphic Designer</h3>
                      </div>
                      <div class="col-xs-12 col-sm-5 col-md-4 | button-col">
                        <a
                          href="#"
                          target=""
                          class="c__button-circle light"
                        >
                          <span>Read More</span>
                          <div class="c__button-circle--arrow">
                            <img
                              alt="right arrow"
                              src="{{ asset('images/icons/right-arrow.svg') }}"
                            />
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="row uk-job">
                      <div class="col-xs-12 col-sm-7 col-md-8">
                        <h3>Web Developer</h3>
                      </div>
                      <div class="col-xs-12 col-sm-5 col-md-4 | button-col">
                        <a
                          href="#"
                          target=""
                          class="c__button-circle light"
                        >
                          <span>Read More</span>
                          <div class="c__button-circle--arrow">
                            <img
                              alt="right arrow"
                              src="{{ asset('images/icons/right-arrow.svg') }}"
                            />
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="row uk-job">
                      <div class="col-xs-12 col-sm-7 col-md-8">
                        <h3>Project Manager</h3>
                      </div>
                      <div class="col-xs-12 col-sm-5 col-md-4 | button-col">
                        <a
                          href="#"
                          target=""
                          class="c__button-circle light"
                        >
                          <span>Read More</span>
                          <div class="c__button-circle--arrow">
                            <img
                              alt="right arrow"
                              src="{{ asset('images/icons/right-arrow.svg') }}"
                            />
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="row uk-job">
                      <div class="col-xs-12 col-sm-7 col-md-8">
                        <h3>Marketing Manager</h3>
                      </div>
                      <div class="col-xs-12 col-sm-5 col-md-4 | button-col">
                        <a
                          href="#"
                          target=""
                          class="c__button-circle light"
                        >
                          <span>Read More</span>
                          <div class="c__button-circle--arrow">
                            <img
                              alt="right arrow"
                              src="{{ asset('images/icons/right-arrow.svg') }}"
                            />
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>

            <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

            <!-- #moove_gdpr_cookie_modal -->
            <!--/copyscapeskip-->
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" id="data_location" value="" />

@endsection
