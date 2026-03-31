@extends('layouts.main')
@section('body_class', 'wp-singular page-template page-template-page-careers page page-id-5433 wp-theme-ignite no-smooth-scroll')
@section('content')
  <style>
    .l__ventures--titles #scroll-to {
      margin-left: 30px;
      position: relative;
      border: 0;
      cursor: pointer;
    }

    @media screen and (min-width: 800px) {
      .l__ventures--titles #scroll-to {
        bottom: 0;
        position: absolute;
        right: 30px;
      }
    }

    @media screen and (min-width: 1150px) {
      .l__ventures--titles #scroll-to {
        right: calc(50vw - 545px);
      }
    }
  </style>
  <div class="case-study-video-container"></div>
  <div class="working-with-us-scroll-image"></div>
  <div class="individual-service-scroll-image"></div>

  <div id="viewport">
    <div id="scroll-container" class="scroll-container">
      <div id="barba-wrapper">
        <div class="barba-container">
          <div class="l__ventures">
            <section class="l__ventures--titles">
              <div class="medium-container">
                <h1 class="text-6xl">{{ site_text('site.careers.title') }}</h1>
                <h4 class="small" style="text-align: justify;">
                  {{ site_text('site.careers.intro') }}
                </h4>
              </div>
              <button type="button" class="c__button light px-4" id="scroll-to">{{ site_text('site.careers.current_opportunities') }}</button>
            </section>

            <section class="l__current-holdings" id="current-opportunities">
              <div class="container">
                <h3 class="text-4xl">{{ site_text('site.careers.current_opportunities') }}</h3>
                <div style="display: flex; gap: 10px;">
                  <a href="{{ route('show-careers') }}" data-location="" class="c__button carbutt no-barba career-filter-link {{ $location == '' ? 'light' : '' }}">{{ site_text('site.blog.all') }}</a>
                  @foreach (config('base.location') as $available_location)
                  <a href="{{ route('show-careers', ['location' => $available_location]) }}" data-location="{{ $available_location }}" class="c__button carbutt no-barba career-filter-link {{ $location == $available_location ? 'light' : '' }}">{{ $available_location }}</a>
                  @endforeach
                </div>

                <div style="margin-top: 50px;" class="vacancies" id="career-vacancies">
                  @include('partials.career-list-items', ['careers' => $careers])
                </div>
              </div>
            </section>
          </div>

          <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
          <script>
            document.addEventListener('DOMContentLoaded', function () {
              const careersScrollButton = document.getElementById('scroll-to');
              const opportunitiesSection = document.getElementById('current-opportunities');

              if (!careersScrollButton || !opportunitiesSection) {
                return;
              }

              careersScrollButton.addEventListener('click', function (event) {
                event.preventDefault();
                opportunitiesSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
              });

              const vacancies = document.getElementById('career-vacancies');
              const filterLinks = Array.from(document.querySelectorAll('.career-filter-link'));

              if (!vacancies || !filterLinks.length) {
                return;
              }

              const setActiveFilter = function (activeLocation) {
                filterLinks.forEach(function (link) {
                  link.classList.toggle('light', link.dataset.location === activeLocation);
                });
              };

              filterLinks.forEach(function (link) {
                link.addEventListener('click', async function (event) {
                  event.preventDefault();

                  const url = new URL(link.href, window.location.origin);

                  try {
                    const response = await fetch(url, {
                      headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                      },
                    });

                    if (!response.ok) {
                      window.location.href = link.href;
                      return;
                    }

                    const data = await response.json();
                    vacancies.innerHTML = data.html;
                    setActiveFilter(data.location || '');
                    window.history.replaceState({}, '', link.href + '#current-opportunities');
                    opportunitiesSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                  } catch (error) {
                    window.location.href = link.href;
                  }
                });
              });
            });
          </script>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" id="data_location" value="" />
@endsection
