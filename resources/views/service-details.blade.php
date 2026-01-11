<!DOCTYPE html>
<html lang="en-US" class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Primary Meta Tags -->
    <title>Code And Click – Careers - Full-Service Digital Marketing & Web Development Agency</title>
    <meta name="description" content="Code And Click delivers cutting-edge digital marketing, Code And Click Careers page, custom web development, and high-impact production services to help businesses grow online.">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://codeandclick.com/">
    <meta property="og:title" content="Code And Click – Full-Service Digital Marketing & Web Development Agency">
    <meta property="og:description" content="We build, optimize, and scale your brand's digital presence with coding, marketing, and production solutions.">
    <meta property="og:image" content="https://codeandclick.com/images/social-preview.jpg">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://codeandclick.com/">
    <meta name="twitter:title" content="Code And Click – Full-Service Digital Marketing & Web Development Agency">
    <meta name="twitter:description" content="Custom web development, digital marketing, and creative production services for modern businesses.">
    <meta name="twitter:image" content="https://codeandclick.com/images/social-preview.jpg">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="https://codeandclick.com/">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="home wp-singular page-template page-template-page-home page-template-page-home-php page page-id-5433 wp-theme-ignite no-smooth-scroll">
    <div style="display: none">bool(false) bool(false) NULL</div>

    <!-- <div class="c__page-transition">
      <div id="ignite-logo-animate"></div>
    </div> -->

    <div class="c__logo">
        <a href="/">
            <img
                src="{{ asset('images/logo.png') }}"
                style="width: 50px; height: 50px"
                alt="" />
            <!-- <div id="ignite-header-logo-animate"></div> -->
        </a>
    </div>

    <header>
        <div class="c__header-buttons show">
            <ul class="c__language-switcher lang-3">
                <li>
                    <a lang="en-GB" hreflang="en-GB" href="/" class="no-barba">MM</a>
                </li>
                <li>
                    <a lang="en-US" hreflang="en-US" href="/" class="no-barba current">EN</a>
                </li>

            </ul>

            <div class="c__menu-toggle">
                <div class="c__menu-toggle--lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <div class="c__header-buttons--v2">
            <div class="c__button-filled">
                <!-- <a href="/contact">Get in Touch</a>
            <div class="vertical-line"></div> -->
                <div class="c__menu-toggle">
                    <div class="c__menu-toggle--lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="c__navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 contact">
                    <h5 class="large">Contact</h5>

                    <div class="c__navigation--contact-switcher">
                        <h4 id="one" class="switch small active">Myanmar</h4>
                        <h4 id="two" class="switch small">Thailand</h4>
                        <div
                            class="c__navigation--contact-switcher--info switcher active"
                            id="contact-one">
                            <a href="tel:+44 (0)93 3939 3939" class="small">+95 948394839</a>
                            <a href="mailto:hello@codenclickmm.com" class="small">myanmar@codenclickmm.com</a>
                        </div>
                        <div
                            class="c__navigation--contact-switcher--info switcher"
                            id="contact-two">
                            <a href="tel:490394938" class="small">+66 4072128616</a>
                            <a href="mailto:hello@codenclickmm.com" class="small">hello@codenclickmm.com</a>
                        </div>
                        <div
                            class="c__navigation--contact-switcher--info switcher"
                            id="contact-three">
                            <a href="tel:+39 371 453 4518" class="small">+39 371 453 4518</a>
                            <a href="mailto:ciao@codenclickmm.com" class="small">ciao@codenclickmm.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-9 nav">
                    <div class="menu-main-menu-container">
                        <ul id="menu-main-menu" class="menu">
                            <li
                                id="menu-item-20"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20">
                                <a href="{{ route('our-work') }}">Our Work</a>
                            </li>
                            <li
                                id="menu-item-16"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16">
                                <a href="{{ route('technology') }}">Technology</a>
                            </li>
                            <li
                                id="menu-item-19"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-19">
                                <a href="{{ route('services') }}">What We Do</a>
                            </li>
                            <li
                                id="menu-item-15"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15">
                                <a href="{{ route('blog') }}">Blog</a>
                            </li>
                            <li
                                id="menu-item-4256"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4256">
                                <a href="{{ route('work-with-us') }}">Working with us</a>
                            </li>
                            <li
                                id="menu-item-14"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14">
                                <a href="{{ route('contact') }}">Contact</a>
                            </li>
                            <li
                                id="menu-item-17"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17">
                                <a href="{{ route('ventures') }}">Ventures</a>
                            </li>
                            <li
                                id="menu-item-5156"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5156">
                                <a href="{{ route('show-careers') }}">Careers</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="c__navigation--social-links">
                        <a target="_blank" href="https://www.facebook.com/codenclickmm">
                            <img
                                alt="facebook url"
                                src="{{ asset('images/icons/facebook.svg') }}" />
                        </a>
                        <a
                            target="_blank"
                            href="https://www.instagram.com/codenclickmm/">
                            <img
                                alt="instagram url"
                                src="{{ asset('images/icons/instragram.svg') }}" />
                        </a>
                        <a target="_blank" href="https://twitter.com/codenclickmm">
                            <img
                                alt="twitter url"
                                src="{{ asset('images/icons/twiiter.svg') }}" />
                        </a>
                        <a
                            target="_blank"
                            href="https://www.linkedin.com/company/codenclickmm">
                            <img
                                alt="linkedin url"
                                src="{{ asset('images/icons/linkedin.svg') }}" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Elements moved here for fixed positions, had to remove smooth scroll so was no longer working inside there containers -->




    <!-- <div class="showreel-video-overlay"></div> -->

    <!-- <div class="showreel-video-container">
      <img
        alt="close video"
        class="close-video"
        src="https://ignitecreates.com/wp-content/themes/ignite/library/images/icons/close-white.svg"
      />
      <video id="showreel-video" loop playsinline webkit-playsinline>
        <source
          src="videos/home.mp4"
          type="video/mp4"
        />
      </video>
    </div> -->

    <div class="case-study-video-container"></div>
    <div class="working-with-us-scroll-image"></div>
    <div class="individual-service-scroll-image"></div>
    <!-- End of fixed elements -->

    <div id="viewport">
        <div id="scroll-container" class="scroll-container">
            <div id="barba-wrapper">
                <div class="barba-container">

                    <div
                        class="relative h-screen bg-cover bg-center flex items-center"
                        style="background-image: url('{{ $service->getFirstMediaUrl('services') }}');">
                        <!-- Gradient overlay -->
                        <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/50 to-black"></div>

                        <div class="relative z-10 max-w-6xl mx-auto px-10">
                            <a href="{{ route('services') }}" class="flex items-center gap-6 mb-16 group cursor-pointer">
                                <div
                                    class="border border-white/40 rounded-full w-14 h-14 flex items-center justify-center
               transition group-hover:bg-white/10">
                                    <img
                                        class="rotate-180 w-5"
                                        src="{{ asset('images/icons/right-arrow.svg') }}"
                                        alt="" />
                                </div>
                                <p class="text-white/80 text-lg tracking-wide">What we do</p>
                            </a>

                            <h1 class="text-white text-6xl lg:text-7xl font-extrabold leading-tight max-w-4xl">
                                {{ $service->name }}
                            </h1>
                        </div>
                    </div>
                    <div class="bg-black">
                        <div class="max-w-6xl mx-auto space-y-24 p-10 py-24 text-white">
                            <div class="flex items-center gap-5 text-5xl font-semibold">
                                {{ $service->title }}
                            </div>
                            <div class="text-xl">
                                {{ $service->main_content }}
                            </div>
                            <a href="{{ route('contact') }}" class="bg-white px-8 py-5 w-fit text-black text-xl rounded-full flex items-center gap-5">
                                Get in Touch
                            </a>
                        </div>
                    </div>
                    <div class="bg-[#f4f4f4]">
                        <div class="max-w-6xl mx-auto px-10 py-32 grid grid-cols-1 md:grid-cols-2 gap-16">
                            @foreach (explode('/', $service->tags) as $tag)
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
                        <div class="max-w-6xl mx-auto space-y-24 p-10 py-24  text-black">
                            <div>
                                {!! $service->sub_content !!}
                            </div>
                            <p class="text-4xl font-medium">Our Case Studies</p>
                            <div class="grid grid-cols-2 gap-6">
                                @foreach($service->works as $work)
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


                        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

                        <!-- #moove_gdpr_cookie_modal -->
                        <!--/copyscapeskip-->
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="data_location" value="" />

        @include('components.footer')
</body>

</html>