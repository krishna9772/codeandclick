@extends('layouts.main')
@section('body_class', 'wp-singular page-template-default page wp-theme-ignite no-smooth-scroll')
@section('content')
  <div class="case-study-video-container"></div>
  <div class="working-with-us-scroll-image"></div>
  <div class="individual-service-scroll-image"></div>

  <div id="viewport">
    <div id="scroll-container" class="scroll-container">
      <div id="barba-wrapper">
        <div class="barba-container">
          <div
            class="relative h-screen bg-cover bg-center flex items-center"
            style="background-image: url('{{ $ourWork->getFirstMediaUrl('ourwork-header') }}');">
            <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/50 to-black"></div>

            <div class="relative z-10 max-w-6xl mx-auto px-10">
              <a href="{{ route('our-work') }}" class="no-barba flex items-center gap-6 mb-16 group cursor-pointer">
                <div class="border border-white/40 rounded-full w-14 h-14 flex items-center justify-center transition group-hover:bg-white/10">
                  <img
                    class="rotate-180 w-5"
                    src="{{ asset('images/icons/right-arrow.svg') }}"
                    alt="" />
                </div>
                <p class="text-white/80 text-lg tracking-wide">{{ site_text('site.our_work.back_to_works') }}</p>
              </a>

              <h1 class="text-white text-6xl lg:text-7xl font-extrabold leading-tight max-w-4xl">
                {{ $ourWork->localized('title') }}
              </h1>
            </div>
          </div>

          <div class="bg-white min-h-screen">
            <div class="max-w-6xl mx-auto space-y-24 p-10 py-24 text-black">
              <div>
                {!! $ourWork->localized('content') !!}
              </div>
              <div class="grid grid-cols-2 lg:grid-cols-3 gap-6">
                @if ($ourWork->hasMedia('ourwork-images'))
                @foreach ($ourWork->getMedia('ourwork-images') as $media)
                <img
                  src="{{ $media->getUrl() }}"
                  alt="Our Work Image"
                  class="w-full h-auto object-cover rounded">
                @endforeach
                @endif
              </div>
            </div>
          </div>
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

      if (!primaryButtons || !compactButtons) {
        return;
      }

      function syncOurWorkDetailHeader() {
        const isCompact = window.pageYOffset > 100;

        primaryButtons.classList.toggle('show', !isCompact);
        compactButtons.classList.toggle('show', isCompact);
      }

      syncOurWorkDetailHeader();
      window.addEventListener('scroll', syncOurWorkDetailHeader, { passive: true });

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
