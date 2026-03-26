@extends('layouts.main')
@section('body_class', 'wp-singular page-template page-template-page-blog page page-id-5433 wp-theme-ignite no-smooth-scroll')
@section('content')
  <div class="case-study-video-container"></div>
  <div class="working-with-us-scroll-image"></div>
  <div class="individual-service-scroll-image"></div>

  <div id="viewport">
    <div id="scroll-container" class="scroll-container">
      <div id="barba-wrapper">
        <div class="barba-container">
          <div
            style="background-image: url('{{ $blog->getFirstMediaUrl('blog_images') }}');"
            class="relative w-screen min-h-screen bg-cover bg-center bg-no-repeat flex items-center justify-center bg-black">
            <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-b from-black to-[#000000] opacity-50"></div>
            <p class="text-white text-6xl max-w-3xl font-extrabold z-10 text-center px-6">{{ $blog->localized('title') }}</p>
          </div>
          <div class="bg-black">
            <div class="max-w-6xl mx-auto space-y-24 p-10 py-24 text-white">
              <div class="flex items-center gap-5">
                <img src="{{ $blog->user->image }}" class="w-16 h-16 rounded-full object-cover" alt="">
                <p>{{ $blog->user->name }}</p>
              </div>
              <div>
                {!! $blog->localized('content') !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" id="data_location" value="" />
@endsection
