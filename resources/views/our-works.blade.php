@extends('layouts.main')
@section('content')
@vite(['resources/css/app.css', 'resources/js/app.js'])
<div class="case-study-video-container"></div>
<div class="working-with-us-scroll-image"></div>
<div class="individual-service-scroll-image"></div>
<!-- End of fixed elements -->

<div id="viewport">
  <div id="scroll-container" class="scroll-container">
    <div id="barba-wrapper">
      <div class="barba-container ">
        <section class="l__our-work">
          <!-- <img
                class="l__our-work--flame-background"
                src="https://ignitecreates.com/wp-content/themes/ignite/library/images/graphics/grey-flame-background.png"
              /> -->
          <div class="container fade-transition max-w-[1024px] mx-auto">
            <h1>Our Services</h1>
            <div class="m__our-work--filters">
              <div class="m__our-work--filters--selector">
                <h4 id="one" class="selector active">Project Type</h4>
                <!-- <h4 id="two" class="selector">Client</h4> -->
              </div>
              <div class="m__our-work--filters--tabs">
                <ul id="tab-one" class="tab active">
                  <li class="active " data-name="work_type" data-value="all">
                    <p>Branding Solution</p>
                  </li>
                  <li data-name="work_type" data-value="copywriting">
                    <p>Brand Strategy</p>
                  </li>
                  <li data-name="work_type" data-value="brand-strategy">
                    <p>Consultancy Integration and Culture</p>
                  </li>
                  <li
                    data-name="work_type"
                    data-value="advertising_campaign">
                    <p>Brand Identity(Logo Design and Brand Book)</p>
                  </li>
                  <li data-name="work_type" data-value="digital_marketing">
                    <p>Marketing Services</p>
                  </li>
                  <li data-name="work_type" data-value="websites">
                    <p>Marketing Strategy and Consultancy
                      Digital Marketing</p>
                  </li>
                  <li data-name="work_type" data-value="branding_strategy">
                    <p>Social Media</p>
                  </li>
                  <li data-name="work_type" data-value="games_tech">
                    <p>Search Engine Optimization(SEO) </p>
                  </li>
                  <li data-name="work_type" data-value="photography_video">
                    <p>Digital Optimization</p>
                  </li>
                  <li data-name="work_type" data-value="design_animation">
                    <p>Media and Press</p>
                  </li>
                  <li data-name="work_type" data-value="social_influencers">
                    <p>Events Coverage and Live Streaming </p>
                  </li>
                  <li data-name="work_type" data-value="social_influencers">
                    <p>Creative Design </p>
                  </li>
                  <li data-name="work_type" data-value="social_influencers">
                    <p>Website and Social Media Content </p>
                  </li>
                  <li data-name="work_type" data-value="social_influencers">
                    <p>Video Production </p>
                  </li>
                  <li data-name="work_type" data-value="social_influencers">
                    <p>Motions</p>
                  </li>
                  <li data-name="work_type" data-value="social_influencers">
                    <p>Photo Shooting</p>
                  </li>
                  <li data-name="work_type" data-value="social_influencers">
                    <p>Mobile App Development</p>
                  </li>
                  <li data-name="work_type" data-value="social_influencers">
                    <p>Web Design</p>
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
                    href="{{ route('our-work-details', $work->id) }}">
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


        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

      </div>
    </div>
  </div>
</div>
<input type="hidden" id="data_location" value="" />

@endsection