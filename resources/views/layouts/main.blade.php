<!DOCTYPE html>
<html lang="{{ app()->getLocale() === 'mm' ? 'my' : 'en-US' }}" class="no-js">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="HandheldFriendly" content="True" />
  <meta name="MobileOptimized" content="320" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  {!! SEO::generate() !!}


  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('images/new-favicon.png') }}" />

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Canonical URL -->
  <link rel="canonical" href="https://codeandclick.com/" />
  {{-- <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script> --}}
  <script src="{{asset('js/jquery.js')}}"></script>

</head>

<body
  class="@yield('body_class', 'home wp-singular page-template page-template-page-home page-template-page-home-php page page-id-5433 wp-theme-ignite no-smooth-scroll')">
  <div class="c__logo">
    <a href="{{ route('home') }}" class="no-barba">
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
          <a lang="my-MM" hreflang="my-MM" href="{{ route('language.switch', ['locale' => 'mm']) }}" class="no-barba {{ app()->getLocale() === 'mm' ? 'current' : '' }}">MM</a>
        </li>
        <li>
          <a lang="en-US" hreflang="en-US" href="{{ route('language.switch', ['locale' => 'en']) }}" class="no-barba {{ app()->getLocale() === 'en' ? 'current' : '' }}">EN</a>
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
  <div class="transition-curtain flex flex-col justify-center items-center">
    <img class="w-24" src="{{ asset('images/logo.png') }}" alt="">
    <p class="text-white text-2xl mt-10">Code and Click</p>
  </div>
  <script>
    window.onload = () => {
      const curtain = document.querySelector('.transition-curtain');
      const anchors = document.querySelectorAll('a'); // Select all links

       setTimeout(() => {
        curtain.classList.add('slide-out');
      }, 300); 
      anchors.forEach(anchor => {
        anchor.addEventListener('click', e => {
          e.preventDefault(); 
          let target = anchor.href; 

          if (anchor.hostname === window.location.hostname) {

            curtain.classList.remove('slide-out');
            curtain.classList.add('slide-in');

            setTimeout(() => {
              window.location.href = target;
            }, 1000);

          } else {
            window.location.href = target;
          }
        });
      });
    };
  </script>
  <section class="c__navigation">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 contact">
          <h5 class="large">{{ site_text('site.navigation.contact') }}</h5>

          <div class="c__navigation--contact-switcher">
            <h4 id="one" class="switch small active">{{ site_text('site.navigation.myanmar') }}</h4>
            <h4 id="two" class="switch small">{{ site_text('site.navigation.thailand') }}</h4>
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
                <a href="{{ route('our-work') }}" class="no-barba">{{ site_text('site.navigation.our_work') }}</a>
              </li>
              <li
                id="menu-item-16"
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16">
                <a href="{{ route('technology') }}" class="no-barba">{{ site_text('site.navigation.technology') }}</a>
              </li>
              <li
                id="menu-item-19"
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-19">
                <a href="{{ route('services') }}" class="no-barba">{{ site_text('site.navigation.what_we_do') }}</a>
              </li>
              <li
                id="menu-item-15"
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15">
                <a href="{{ route('blog') }}" class="no-barba">{{ site_text('site.navigation.blog') }}</a>
              </li>
              <li
                id="menu-item-4256"
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4256">
                <a href="{{ route('work-with-us') }}" class="no-barba">{{ site_text('site.navigation.working_with_us') }}</a>
              </li>
              <li
                id="menu-item-14"
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14">
                <a href="{{ route('contact') }}" class="no-barba">{{ site_text('site.navigation.contact') }}</a>
              </li>
              <li
                id="menu-item-17"
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17">
                <a href="{{ route('ventures') }}" class="no-barba">{{ site_text('site.navigation.ventures') }}</a>
              </li>
              <li
                id="menu-item-5156"
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5156">
                <a href="{{ route('show-careers') }}" class="no-barba">{{ site_text('site.navigation.careers') }}</a>
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
            <a target="_blank" href="https://www.instagram.com/codenclickmm/">
              <img
                alt="instagram url"
                src="{{ asset('images/icons/instragram.svg') }}" />
            </a>
            <a target="_blank" href="https://twitter.com/codenclickmm">
              <img alt="twitter url" src="{{ asset('images/icons/twiiter.svg') }}" />
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

  @yield('content')

  <footer>
    <div class="container">
      <div class="row top">
        <div class="col-xs-12 col-md-6 footer_text_one">
          <h5>All the Lorem Ipsum</h5>
          <h4>All the Lorem Ip as necessary?</h4>
          <!-- <a href="/contact/" class="c__button dark">Get in touch</a> -->
        </div>
        <div class="offices col-xs-5 col-md-3">
          <h5>Sub Menus</h5>
          <ul class="footer-office-links">
            <li>
              <a class="data-location" data-location="london" href="#">predefined</a>
            </li>
            <li>
              <a class="data-location" data-location="fl" href="#">predefined</a>
            </li>
          </ul>
        </div>
        <div class="stay-in-touch col-xs-7 col-md-3">
          <h5>Social Icons</h5>
          <div class="social-links">
            <a target="_blank" href="https://web.facebook.com/codenclick">
              <img
                alt="facebook url"
                src="{{ asset('images/icons/facebook-logo-black.svg') }}" />
            </a>
            <a target="_blank" href="#">
              <img
                alt="instagram url"
                src="{{ asset('images/icons/instagram-logo-black.svg') }}" />
            </a>
            <a target="_blank" href="#">
              <img
                alt="youtube url"
                style="max-width: 37px"
                src="{{ asset('images/icons/youtube-logo-black.svg') }}" />
            </a>
            <a target="_blank" href="#">
              <img
                alt="twitter url"
                src="{{ asset('images/icons/twitter-logo-black.svg') }}" />
            </a>
            <a target="_blank" href="#">
              <img
                alt="linkedin url"
                src="{{ asset('images/icons/linkedin-black.svg') }}" />
            </a>
          </div>
          <div class="c__button-circle dark open-newsletter">
            <span>Newsletter</span>
            <div class="c__button-circle--arrow">
              <img
                alt="newsletter signup"
                src="{{ asset('images/icons/icons8-right-24.png') }}" />
            </div>
          </div>
        </div>
      </div>
      <div class="row bottom">
        <a href="/">
          <img
            src="{{ asset('images/footer-logo.jpg') }}"
            style="width: 50px; height: 50px"
            alt="" />
        </a>
        <div class="general-links">
          <div class="menu-footer-menu-container">
            <ul id="menu-footer-menu" class="menu">
              <li
                id="menu-item-4615"
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4615">
                <a href="#">Privacy Policy</a>
              </li>
              <li
                id="menu-item-3538"
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3538">
                <a href="#">T&#038;C</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>

  {{-- popup  --}}
  <div class="popup-overlay">
    <div class="popup" id="get-in-touch-form">
      @php
        $enquiryErrors = $errors->getBag('enquiry');
        $selectedServices = old('service_looking_for', []);
        $selectedServices = is_array($selectedServices) ? $selectedServices : [];
      @endphp
      <form action="{{ route('enquiry.store') }}" method="POST" novalidate>
        @csrf
        <img
          alt="close popup"
          class="close-popup"
          src="{{ asset('images/icons/close.svg') }}" />
        <div class="get-in-touch-form-inner form">
          <h4 class="large">Send an enquiry</h4>
          <p>What services are you looking for?</p>
          <p class="service error {{ $enquiryErrors->has('service_looking_for') ? 'active' : '' }}">Please select a service</p>
          <div class="checkbox-container">
            <div class="checkbox-holder">
              <input
                type="checkbox"
                name="service_looking_for[]"
                id="strategy"
                value="Strategy &amp; planning"
                @checked(in_array('Strategy & planning', $selectedServices, true)) />
              <label for="strategy">Strategy & planning</label>
            </div>
            <div class="checkbox-holder">
              <input
                type="checkbox"
                name="service_looking_for[]"
                id="websites"
                value="Website"
                @checked(in_array('Website', $selectedServices, true)) />
              <label for="websites">Website</label>
            </div>
            <div class="checkbox-holder">
              <input
                type="checkbox"
                name="service_looking_for[]"
                id="marketing"
                value="Marketing"
                @checked(in_array('Marketing', $selectedServices, true)) />
              <label for="marketing">Marketing</label>
            </div>
            <div class="checkbox-holder">
              <input
                type="checkbox"
                name="service_looking_for[]"
                value="Technology solutions"
                id="technology"
                @checked(in_array('Technology solutions', $selectedServices, true)) />
              <label for="technology">Technology solutions</label>
            </div>
            <div class="checkbox-holder">
              <input
                type="checkbox"
                name="service_looking_for[]"
                id="branding"
                value="Branding"
                @checked(in_array('Branding', $selectedServices, true)) />
              <label for="branding">Branding</label>
            </div>
            <div class="checkbox-holder">
              <input type="checkbox" name="service_looking_for[]" id="crm" value="CRM" @checked(in_array('CRM', $selectedServices, true)) />
              <label for="crm">CRM</label>
            </div>
            <div class="checkbox-holder">
              <input
                type="checkbox"
                name="service_looking_for[]"
                id="services"
                value="Other"
                @checked(in_array('Other', $selectedServices, true)) />
              <label for="services">Other</label>
            </div>
          </div>
          <p>
            Tell us about your project and what you want from us, this will help
            us prepare for our call.
          </p>
          <textarea
            id="get-in-touch-form-message"
            name="about_project"
            placeholder="Enter your message"
            class="{{ $enquiryErrors->has('about_project') ? 'input-error' : '' }}">{{ old('about_project') }}</textarea>
          <p>What’s your budget?</p>
          <p class="budget error {{ $enquiryErrors->has('budget') ? 'active' : '' }}">Please select a budget</p>
          <div class="radio-container">
            <div class="radio-holder">
              <input
                type="radio"
                name="budget"
                id="less_than_10k"
                value="Less than $ 10k"
                @checked(old('budget') === 'Less than $ 10k') />
              <label for="less_than_10k">Less than $ 10k</label>
            </div>
            <div class="radio-holder">
              <input
                type="radio"
                name="budget"
                id="10_40_k"
                value="$ 10 - $ 40k"
                @checked(old('budget') === '$ 10 - $ 40k') />
              <label for="10_40_k">$ 10 - $ 40k</label>
            </div>
            <div class="radio-holder">
              <input type="radio" name="budget" id="40_k" value="$ 40k +" @checked(old('budget') === '$ 40k +') />
              <label for="40_k">$ 40k +</label>
            </div>
          </div>
          <p>Your Information</p>
          <div class="input-container">
            <input
              type="text"
              id="get-in-touch-form-first_name"
              name="first_name"
              placeholder="Enter your first name"
              value="{{ old('first_name') }}"
              class="{{ $enquiryErrors->has('first_name') ? 'input-error' : '' }}" />
            <input
              type="text"
              id="get-in-touch-form-last_name"
              name="last_name"
              placeholder="Enter your last name"
              value="{{ old('last_name') }}"
              class="{{ $enquiryErrors->has('last_name') ? 'input-error' : '' }}" />
            <input
              type="text"
              id="get-in-touch-form-business_name"
              name="business_name"
              placeholder="Enter your business name"
              value="{{ old('business_name') }}"
              class="{{ $enquiryErrors->has('business_name') ? 'input-error' : '' }}" />
            <input
              type="text"
              id="get-in-touch-form-email_address"
              name="email"
              placeholder="Enter your email address"
              value="{{ old('email') }}"
              class="{{ $enquiryErrors->has('email') ? 'input-error' : '' }}" />
            <input
              type="text"
              id="get-in-touch-form-website"
              name="website"
              placeholder="Website"
              value="{{ old('website') }}"
              class="{{ $enquiryErrors->has('website') ? 'input-error' : '' }}" />
            <input
              type="text"
              id="get-in-touch-form-phone_number"
              name="phone"
              placeholder="Enter your phone number"
              value="{{ old('phone') }}"
              class="{{ $enquiryErrors->has('phone') ? 'input-error' : '' }}" />
          </div>
          <p>Business Type</p>
          <div class="input-container">
            <input
              type="text"
              id="get-in-touch-form-business_type"
              name="business_type"
              placeholder="Enter your business type"
              value="{{ old('business_type') }}"
              class="{{ $enquiryErrors->has('business_type') ? 'input-error' : '' }}" />
          </div>

          <p>Location</p>
          <p class="location error {{ $enquiryErrors->has('location') ? 'active' : '' }}">Please select your location</p>
          <div class="radio-container">
            <div class="radio-holder">
              <input type="radio" id="Yangon" name="location" value="Yangon" @checked(old('location') === 'Yangon') />
              <label for="Yangon">Yangon</label>
            </div>
            <div class="radio-holder">
              <input
                type="radio"
                id="Bangkok"
                name="location"
                value="Bangkok"
                @checked(old('location') === 'Bangkok') />
              <label for="Bangkok">Bangkok</label>
            </div>

            <div class="radio-holder">
              <input type="radio" name="location" id="global" value="Global" @checked(old('location') === 'Global') />
              <label for="global">Global</label>
            </div>
          </div>
          <p>How did you hear about Us?</p>
          <div class="radio-container find-us">
            <div class="radio-holder">
              <input
                type="radio"
                name="hear_about_us"
                value="I've worked with you previously"
                id="hear-about-previous"
                @checked(old('hear_about_us') === "I've worked with you previously") />
              <label for="hear-about-previous">I've worked with you previously</label>
            </div>
            <div class="radio-holder">
              <input type="radio" name="hear_about_us" value="Found you online" id="hear-about-online" @checked(old('hear_about_us') === 'Found you online') />
              <label for="hear-about-online">Found you online</label>
            </div>
            <div class="radio-holder">
              <input
                type="radio"
                name="hear_about_us"
                value="Recommended by client or collaborator"
                id="hear-about-recommended"
                @checked(old('hear_about_us') === 'Recommended by client or collaborator') />
              <label for="hear-about-recommended">Recommended by client or collaborator</label>
            </div>
            <div class="radio-holder">
              <input
                type="radio"
                name="hear_about_us"
                value="Saw an advert or social"
                id="hear-about-social"
                @checked(old('hear_about_us') === 'Saw an advert or social') />
              <label for="hear-about-social">Saw an advert or social</label>
            </div>

            <div class="radio-holder">
              <input type="radio" name="hear_about_us" value="Other" id="hear-about-other" @checked(old('hear_about_us') === 'Other') />
              <label for="hear-about-other">Other</label>
            </div>
          </div>

          <div class="submit">
            <div class="submit-gdpr">
              <div class="checkbox-holder gdpr-checkbox">
                <input type="checkbox" name="receive_insight" id="receive_insight" value="1" @checked(old('receive_insight')) />
                <label for="receive_insight">
                  Tick the box to receive insight, opinion and inspiration from
                  Code & Click
                  <span class="gdpr-error">Please tick to receive newsletters</span>
                </label>
              </div>
              <p>
                Please note that by submitting this form you agree to us storing
                your contact details and contacting you in regard to your query.
                Our privacy policy is available on our website with full details
                on our commitment to protecting personal data.
              </p>
            </div>
            <button type="submit" id="contact-enquiry" class="submit-form c__button dark">
              Submit
            </button>
          </div>
        </div>

        <div class="get-in-touch-form-inner thank-you inactive">
          <h4 class="large">Enquiry sent</h4>
          <p>We'll be in touch soon!</p>
        </div>

      </form>

    </div>



    <div class="popup" id="signup-form">
      <form action="{{ route('user.subscribe') }}" method="post">
        @csrf
        <img
          alt="close popup"
          class="close-popup"
          src="{{ asset('images/icons/close.svg') }}" />
        <h4 class="large">Newsletter Signup</h4>
        <p>Your Information</p>
        <div class="input-container">
          <input
            type="text"
            id="signup-form-first_name"
            name="first_name"
            placeholder="First Name" />
          <input
            type="text"
            id="signup-form-last_name"
            name="last_name"
            placeholder="Last Name" />
          <input
            class="full-width"
            type="text"
            id="signup-form-email_address"
            name="email"
            placeholder="Email Address" />
        </div>
        <div class="submit">
          <div class="checkbox-holder">
            <input type="checkbox" name="receive_newsletter" value="1" id="gdpr" />
            <p>
              Tick here if you'd like to receive updates from Code & Click.
              <span class="gdpr-error">Please tick to receive newsletters</span>
            </p>
          </div>
          <button type="submit" id="newsletter-submit" class="submit-form c__button dark">
            Submit
          </button>
        </div>
      </form>
    </div>

  </div>
  <script>
    $(document).ready(function() {
      $(".open-newsletter").click(function() {
          $(".popup-overlay").addClass("active"),
            $("#signup-form").addClass("active");
        }),
        $("#signup-form .close-popup").click(function() {
          $(".popup-overlay").removeClass("active"),
            $("#signup-form").removeClass("active");
        }),
        $(".open-get-in-touch").click(function() {
          console.log('working');
          $(".popup-overlay").addClass("active"),
            $("#get-in-touch-form").addClass("active");
        }),
        $("#get-in-touch-form .close-popup").click(function() {
          $(".popup-overlay").removeClass("active"),
            $("#get-in-touch-form").removeClass("active");
        });
    })
  </script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const enquiryPopup = document.getElementById('get-in-touch-form');
      const enquiryForm = enquiryPopup ? enquiryPopup.querySelector('form') : null;
      const popupOverlay = document.querySelector('.popup-overlay');

      if (!enquiryPopup || !enquiryForm || !popupOverlay) {
        return;
      }

      const fieldMap = {
        first_name: document.getElementById('get-in-touch-form-first_name'),
        last_name: document.getElementById('get-in-touch-form-last_name'),
        business_name: document.getElementById('get-in-touch-form-business_name'),
        email: document.getElementById('get-in-touch-form-email_address'),
        phone: document.getElementById('get-in-touch-form-phone_number'),
        business_type: document.getElementById('get-in-touch-form-business_type'),
        about_project: document.getElementById('get-in-touch-form-message'),
      };

      const groupErrors = {
        service_looking_for: enquiryForm.querySelector('.service.error'),
        budget: enquiryForm.querySelector('.budget.error'),
        location: enquiryForm.querySelector('.location.error'),
      };

      const requiredFields = ['first_name', 'last_name', 'business_name', 'email', 'phone', 'business_type', 'about_project'];
      const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      function openEnquiryPopup() {
        popupOverlay.classList.add('active');
        enquiryPopup.classList.add('active');
      }

      function setFieldError(field, hasError) {
        if (!field) {
          return;
        }

        field.classList.toggle('input-error', hasError);
      }

      function setGroupError(name, hasError) {
        if (!groupErrors[name]) {
          return;
        }

        groupErrors[name].classList.toggle('active', hasError);
      }

      function validateField(name) {
        const field = fieldMap[name];

        if (!field) {
          return true;
        }

        const value = field.value.trim();
        let isValid = value !== '';

        if (name === 'email' && isValid) {
          isValid = emailPattern.test(value);
        }

        setFieldError(field, !isValid);

        return isValid;
      }

      function validateGroup(name) {
        let isValid = true;

        if (name === 'service_looking_for') {
          isValid = enquiryForm.querySelectorAll('input[name="service_looking_for[]"]:checked').length > 0;
        }

        if (name === 'budget' || name === 'location') {
          isValid = enquiryForm.querySelector(`input[name="${name}"]:checked`) !== null;
        }

        setGroupError(name, !isValid);

        return isValid;
      }

      requiredFields.forEach(function(name) {
        const field = fieldMap[name];

        if (!field) {
          return;
        }

        field.addEventListener('input', function() {
          validateField(name);
        });

        field.addEventListener('blur', function() {
          validateField(name);
        });
      });

      enquiryForm.querySelectorAll('input[name="service_looking_for[]"]').forEach(function(field) {
        field.addEventListener('change', function() {
          validateGroup('service_looking_for');
        });
      });

      enquiryForm.querySelectorAll('input[name="budget"]').forEach(function(field) {
        field.addEventListener('change', function() {
          validateGroup('budget');
        });
      });

      enquiryForm.querySelectorAll('input[name="location"]').forEach(function(field) {
        field.addEventListener('change', function() {
          validateGroup('location');
        });
      });

      enquiryForm.addEventListener('submit', function(event) {
        let isValid = true;

        requiredFields.forEach(function(name) {
          isValid = validateField(name) && isValid;
        });

        ['service_looking_for', 'budget', 'location'].forEach(function(name) {
          isValid = validateGroup(name) && isValid;
        });

        if (!isValid) {
          event.preventDefault();
          openEnquiryPopup();
        }
      });

      if (@json($errors->getBag('enquiry')->any())) {
        openEnquiryPopup();
      }
    });
  </script>
  {{-- <script
    src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.13/dayjs.min.js"
    integrity="sha512-FwNWaxyfy2XlEINoSnZh1JQ5TRRtGow0D6XcmAWmYCRgvqOUTnzCxPc9uF35u5ZEpirk1uhlPVA19tflhvnW1g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"></script> --}}
  <script src="{{asset('js/day.js')}}"></script>
  {{-- <script
    src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.13/plugin/timezone.min.js"
    integrity="sha512-nrkE2nl0pcqWefIY627DY1exPOSuZXMdOrxMxX0y7Ly6RH8K0WDjO1lqakkxQcX5m8hxoUSt75seRRiyhqPvIw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"></script> --}}
    <script src="{{asset('js/timezone.js')}}"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const popup = document.querySelector(".sp-popup");
      const closeBtn = document.querySelector(".sp-popup-content-close");

      dayjs.extend(window.dayjs_plugin_timezone);
      dayjs.tz.setDefault("Europe/London");
      const now = dayjs();
      const isAfter = now.isAfter(dayjs("2025-07-01T10:00:00"));
      console.log("isAfter launch", isAfter);

      if (isAfter) {
        //all good - let the popup display

        // Check if session cookie exists
        //   if (!sessionStorage.getItem("popupClosed")) {
        //     popup.style.display = "block";
        //     console.log("launch popup displayed");
        //   }

        //   closeBtn.addEventListener("click", function () {
        //     popup.style.display = "none";
        //     sessionStorage.setItem("popupClosed", "true");
        //   });
      } else {
        //don't show the popup
        return;
      }
    });
  </script>
</body>

</html>
