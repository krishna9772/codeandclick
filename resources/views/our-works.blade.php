@extends('layouts.main')
@section('body_class', 'wp-singular page-template-default page wp-theme-ignite no-smooth-scroll')
@section('content')
  @php
    $works = $ourWorks->values();
  @endphp

  <style>
    .l__our-work .container h1,
    .l__our-work .m__our-work--filters--selector h4 {
      color: #111;
    }

    .l__our-work .m__our-work--filters--selector h4:after {
      opacity: 1;
    }
  </style>

  <div class="case-study-video-container"></div>
  <div class="working-with-us-scroll-image"></div>
  <div class="individual-service-scroll-image"></div>

  <div id="viewport">
    <div id="scroll-container" class="scroll-container">
      <div id="barba-wrapper">
        <div class="barba-container">
          <section class="l__our-work">
            <img
              class="l__our-work--flame-background"
              src="{{ asset('images/grey-flame-background.png') }}"
              alt="">

            <div class="container fade-transition active">
              <h1>{{ site_text('site.our_work.title') }}</h1>

              <div class="m__our-work--filters">
                <div class="m__our-work--filters--selector">
                  <h4 id="one" class="selector active">{{ site_text('site.our_work.project_type') }}</h4>
                </div>

                <div class="m__our-work--filters--tabs">
                  <ul id="tab-one" class="tab active">
                    <li class="{{ $type === '' ? 'active' : '' }}">
                      <a href="{{ route('our-work') }}" class="no-barba">{{ site_text('site.our_work.all') }}</a>
                    </li>
                    <li class="{{ $type === 'branding-solution' ? 'active' : '' }}">
                      <a href="{{ route('our-work', ['type' => 'branding-solution']) }}" class="no-barba">Branding Solution</a>
                    </li>
                    <li class="{{ $type === 'consultancy-integration-and-culture' ? 'active' : '' }}">
                      <a href="{{ route('our-work', ['type' => 'consultancy-integration-and-culture']) }}" class="no-barba">Consultancy Integration and Culture</a>
                    </li>
                    <li class="{{ $type === 'brand-identity' ? 'active' : '' }}">
                      <a href="{{ route('our-work', ['type' => 'brand-identity']) }}" class="no-barba">Brand Identity(Logo Design and Brand Book)</a>
                    </li>
                    <li class="{{ $type === 'marketing-services' ? 'active' : '' }}">
                      <a href="{{ route('our-work', ['type' => 'marketing-services']) }}" class="no-barba">Marketing Services</a>
                    </li>
                    <li class="{{ $type === 'marketing-strategy' ? 'active' : '' }}">
                      <a href="{{ route('our-work', ['type' => 'marketing-strategy']) }}" class="no-barba">Marketing Strategy and Consultancy Digital Marketing</a>
                    </li>
                    <li class="{{ $type === 'social-media' ? 'active' : '' }}">
                      <a href="{{ route('our-work', ['type' => 'social-media']) }}" class="no-barba">Social Media</a>
                    </li>
                    <li class="{{ $type === 'search-engine-optimization' ? 'active' : '' }}">
                      <a href="{{ route('our-work', ['type' => 'search-engine-optimization']) }}" class="no-barba">Search Engine Optimization(SEO)</a>
                    </li>
                    <li class="{{ $type === 'digital-optimization' ? 'active' : '' }}">
                      <a href="{{ route('our-work', ['type' => 'digital-optimization']) }}" class="no-barba">Digital Optimization</a>
                    </li>
                    <li class="{{ $type === 'media-and-press' ? 'active' : '' }}">
                      <a href="{{ route('our-work', ['type' => 'media-and-press']) }}" class="no-barba">Media and Press</a>
                    </li>
                    <li class="{{ $type === 'events-coverage-and-live-streaming' ? 'active' : '' }}">
                      <a href="{{ route('our-work', ['type' => 'events-coverage-and-live-streaming']) }}" class="no-barba">Events Coverage and Live Streaming</a>
                    </li>
                    <li class="{{ $type === 'creative-design' ? 'active' : '' }}">
                      <a href="{{ route('our-work', ['type' => 'creative-design']) }}" class="no-barba">Creative Design</a>
                    </li>
                    <li class="{{ $type === 'website-and-social-media-content' ? 'active' : '' }}">
                      <a href="{{ route('our-work', ['type' => 'website-and-social-media-content']) }}" class="no-barba">Website and Social Media Content</a>
                    </li>
                    <li class="{{ $type === 'video-production' ? 'active' : '' }}">
                      <a href="{{ route('our-work', ['type' => 'video-production']) }}" class="no-barba">Video Production</a>
                    </li>
                    <li class="{{ $type === 'motions' ? 'active' : '' }}">
                      <a href="{{ route('our-work', ['type' => 'motions']) }}" class="no-barba">Motions</a>
                    </li>
                    <li class="{{ $type === 'photo-shooting' ? 'active' : '' }}">
                      <a href="{{ route('our-work', ['type' => 'photo-shooting']) }}" class="no-barba">Photo Shooting</a>
                    </li>
                    <li class="{{ $type === 'mobile-app-development' ? 'active' : '' }}">
                      <a href="{{ route('our-work', ['type' => 'mobile-app-development']) }}" class="no-barba">Mobile App Development</a>
                    </li>
                    <li class="{{ $type === 'web-design' ? 'active' : '' }}">
                      <a href="{{ route('our-work', ['type' => 'web-design']) }}" class="no-barba">Web Design</a>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="row">
                @for ($i = 0; $i < $works->count(); $i += 4)
                  @php
                    $largeWork = $works->get($i);
                    $smallTopWork = $works->get($i + 1);
                    $smallBottomWork = $works->get($i + 2);
                    $fullWidthWork = $works->get($i + 3);
                  @endphp

                  @if ($largeWork)
                    <div class="col-xs-12 col-md-6 left">
                      <div class="m__our-work--block large clickable-block bg-cover active" style="background-image: url('{{ $largeWork->getFirstMediaUrl('ourwork-header') }}')">
                        <div class="m__our-work--block--overlay"></div>
                        <div class="m__our-work--block--content">
                          <p class="small">{{ \Illuminate\Support\Str::headline(str_replace('-', ' ', $largeWork->type ?? '')) }}</p>
                          <h5 class="xlarge">{{ $largeWork->localized('title') }}</h5>
                        </div>
                        <a class="m__our-work--block--link small no-barba" href="{{ route('our-work-details', ['slug' => $largeWork->slug]) }}">
                          {{ site_text('site.our_work.view_case_study') }}
                          <img src="{{ asset('images/icons/right-arrow.svg') }}" alt="">
                        </a>
                      </div>
                    </div>
                  @endif

                  @if ($smallTopWork || $smallBottomWork)
                    <div class="col-xs-12 col-md-6 right double">
                      @if ($smallTopWork)
                        <div class="m__our-work--block small clickable-block bg-cover active" style="background-image: url('{{ $smallTopWork->getFirstMediaUrl('ourwork-header') }}')">
                          <div class="m__our-work--block--overlay"></div>
                          <div class="m__our-work--block--content">
                            <p class="small">{{ \Illuminate\Support\Str::headline(str_replace('-', ' ', $smallTopWork->type ?? '')) }}</p>
                            <h5 class="xlarge">{{ $smallTopWork->localized('title') }}</h5>
                          </div>
                          <a class="m__our-work--block--link small no-barba" href="{{ route('our-work-details', ['slug' => $smallTopWork->slug]) }}">
                            {{ site_text('site.our_work.view_case_study') }}
                            <img src="{{ asset('images/icons/right-arrow.svg') }}" alt="">
                          </a>
                        </div>
                      @endif

                      @if ($smallBottomWork)
                        <div class="m__our-work--block small clickable-block bg-cover active" style="background-image: url('{{ $smallBottomWork->getFirstMediaUrl('ourwork-header') }}')">
                          <div class="m__our-work--block--overlay"></div>
                          <div class="m__our-work--block--content">
                            <p class="small">{{ \Illuminate\Support\Str::headline(str_replace('-', ' ', $smallBottomWork->type ?? '')) }}</p>
                            <h5 class="xlarge">{{ $smallBottomWork->localized('title') }}</h5>
                          </div>
                          <a class="m__our-work--block--link small no-barba" href="{{ route('our-work-details', ['slug' => $smallBottomWork->slug]) }}">
                            {{ site_text('site.our_work.view_case_study') }}
                            <img src="{{ asset('images/icons/right-arrow.svg') }}" alt="">
                          </a>
                        </div>
                      @endif
                    </div>
                  @endif

                  @if ($fullWidthWork)
                    <div class="col-xs-12">
                      <div class="m__our-work--block full-width clickable-block bg-cover active" style="background-image: url('{{ $fullWidthWork->getFirstMediaUrl('ourwork-header') }}')">
                        <div class="m__our-work--block--overlay"></div>
                        <div class="m__our-work--block--content">
                          <p class="small">{{ \Illuminate\Support\Str::headline(str_replace('-', ' ', $fullWidthWork->type ?? '')) }}</p>
                          <h5 class="xlarge">{{ $fullWidthWork->localized('title') }}</h5>
                        </div>
                        <a class="m__our-work--block--link small no-barba" href="{{ route('our-work-details', ['slug' => $fullWidthWork->slug]) }}">
                          {{ site_text('site.our_work.view_case_study') }}
                          <img src="{{ asset('images/icons/right-arrow.svg') }}" alt="">
                        </a>
                      </div>
                    </div>
                  @endif
                @endfor
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>

  <input type="hidden" id="data_location" value="" />
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const header = document.querySelector('header');
      const primaryButtons = document.querySelector('header .c__header-buttons');
      const compactButtons = document.querySelector('header .c__header-buttons--v2');
      const navigation = document.querySelector('.c__navigation');
      const menuToggles = document.querySelectorAll('header .c__menu-toggle');
      const contactSwitcher = document.querySelector('.c__navigation--contact-switcher');
      const locationSwitches = contactSwitcher ? contactSwitcher.querySelectorAll('.switch') : [];

      if (primaryButtons && compactButtons) {
        function syncOurWorkHeader() {
          const isCompact = window.pageYOffset > 100;

          primaryButtons.classList.toggle('show', !isCompact);
          compactButtons.classList.toggle('show', isCompact);
        }

        syncOurWorkHeader();
        window.addEventListener('scroll', syncOurWorkHeader, { passive: true });
      }

      if (navigation && menuToggles.length) {
        menuToggles.forEach(function(toggle) {
          toggle.addEventListener('click', function() {
            const shouldOpen = !navigation.classList.contains('active');

            setTimeout(function() {
              navigation.classList.toggle('active', shouldOpen);

              menuToggles.forEach(function(item) {
                item.classList.toggle('open', shouldOpen);
              });

              if (header) {
                header.classList.toggle('color-difference', shouldOpen);
              }
            }, 0);
          });
        });
      }

      if (contactSwitcher && locationSwitches.length) {
        locationSwitches.forEach(function(toggle) {
          toggle.addEventListener('click', function() {
            const targetId = toggle.id;
            const panels = contactSwitcher.querySelectorAll('.switcher');

            locationSwitches.forEach(function(item) {
              item.classList.toggle('active', item === toggle);
            });

            panels.forEach(function(panel) {
              panel.classList.toggle('active', panel.id === 'contact-' + targetId);
            });
          });
        });
      }
    });
  </script>
@endsection
