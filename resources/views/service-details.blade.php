@extends('layouts.main')
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
            style="background-image: url('{{ $service->getFirstMediaUrl('services') }}');">
            <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/50 to-black"></div>

            <div class="relative z-10 max-w-6xl mx-auto px-10">
              <a href="{{ route('services') }}" class="no-barba flex items-center gap-6 mb-16 group cursor-pointer">
                <div class="border border-white/40 rounded-full w-14 h-14 flex items-center justify-center transition group-hover:bg-white/10">
                  <img
                    class="rotate-180 w-5"
                    src="{{ asset('images/icons/right-arrow.svg') }}"
                    alt="" />
                </div>
                <p class="text-white/80 text-lg tracking-wide">{{ site_text('site.services.back_to_services') }}</p>
              </a>

              <h1 class="text-white text-6xl lg:text-7xl font-extrabold leading-tight max-w-4xl">
                {{ $service->localized('name') }}
              </h1>
            </div>
          </div>
          <div class="bg-black">
            <div class="max-w-6xl mx-auto space-y-24 p-10 py-24 text-white">
              <div class="flex items-center gap-5 text-5xl font-semibold">
                {{ $service->localized('title') }}
              </div>
              <div class="text-xl">
                {!! $service->localized('main_content') !!}
              </div>
              <a href="{{ route('contact') }}" class="no-barba bg-white px-8 py-5 w-fit text-black text-xl rounded-full flex items-center gap-5">
                {{ site_text('site.services.get_in_touch') }}
              </a>
            </div>
          </div>
          <div class="bg-[#f4f4f4]">
            <div class="max-w-6xl mx-auto px-10 py-32 grid grid-cols-1 md:grid-cols-2 gap-16">
              @foreach ($service->localizedList('tags') as $tag)
              <div class="flex items-start gap-6">
                <div class="min-w-3 mt-3 min-h-3 rounded-full bg-black"></div>
                <p class="text-3xl font-medium leading-snug">
                  {{ $tag }}
                </p>
              </div>
              @endforeach

            </div>
          </div>
          <div class="bg-white min-h-screen">
            <div class="max-w-6xl mx-auto space-y-24 p-10 py-24 text-black">
              <div>
                {!! $service->localized('sub_content') !!}
              </div>
              <p class="text-4xl font-medium">{{ site_text('site.services.our_case_studies') }}</p>
              <div class="grid grid-cols-2 gap-6">
                @foreach($service->works as $work)
                <div
                  class="relative min-h-[600px] overflow-hidden bg-cover bg-center"
                  style="background-image: url('{{ asset($work->getFirstMediaUrl('ourwork-header')) }}')">
                  <div class="absolute inset-0 bg-black/40"></div>

                  <div class="relative h-full flex items-end w-full">
                    <a href="{{ route('our-work-details', $work->id) }}" class="no-barba">
                      <div class="m-6 cursor-pointer group max-w-md border border-white/30 w-full bg-black/20 backdrop-blur-xl p-8 shadow-lg transition hover:bg-black/30">
                        <h3 class="text-2xl font-semibold text-white">{{ $work->localized('title') }}</h3>
                        <div class="mt-4 text-white inline-flex items-center gap-2 py-2 text-sm font-medium transition">
                          {{ site_text('site.services.view_case_study') }}
                          <img
                            class="w-5 size-3"
                            src="{{ asset('images/icons/right-arrow.svg') }}"
                            alt="" />
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" id="data_location" value="" />
  </div>
@endsection
