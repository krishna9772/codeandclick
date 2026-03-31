@forelse ($careers as $career)
  <div class="row uk-job">
    <div class="col-xs-12 col-sm-7 col-md-8">
      <h3 style="font-size: 44px;">{{ $career->localized('title') }}</h3>
    </div>
    <div class="col-xs-12 col-sm-5 col-md-4 | button-col">
      <a
        href="{{ route('show-career-details', [$career->slug]) }}"
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
@empty
  <div class="row uk-job">
    <div class="col-xs-12">
      <h3 style="font-size: 32px;">No openings found for this location.</h3>
    </div>
  </div>
@endforelse
