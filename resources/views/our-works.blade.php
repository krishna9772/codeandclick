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
            <section class="l__our-work">
              <!-- <img
                class="l__our-work--flame-background"
                src="https://ignitecreates.com/wp-content/themes/ignite/library/images/graphics/grey-flame-background.png"
              /> -->
              <div class="container fade-transition">
                <h1>Our Services</h1>
                <div class="m__our-work--filters">
                  <div class="m__our-work--filters--selector">
                    <h4 id="one" class="selector active">Project Type</h4>
                    <!-- <h4 id="two" class="selector">Client</h4> -->
                  </div>
                  <div class="m__our-work--filters--tabs">
                    <ul id="tab-one" class="tab active">
                      <li class="active" data-name="work_type" data-value="all">
                        <p>Branding Solution</p>
                      </li>
                      <li data-name="work_type" data-value="copywriting">
                        <p>Brand Strategy</p>
                      </li>
                      <li data-name="work_type" data-value="brand-strategy">
                        <p>Consultancy Integration and Culture</p>
                      </li>
                      <li
                        data-name="work_type"
                        data-value="advertising_campaign"
                      >
                        <p>Brand Identity(Logo Design and Brand Book)</p>
                      </li>
                      <li data-name="work_type" data-value="digital_marketing">
                        <p>Marketing Services</p>
                      </li>
                      <li data-name="work_type" data-value="websites">
                        <p>Marketing Strategy and Consultancy
Digital Marketing</p>
                      </li>
                      <li data-name="work_type" data-value="branding_strategy">
                        <p>Social Media</p>
                      </li>
                      <li data-name="work_type" data-value="games_tech">
                        <p>Search Engine Optimization(SEO) </p>
                      </li>
                      <li data-name="work_type" data-value="photography_video">
                        <p>Digital Optimization</p>
                      </li>
                      <li data-name="work_type" data-value="design_animation">
                        <p>Media and Press</p>
                      </li>
                      <li data-name="work_type" data-value="social_influencers">
                        <p>Events Coverage and Live Streaming </p>
                      </li>
                       <li data-name="work_type" data-value="social_influencers">
                        <p>Creative Design </p>
                      </li>
                       <li data-name="work_type" data-value="social_influencers">
                        <p>Website and Social Media Content </p>
                      </li>
                       <li data-name="work_type" data-value="social_influencers">
                        <p>Video Production </p>
                      </li>
                       <li data-name="work_type" data-value="social_influencers">
                        <p>Motions</p>
                      </li>
                       <li data-name="work_type" data-value="social_influencers">
                        <p>Photo Shooting</p>
                      </li>
                       <li data-name="work_type" data-value="social_influencers">
                        <p>Mobile App Development</p>
                      </li>
                      <li data-name="work_type" data-value="social_influencers">
                        <p>Web Design</p>
                      </li>
                    </ul>

                  </div>
                </div>
              </div>

              <div class="large-container fade-transition">
                <div class="row" id="work-blocks">
                  <div class="col-xs-12 col-md-6 left">
                    <div
                      class="m__our-work--block large clickable-block bg-cover"
                      style="
                        background-image: url(images/default.png);
                      "
                    >
                      <div class="m__our-work--block--overlay"></div>
                      <div class="m__our-work--block--content">
                        <p class="small">Title</p>
                        <h5 class="xlarge">
                          Description<br />
                        </h5>
                      </div>
                      <a
                        class="m__our-work--block--link small"
                        href="#"
                      >
                        Short Text
                        <img
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </a>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-6 right double">
                    <div
                      class="m__our-work--block small clickable-block bg-cover"
                      style="
                        background-image: url(images/default.png);
                      "
                    >
                      <div class="m__our-work--block--overlay"></div>
                      <div class="m__our-work--block--content">
                        <p class="small">Title</p>
                        <h5 class="xlarge">
                          Description
                        </h5>
                      </div>
                      <a
                        class="m__our-work--block--link small"
                        href="#"
                      >
                        Short Text
                        <img
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </a>
                    </div>

                    <div
                      class="m__our-work--block small clickable-block bg-cover"
                      style="
                        background-image: url(images/default.png);
                      "
                    >
                      <div class="m__our-work--block--overlay"></div>
                      <div class="m__our-work--block--content">
                        <p class="small">Title</p>
                        <h5 class="xlarge">
                          Description
                        </h5>
                      </div>
                      <a
                        class="m__our-work--block--link small"
                        href="#"
                      >
                        Short Text
                        <img
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </a>
                    </div>
                  </div>

                  <div class="col-xs-12">
                    <div
                      class="m__our-work--block full-width clickable-block bg-cover"
                      style="
                        background-image: url(images/default.png);
                      "
                    >
                      <div class="m__our-work--block--overlay"></div>
                      <div class="m__our-work--block--content">
                        <p class="small">Title</p>
                        <h5 class="xlarge">Description</h5>
                      </div>
                      <a
                        class="m__our-work--block--link small"
                        href="#"
                      >
                        Short Text
                        <img
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </a>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-6 left">
                    <div
                      class="m__our-work--block large clickable-block bg-cover"
                      style="
                        background-image: url(images/default.png);
                      "
                    >
                      <div class="m__our-work--block--overlay"></div>
                      <div class="m__our-work--block--content">
                        <p class="small">Title</p>
                        <h5 class="xlarge">
                          Description
                        </h5>
                      </div>
                      <a
                        class="m__our-work--block--link small"
                        href="#"
                      >
                        Short Text
                        <img
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </a>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-6 right double">
                    <div
                      class="m__our-work--block small clickable-block bg-cover"
                      style="
                        background-image: url(images/default.png);
                      "
                    >
                      <div class="m__our-work--block--overlay"></div>
                      <div class="m__our-work--block--content">
                        <p class="small">Title</p>
                        <h5 class="xlarge">
                          Description
                        </h5>
                      </div>
                      <a
                        class="m__our-work--block--link small"
                        href="#"
                      >
                        Short Text
                        <img
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </a>
                    </div>

                    <div
                      class="m__our-work--block small clickable-block bg-cover"
                      style="
                        background-image: url(images/default.png);
                      "
                    >
                      <div class="m__our-work--block--overlay"></div>
                      <div class="m__our-work--block--content">
                        <p class="small">Title</p>
                        <h5 class="xlarge">
                          Description
                        </h5>
                      </div>
                      <a
                        class="m__our-work--block--link small"
                        href="#"
                      >
                        Short Text
                        <img
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </a>
                    </div>
                  </div>

                  <div class="col-xs-12">
                    <div
                      class="m__our-work--block full-width clickable-block bg-cover"
                      style="
                        background-image: url(images/default.png);
                      "
                    >
                      <div class="m__our-work--block--overlay"></div>
                      <div class="m__our-work--block--content">
                        <p class="small">Title</p>
                        <h5 class="xlarge">
                          Description
                        </h5>
                      </div>
                      <a
                        class="m__our-work--block--link small"
                        href="#"
                      >
                        Short Text
                        <img
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </a>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-6 left">
                    <div
                      class="m__our-work--block large clickable-block bg-cover"
                      style="
                        background-image: url(images/default.png);
                      "
                    >
                      <div class="m__our-work--block--overlay"></div>
                      <div class="m__our-work--block--content">
                        <p class="small">Title</p>
                        <h5 class="xlarge">Description</h5>
                      </div>
                      <a
                        class="m__our-work--block--link small"
                        href="#"
                      >
                        Short Text
                        <img
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </a>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-6 right double">
                    <div
                      class="m__our-work--block small clickable-block bg-cover"
                      style="
                        background-image: url(images/default.png);
                      "
                    >
                      <div class="m__our-work--block--overlay"></div>
                      <div class="m__our-work--block--content">
                        <p class="small">Title</p>
                        <h5 class="xlarge">
                          Description
                        </h5>
                      </div>
                      <a
                        class="m__our-work--block--link small"
                        href="#"
                      >
                        Short Text
                        <img
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </a>
                    </div>

                    <div
                      class="m__our-work--block small clickable-block bg-cover"
                      style="
                        background-image: url(images/default.png);
                      "
                    >
                      <div class="m__our-work--block--overlay"></div>
                      <div class="m__our-work--block--content">
                        <p class="small">
                          Title
                        </p>
                        <h5 class="xlarge">Description</h5>
                      </div>
                      <a
                        class="m__our-work--block--link small"
                        href="#"
                      >
                        Short Text
                        <img
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </a>
                    </div>
                  </div>

                  <div class="col-xs-12">
                    <div
                      class="m__our-work--block full-width clickable-block bg-cover"
                      style="
                        background-image: url(images/default.png);
                      "
                    >
                      <div class="m__our-work--block--overlay"></div>
                      <div class="m__our-work--block--content">
                        <p class="small">Demonstration</p>
                        <h5 class="xlarge">Title</h5>
                      </div>
                      <a
                        class="m__our-work--block--link small"
                        href="#"
                      >
                        Short Text
                        <img
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </a>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-6 left">
                    <div
                      class="m__our-work--block large clickable-block bg-cover"
                      style="
                        background-image: url(images/default.png);
                      "
                    >
                      <div class="m__our-work--block--overlay"></div>
                      <div class="m__our-work--block--content">
                        <p class="small">Title</p>
                        <h5 class="xlarge">Description</h5>
                      </div>
                      <a
                        class="m__our-work--block--link small"
                        href="#"
                      >
                        Short Text
                        <img
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </a>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-6 right double">
                    <div
                      class="m__our-work--block small clickable-block bg-cover"
                      style="
                        background-image: url(images/default.png);
                      "
                    >
                      <div class="m__our-work--block--overlay"></div>
                      <div class="m__our-work--block--content">
                        <p class="small">Title</p>
                        <h5 class="xlarge">
                          Description
                        </h5>
                      </div>
                      <a
                        class="m__our-work--block--link small"
                        href="#"
                      >
                        Short Text
                        <img
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </a>
                    </div>

                    <div
                      class="m__our-work--block small clickable-block bg-cover"
                      style="
                        background-image: url(images/default.png);
                      "
                    >
                      <div class="m__our-work--block--overlay"></div>
                      <div class="m__our-work--block--content">
                        <p class="small">Title</p>
                        <h5 class="xlarge">
                          Description
                        </h5>
                      </div>
                      <a
                        class="m__our-work--block--link small"
                        href="#"
                      >
                        Short Text
                        <img
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </a>
                    </div>
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
