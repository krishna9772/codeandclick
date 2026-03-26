@extends('layouts.main')
@section('body_class', 'wp-singular page-template page-template-page-careers page page-id-5433 wp-theme-ignite no-smooth-scroll')
@section('content')
  <div class="case-study-video-container"></div>
  <div class="working-with-us-scroll-image"></div>
  <div class="individual-service-scroll-image"></div>

  <div id="viewport">
    <div id="scroll-container" class="scroll-container">
      <div id="barba-wrapper">
        <div class="barba-container">
          <div class="h-[100vh] flex items-center justify-center bg-black">
            <p class="text-white text-6xl max-w-3xl font-extrabold">{{ $career->localized('title') }}</p>
          </div>
          <div style="background-color: #004B4F;">
            <div class="max-w-6xl mx-auto space-y-24 p-10 py-24 text-white">
              <div>
                <p class="text-white text-3xl font-black mb-6">{{ site_text('site.careers.description') }}</p>
                <div>{!! $career->localized('ignite') !!}</div>
              </div>
              <div>
                <p class="text-white text-3xl font-black mb-6">{{ site_text('site.careers.about_role') }}</p>
                <div>{!! $career->localized('role') !!}</div>
              </div>
              <div>
                <p class="text-white text-3xl font-black mb-6">{{ site_text('site.careers.key_responsibilities') }}</p>
                <div>
                  @foreach ($career->localizedList('responsibilities') as $responsibility)
                  <p class="flex items-center gap-3"><x-bi-dot class="w-8 h-8" /> {{ $responsibility }}</p>
                  @endforeach
                </div>
              </div>
              <div>
                <p class="text-white text-3xl font-black mb-6">{{ site_text('site.careers.requirements') }}</p>
                <div>
                  @foreach ($career->localizedList('requirements') as $requirement)
                  <p class="flex items-center gap-3"><x-bi-dot class="w-8 h-8" /> {{ $requirement }}</p>
                  @endforeach
                </div>
              </div>
              <div>
                <p class="text-white text-3xl font-black mb-6">{{ site_text('site.careers.benefits') }}</p>
                <div>
                  @foreach ($career->localizedList('benefits') as $benefit)
                  <p class="flex items-center gap-3"><x-bi-dot class="w-8 h-8" /> {{ $benefit }}</p>
                  @endforeach
                </div>
              </div>
              <div>
                <p class="text-white text-3xl font-black mb-6">{{ site_text('site.careers.other_information') }}</p>
                <p>{{ $career->salary }}Ks / {{ site_text('site.careers.monthly') }}</p>
                <p>{{ $career->location }}</p>
              </div>
              <div id="uk-butt" class="c__button bg-white text-black">
                {{ site_text('site.careers.apply_now') }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" id="data_location" value="" />
@endsection
