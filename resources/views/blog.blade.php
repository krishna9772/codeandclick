@extends('layouts.main')
@section('body_class', 'wp-singular page-template page-template-page-blog page page-id-5433 wp-theme-ignite no-smooth-scroll')
@section('content')



<div id="viewport">
  <div id="scroll-container" class="scroll-container" style="transform: matrix3d(1, 0.0001745, 0, 0, -0.0001745, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);">
        <div id="barba-wrapper" aria-live="polite">
      <div class="barba-container">
        <section class="l__blog">
          <img class="l__blog--flame-background" src="{{ asset('images/grey-flame-background.png') }}" style="transform: matrix(1, 0, 0, 1, 0, 0);">
  <div class="container">
            <div class="m__filters">
              <h1>{{ site_text('site.blog.title') }}</h1>
              <ul>
                <li data-value="all">
                  <p class="{{ $tab === '' ? 'active' : '' }}">
                    <a style="font-size: 16px; text-decoration: none;" href="{{ route('blog', ['tab' => '']) }}">{{ site_text('site.blog.all') }}</a>
                  </p>
                </li>
                <li data-value="strategy">
                  <p class="{{ $tab === 'Strategy' ? 'active' : '' }}"><a style="font-size: 16px; text-decoration: none;" href="{{ route('blog', ['tab' => 'Strategy']) }}">Strategy</a></p>
                </li>
                <li data-value="digital">
                  <p class="{{ $tab === 'Digital' ? 'active' : '' }}"><a style="font-size: 16px; text-decoration: none;" href="{{ route('blog', ['tab' => 'Digital']) }}">Digital</a></p>
                </li>
                <li data-value="creative">
                  <p class="{{ $tab === 'Creative' ? 'active' : '' }}"><a style="font-size: 16px; text-decoration: none;" href="{{ route('blog', ['tab' => 'Creative']) }}">Creative</a></p>
                </li>
                <li data-value="culture">
                  <p class="{{ $tab === 'Culture' ? 'active' : '' }}"><a style="font-size: 16px; text-decoration: none;" href="{{ route('blog', ['tab' => 'Culture']) }}">Culture</a></p>
                </li>
                <li data-value="news">
                  <p class="{{ $tab === 'News' ? 'active' : '' }}"><a style="font-size: 16px; text-decoration: none;" href="{{ route('blog', ['tab' => 'News']) }}">News</a></p>
                </li>
                <li data-value="branding">
                  <p class="{{ $tab === 'Branding' ? 'active' : '' }}"><a style="font-size: 16px; text-decoration: none;" href="{{ route('blog', ['tab' => 'Branding']) }}">Branding</a></p>
                </li>
                <li data-value="social">
                  <p class="{{ $tab === 'Social' ? 'active' : '' }}"><a style="font-size: 16px; text-decoration: none;" href="{{ route('blog', ['tab' => 'Social']) }}">Social</a></p>
                </li>
                <li data-value="christmas">
                  <p class="{{ $tab === 'Christmas' ? 'active' : '' }}"><a style="font-size: 16px; text-decoration: none;" href="{{ route('blog', ['tab' => 'Christmas']) }}">Christmas</a></p>
                </li>
                <li data-value="crm">
                  <p class="{{ $tab === 'Crm' ? 'active' : '' }}"><a style="font-size: 16px; text-decoration: none;" href="{{ route('blog', ['tab' => 'Crm']) }}">Crm</a></p>
                </li>
              </ul>
            </div>
          </div>

          @if ($tab === '' && $Headerblogs->count() >= 1)
           <section class="m__latest-article">
    <div class="row">
          
          <div class="col-xs-12 col-md-5 m__latest-article--left">
                <p class="small">Latest</p>
                <a href="{{ route('blog-details', ['slug' => $Headerblogs[0]->slug]) }}">
                  <h3>{{ $Headerblogs[0]->localized('title') }}</h3>
                </a>
                <div class="m__latest-article--left--author">
                  <img
                    class="m__latest-article--left--author--image"
                    alt="author profile image"
                    src="{{ $Headerblogs[0]->user->image }}" />
                  <p>{{ $Headerblogs[0]->user->name }}</p>
                </div>
              </div>
              <div class="col-xs-12 col-md-7 m__latest-article--right">
                <div class="img-holder">
                  <img
                    class="m__latest-article--right--image img-object-fit"
                    src="{{ asset($Headerblogs[0]->getFirstMediaUrl('blog_images')) }}"
                    alt="{{ $Headerblogs[0]->localized('title') }}" />
                </div>
                <div class="m__latest-article--right--content">
                  <p class="xsmall line-clamp-3">
                    {{ \Illuminate\Support\Str::words(strip_tags($Headerblogs[0]->localized('content')), 20, '...') }}
                  </p>
                  <a href="{{ route('blog-details', ['slug' => $Headerblogs[0]->slug]) }}">{{ site_text('site.blog.read_more') }}</a>
                </div>
              </div>
            </div>
          </section>
          @endif

          <div class="large-container">
            @if ($tab === '' && $Headerblogs->count() >= 5)
            <section class="m__quad-group">
              <div class="row">
                <div class="col-md-5 col-lg-6 left">
                  <a href="{{ route('blog-details', ['slug' => $Headerblogs[1]->slug]) }}">
                    <div class="m__quad-group--large-image">
                      <img
                        class="img-object-fit"
                        src="{{ asset($Headerblogs[1]->getFirstMediaUrl('blog_images')) }}"
                        alt="{{ $Headerblogs[1]->localized('title') }}" />
                    </div>
                  </a>
                  <div class="m__quad-group--content">
                    <a href="{{ route('blog-details', ['slug' => $Headerblogs[1]->slug]) }}">
                      <h3>{{ $Headerblogs[1]->localized('title') }}</h3>
                    </a>
                    <p class="xsmall">
                      {{ \Illuminate\Support\Str::words(strip_tags($Headerblogs[1]->localized('content')), 20, '...') }}
                    </p>
                    <div class="m__quad-group--author">
                      <img
                        class="m__quad-group--author--image"
                        alt="author profile image"
                        src="{{ $Headerblogs[1]->user->image }}" />
                      <p>{{ $Headerblogs[1]->user->name }}</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-7 col-lg-6 right">
                  <div class="m__quad-group--tile">
                    <a href="{{ route('blog-details', ['slug' => $Headerblogs[2]->slug]) }}">
                      <div class="m__quad-group--tile--image">
                        <img
                          class="img-object-fit"
                          src="{{ $Headerblogs[2]->getFirstMediaUrl('blog_images') }}"
                          alt="{{ $Headerblogs[2]->localized('title') }}" />
                      </div>
                    </a>
                    <div class="m__quad-group--tile--content">
                      <a href="{{ route('blog-details', ['slug' => $Headerblogs[2]->slug]) }}">
                        <h4 class="small">{{ $Headerblogs[2]->localized('title') }}</h4>
                      </a>
                      <div class="m__quad-group--author">
                        <img
                          class="m__quad-group--author--image"
                          alt="author profile image"
                          src="{{ $Headerblogs[2]->user->image }}" />
                        <p>{{ $Headerblogs[2]->user->name }}</p>
                      </div>
                    </div>
                  </div>

                  <div class="m__quad-group--tile">
                    <a href="{{ route('blog-details', ['slug' => $Headerblogs[3]->slug]) }}">
                      <div class="m__quad-group--tile--image">
                        <img
                          class="img-object-fit"
                          src="{{ $Headerblogs[3]->getFirstMediaUrl('blog_images') }}"
                          alt="{{ $Headerblogs[3]->localized('title') }}" />
                      </div>
                    </a>
                    <div class="m__quad-group--tile--content">
                      <a href="{{ route('blog-details', ['slug' => $Headerblogs[3]->slug]) }}">
                        <h4 class="small">{{ $Headerblogs[3]->localized('title') }}</h4>
                      </a>
                      <div class="m__quad-group--author">
                        <img
                          class="m__quad-group--author--image"
                          alt="author profile image"
                          src="{{ $Headerblogs[3]->user->image }}" />
                        <p>{{ $Headerblogs[3]->user->name }}</p>
                      </div>
                    </div>
                  </div>

                  <div class="m__quad-group--tile">
                    <a href="{{ route('blog-details', ['slug' => $Headerblogs[4]->slug]) }}">
                      <div class="m__quad-group--tile--image">
                        <img
                          class="img-object-fit"
                          src="{{ $Headerblogs[4]->getFirstMediaUrl('blog_images') }}"
                          alt="{{ $Headerblogs[4]->localized('title') }}" />
                      </div>
                    </a>
                    <div class="m__quad-group--tile--content">
                      <a href="{{ route('blog-details', ['slug' => $Headerblogs[4]->slug]) }}">
                        <h4 class="small">{{ $Headerblogs[4]->localized('title') }}</h4>
                      </a>
                      <div class="m__quad-group--author">
                        <img
                          class="m__quad-group--author--image"
                          alt="author profile image"
                          src="{{ $Headerblogs[4]->user->image }}" />
                        <p>{{ $Headerblogs[4]->user->name }}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            @endif

            <section class="l__blog-list">
              <div class="row">
                @include('partials.blog-list-items', ['blogs' => $blogs])
              </div>
              @if ($blogs->hasMorePages())
              <div class="l__blog-list--more-articles">
                <div
                  class="c__button-circle dark"
                  data-next-page="{{ $blogs->currentPage() + 1 }}"
                  data-tab="{{ $tab }}"
                  data-url="{{ route('blog.load-more') }}">
                  <span >{{ site_text('site.blog.show_more_articles') }}</span>
                  <div class="c__button-circle--arrow">
                    <img
                      src="{{ asset('images/icons/right-arrow-dark.svg') }}" />
                  </div>
                </div>
              </div>

              
              @endif
            </section>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
<input type="hidden" id="data_location" value="" />
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

@endsection
