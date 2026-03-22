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
                <!-- <img
            src="/assets/images/logo.jpeg"
            style="width: 50px; height: 50px"
            alt=""
        /> -->
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
<div class="popup-overlay">
    <form action="{{ route('user.subscribe') }}" method="POST" class="newsletter-signup-form" novalidate>
        @csrf
        <div class="popup" id="signup-form">
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
        </div>
    </form>
</div>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.13/dayjs.min.js"
    integrity="sha512-FwNWaxyfy2XlEINoSnZh1JQ5TRRtGow0D6XcmAWmYCRgvqOUTnzCxPc9uF35u5ZEpirk1uhlPVA19tflhvnW1g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.13/plugin/timezone.min.js"
    integrity="sha512-nrkE2nl0pcqWefIY627DY1exPOSuZXMdOrxMxX0y7Ly6RH8K0WDjO1lqakkxQcX5m8hxoUSt75seRRiyhqPvIw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
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
            if (!sessionStorage.getItem("popupClosed")) {
                popup.style.display = "block";
                console.log("launch popup displayed");
            }

            closeBtn.addEventListener("click", function() {
                popup.style.display = "none";
                sessionStorage.setItem("popupClosed", "true");
            });
        } else {
            //don't show the popup
            return;
        }
    });
</script>
