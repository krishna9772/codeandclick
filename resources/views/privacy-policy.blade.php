@extends('layouts.main')
@section('body_class', 'wp-singular page-template page-template-page-privacy-policy page page-id-5433 wp-theme-ignite no-smooth-scroll')
@section('content')
    <style>
        .page-template-page-privacy-policy .c__logo,
        .page-template-page-privacy-policy header {
            z-index: 30;
        }

        .page-template-page-privacy-policy .l__generic--content h1 {
            margin-bottom: 36px;
        }

        .page-template-page-privacy-policy .l__generic--content .privacy-policy-intro {
            color: #000;
            display: block;
            font-size: 28px;
            margin: 25px 0 30px;
        }

        .page-template-page-privacy-policy .l__generic--content h2,
        .page-template-page-privacy-policy .l__generic--content h3,
        .page-template-page-privacy-policy .l__generic--content h4,
        .page-template-page-privacy-policy .l__generic--content h5,
        .page-template-page-privacy-policy .l__generic--content h6 {
            color: #000;
            display: block;
            font-size: 28px;
            margin: 25px 0 30px;
        }

        @media screen and (min-width: 800px) {
            .page-template-page-privacy-policy .l__generic--content .privacy-policy-intro {
                font-size: 32px;
            }

            .page-template-page-privacy-policy .l__generic--content h2,
            .page-template-page-privacy-policy .l__generic--content h3,
            .page-template-page-privacy-policy .l__generic--content h4,
            .page-template-page-privacy-policy .l__generic--content h5,
            .page-template-page-privacy-policy .l__generic--content h6 {
                font-size: 32px;
            }
        }
    </style>

    <div class="case-study-video-container"></div>
    <div class="working-with-us-scroll-image"></div>
    <div class="individual-service-scroll-image"></div>

    <div id="viewport">
        <div id="scroll-container" class="scroll-container">
            <div id="barba-wrapper">
                <div class="barba-container">
                    <section class="l__generic">
                        <div class="container">
                            <div class="l__generic--content">
                                <h1>{{ site_text('site.privacy_policy.title') }}</h1>
                                <h4 class="privacy-policy-intro">{{ site_text('site.privacy_policy.intro') }}</h4>
                                {!! site_text('site.privacy_policy.content') !!}
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="data_location" value="" />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.querySelector('header');
            const primaryButtons = document.querySelector('header .c__header-buttons');
            const compactButtons = document.querySelector('header .c__header-buttons--v2');
            const navigation = document.querySelector('.c__navigation');
            const menuToggles = document.querySelectorAll('header .c__menu-toggle');
            const contactSwitcher = document.querySelector('.c__navigation--contact-switcher');
            const locationSwitches = contactSwitcher ? contactSwitcher.querySelectorAll('.switch') : [];

            if (!primaryButtons || !compactButtons) {
                return;
            }

            function syncPrivacyHeader() {
                const isCompact = window.pageYOffset > 100;

                primaryButtons.classList.toggle('show', !isCompact);
                compactButtons.classList.toggle('show', isCompact);
            }

            syncPrivacyHeader();
            window.addEventListener('scroll', syncPrivacyHeader, { passive: true });

            if (navigation && menuToggles.length) {
                menuToggles.forEach(function(toggle) {
                    toggle.addEventListener('click', function() {
                        const shouldOpen = !navigation.classList.contains('active');

                        setTimeout(function() {
                            navigation.classList.toggle('active', shouldOpen);

                            menuToggles.forEach(function(item) {
                                item.classList.toggle('open', shouldOpen);
                            });

                            if (header) {
                                header.classList.toggle('color-difference', shouldOpen);
                            }
                        }, 0);
                    });
                });
            }

            if (contactSwitcher && locationSwitches.length) {
                locationSwitches.forEach(function(toggle) {
                    toggle.addEventListener('click', function() {
                        const targetId = toggle.id;
                        const panels = contactSwitcher.querySelectorAll('.switcher');

                        locationSwitches.forEach(function(item) {
                            item.classList.toggle('active', item === toggle);
                        });

                        panels.forEach(function(panel) {
                            panel.classList.toggle('active', panel.id === 'contact-' + targetId);
                        });
                    });
                });
            }
        });
    </script>
@endsection
