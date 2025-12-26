@extends('layouts.main')
@section('content')
    <!-- Video Container -->
    <div id="home-video-container">
      <video id="home-video" loop autoplay muted playsinline webkit-playsinline>
        <source src="{{ asset('videos/home.mp4') }}" type="video/mp4" />
        Your browser does not support the video tag.
      </video>
      <section  class="m__home-hero">
              <div class="layout">
                <p class="m__home-hero--tag">
                  Strategy – Creativity – Technology
                </p>
                <div class="open-fullscreen c__button">
                  <p>See Our Work</p>
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
                      8+ Years Experience
                    </p>
                    {{-- <p class="highlyRecommended">Highly Recommended</p> --}}
                  </div>
                  <div class="m__home-intro--content">
                    <h1>Driven by</h1>
                    <div class="owl-carousel title-carousel" id="home-owl" >
                      <h1>Technology</h1>
                      <h1>Strategy</h1>
                      <h1>Creativity</h1>
                    </div>
                    <p>
                      We fuse data-driven strategy with creative execution to
                      build digital solutions that deliver real business
                      results.
                    </p>
                    <a href="#" target="" class="c__button-circle light">
                      <span>Our Work</span>
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

                      <h2>Trusted by Myanmar's Leading Brands</h2>
                      <p>
                        Digital partners for iconic brands like Si Taw Gyi
                        pickled tea and other market innovators.
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
                      <img
                        alt=""
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAaVBMVEX///+FtuWb3sH4mYST3Lzi9eyXwOjK3vN/s+To8Pn4loD4kXqW3b74k3z3j3f4nIeu5Mz0+/j6vbH7wrf7y8H/+fj5ppT+7er5rJz81s/L7d676NTa8ufu+fSl4cb6t6r94t30+Pyqyuyvd3WJAAACLUlEQVRoge2X2XqCMBBGbQJWgbAJIpvQvv9DFqqiZGHpN4MXnXMZLs43yfyTsNsRBEEQBEEQhIksj5umOeXpptY0OfvC6XH9S76dNxeCDzhu0G6jTc8uH+PHm3gDh8uIy3u8m5gvOi/nboLszeXzHcwZrlhfb9/cDao3FyYx91FLPhsr5g5mplLf6OX8jDg9W1Nr9QjEvU7MR4x7yLH5iLtAtXjiZlKMeE2d3lXx2864nYpTgBindGKrHdQLaqK7BOoTaGKvHdxnn+E67goGvZDrUl7JTCUHkN5daNXyUqIf17BZsi0WKouNLsvAU+vKmGUrq7G62z6st/BYh7qei3GHiQB2ZkW9lnmF+iWNxeB2XA79wCx/C2Ys0nxLkwv3O9ygAf9ts+9eT4nU3Z1lbZYhTI3wLmaeEilUqoeXeWqkMBm8XaSqDb3Fi5hdt/NG1otXG6mvzwWsF5evBXdmNVLHwzz71V57VLC2v46Hj1nWi0Mm4SkjG0VcWbJY7S8McaRou5LlSGGIC09nxhfXOq8SKQRxqBUz6RUEL7b1Xia9guDFBq38CgIXazvrxihS4GI1wvr+ghaX5oLZ6BUELK4nCh6/goDFypCWzM9IwYo1Q3rMs79gxdcZ78vIBhVPRGkAQ6y7lZSSH5GCFE9H6WGOwMXGIT0Wl+Di2c66cb+l4MSFtZArsNheShUBb/U6SExiEpMYU/yHH/Ml4v083xhigiAIgiAIgiCIf8APa50rDa4yqE0AAAAASUVORK5CYII="
                      />
                      <h2>
                        Digital transformation for Myanmar's favorite brands
                      </h2>
                      <p>
                        Complete brand revamps, high-converting websites, and
                        results-driven digital campaigns that deliver measurable
                        growth.
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
                        alt=""
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAaVBMVEX///+FtuWb3sH4mYST3Lzi9eyXwOjK3vN/s+To8Pn4loD4kXqW3b74k3z3j3f4nIeu5Mz0+/j6vbH7wrf7y8H/+fj5ppT+7er5rJz81s/L7d676NTa8ufu+fSl4cb6t6r94t30+Pyqyuyvd3WJAAACLUlEQVRoge2X2XqCMBBGbQJWgbAJIpvQvv9DFqqiZGHpN4MXnXMZLs43yfyTsNsRBEEQBEEQhIksj5umOeXpptY0OfvC6XH9S76dNxeCDzhu0G6jTc8uH+PHm3gDh8uIy3u8m5gvOi/nboLszeXzHcwZrlhfb9/cDao3FyYx91FLPhsr5g5mplLf6OX8jDg9W1Nr9QjEvU7MR4x7yLH5iLtAtXjiZlKMeE2d3lXx2864nYpTgBindGKrHdQLaqK7BOoTaGKvHdxnn+E67goGvZDrUl7JTCUHkN5daNXyUqIf17BZsi0WKouNLsvAU+vKmGUrq7G62z6st/BYh7qei3GHiQB2ZkW9lnmF+iWNxeB2XA79wCx/C2Ys0nxLkwv3O9ygAf9ts+9eT4nU3Z1lbZYhTI3wLmaeEilUqoeXeWqkMBm8XaSqDb3Fi5hdt/NG1otXG6mvzwWsF5evBXdmNVLHwzz71V57VLC2v46Hj1nWi0Mm4SkjG0VcWbJY7S8McaRou5LlSGGIC09nxhfXOq8SKQRxqBUz6RUEL7b1Xia9guDFBq38CgIXazvrxihS4GI1wvr+ghaX5oLZ6BUELK4nCh6/goDFypCWzM9IwYo1Q3rMs79gxdcZ78vIBhVPRGkAQ6y7lZSSH5GCFE9H6WGOwMXGIT0Wl+Di2c66cb+l4MSFtZArsNheShUBb/U6SExiEpMYU/yHH/Ml4v083xhigiAIgiAIgiCIf8APa50rDa4yqE0AAAAASUVORK5CYII="
                      />
                      <h2>
                        Digital transformation for APAC leading job portal
                      </h2>
                      <p>
                        A complete platform overhaul & results-driven digital
                        strategy for
                        <span class="highlight-client">Mekong Job</span>,
                        creating most dynamic job-seeking experience.
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
                        alt=""
                        src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHgAAAB4CAMAAAAOusbgAAAAaVBMVEX///+FtuWb3sH4mYST3Lzi9eyXwOjK3vN/s+To8Pn4loD4kXqW3b74k3z3j3f4nIeu5Mz0+/j6vbH7wrf7y8H/+fj5ppT+7er5rJz81s/L7d676NTa8ufu+fSl4cb6t6r94t30+Pyqyuyvd3WJAAACLUlEQVRoge2X2XqCMBBGbQJWgbAJIpvQvv9DFqqiZGHpN4MXnXMZLs43yfyTsNsRBEEQBEEQhIksj5umOeXpptY0OfvC6XH9S76dNxeCDzhu0G6jTc8uH+PHm3gDh8uIy3u8m5gvOi/nboLszeXzHcwZrlhfb9/cDao3FyYx91FLPhsr5g5mplLf6OX8jDg9W1Nr9QjEvU7MR4x7yLH5iLtAtXjiZlKMeE2d3lXx2864nYpTgBindGKrHdQLaqK7BOoTaGKvHdxnn+E67goGvZDrUl7JTCUHkN5daNXyUqIf17BZsi0WKouNLsvAU+vKmGUrq7G62z6st/BYh7qei3GHiQB2ZkW9lnmF+iWNxeB2XA79wCx/C2Ys0nxLkwv3O9ygAf9ts+9eT4nU3Z1lbZYhTI3wLmaeEilUqoeXeWqkMBm8XaSqDb3Fi5hdt/NG1otXG6mvzwWsF5evBXdmNVLHwzz71V57VLC2v46Hj1nWi0Mm4SkjG0VcWbJY7S8McaRou5LlSGGIC09nxhfXOq8SKQRxqBUz6RUEL7b1Xia9guDFBq38CgIXazvrxihS4GI1wvr+ghaX5oLZ6BUELK4nCh6/goDFypCWzM9IwYo1Q3rMs79gxdcZ78vIBhVPRGkAQ6y7lZSSH5GCFE9H6WGOwMXGIT0Wl+Di2c66cb+l4MSFtZArsNheShUBb/U6SExiEpMYU/yHH/Ml4v083xhigiAIgiAIgiCIf8APa50rDa4yqE0AAAAASUVORK5CYII="
                      />
                      <h2>
                        Digital empowerment for Myanmar's education leaders
                      </h2>
                      <p>
                        A comprehensive digital ecosystem for <span class="highlight-client">American University of Yangon</span> - from brand identity to digital platforms, shaping the future of education in Myanmar.</p>
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
                  <h3>Client</h3>
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
                    <img
                      alt=""
                      class="mobile-logo"
                      src="/images/mobile-slide.webp"
                    />
                    <img
                      alt=""
                      class="mobile-logo"
                      src="/images/mobile-slide.webp"
                    />
                    <img
                      alt=""
                      class="mobile-logo"
                      src="/images/mobile-slide.webp"
                    />
                  </div>
                </div>
                <div class="container">
                  <div class="m__testimonials--content">
                    <div class="owl-carousel testimonial">
                      <div>
                        <h4>
                          “Ambled it to make a type specimen book. It has
                          survived not only five centuries, but also the leap
                          into electronic”
                        </h4>
                        <p>remaining essentially unchanged</p>
                        <p>Smith &amp; Wollensky</p>
                      </div>
                      <div>
                        <h4>“Ambled it to make a type specimen book. Itd ”</h4>
                        <p>Ambled ining essentially unchange</p>
                        <p>Pacific Catch</p>
                      </div>
                      <div>
                        <h4>
                          “Ambled it to make a type specimen book. It has
                          survived not only five centuries, but also the leap
                          into electronic typesetting, remaining essentially
                          unchanged”
                        </h4>
                        <p>Ambled it to make a type specimen book.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="m__testimonials--bg-image">
                  <div class="owl-carousel">
                    <div
                      style="background-image: url('/images/slide.jpg')"
                    ></div>
                    <div
                      style="background-image: url('/images/slide.jpg')"
                    ></div>
                    <div
                      style="background-image: url('/images/slide.jpg')"
                    ></div>
                  </div>
                </div>
              </section>

              <section class="m__services">
                <div class="container">
                  <h3>Services</h3>
                  <p class="medium">
                    Combining strategy, creativity and technology, our work has purpose and is always results driven.
                  </p>
                </div>
                <div class="row">
                  <div class="col-md-3 col-lg-5 m__services--bg-image">
                    <img
                      alt="background image"
                      class="img-object-fit"
                      src="{{ asset('images/default.png') }}"
                    />
                  </div>
                  <div class="col-xs-12 col-md-9 col-lg-7 m__services--list">
                    <ul>
                      @foreach ($services as $service)
                      <li data-bg="{{ asset('images/default.png') }}">
                        <a href="{{ $service->link }}" class="xlarge">{{ $service->name }}</a>
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

