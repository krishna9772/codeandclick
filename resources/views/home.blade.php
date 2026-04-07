@extends('layouts.main')
@section('content')
    <!-- Video Container -->
    <div id="home-video-container">
      <video id="home-video" loop autoplay muted playsinline webkit-playsinline>
        <source src="{{ asset('videos/home.mp4') }}" type="video/mp4" />
        {{ site_text('site.home.video_fallback') }}
      </video>
      <section  class="m__home-hero">
              <div class="layout">
                <p class="m__home-hero--tag ">
                  {{ site_text('site.home.tagline') }}
                </p>
                <div class="open-fullscreen c__button {{ app()->getLocale() === 'mm' ? 'is-mm' : '' }}">
                  <p>{{ site_text('site.home.see_our_work') }}</p>
                </div>
              </div>
        </section>
    </div>

    <div class="showreel-video-overlay"></div>

    <div class="showreel-video-container">
      <img
        alt="close video"
        class="close-video"
        src="{{ asset('images/icons/close-white.svg') }}"
      />
      <video id="showreel-video" loop playsinline webkit-playsinline>
        <source src="{{ asset('videos/home.mp4') }}" type="video/mp4" />
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


            <div class="l__home">
              <section class="m__home-intro">
                <div class="container">
                  <div class="m__home-intro--award experienceContainer">
                    <p style="line-height: 1.2" class="year_of_experience">
                      {{ site_text('site.home.experience') }}
                    </p>
                    {{-- <p class="highlyRecommended">Highly Recommended</p> --}}
                  </div>
                  <div class="m__home-intro--content">
                    <h1>{{ site_text('site.home.driven_by') }}</h1>
                    <div class="owl-carousel title-carousel" id="home-owl" >
                      <h1>{{ site_text('site.home.technology') }}</h1>
                      <h1>{{ site_text('site.home.strategy') }}</h1>
                      <h1>{{ site_text('site.home.creativity') }}</h1>
                    </div>
                    <p>
                      {{ site_text('site.home.intro_body') }}
                    </p>
                    <a href="{{route('our-work')}}" target="" class="c__button-circle light">
                      <span>{{ site_text('site.home.our_work') }}</span>
                      <div class="c__button-circle--arrow">
                        <img
                          alt="right arrow"
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </div>
                    </a>
                    <img
                      id="scroll-to"
                      alt="scroll down"
                      src="{{ asset('images/icons/down-arrow.svg') }}"
                    />
                  </div>
                </div>
              </section>

              <section class="l__slider-panels">
                <div class="m__slider-panel clickable-block" id="one">
                  <div
                    class="m__slider-panel--bg-image"
                    style="background-image: url(/images/sitawgyibg.png)"
                  ></div>
                  <div class="overlay"></div>
                  <div class="container">
                    <div  class="m__slider-panel--content">
                      <img
                        style="scale: 3.5;"
                        alt="Big Image"
                        src="{{ asset('images/4.png') }}"
                        />

                      <h2>{{ site_text('site.home.slider_1_title') }}</h2>
                      <p>
                        {{ site_text('site.home.slider_1_body_before') }}<span class="highlight-client">Si Taw Gyi</span>{{ site_text('site.home.slider_1_body_after') }}
                      </p>
                    </div>
                    <a href="" target="" class="c__button-circle light">
                      <span></span>
                      <div class="c__button-circle--arrow">
                        <img
                          alt="right arrow"
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </div>
                    </a>
                  </div>
                </div>
                <div class="m__slider-panel clickable-block" id="two">
                  <div
                    class="m__slider-panel--bg-image"
                    style="background-image: url(/images/Web.png)"
                  ></div>

                  <div class="overlay"></div>
                  <div class="container">
                    <div class="m__slider-panel--content">
                      
                      <h2>
                        {{ site_text('site.home.slider_2_title') }}
                      </h2>
                      <p>
                        {{ site_text('site.home.slider_2_body') }}
                      </p>
                    </div>
                    <a href="" target="" class="c__button-circle light">
                      <span></span>
                      <div class="c__button-circle--arrow">
                        <img
                          alt="right arrow"
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </div>
                    </a>
                  </div>
                </div>
                <div class="m__slider-panel clickable-block" id="three">
                  <div
                    class="m__slider-panel--bg-image"
                    style="background-image: url(/images/Mekong.png)"
                  ></div>

                  <div class="overlay"></div>
                  <div class="container">
                    <div class="m__slider-panel--content">
                      <img
                        alt="mekongjobs-image"
                        src="{{asset('images/mekong-black-and-white.png')}}"
                      />
                      <h2>
                        {{ site_text('site.home.slider_3_title') }}
                      </h2>
                      <p>
                        {{ site_text('site.home.slider_3_body_before') }}
                        <span class="highlight-client">Mekong Job</span>{{ site_text('site.home.slider_3_body_after') }}
                      </p>
                    </div>
                    <a href="" target="" class="c__button-circle light">
                      <span></span>
                      <div class="c__button-circle--arrow">
                        <img
                          alt="right arrow"
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </div>
                    </a>
                  </div>
                </div>
                <div class="m__slider-panel clickable-block" id="three">
                  <div
                    class="m__slider-panel--bg-image"
                    style="background-image: url(/images/AU.png)"
                  ></div>

                  <div class="overlay"></div>
                  <div class="container">
                    <div class="m__slider-panel--content">
                      <img
                        alt="american university background image"
                        src="{{asset('images/au-black-and-white.png')}}"
                      />
                      <h2>
                        {{ site_text('site.home.slider_4_title') }}
                      </h2>
                      <p>
                        {{ site_text('site.home.slider_4_body_before') }}<span class="highlight-client">American University of Yangon</span>{{ site_text('site.home.slider_4_body_after') }}</p>
                      </p>
                    </div>
                    <a href="" target="" class="c__button-circle light">
                      <span></span>
                      <div class="c__button-circle--arrow">
                        <img
                          alt="right arrow"
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                        />
                      </div>
                    </a>
                  </div>
                </div>
              </section>

             <section class="m__work-with">
                <div class="container">
                  <h3 class="text-6xl">{{ site_text('site.home.clients') }}</h3>
                  <div class="owl-carousel clients">
                    <div class="row">
                      @foreach ($clients as $client)

                      <div class="col-xs-6 col-sm-3 tile">
                        <div class="m__work-with--tile">
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

              <section class="m__testimonials">
                <div class="m__testimonials--mobile">
                  <div class="owl-carousel testimonial">
                    @foreach ($clients as $client)

                      <img
                        alt=""
                        class="mobile-logo"
                        src="{{$client->getFirstMediaUrl('clients')}}"
                      />
                    @endforeach
                   
                  </div>
                </div>
                <div class="container">
                  <div class="m__testimonials--content">
                    <div class="owl-carousel testimonial">
                      @foreach ($testimornials as $testimornial)
                      <div>
                        <h4 class="text-2xl">
                          {{ $testimornial->localized('description') }}
                        </h4>
                        <p>{{ $testimornial->localized('name') }}</p>
                      </div>
                      @endforeach
                      
                    </div>
                  </div>
                </div>
                <div class="m__testimonials--bg-image">
                  <div class="owl-carousel">
                    @foreach ($testimornials as $testimornial)
                    <div
                      style="background-image: url({{$testimornial->getFirstMediaUrl('testimornials')}})"
                    ></div>
                    @endforeach
                  </div>
                </div>
              </section>

              <section class="m__services">
                <div class="container">
                  <h3 class="text-6xl">{{ site_text('site.home.services') }}</h3>
                  <p class="medium">
                    {{ site_text('site.home.services_intro') }}
                  </p>
                </div>
                <div class="row">
                  @if (isset($services[0])) 
                  <div class="col-md-3 col-lg-5 m__services--bg-image">
                    <img
                      alt="background image"
                      class="img-object-fit"
                      src="{{ asset($services[0]->getFirstMediaUrl('services')) }}"
                    />
                  </div>
                  @endif
                  <div class="col-xs-12 col-md-9 col-lg-7 m__services--list">
                    <ul>
                      @foreach ($services as $service)
                      <li data-bg="{{ $service->getFirstMediaUrl('services') }}">
                        <a class="text-sm" href="{{route('service-details',$service->slug)}}" class="xlarge">{{ $service->localized('name') }}</a>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </section>
            </div>

            <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" id="data_location" value="" />
@endsection


