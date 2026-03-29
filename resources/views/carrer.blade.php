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
                  <a href="{{ route('show-careers') }}" class="c__button carbutt {{ $location == '' ? 'light' : '' }}" id="uk-butt">{{ site_text('site.blog.all') }}</a>
                  @foreach (config('base.location') as $available_location)
                  <a href="{{ route('show-careers', ['location' => $available_location]) }}" class="c__button carbutt {{ $location == $available_location ? 'light' : '' }}" id="uk-butt">{{ $available_location }}</a>
                  @endforeach
                </div>

                <div style="margin-top: 50px;" class="vacancies">
                  @foreach ($careers as $career)
                  <div class="row uk-job">
                    <div class="col-xs-12 col-sm-7 col-md-8">
                      <h3 style="font-size: 44px;">{{ $career->localized('title') }}</h3>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-4 | button-col">
                      <a
                        href="{{ route('show-career-details', [$career->slug]) }}"
                        target=""
                        class="c__button-circle light">
                        <span>{{ site_text('site.careers.read_more') }}</span>
                        <div class="c__button-circle--arrow">
                          <img
                            alt="right arrow"
                            src="{{ asset('images/icons/right-arrow.svg') }}" />
                        </div>
                      </a>
                    </div>
                  </div>
                  @endforeach
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
            });
          </script>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" id="data_location" value="" />
@endsection
