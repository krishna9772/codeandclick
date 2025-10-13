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
            <div class="l__ventures">
              <div class="l__ventures--titles">
                <div class="medium-container">
                  <h1> Lorem Ipsum</h1>
                  <h3>dummy text ever since the 1500s, when an unknown printer </h3>
                </div>
                <a href="/contact" class="c__button light">Get in touch</a>
              </div>
              <section class="m__ventures-intro">
                <div class="img-holder">
                  <img
                    class="img-object-fit"
                    src="{{ asset('images/default.png') }}"
                  />
                </div>
                <div class="m__ventures-intro--content">
                  <h4 class="medium">Develop. Advise. Incubate. Invest.</h4>
                  <p class="small">
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer t
                  </p>
                </div>
              </section>
              <section style="background-color: black;" class="l__current-holdings">
                <div class="container">
                  <h3>Current Holdings</h3>
                  <p class="large subtext">
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer t.
                  </p>
                  <div class="row">
                    @foreach ($ventures as $venture)
                    <div class="col-md-6 m__current-holding-tile">
                      <div class="img-holder">
                        <img
                          class="img-object-fit main"
                          src="{{ asset($venture->getFirstMediaUrl('ventures')) }}"
                        />
                      </div>
                      <div class="m__current-holding-tile--content">
                        <h4>{{ $venture->title }}</h4>
                        <p class="xsmall">
                          {{ $venture->content }}
                        </p>
                        @if ($venture->link)
                        <a
                          href="{{ $venture->link }}"
                          target=""
                          class="c__button-circle light"
                        >
                          <span>Visit site</span>
                          <div class="c__button-circle--arrow">
                            <img
                              alt="right arrow"
                              src="{{ asset('images/icons/right-arrow.svg') }}"
                            />
                          </div>
                        </a>
                        @endif
                      </div>
                    </div>
                    <div class="col-md-6 m__current-holding-tile">
                      <div class="img-holder">
                        <img
                          class="img-object-fit main"
                          src="{{ asset('images/default.png') }}"
                        />
                      </div>
                      <div class="m__current-holding-tile--content">
                        <h4>Title</h4>
                        <p class="xsmall">
                          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer <br />
                          <br />
                          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        </p>
                        <a
                          href="#"
                          target=""
                          class="c__button-circle light"
                        >
                          <span>Visit site</span>
                          <div class="c__button-circle--arrow">
                            <img
                              alt="right arrow"
                              src="{{ asset('images/icons/right-arrow.svg') }}"
                            />
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-6 m__current-holding-tile">
                      <div class="img-holder">
                        <img
                          class="img-object-fit main"
                          src="{{ asset('images/default.png') }}"
                        />
                      </div>
                      <div class="m__current-holding-tile--content">
                        <h4>Title</h4>
                        <p class="xsmall">
                          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer <br />
                          <br />
                          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer t
                        </p>
                        <a
                          href="#"
                          target=""
                          class="c__button-circle light"
                        >
                          <span>Visit site</span>
                          <div class="c__button-circle--arrow">
                            <img
                              alt="right arrow"
                              src="{{ asset('images/icons/right-arrow.svg') }}"
                            />
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-6 m__current-holding-tile">
                      <div class="img-holder">
                        <img
                          class="img-object-fit main"
                          src="{{ asset('images/default.png') }}"

                        />
                      </div>
                      <div class="m__current-holding-tile--content">
                        <h4>Title</h4>
                        <p class="xsmall">
                          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer t<br />
                          <br />
                          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer t
                        </p>
                        <a
                          href="#"
                          target=""
                          class="c__button-circle light"
                        >
                          <span>Visit site</span>
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
              <section class="l__how-we-help">
                <div class="container">
                  <div class="l__how-we-help--list">
                    <h3> Lorem Ipsum has been the</h3>
                    <div class="row">
                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 tile">
                        <div class="m__how-we-help-tile">
                          <img
                            src="https://ignitecreates.com/wp-content/uploads/2020/09/idea.svg"
                          />
                          <h4 class="small">Idea enhancement</h4>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 tile">
                        <div class="m__how-we-help-tile">
                          <img
                            src="https://ignitecreates.com/wp-content/uploads/2020/09/strat-dev.svg"
                          />
                          <h4 class="small">Strategy Development</h4>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 tile">
                        <div class="m__how-we-help-tile">
                          <img
                            src="https://ignitecreates.com/wp-content/uploads/2020/09/Brand-Strat.svg"
                          />
                          <h4 class="small">Brand Strategy</h4>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 tile">
                        <div class="m__how-we-help-tile">
                          <img
                            src="https://ignitecreates.com/wp-content/uploads/2020/09/market-gap.svg"
                          />
                          <h4 class="small">Market Gap Analysis</h4>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 tile">
                        <div class="m__how-we-help-tile">
                          <img
                            src="https://ignitecreates.com/wp-content/uploads/2020/09/product.svg"
                          />
                          <h4 class="small">Product Development</h4>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 tile">
                        <div class="m__how-we-help-tile">
                          <img
                            src="https://ignitecreates.com/wp-content/uploads/2020/09/investor.svg"
                          />
                          <h4 class="small">
                            Investor introductions &amp; proposals
                          </h4>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 tile">
                        <div class="m__how-we-help-tile">
                          <img
                            src="https://ignitecreates.com/wp-content/uploads/2020/09/technology.svg"
                          />
                          <h4 class="small">Technology</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="l__getting-in-touch">
                    <h3> Lorem Ipsum has been the industry's?</h3>
                    <h4 class="small">
                      Get in touch to see how we can help you.
                    </h4>
                    <a href="/contact" class="c__button light">Get in touch</a>
                  </div>
                </div>
              </section>
            </div>
            <!--/copyscapeskip-->
              <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

          </div>
        </div>
      </div>
    </div>
    <input type="hidden" id="data_location" value="" />
@endsection
