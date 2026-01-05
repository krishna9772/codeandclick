@extends('layouts.main')
@section('content')

<!-- Elements moved here for fixed positions, had to remove smooth scroll so was no longer working inside there containers -->
<div class="case-study-video-container"></div>
<div class="working-with-us-scroll-image"></div>
<div class="individual-service-scroll-image"></div>
<!-- End of fixed elements -->

<div id="viewport">
    <div id="scroll-container" class="scroll-container">
        <div id="barba-wrapper">
            <div class="barba-container">
                <div class="l__technology">
                    <div class="l__technology--titles">
                        <div class="medium-container">
                            <h1>Technology at CODE & CLICK</h1>
                            <div class="l__technology--titles--content">
                                <h4 class="medium">Technology should make work easier, not more complicated. At CODE & CLICK, we combine smart digital marketing, intuitive website design, robust website development, and data-driven SEO to help brands stand out online.</h4>
                                <a href="contact.html" class="c__button dark">Get in touch</a>
                            </div>
                        </div>
                    </div>
                    <section class="m__technology-intro">
                        <div class="img-holder">
                            <img class="img-object-fit" src="{{ asset('images/bangkok.jpg') }}" />
                        </div>
                        <div class="m__technology-intro--content">
                            <h4 class="medium">Why Our Technology Matters</h4>
                            <p class="small">At CODE & CLICK, technology isn’t just about tools — it’s about impact. We combine technology with creativity and strategic thinking so your brand is prepared for today’s challenges — and tomorrow’s opportunities.</p>
                        </div>
                    </section>
                    <section class="l__products">
                        <div class="l__products--intro">
                            <div class="container">
                                <h3>Our Technology Stack</h3>
                                <p class="large">Each service we provide is strategically tailored for real-world results.</p>
                            </div>
                        </div>
                        <div class="m__product">
                            <div class="container">
                                <div class="logo-container">
                                    <h3>Code & Click </h3>
                                </div>
                                <h3>All-In-One Digital Service Provider. </h3>
                            </div>
                            <div class="row">
                                <div class="m__product--content col-xs-12 col-md-6">
                                    <p>Whether you’re starting from zero or scaling your digital presence, our technology works behind the scenes — so you can focus on running your business. <br />
                                        <br />
                                    <ul style="color: white; font-size: x-large; list-style-type: disc; padding-left: 20px;">
                                        <li>Website Design & Development</li>
                                        <li>Digital Marketing, SEO & Analytics</li>
                                        <li>Social Media Marketing & Content Strategy</li>
                                        <li>Branding, Creative Design & Multimedia</li>
                                    </ul>
              
                                </div>
                                <div class="col-xs-12 col-md-6 image-holder">
                                    <img class="m__product--image" src="{{ asset('images/default.png') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="m__product--additional-info">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6 m__product--additional-info--content">
                                        <h4 class="medium">A dedicated website platform reskinned to match your brand. </h4>
                                        <p>You can choose from any of our E-Commerce modules as and when your business needs it.<br />
                                            <br />
                                            Control your brand experience, expand your product range and reach new customers with the power of Fuse.
                                        </p>
                                        <a href="contact.html" class="c__button dark">Contact us to learn more</a>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="m__product--additional-info--block">
                                            <ul>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Home delivery</p>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Click &amp; collect</p>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Meal kits</p>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>At table or room service orders</p>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Event tickets</p>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Gift vouchers</p>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Merchandise</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m__product">
                            <div class="container">
                                <div class="logo-container">

                                    <h3>Websites</h3>
                                </div>
                                <h3>A pre-built website platform for restaurants, pubs &amp; bars optimised for booking conversions.</h3>
                            </div>
                            <div class="row">
                                <div class="m__product--content col-xs-12 col-md-6">
                                    <p>Taking learnings from the 1000’s of hospitality websites that we’ve designed &amp; built the past 2 decades, we’ve developed the ultimate website framework with no upfront cost.</p>
                                </div>
                                <div class="col-xs-12 col-md-6 image-holder">
                                    <img class="m__product--image" src="{{ asset('images/default.png') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="m__product--additional-info">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6 m__product--additional-info--content">
                                        <h4 class="medium">Fully integrated and optimised</h4>
                                        <p>Combined with Fuse E-Commerce you have a fully integrated and optimised website to maximise your bookings and digital revenue.</p>
                                        <a href="contact.html" class="c__button dark">Contact us to learn more</a>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="m__product--additional-info--block">
                                            <ul>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Easy to use CMS with access levels</p>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Modulated home page for enhanced brand experience</p>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Menu system for allergy and diet filter</p>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Dynamic menu pricing</p>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Gallery</p>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Maps &amp; contact</p>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Integrated with all leading booking engines </p>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Optimised for SEO</p>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Google Analytics Tag Manager included</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m__product">
                            <div class="container">
                                <div class="logo-container">
                                    <h3>Lorem Ipsum</h3>
                                </div>
                                <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum culpa doloribus inventore saepe voluptates ipsum labore quam architecto dolorem. Totam, laudantium praesentium. Rerum quidem ab illum optio veritatis. Et, sit..</h3>
                            </div>
                            <div class="row">
                                <div class="m__product--content col-xs-12 col-md-6">
                                    <p>We have developed a selection of online games to help achieve marketing objectives. <br />
                                        <br />
                                        These plug-and-play games are perfect for distributing promotional content and to inject some fun into your digital campaigns.
                                    </p>
                                </div>
                                <div class="col-xs-12 col-md-6 image-holder">
                                    <img class="m__product--image" src="{{ asset('images/default.png') }}" />
                                </div>
                            </div>
                        </div>
                        <div class="m__product--additional-info">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6 m__product--additional-info--content">
                                        <h4 class="medium">Built for Scalability — Designed for Growth</h4>
                                        <p>We guarantee that every tool we choose supports your business mission with digital marketing.</p>
                                        <a href="contact.html" style="width: 350px;" class="c__button dark">Let’s build your digital future together</a>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="m__product--additional-info--block">
                                            <ul style="color:  white;">
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Helping businesses grow online</p>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Building websites that convert</p>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Delivering measurable digital marketing results</p>
                                                </li>
                                                <li>
                                                    <img src="{{ asset('images/icons/tick.svg') }}" />
                                                    <p>Enhancing branding with strong content</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<input type="hidden" id="data_location" value="" />
@endsection