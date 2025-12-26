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
  <video id="showreel-video" loop playsinline webkit-playsinline>
    <source src="{{ asset('videos/home.mp4') }}" type="video/mp4">
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



        <section class="l__working-with-us">
          <div style="padding: 100px 0;" class="container">
            <h1 class="small"> Why work with us?</h1>
            <div class="anchor-link-container">
              <div class="anchor-link active" id="m__intro-experience">
                <span>01</span>
                <p> Experienced digital marketing professionals
                </p>
              </div>
              <div class="anchor-link" id="m__advantage-scroll--title">
                <span>02</span>
                <p> A Strategic, Results-Driven Approach </p>

              </div>
              <div class="anchor-link" id="m__solution">
                <span>03</span>
                <p> Full-Service Digital Expertise Under One Roof</p>

              </div>
              <div class="anchor-link" id="m__global-reach">
                <span>04</span>
                <p> Transparent Collaboration & Clear Communication </p>

              </div>
              <div class="anchor-link" id="m__beliefs">
                <span>05</span>
                <p> Your Digital Growth Partner</p>

              </div>
              <div class="anchor-link" id="m__clients">
                <span>06</span>
                <p> Got trust from </p>

              </div>
            </div>
          </div>
          {{-- <div class="hero-image" style="background-image:url(/images/default.png)"></div> --}}
        </section>

        <section class="m__intro-experience">
          <div class="container">
            <div class="section-number">
              <span>01</span>
            </div>
            <div class="row">
              <div class="col-xs-12 col-md-6 m__intro-experience--title">
                <h3> With experienced digital marketing professionals, we deliver effective digital marketing strategies from social media and SEO to content and analytics.</h3>
              </div>
              <div class="col-xs-12 col-md-6">
                <div style="padding: 30px;" class="m__intro-experience--tile">

                  <h3>Over 8 Years <span>of industry experience per team member</span></h3>
                </div>
              </div>
              <div class="col-xs-12 col-md-6 m__intro-experience--content-left">
                <p>At CODE & CLICK, we believe successful digital growth comes from the perfect balance of strategy, creativity, and technology. We partner with businesses that want more than just services — they want measurable results, long-term value, and a strong digital presence.</p>
              </div>
              <div class="col-xs-12 col-md-6 m__intro-experience--content-right">
                <p>From digital marketing and SEO to website design, branding, and content, we deliver solutions that are purposeful, scalable, and results-driven.</p>
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
              <h2 class="small">A Strategic, Results-Driven Approach</h2>
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
                <h4 class="large">A team of specialists</h4>
                <p>We don’t believe in one-size-fits-all marketing. Every brand is different, which is why our team creates customized marketing strategies aligned with your goals, audience, and market.</p>
              </div>
              <div class="m__advantage-scroll--content--item">
                <h4 class="large">SEO, Social Media Marketing</h4>
                <p>Our data-driven approach ensures every decision — from SEO to social media marketing — is backed by insights, not assumptions.</p>
              </div>
              <!-- <div class="m__advantage-scroll--content--item">
          <h4 class="large">SEO, Social Media Marketing </h4>
          <p>Phasellus iaculis augue a nibh congue, a tincidunt libero sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae.</p>
        </div> -->
            </div>
          </div>
        </section>

        <section class="m__solution">
          <div class="container">
            <div class="title-container">
              <div style="padding: 30px;" class="section-number">
                <span>03</span>
              </div>
              <h2 class="small">Full-Service Digital Expertise Under One Roof</h2>
            </div>
            <div class="m__solution--circle-diagram">
              <div class="circle">
                <p>Strategy</p>
              </div>
              <div class="circle">
                <p>Creative</p>
              </div>
              <div class="circle">
                <p>Technology</p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-md-6 m__solution--content-left">
                <h4 class="medium">Everything you need, all in one place.</h4>
              </div>
              <div class="col-xs-12 col-md-6 m__solution--content-right">
                <p>Working with CODE & CLICK means having access to one integrated digital team from those three different fields. Our experienced web developers, designers, marketers, and content creators work together to deliver seamless solutions for your business.
                  <br />
                  <br />
                </p>
                <p>Our expertise covers:</p>
                <p style="margin-bottom: 15px; border-left: 2px solid #ccc; padding-left: 10px;">Digital Marketing & Branding Strategy</p>
                <p style="margin-bottom: 15px; border-left: 2px solid #ccc; padding-left: 10px;">SEO, Social Media and Digital Ads Optimization</p>
                <p style="margin-bottom: 15px; border-left: 2px solid #ccc; padding-left: 10px;">Media, Press and Event Coverage</p>
                <p style="margin-bottom: 15px; border-left: 2px solid #ccc; padding-left: 10px;">Website Design & Website Development</p>
                <p style="margin-bottom: 15px; border-left: 2px solid #ccc; padding-left: 10px;">Content Creation</p>

              </div>
            </div>
          </div>
        </section>

        <section class="m__further-solution">
          <div class="title-container">
            <div class="container">
              <h2>Websites Built to Perform, Not Just Look Good</h2>
            </div>
          </div>
          <div class="row image-left-text-right">
            <div class="col-xs-12 col-md-6 m__further-solution--bg-image left">
              <div class="image" style="background-image: url(/images/default.png)"></div>
            </div>
            <div class="col-xs-11 col-md-6 m__further-solution--content right">
              <h4>Your website is more than a digital brochure — it’s a business tool. We design and develop websites that are fast, user-friendly, and conversion-focused.</h4>
              <p>Whether it’s a corporate website or a full ecommerce website, our website development process prioritizes performance, user experience, and SEO from day one.
                <br />
                <br />
                (Clients’ Website photos)
            </div>
          </div>
          <div class="title-container">
            <div class="container">
              <h2>Creative Content That Connects</h2>
            </div>
          </div>
          <div class="row image-right-text-left">
            <div class="col-xs-11 col-md-6 m__further-solution--content left">
              <h4>Great design and strong content make brands unforgettable.</h4>
              <p>Our creative team produces meaningful visuals, compelling copy, and engaging social media content that speaks directly to your audience.<br />
                <br />
                From branding assets to social media campaigns, we make sure your message is clear, consistent, and impactful.
              </p>
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
              <h2 class="small">Transparent Collaboration & Clear Communication</h2>
            </div>
            <div class="m__global-reach--content">
              <p>CODE & CLICK value long-term partnerships built on trust. You’ll always know what we’re doing, why we’re doing it, and how it’s performing.
                We work closely with our clients at every stage — from strategy and design to launch and optimization — ensuring clarity, collaboration, and measurable outcomes.</p>
              <a href="/contact" target="" class="c__button-circle dark">
                <span style="color: #fff;">Our Offices</span>
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
              <h2 class="small">Your Digital Growth Partner</h2>
            </div>
            <div class="m__beliefs--content">
              <div class="m__beliefs--content--tile">
                <h4 class="large">Think long</br> term</h4>
                <p class="small">Lorem Ipsum is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less </p>
              </div>
              <div class="m__beliefs--content--tile">
                <h4 class="large">Never stop</br> learning</h4>
                <p class="small">Lorem Ipsum is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less </p>
              </div>
              <div class="m__beliefs--content--tile">
                <h4 class="large">Nothing works</br> in isolation</h4>
                <p class="small">Lorem Ipsum is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less </p>
              </div>
              <div class="m__beliefs--content--tile">
                <h4 class="large">Leverage</br> technology</h4>
                <p class="small">Lorem Ipsum is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less </p>
              </div>
              <div class="m__beliefs--content--tile">
                <h4 class="large">Don’t be a</br> dick</h4>
                <p class="small">Lorem Ipsum is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less </p>
              </div>
              <div class="m__beliefs--content--tile">
                <h4 class="large">No</br> bullshit</h4>
                <p class="small">Lorem Ipsum is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less </p>
              </div>
              <div class="m__beliefs--content--tile">
                <h4 class="large">Be</br> human</h4>
                <p class="small">Lorem Ipsum is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less </p>
              </div>
              <div class="m__beliefs--content--tile">
                <h4 class="large">Be</br> emotive</h4>
                <p class="small">Lorem Ipsum is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less </p>
              </div>
              <div class="m__beliefs--content--tile">
                <h4 class="large">The power of</br> data</h4>
                <p class="small">Lorem Ipsum is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less </p>
              </div>
              <div class="m__beliefs--content--tile">
                <h4 class="large">Build</br> brands</h4>
                <p class="small">Lorem Ipsum is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less </p>
              </div>
              <div class="m__beliefs--content--tile">
                <h4 class="large">Solve</br> problems</h4>
                <p class="small">Lorem Ipsum is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less </p>
              </div>
              <div class="m__beliefs--content--tile">
                <h4 class="large">Love what</br> you do</h4>
                <p class="small">Lorem Ipsum is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less </p>
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
              <h2 class="small">Got trust from</h2>
            </div>
            <p class="small">CODE & CLICK worked together with those prominent brands in Myanmar.</p>
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