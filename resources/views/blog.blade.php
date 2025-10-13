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

    <div class="showreel-video-container">
      <img
        alt="close video"
        class="close-video"
        src="{{ asset('images/icons/close-white.svg') }}"
      />
      <video id="showreel-video" loop playsinline webkit-playsinline>
        <source
          src="{{ asset('videos/home.mp4') }}"
          type="video/mp4"
        />
      </video>
    </div>

    <div class="case-study-video-container"></div>
    <div class="working-with-us-scroll-image"></div>
    <div class="individual-service-scroll-image"></div>
    <!-- End of fixed elements -->

    <div id="viewport">
      <div id="scroll-container" class="scroll-container">
        <div id="barba-wrapper">
          <div class="barba-container">
            <section class="l__blog">
              <!-- <img
                class="l__blog--flame-background"
                src="{{ asset('images/icons/moon.jpg') }}"
              /> -->
              <div class="container">
                <div class="m__filters">
                  <!-- <h1>Lorem Ipsum</h1> -->
                  <ul>
                    <li data-value="all">
                      <p class="active">Blog</p>
                    </li>
                    <li data-value="strategy"><p>Strategy</p></li>
                    <li data-value="digital"><p>Digital</p></li>
                    <li data-value="creative"><p>Creative</p></li>
                    <li data-value="culture"><p>Culture</p></li>
                    <li data-value="news"><p>News</p></li>
                    <li data-value="branding"><p>Branding</p></li>
                    <li data-value="social"><p>Social</p></li>
                    <li data-value="christmas"><p>Christmas</p></li>
                    <li data-value="crm"><p>Crm</p></li>
                  </ul>
                </div>
              </div>
              <section class="m__latest-article">
                <div class="row">
                  <div class="col-xs-12 col-md-5 m__latest-article--left">
                    <p class="small">Blog</p>
                    <a
                      href="#"
                    >
                      <h3>
                        ​​Lorem Ipsum Dolor Sit Amet Consectetur
                        Adipiscing Elit Sed Do Eiusmod Tempor
                      </h3>
                    </a>
                    <div class="m__latest-article--left--author">
                      <img
                        class="m__latest-article--left--author--image"
                        alt="author profile image"
                        src="{{ asset('images/yangon.png') }}"
                      />
                      <p>lorem-ipsum</p>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-7 m__latest-article--right">
                    <div class="img-holder">
                      <img
                        class="m__latest-article--right--image img-object-fit"
                        src="{{ asset('images/bangkok.jpg') }}"
                        alt="Default Image"
                      />
                    </div>
                    <div class="m__latest-article--right--content">
                      <p class="xsmall">
                        LOREM IPSUM: ​​Lorem Ipsum Dolor Sit Amet Consectetur
                        Adipiscing Elit Sed Do Eiusmod Tempor Incididunt Ut Labore, a
                        leading dolor sit amet agency, and&hellip;
                      </p>
                      <a
                        href="#"
                        >Sed do eiusmod</a
                      >
                    </div>
                  </div>
                </div>
              </section>

              <div class="large-container">
                <section class="m__quad-group">
                  <div class="row">
                    <div class="col-md-5 col-lg-6 left">
                      <a
                        href="#"
                      >
                        <div class="m__quad-group--large-image">
                          <img
                            class="img-object-fit"
                            src="{{ asset('images/mandalay.jpg') }}"
                            alt=""
                          />
                        </div>
                      </a>
                      <div class="m__quad-group--content">
                        <a
                          href="#"
                        >
                          <h3>
                            LOREM IPSUM: dolor sit amet consectetur adipiscing elit
                            sed do eiusmod tempor
                          </h3>
                        </a>
                        <p class="xsmall">
                          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                          eiusmod tempor incididunt ut labore et dolore magna aliqua
                          &hellip;
                        </p>
                        <div class="m__quad-group--author">
                          <img
                            class="m__quad-group--author--image"
                            alt="author profile image"
                            src="{{ asset('images/mandalay.jpg') }}"
                          />
                          <p>lorem-ipsum</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-7 col-lg-6 right">
                      <div class="m__quad-group--tile">
                        <a
                          href="#"
                        >
                          <div class="m__quad-group--tile--image">
                            <img
                              class="img-object-fit"
                              src="{{ asset('images/bangkok.jpg') }}"
                              alt=""
                            />
                          </div>
                        </a>
                        <div class="m__quad-group--tile--content">
                          <a
                            href="#"
                          >
                            <h4 class="small">LOREM IPSUM DOLOR SIT</h4>
                          </a>
                          <div class="m__quad-group--author">
                            <img
                              class="m__quad-group--author--image"
                              alt="author profile image"
                              src="{{ asset('images/mandalay.jpg') }}"
                            />
                            <p>lorem-ipsum</p>
                          </div>
                        </div>
                      </div>

                      <div class="m__quad-group--tile">
                        <a
                          href="#"
                        >
                          <div class="m__quad-group--tile--image">
                            <img
                              class="img-object-fit"
                              src="{{ asset('images/yangon.png') }}"
                              alt="20 years of Digital"
                            />
                          </div>
                        </a>
                        <div class="m__quad-group--tile--content">
                          <a
                            href="#"
                          >
                            <h4 class="small">
                              Lorem Ipsum Dolor Sit Amet Consectetur Adipiscing
                            </h4>
                          </a>
                          <div class="m__quad-group--author">
                            <img
                              class="m__quad-group--author--image"
                              alt="author profile image"
                              src="{{ asset('images/mandalay.jpg') }}"
                            />
                            <p>lorem</p>
                          </div>
                        </div>
                      </div>

                      <div class="m__quad-group--tile">
                        <a
                          href="#"
                        >
                          <div class="m__quad-group--tile--image">
                            <img
                              class="img-object-fit"
                              src="{{ asset('images/yangon.png') }}"
                              alt=""
                            />
                          </div>
                        </a>
                        <div class="m__quad-group--tile--content">
                          <a
                            href="#"
                          >
                            <h4 class="small">
                              Sed do eiusmod tempor incididunt
                            </h4>
                          </a>
                          <div class="m__quad-group--author">
                            <img
                              class="m__quad-group--author--image"
                              alt="author profile image"
                              src="{{ asset('images/mandalay.jpg') }}"
                            />
                            <p>ipsum</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                <section class="l__blog-list">
                  <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-4">
                      <div class="m__list-tile">
                        <a
                          href="#"
                        >
                          <div class="m__list-tile--image">
                            <img
                              class="img-object-fit"
                              src="{{ asset('images/yangon.png') }}"
                              alt="Vans Pride Campaign"
                            />
                          </div>
                        </a>
                        <div class="m__list-tile--content">
                          <a
                            href="#"
                          >
                            <h4 class="small">Lorem Ipsum Dolor Sit</h4>
                          </a>
                          <p class="m__list-tile--content--excerpt xsmall">
                            Consectetur adipiscing elit sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua ut enim
                            ad minim veniam quis nostrud exercitation&hellip;
                          </p>
                          <div class="m__list-tile--content--author">
                            <img
                              class="m__list-tile--content--author--image"
                              alt="author profile image"
                              src="{{ asset('images/bangkok.jpg') }}"
                            />
                            <p>lorem</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-4">
                      <div class="m__list-tile">
                        <a
                          href="#"
                        >
                          <div class="m__list-tile--image">
                            <img
                              class="img-object-fit"
                              src="{{ asset('images/yangon.png') }}"
                              alt=""
                            />
                          </div>
                        </a>
                        <div class="m__list-tile--content">
                          <a
                            href="#"
                          >
                            <h4 class="small">Consectetur Adipiscing</h4>
                          </a>
                          <p class="m__list-tile--content--excerpt xsmall">
                            Elit sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua ut enim ad minim veniam quis
                            nostrud exercitation ullamco laboris&hellip;
                          </p>
                          <div class="m__list-tile--content--author">
                            <img
                              class="m__list-tile--content--author--image"
                              alt="author profile image"
                              src="{{ asset('images/bangkok.jpg') }}"
                            />
                            <p>ipsum</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-4">
                      <div class="m__list-tile">
                        <a
                          href="#"
                        >
                          <div class="m__list-tile--image">
                            <img
                              class="img-object-fit"
                              src="{{ asset('images/mandalay.jpg') }}"
                              alt=""
                            />
                          </div>
                        </a>
                        <div class="m__list-tile--content">
                          <a
                            href="#"
                          >
                            <h4 class="small">
                              Sed Do Eiusmod Tempor Incididunt Ut Labore
                            </h4>
                          </a>
                          <p class="m__list-tile--content--excerpt xsmall">
                            Et dolore magna aliqua ut enim ad minim veniam
                            quis nostrud exercitation ullamco laboris nisi ut
                            impacted plans for the post-Covid ‘return to&hellip;
                          </p>
                          <div class="m__list-tile--content--author">
                            <img
                              class="m__list-tile--content--author--image"
                              alt="author profile image"
                              src="{{ asset('yangon.png') }}"
                            />
                            <p>paul</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-4">
                      <div class="m__list-tile">
                        <a
                          href="#"
                        >
                          <div class="m__list-tile--image">
                            <img
                              class="img-object-fit"
                              src="{{ asset('images/bangkok.jpg') }}"
                              alt="why video wins on social media"
                            />
                          </div>
                        </a>
                        <div class="m__list-tile--content">
                          <a
                            href="#"
                          >
                            <h4 class="small">
                              Ut Enim Ad Minim Veniam Quis
                            </h4>
                          </a>
                          <p class="m__list-tile--content--excerpt xsmall">
                            It’s no exaggeration to say that Social Media
                            defines the way we communicate and how we consume
                            content online. And&hellip;
                          </p>
                          <div class="m__list-tile--content--author">
                            <img
                              class="m__list-tile--content--author--image"
                              alt="author profile image"
                              src="{{ asset('bangkok.jpg') }}"
                            />
                            <p>paul</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-4">
                      <div class="m__list-tile">
                        <a
                          href="#"
                        >
                          <div class="m__list-tile--image">
                            <img
                              class="img-object-fit"
                              src="{{ asset('images/yangon.png') }}"
                              alt=""
                            />
                          </div>
                        </a>
                        <div class="m__list-tile--content">
                          <a
                            href="#"
                          >
                            <h4 class="small">Velit Esse Cillum Dolore</h4>
                          </a>
                          <p class="m__list-tile--content--excerpt xsmall">
                            We can hear the sound of eyeballs rolling as you
                            open this. You’re probably sick of hearing about how
                            traditional&hellip;
                          </p>
                          <div class="m__list-tile--content--author">
                            <img
                              class="m__list-tile--content--author--image"
                              alt="author profile image"
                              src="{{ asset('images/yangon.png') }}"
                            />
                            <p>paul</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xs-12 col-md-6 col-lg-4">
                      <div class="m__list-tile">
                        <a
                          href="#"
                        >
                          <div class="m__list-tile--image">
                            <img
                              class="img-object-fit"
                              src="{{ asset('images/mandalay.jpg') }}"
                              alt="outrunners charity event"
                            />
                          </div>
                        </a>
                        <div class="m__list-tile--content">
                          <a
                            href="#"
                          >
                            <h4 class="small">
                              Eu Fugiat Nulla Pariatur Excepteur
                            </h4>
                          </a>
                          <p class="m__list-tile--content--excerpt xsmall">
                            We’re absolutely thrilled to announce our
                            partnership with Outrunners. A local charity based
                            in Hackney, which started as a running&hellip;
                          </p>
                          <div class="m__list-tile--content--author">
                            <img
                              class="m__list-tile--content--author--image"
                              alt="author profile image"
                              src="{{ asset('images/yangon.png') }}"
                            />
                            <p>sam</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="l__blog-list--more-articles">
                    <div
                      class="c__button-circle dark"
                      data-offset="11"
                      data-total="56"
                    >
                      <span>Lorem ipsum dolor sit</span>
                      <div class="c__button-circle--arrow">
                        <img
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" id="data_location" value="" />
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>


@endsection
