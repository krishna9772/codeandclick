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
            <h4 class="small"> Our Services </h4>
            <div class="owl-carousel title-carousel">
              <h1>Branding & Marketing </h1>
              <h1>Strategy</h1>
              <h1>Creativity</h1>
              <h1>Technology</h1>
            </div>
          </div>

          <div class="m__what-we-do--intro">
            <div class="m__what-we-do--intro--bg-image">
              <video loop autoplay muted playsinline webkit-playsinline>
                <source
                  src="{{ asset('videos/Dance4.mp4') }}"
                  type="video/mp4" />
              </video>
              <!-- <img class="img-object-fit" src="https://ignitecreates.com/wp-content/uploads/2020/03/marriott-background.jpg"  /> -->
            </div>
            <div class="m__what-we-do--intro--content">
              <h4>CODE & CLICK is a full-service digital marketing agency in Myanmar </h4>
              <p>
                We help businesses grow their online presence, generate qualified leads, and increase sales.
                We combine marketing strategy, creative content, and technology for data-driven digital growth to deliver measurable results for brands across industries.

              </p>
            </div>
          </div>

          <div class="l__what-we-do--services">
            <div class="container">
              <h2 class="small">
                Digital Marketing Solutions That Drive Growth
              </h2>
              <p class="large">
                At CODE & CLICK, we deliver result-driven digital marketing solutions designed to help businesses grow online. From website design and website development to SEO, social media marketing, and branding, our services are built to strengthen your digital presence and convert visitors into customers.
              </p>
              <div class="row">
                @foreach ($services as $service)
                <div
                  class="col-xs-12 col-sm-6 col-md-4 m__services--tile clickable-block">
                  <div class="m__services--tile--image-holder">
                    <img
                      class="img-object-fit"
                      src="{{ asset($service->getFirstMediaUrl('services')) }}" />
                  </div>
                  <a
                    href="{{ $service->link }}"
                    target=""
                    class="c__button-circle light">
                    <span> {{ $service->name }} </span>
                    <div class="c__button-circle--arrow">
                      <img
                        alt="right arrow"
                        src="{{ asset('images/icons/right-arrow.svg') }}" />
                    </div>
                  </a>
                </div>
                @endforeach
              </div>
            </div>
          </div>

          <section class="m__testimonials">
            <div class="m__testimonials--mobile">
              <div class="owl-carousel testimonial">
                <img
                  class="mobile-logo"
                  src="{{ asset('images/default.png') }}" />
                <img
                  class="mobile-logo"
                  src="{{ asset('images/default.png') }}" />
                <img
                  class="mobile-logo"
                  src="{{ asset('images/default.png') }}" />
              </div>
            </div>
            <div class="container">
              <div class="m__testimonials--content">
                <div class="owl-carousel testimonial">
                  <div>
                    <h4>
                      “ A Professional Digital Marketing Agency in Myanmar”
                    </h4>
                    <p>Branding and Marketing solutions for effective communication with your audience.</p>
                  </div>
                  <div>
                    <h4>“ Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer t”</h4>
                    <p>Will Beckett, Co-Founder</p>
                  </div>
                  <div>
                    <h4>“ Lorem Ipsum has been the industry's standard dummy text ”</h4>
                    <p>Libby Andrews, Marketing Director</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="m__testimonials--bg-image">
              <div class="owl-carousel">
                <div
                  style="
                        background-image: url('/images/slider.jpg');
                      "></div>
                <div
                  style="
                        background-image: url('/images/slider.jpg');
                      "></div>
                <div
                  style="
                        background-image: url('/images/slider.jpg');
                      "></div>
              </div>
            </div>
          </section>

          <section class="m__awards">
            <div class="container">
              <h3> Our Valuable Clients</h3>
              <div class="owl-carousel clients">
                <div class="row">

                  @foreach ($clients as $client)
                  <div class="col-xs-6 col-sm-3 tile">
                    <div class="m__clients--tile">
                      <img
                        alt=""
                        src="{{$client->getFirstMediaUrl('clients')}}" />
                    </div>
                  </div>
                  @endforeach
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