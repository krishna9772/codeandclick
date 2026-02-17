@extends('layouts.main')
@section('content')
@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="case-study-video-container"></div>
<div class="working-with-us-scroll-image"></div>
<div class="individual-service-scroll-image"></div>

<div id="viewport">
  <div id="scroll-container" class="scroll-container">
    <div id="barba-wrapper">
      <div class="barba-container">

        <section class="l__our-work">
          <!-- <img
                  class="l__our-work--flame-background"
                  src="https://ignitecreates.com/wp-content/themes/ignite/library/images/graphics/grey-flame-background.png"
                /> -->
          <div class="container max-w-[1024px] mx-auto ">
            <h1>Our Services</h1>
            <div class="m__our-work--filters">
              <div class="m__our-work--filters--selector">
                <h4 id="one" class="selector active">Project Type</h4>
                <!-- <h4 id="two" class="selector">Client</h4> -->
              </div>
              <div class="m__our-work--filters--tabs">
                <ul class="grid grid-cols-3 gap-x-6">
                  <li>
                    <a href="{{ route('our-work') }}" class="{{ $type == ""  ? "text-white" : "text-gray-600" }} hover:text-white no-barba">All</a>
                  </li>
                  <li>
                    <a href="{{ route('our-work', ['type' => 'branding-solution']) }}" class="{{ $type == "branding-solution"  ? "text-white" : "text-gray-600" }} hover:text-white no-barba">Branding Solution</a>
                  </li>

                  <li>
                    <a href="{{ route('our-work', ['type' => 'consultancy-integration-and-culture']) }}" class="{{ $type == "consultancy-integration-and-culture"  ? "text-white" : "text-gray-600" }} hover:text-white no-barba">Consultancy Integration and Culture</a>
                  </li>
                  <li>
                    <a href="{{ route('our-work', ['type' => 'brand-identity']) }}" class="{{ $type == "brand-identity"  ? "text-white" : "text-gray-600" }} hover:text-white no-barba">Brand Identity(Logo Design and Brand Book)</a>
                  </li>
                  <li>
                    <a href="{{ route('our-work', ['type' => 'marketing-services']) }}" class="{{ $type == "marketing-services"  ? "text-white" : "text-gray-600" }} hover:text-white">Marketing Services</a>
                  </li>
                  <li>
                    <a href="{{ route('our-work', ['type' => 'marketing-strategy']) }}" class="{{ $type == "marketing-strategy"  ? "text-white" : "text-gray-600" }} hover:text-white no-barba">Marketing Strategy and Consultancy
                      Digital Marketing</a>
                  </li>
                  <li>
                    <a href="{{ route('our-work', ['type' => 'social-media']) }}" class="{{ $type == "social-media"  ? "text-white" : "text-gray-600" }} hover:text-white no-barba">Social Media</a>
                  </li>
                  <li>
                    <a href="{{ route('our-work', ['type' => 'search-engine-optimization']) }}" class="{{ $type == "search-engine-optimization"  ? "text-white" : "text-gray-600" }} hover:text-white no-barba">Search Engine Optimization(SEO) </a>
                  </li>
                  <li>
                    <a href="{{ route('our-work', ['type' => 'digital-optimization']) }}" class="{{ $type == "digital-optimization"  ? "text-white" : "text-gray-600" }} hover:text-white no-barba">Digital Optimization</a>
                  </li>
                  <li>
                    <a href="{{ route('our-work', ['type' => 'media-and-press']) }}" class="{{ $type == "media-and-press"  ? "text-white" : "text-gray-600" }} hover:text-white no-barba">Media and Press</a>
                  </li>
                  <li>
                    <a href="{{ route('our-work', ['type' => 'events-coverage-and-live-streaming']) }}" class="{{ $type == "events-coverage-and-live-streaming"  ? "text-white" : "text-gray-600" }} hover:text-white no-barba">Events Coverage and Live Streaming </a>
                  </li>
                  <li>
                    <a href="{{ route('our-work', ['type' => 'creative-design']) }}" class="{{ $type == "creative-design"  ? "text-white" : "text-gray-600" }} hover:text-white no-barba">Creative Design </a>
                  </li>
                  <li>
                    <a href="{{ route('our-work', ['type' => 'website-and-social-media-content']) }}" class="{{ $type == "website-and-social-media-content"  ? "text-white" : "text-gray-600" }} hover:text-white no-barba">Website and Social Media Content </a>
                  </li>
                  <li>
                    <a href="{{ route('our-work', ['type' => 'video-production']) }}" class="{{ $type == "video-production"  ? "text-white" : "text-gray-600" }} hover:text-white no-barba">Video Production </a>
                  </li>
                  <li>
                    <a href="{{ route('our-work', ['type' => 'motions']) }}" class="{{ $type == "motions"  ? "text-white" : "text-gray-600" }} hover:text-white no-barba">Motions</a>
                  </li>
                  <li>
                    <a href="{{ route('our-work', ['type' => 'photo-shooting']) }}" class="{{ $type == "photo-shooting"  ? "text-white" : "text-gray-600" }} hover:text-white no-barba">Photo Shooting</a>
                  </li>
                  <li>
                    <a href="{{ route('our-work', ['type' => 'mobile-app-development']) }}" class="{{ $type == "mobile-app-development"  ? "text-white" : "text-gray-600" }} hover:text-white no-barba">Mobile App Development</a>
                  </li>
                  <li>
                    <a href="{{ route('our-work', ['type' => 'web-design']) }}" class="{{ $type == "web-design"  ? "text-white" : "text-gray-600" }} hover:text-white no-barba">Web Design</a>
                  </li>

                </ul>

              </div>
            </div>
            <div class="grid grid-cols-2 gap-6">

              @foreach($ourWorks as $work)
              <div
                class="relative min-h-[600px] overflow-hidden bg-cover bg-center"
                style="background-image: url('{{ asset($work->getFirstMediaUrl('ourwork-header')) }}')">
                <!-- Dark overlay -->
                <div class="absolute inset-0 bg-black/40"></div>

                <!-- Content wrapper -->
                <div class="relative h-full flex items-end w-full">
                  <a
                    href="{{ route('our-work-details', $work->id) }}" class="no-barba">
                    <div class="m-6 cursor-pointer group max-w-md border border-white/30 w-full bg-black/20 backdrop-blur-xl p-8 shadow-lg transition hover:bg-black/30">
                      <h3 class="text-2xl font-semibold text-white"> {{ $work->title }} </h3>
                      <div class="mt-4 text-white inline-flex items-center gap-2  py-2 text-sm font-medium transition "> View Case Study <img
                          class=" w-5 size-3"
                          src="{{ asset('images/icons/right-arrow.svg') }}"
                          alt="" /> </div>
                    </div>
                  </a>

                </div>
              </div>

              @endforeach



            </div>
          </div>


        </section>

      </div>
    </div>


  </div>
</div>
<input type="hidden" id="data_location" value="" />
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

@endsection