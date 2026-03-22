<!DOCTYPE html>
<html lang="en-US" class="no-js">

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
  class="home wp-singular page-template page-template-page-home page-template-page-home-php page page-id-5433 wp-theme-ignite no-smooth-scroll">
  <div class="c__logo">
    <a href="/" class="no-barba">
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
                <a href="our-works" class="no-barba">Our Work</a>
              </li>
              <li
                id="menu-item-16"
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16">
                <a href="/technology" class="no-barba">Technology</a>
              </li>
              <li
                id="menu-item-19"
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-19">
                <a href="/services" class="no-barba">What We Do</a>
              </li>
              <li
                id="menu-item-15"
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15">
                <a href="/blog" class="no-barba">Blog</a>
              </li>
              <li
                id="menu-item-4256"
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4256">
                <a href="work-with-us" class="no-barba">Working with us</a>
              </li>
              <li
                id="menu-item-14"
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-14">
                <a href="contact" class="no-barba">Contact</a>
              </li>
              <li
                id="menu-item-17"
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17">
                <a href="ventures" class="no-barba">Ventures</a>
              </li>
              <li
                id="menu-item-5156"
                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5156">
                <a href="careers" class="no-barba">Careers</a>
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
      <form action="{{ route('enquiry.store') }}" method="POST">
        @csrf
        <img
          alt="close popup"
          class="close-popup"
          src="{{ asset('images/icons/close.svg') }}" />
        <div class="get-in-touch-form-inner form">
          <h4 class="large">Send an enquiry</h4>
          <p>What services are you looking for?</p>
          <p class="service error">Please select a service</p>
          <div class="checkbox-container">
            <div class="checkbox-holder">
              <input
                type="checkbox"
                name="service_looking_for[]"
                id="strategy"
                value="Strategy &amp; planning" />
              <label for="strategy">Strategy & planning</label>
            </div>
            <div class="checkbox-holder">
              <input
                type="checkbox"
                name="service_looking_for[]"
                id="websites"
                value="Website" />
              <label for="websites">Website</label>
            </div>
            <div class="checkbox-holder">
              <input
                type="checkbox"
                name="service_looking_for[]"
                id="marketing"
                value="Marketing" />
              <label for="marketing">Marketing</label>
            </div>
            <div class="checkbox-holder">
              <input
                type="checkbox"
                name="service_looking_for[]"
                value="Technology solutions"
                id="technology" />
              <label for="technology">Technology solutions</label>
            </div>
            <div class="checkbox-holder">
              <input
                type="checkbox"
                name="service_looking_for[]"
                id="branding"
                value="Branding" />
              <label for="branding">Branding</label>
            </div>
            <div class="checkbox-holder">
              <input type="checkbox" name="service_looking_for[]" id="crm" value="CRM" />
              <label for="crm">CRM</label>
            </div>
            <div class="checkbox-holder">
              <input
                type="checkbox"
                name="service_looking_for[]"
                id="services"
                value="Other" />
              <label for="services">Services</label>
            </div>
          </div>
          <p>
            Tell us about your project and what you want from us, this will help
            us prepare for our call.
          </p>
          <textarea
            id="get-in-touch-form-message"
            name="about_project"
            placeholder="Enter message here"></textarea>
          <p>What’s your budget?</p>
          <p class="budget error">Please select a budget</p>
          <div class="radio-container">
            <div class="radio-holder">
              <input
                type="radio"
                name="budget"
                id="less_than_10k"
                value="Less than $ 10k" />
              <label for="less_than_10k">Less than $ 10k</label>
            </div>
            <div class="radio-holder">
              <input
                type="radio"
                name="budget"
                id="10_40_k"
                value="$ 10 - $ 40k" />
              <label for="10_40_k">$ 10 - $ 40k</label>
            </div>
            <div class="radio-holder">
              <input type="radio" name="budget" id="40_k" value="$ 40k +" />
              <label for="40_k">$ 40k +</label>
            </div>
          </div>
          <p>Your Information</p>
          <div class="input-container">
            <input
              type="text"
              id="get-in-touch-form-first_name"
              name="first_name"
              placeholder="First Name" />
            <input
              type="text"
              id="get-in-touch-form-last_name"
              name="last_name"
              placeholder="Last Name" />
            <input
              type="text"
              id="get-in-touch-form-business_name"
              name="business_name"
              placeholder="Business Name" />
            <input
              type="text"
              id="get-in-touch-form-email_address"
              name="email"
              placeholder="Email Address" />
            <input
              type="text"
              id="get-in-touch-form-website"
              name="website"
              placeholder="Website" />
            <input
              type="text"
              id="get-in-touch-form-phone_number"
              name="phone"
              placeholder="Phone Number" />
          </div>
          <p>Business Type</p>
          <div class="input-container">
            <input
              type="text"
              id="get-in-touch-form-business_type"
              name="business_type"
              placeholder="Business Type" />
          </div>

          <p>Location</p>
          <p class="location error">Please select your location</p>
          <div class="radio-container">
            <div class="radio-holder">
              <input type="radio" id="Yangon" name="location" value="Yangon" />
              <label for="Yangon">Yangon</label>
            </div>
            <div class="radio-holder">
              <input
                type="radio"
                id="Bangkok"
                name="location"
                value="Bangkok" />
              <label for="Bangkok">Bangkok</label>
            </div>

            <div class="radio-holder">
              <input type="radio" name="location" id="global" value="Global" />
              <label for="global">Global</label>
            </div>
          </div>
          <p>How did you hear about Us?</p>
          <div class="radio-container find-us">
            <div class="radio-holder">
              <input
                type="radio"
                name="hear_about"
                value="I've worked with you previously"
                id="I've worked with you previously" />
              <label for="I've worked with you previously">I've worked with you previously</label>
            </div>
            <div class="radio-holder">
              <input type="radio" name="hear_about" value="Found you online" id="Found you online" />
              <label for="Found you online">Found you online</label>
            </div>
            <div class="radio-holder">
              <input
                type="radio"
                name="hear_about_us"
                value="Recommended by client or collaborator"
                id="Recommended by client or collaborator" />
              <label for="Recommended by client or collaborator">Recommended by client or collaborator</label>
            </div>
            <div class="radio-holder">
              <input
                type="radio"
                name="hear_about_us"
                value="Saw an advert or social"
                id="Saw an advert or social" />
              <label for="Saw an advert or social">Saw an advert or social</label>
            </div>

            <div class="radio-holder">
              <input type="radio" name="hear_about_us" value="other" id="other" />
              <label for="other">Other</label>
            </div>
          </div>

          <div class="submit">
            <div class="submit-gdpr">
              <div class="checkbox-holder gdpr-checkbox">
                <input type="checkbox" name="receive_insight" id="receive_insight" />
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
      <form action="{{ route('user.subscribe') }}" method="post" class="newsletter-signup-form" novalidate>
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
            maxlength="255"
            placeholder="Enter your first name" />
          <input
            type="text"
            id="signup-form-last_name"
            name="last_name"
            maxlength="255"
            placeholder="Enter your last name" />
          <input
            class="full-width"
            type="email"
            id="signup-form-email_address"
            name="email"
            maxlength="255"
            placeholder="Enter your email address" />
        </div>
        <div class="newsletter-errors">
          <p class="newsletter-field-error" data-field="first_name"></p>
          <p class="newsletter-field-error" data-field="last_name"></p>
          <p class="newsletter-field-error newsletter-field-error-full" data-field="email"></p>
        </div>
        <p class="newsletter-form-error gdpr-error" style="display: none;"></p>
        <p class="newsletter-success-message" style="display: none; color: #0c5c5f; margin-top: 12px;"></p>
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
    const newsletterFieldStyles = `
      #signup-form .newsletter-errors {
        display: flex;
        flex-wrap: wrap;
        gap: 32px;
        margin-top: 8px;
      }
      #signup-form .newsletter-field-error {
        display: none;
        width: calc(50% - 16px);
        color: #ff3b30;
        font-size: 14px;
        line-height: 1.4;
      }
      #signup-form .newsletter-field-error-full {
        width: 100%;
      }
      #signup-form .newsletter-success-message {
        font-size: 14px;
        line-height: 1.4;
      }
      @media (max-width: 767px) {
        #signup-form .newsletter-field-error {
          width: 100%;
        }
      }
    `;

    if (!document.getElementById('newsletter-field-styles')) {
      const styleTag = document.createElement('style');
      styleTag.id = 'newsletter-field-styles';
      styleTag.textContent = newsletterFieldStyles;
      document.head.appendChild(styleTag);
    }

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

      document.querySelectorAll('.newsletter-signup-form').forEach((newsletterForm) => {
        const firstNameInput = newsletterForm.querySelector('input[name="first_name"]');
        const lastNameInput = newsletterForm.querySelector('input[name="last_name"]');
        const emailInput = newsletterForm.querySelector('input[name="email"]');
        const receiveNewsletterInput = newsletterForm.querySelector('input[name="receive_newsletter"]');
        const errorElement = newsletterForm.querySelector('.newsletter-form-error');
        const successElement = newsletterForm.querySelector('.newsletter-success-message');
        const submitButton = newsletterForm.querySelector('button[type="submit"]');

        function getFieldError(field) {
          return newsletterForm.querySelector(`.newsletter-field-error[data-field="${field}"]`);
        }

        function setFieldError(field, message) {
          const element = getFieldError(field);

          if (!element) {
            return;
          }

          element.textContent = message || '';
          element.style.display = message ? 'block' : 'none';
        }

        function setNewsletterError(message) {
          errorElement.textContent = message || '';
          errorElement.style.display = message ? 'block' : 'none';
        }

        function setNewsletterSuccess(message) {
          successElement.textContent = message || '';
          successElement.style.display = message ? 'block' : 'none';
        }

        function clearFieldErrors() {
          ['first_name', 'last_name', 'email'].forEach((field) => setFieldError(field, ''));
        }

        function validateNewsletterForm() {
          setNewsletterError('');
          setNewsletterSuccess('');
          clearFieldErrors();

          if (!firstNameInput.value.trim()) {
            setFieldError('first_name', 'The first name field is required.');
            setNewsletterError('The first name field is required.');
            return false;
          }

          if (!lastNameInput.value.trim()) {
            setFieldError('last_name', 'The last name field is required.');
            setNewsletterError('The last name field is required.');
            return false;
          }

          if (!emailInput.value.trim()) {
            setFieldError('email', 'The email field is required.');
            setNewsletterError('The email field is required.');
            return false;
          }

          const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

          if (!emailPattern.test(emailInput.value.trim())) {
            setFieldError('email', 'The email must be a valid email address.');
            setNewsletterError('The email must be a valid email address.');
            return false;
          }

          if (!receiveNewsletterInput.checked) {
            setNewsletterError('Please tick to receive newsletters.');
            return false;
          }

          return true;
        }

        [firstNameInput, lastNameInput, emailInput].forEach((input) => {
          input.addEventListener('input', function() {
            setNewsletterError('');
            setNewsletterSuccess('');
            if (input === firstNameInput) {
              setFieldError('first_name', '');
            }
            if (input === lastNameInput) {
              setFieldError('last_name', '');
            }
            if (input === emailInput) {
              setFieldError('email', '');
            }
          });
        });

        receiveNewsletterInput.addEventListener('change', function() {
          setNewsletterError('');
          setNewsletterSuccess('');
        });

        newsletterForm.addEventListener('submit', async function(event) {
          event.preventDefault();

          if (!validateNewsletterForm()) {
            return;
          }

          setNewsletterError('');
          setNewsletterSuccess('');
          submitButton.disabled = true;

          try {
            const response = await fetch(newsletterForm.action, {
              method: 'POST',
              headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
              },
              body: new FormData(newsletterForm),
            });

            const data = await response.json();

            if (!response.ok) {
              clearFieldErrors();

              if (data.errors) {
                if (data.errors.first_name?.[0]) {
                  setFieldError('first_name', data.errors.first_name[0]);
                }
                if (data.errors.last_name?.[0]) {
                  setFieldError('last_name', data.errors.last_name[0]);
                }
                if (data.errors.email?.[0]) {
                  setFieldError('email', data.errors.email[0]);
                }

                const firstError = data.errors.receive_newsletter?.[0]
                  || data.errors.first_name?.[0]
                  || data.errors.last_name?.[0]
                  || data.errors.email?.[0]
                  || 'Unable to submit the newsletter form.';

                setNewsletterError(firstError);
              } else {
                setNewsletterError(data.message || 'Unable to submit the newsletter form.');
              }

              return;
            }

            newsletterForm.reset();
            clearFieldErrors();
            setNewsletterError('');
            setNewsletterSuccess(data.message || 'Thank you for subscribing to our newsletter!');
          } catch (error) {
            setNewsletterError('Something went wrong. Please try again.');
          } finally {
            submitButton.disabled = false;
          }
        });
      });
    })
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
