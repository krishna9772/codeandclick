@extends('layouts.main')
@section('content')

    <div class="case-study-video-container"></div>
    <div class="working-with-us-scroll-image"></div>
    <div class="individual-service-scroll-image"></div>
    <!-- End of fixed elements -->

    <div id="viewport">
      <div id="scroll-container" class="scroll-container">
        <div id="barba-wrapper">
          <div class="barba-container">
            <section class="l__what-we-do">
              <!-- <img
                class="l__what-we-do--flame-background"
                src="https://ignitecreates.com/wp-content/themes/ignite/library/images/graphics/black-flame-background.png"
              /> -->
              <div class="container">
                <h4 class="small"> Lorem Ipsum has </h4>
                <div class="owl-carousel title-carousel">
                  <h1> printer </h1>
                  <h1>Websites</h1>
                  <h1> Lorem Ipsum has</h1>
                  <h1> dummy text ever</h1>
                </div>
              </div>

              <div class="m__what-we-do--intro">
                <div class="m__what-we-do--intro--bg-image">
                  <video loop autoplay muted playsinline webkit-playsinline>
                    <source
                      src="{{ asset('videos/Dance4.mp4') }}"
                      type="video/mp4"
                    />
                  </video>
                  <!-- <img class="img-object-fit" src="https://ignitecreates.com/wp-content/uploads/2020/03/marriott-background.jpg"  /> -->
                </div>
                <div class="m__what-we-do--intro--content">
                  <h4>I Lorem Ipsum has been the industry's </h4>
                  <p>
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer t
                  </p>
                </div>
              </div>

              <div class="l__what-we-do--services">
                <div class="container">
                  <h2 class="small">
                    Lorem Ipsum has been the industry's standard
                  </h2>
                  <p class="large">
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer t
                  </p>
                  <div class="row">
                    <div
                      class="col-xs-12 col-sm-6 col-md-4 m__services--tile clickable-block"
                    >
                      <div class="m__services--tile--image-holder">
                        <img
                          class="img-object-fit"
                          src="{{ asset('images/default.png') }}"
                        />
                      </div>
                      <a
                        href="#"
                        target=""
                        class="c__button-circle light"
                      >
                        <span> Lorem Ipsum has been </span>
                        <div class="c__button-circle--arrow">
                          <img
                            alt="right arrow"
                            src="{{ asset('images/icons/right-arrow.svg') }}"
                          />
                        </div>
                      </a>
                    </div>
                    <div
                      class="col-xs-12 col-sm-6 col-md-4 m__services--tile clickable-block"
                    >
                      <div class="m__services--tile--image-holder">
                        <img
                          class="img-object-fit"
                          src="{{ asset('images/default.png') }}"
                        />
                      </div>
                      <a
                        href="#"
                        target=""
                        class="c__button-circle light"
                      >
                        <span> when an unknown printer t</span>
                        <div class="c__button-circle--arrow">
                          <img
                            alt="right arrow"
                            src="{{ asset('images/icons/right-arrow.svg') }}"
                          />
                        </div>
                      </a>
                    </div>
                    <div
                      class="col-xs-12 col-sm-6 col-md-4 m__services--tile clickable-block"
                    >
                      <div class="m__services--tile--image-holder">
                        <img
                          class="img-object-fit"
                          src="{{ asset('images/default.png') }}"
                        />
                      </div>
                      <a
                        href="#"
                        target=""
                        class="c__button-circle light"
                      >
                        <span>CRM &#038;  Lorem Ipsum </span>
                        <div class="c__button-circle--arrow">
                          <img
                            alt="right arrow"
                            src="{{ asset('images/icons/right-arrow.svg') }}"
                          />
                        </div>
                      </a>
                    </div>
                    <div
                      class="col-xs-12 col-sm-6 col-md-4 m__services--tile clickable-block"
                    >
                      <div class="m__services--tile--image-holder">
                        <img
                          class="img-object-fit"
                          src="{{ asset('images/default.png') }}"
                        />
                      </div>
                      <a
                        href="#"
                        target=""
                        class="c__button-circle light"
                      >
                        <span> Lorem Ipsum </span>
                        <div class="c__button-circle--arrow">
                          <img
                            alt="right arrow"
                            src="{{ asset('images/icons/right-arrow.svg') }}"
                          />
                        </div>
                      </a>
                    </div>
                    <div
                      class="col-xs-12 col-sm-6 col-md-4 m__services--tile clickable-block"
                    >
                      <div class="m__services--tile--image-holder">
                        <img
                          class="img-object-fit"
                          src="{{ asset('images/default.png') }}"
                        />
                      </div>
                      <a
                        href="#"
                        target=""
                        class="c__button-circle light"
                      >
                        <span>Lorem ipsum dolor </span>
                        <div class="c__button-circle--arrow">
                          <img
                            alt="right arrow"
                            src="{{ asset('images/icons/right-arrow.svg') }}"
                          />
                        </div>
                      </a>
                    </div>
                    <div
                      class="col-xs-12 col-sm-6 col-md-4 m__services--tile clickable-block"
                    >
                      <div class="m__services--tile--image-holder">
                        <img
                          class="img-object-fit"
                          src="{{ asset('images/default.png') }}"
                        />
                      </div>
                      <a
                        href="#"
                        target=""
                        class="c__button-circle light"
                      >
                        <span> Lorem Ipsum has </span>
                        <div class="c__button-circle--arrow">
                          <img
                            alt="right arrow"
                            src="{{ asset('images/icons/right-arrow.svg') }}"
                          />
                        </div>
                      </a>
                    </div>
                    <div
                      class="col-xs-12 col-sm-6 col-md-4 m__services--tile clickable-block"
                    >
                      <div class="m__services--tile--image-holder">
                        <img
                          class="img-object-fit"
                          src="{{ asset('images/default.png') }}"
                        />
                      </div>
                      <a
                        href="#"
                        target=""
                        class="c__button-circle light"
                      >
                        <span> Lorem Ipsum has </span>
                        <div class="c__button-circle--arrow">
                          <img
                            alt="right arrow"
                            src="{{ asset('images/icons/right-arrow.svg') }}"
                          />
                        </div>
                      </a>
                    </div>
                    <div
                      class="col-xs-12 col-sm-6 col-md-4 m__services--tile clickable-block"
                    >
                      <div class="m__services--tile--image-holder">
                        <img
                          class="img-object-fit"
                          src="{{ asset('images/default.png') }}"
                        />
                      </div>
                      <a
                        href="#"
                        target=""
                        class="c__button-circle light"
                      >
                        <span> Lorem Ipsum </span>
                        <div class="c__button-circle--arrow">
                          <img
                            alt="right arrow"
                            src="{{ asset('images/icons/right-arrow.svg') }}"
                          />
                        </div>
                      </a>
                    </div>
                    <div
                      class="col-xs-12 col-sm-6 col-md-4 m__services--tile clickable-block"
                    >
                      <div class="m__services--tile--image-holder">
                        <img
                          class="img-object-fit"
                          src="{{ asset('images/default.png') }}"
                        />
                      </div>
                      <a
                        href="#"
                        target=""
                        class="c__button-circle light"
                      >
                        <span> Lorem Ipsum </span>
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

              <section class="m__testimonials">
                <div class="m__testimonials--mobile">
                  <div class="owl-carousel testimonial">
                    <img
                      class="mobile-logo"
                       src="{{ asset('images/default.png') }}"
                    />
                    <img
                      class="mobile-logo"
                      src="{{ asset('images/default.png') }}"
                    />
                    <img
                      class="mobile-logo"
                      src="{{ asset('images/default.png') }}"
                    />
                  </div>
                </div>
                <div class="container">
                  <div class="m__testimonials--content">
                    <div class="owl-carousel testimonial">
                      <div>
                        <h4>
                          “ Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer t”
                        </h4>
                        <p>Gustaf Pilebjer, Director F&amp;B Europe</p>
                        <p>Marriott</p>
                      </div>
                      <div>
                        <h4>“ Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer t”</h4>
                        <p>Will Beckett, Co-Founder</p>
                        <p>Hawksmoor</p>
                      </div>
                      <div>
                        <h4>“ Lorem Ipsum has been the industry's standard dummy text ”</h4>
                        <p>Libby Andrews, Marketing Director</p>
                        <p>Pho</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="m__testimonials--bg-image">
                  <div class="owl-carousel">
                    <div
                      style="
                        background-image: url('/images/slider.jpg');
                      "
                    ></div>
                    <div
                      style="
                        background-image: url('/images/slider.jpg');
                      "
                    ></div>
                    <div
                      style="
                        background-image: url('/images/slider.jpg');
                      "
                    ></div>
                  </div>
                </div>
              </section>

              <section class="m__awards">
                <div class="container">
                  <h3> Lorem Ipsum has been the industry's</h3>
                  <div class="row">
                    <div class="col-xs-6 col-sm-3 tile">
                      <div class="m__awards--tile">
                        <img
                          src="{{ asset('images/default.png') }}"
                        />
                        <p> Lorem Ipsum has been the</p>
                      </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 tile">
                      <div class="m__awards--tile">
                        <img
                          src="{{ asset('images/default.png') }}"
                        />
                        <p> when an unknown printer t</p>
                      </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 tile">
                      <div class="m__awards--tile">
                        <img
                          src="{{ asset('images/default.png') }}"
                        />
                        <p>standard dummy text ever </p>
                      </div>
                    </div>
                    <div class="col-xs-6 col-sm-3 tile">
                      <div class="m__awards--tile">
                        <img
                          src="{{ asset('images/default.png') }}"
                        />
                        <p> Lorem Ipsum has been</p>
                      </div>
                    </div>
                  </div>
                  <div class="horizontal-line"></div>
                </div>
              </section>


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
