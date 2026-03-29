@extends('layouts.main')
@section('body_class', 'wp-singular blog_post-template-default single single-blog_post wp-theme-ignite no-smooth-scroll')
@section('content')
  @php
    $blogUrl = route('blog-details', ['slug' => $blog->slug]);
    $shareUrl = urlencode($blogUrl);
    $shareTitle = urlencode($blog->localized('title'));
    $blogType = $blog->type ?: 'Blog';
    $publishedDate = optional($blog->created_at)->format('jS F Y');
    $content = $blog->localized('content');
    $content = preg_replace('/\sstyle=("|\')(.*?)\1/i', '', $content);
  @endphp

  <div class="case-study-video-container"></div>
  <div class="working-with-us-scroll-image"></div>
  <div class="individual-service-scroll-image"></div>

  <div id="viewport">
    <div id="scroll-container" class="scroll-container">
      <div id="barba-wrapper" aria-live="polite">
        <div class="barba-container">
          <section class="m__hero" style="background-image:url('{{ $blog->getFirstMediaUrl('blog_images') }}')">
            <div class="container">
              <div class="m__hero--content">
                <h1 class="small">{{ $blog->localized('title') }}</h1>
                <div>
                  <p class="small">{{ $blogType }}</p>
                  @if ($publishedDate)
                    <p class="small">{{ $publishedDate }}</p>
                  @endif
                </div>
              </div>
            </div>
          </section>

          <section class="l__blog-post">
            <div class="container">
              <div class="l__blog-post--details">
                <div class="l__blog-post--details--author">
                  <img class="l__blog-post--details--author--image" src="{{ $blog->user->image }}" alt="author profile image">
                  <p>{{ $blog->user->name }}</p>
                </div>

                <div class="l__blog-post--details--share">
                  <p>Share</p>
                  <a target="_blank" rel="noopener" href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}">
                    <img src="{{ asset('images/icons/facebook-logo-black.svg') }}" alt="facebook share">
                  </a>
                  <a target="_blank" rel="noopener" href="https://twitter.com/share?url={{ $shareUrl }}&text={{ $shareTitle }}">
                    <img src="{{ asset('images/icons/twitter-logo-black.svg') }}" alt="twitter share">
                  </a>
                  <a target="_blank" rel="noopener" href="https://www.linkedin.com/shareArticle?mini=true&url={{ $shareUrl }}">
                    <img src="{{ asset('images/icons/linkedin-black.svg') }}" alt="linkedin share">
                  </a>
                </div>
              </div>

              <div class="l__blog-post--content">
                {!! $content !!}
              </div>
            </div>
          </section>

          <section class="l__get-in-touch">
            <div class="xsmall-container">
              <div class="horizontal-line top"></div>
              <h4 class="small">Interested in working together? We'd love to chat.</h4>
              <a href="{{ route('contact') }}" class="c__button dark">Get in touch</a>
              <div class="horizontal-line"></div>
              <div class="l__get-in-touch--social">
                <div class="l__get-in-touch--social--share">
                  <p>Share</p>
                  <a target="_blank" rel="noopener" href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}">
                    <img src="{{ asset('images/icons/facebook-logo-black.svg') }}" alt="facebook share">
                  </a>
                  <a target="_blank" rel="noopener" href="https://twitter.com/share?url={{ $shareUrl }}&text={{ $shareTitle }}">
                    <img src="{{ asset('images/icons/twitter-logo-black.svg') }}" alt="twitter share">
                  </a>
                  <a target="_blank" rel="noopener" href="https://www.linkedin.com/shareArticle?mini=true&url={{ $shareUrl }}">
                    <img src="{{ asset('images/icons/linkedin-black.svg') }}" alt="linkedin share">
                  </a>
                </div>

                <a href="{{ route('blog') }}" class="c__button-circle dark no-barba">
                  <span>Visit the blog</span>
                  <div class="c__button-circle--arrow">
                    <img alt="right arrow" src="{{ asset('images/icons/right-arrow-dark.svg') }}">
                  </div>
                </a>
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

      if (!primaryButtons || !compactButtons) {
        return;
      }

      function syncBlogDetailHeader() {
        const isCompact = window.pageYOffset > 100;

        primaryButtons.classList.toggle('show', !isCompact);
        compactButtons.classList.toggle('show', isCompact);
      }

      syncBlogDetailHeader();
      window.addEventListener('scroll', syncBlogDetailHeader, { passive: true });

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
    });
  </script>
@endsection
