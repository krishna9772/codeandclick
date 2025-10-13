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
                    <h1>Technology</h1>
                    <div class="l__technology--titles--content">
                        <h4 class="medium">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Expedita, harum tempore? Aliquam porro cupiditate, fugiat dolorum modi quas, debitis maxime reiciendis soluta sunt tempore, ducimus vero. Deserunt quos fuga sunt.</h4>
                        <a href="contact.html" class="c__button dark">Get in touch</a>
                    </div>
                    </div>
                </div>
                <section class="m__technology-intro">
                    <div class="img-holder">
                    <img class="img-object-fit" src="{{ asset('images/bangkok.jpg') }}" />
                    </div>
                    <div class="m__technology-intro--content">
                    <h4 class="medium">Lorem Ipsum</h4>
                    <p class="small">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nesciunt modi veritatis ipsam iure corporis quia facilis porro quo, autem, earum beatae est quos accusamus perspiciatis enim provident, facere ex! Est?</p>
                    </div>
                </section>
                <section class="l__products">
                    <div class="l__products--intro">
                    <div class="container">
                        <h3>Our Products</h3>
                        <p class="large">Each product is specifically tailored to achieve desired results with low investment requirements.</p>
                    </div>
                    </div>
                    <div class="m__product">
                        <div class="container">
                        <div class="logo-container">
                            <h3 >E-Commerce</h3>
                        </div>
                        <h3>The all-in-one e-commerce solution for hospitality. </h3>
                        </div>
                        <div class="row">
                        <div class="m__product--content col-xs-12 col-md-6">
                            <p>Fuse enables you to easily sell everything for your restaurant, bar or pub through a single platform on your own website. <br />
                            <br />
                            Seamlessly integrate all e-commerce requirements into a single guest experience. <br />
                            <br />
                            Plugs into your existing website and your EPOS system seamlessly with no upfront cost.</p>
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
                            Control your brand experience, expand your product range and reach new customers with the power of Fuse.</p>
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
                            These plug-and-play games are perfect for distributing promotional content and to inject some fun into your digital campaigns.</p>
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
                            <h4 class="medium">Powerful technology, proven results.</h4>
                            <p>Each game has data collection at its heart to provide powerful ongoing marketing potential.</p>
                            <a href="contact.html" class="c__button dark">Contact us to learn more</a>
                            </div>
                            <div class="col-xs-12 col-md-6">
                            <div class="m__product--additional-info--block">
                                <ul>
                                    <li>
                                        <img src="{{ asset('images/icons/tick.svg') }}" />
                                        <p>Tactical games to recruit new customers</p>
                                    </li>
                                    <li>
                                        <img src="{{ asset('images/icons/tick.svg') }}" />
                                        <p>Mass giveaway games to drive footfall</p>
                                    </li>
                                    <li>
                                        <img src="{{ asset('images/icons/tick.svg') }}" />
                                        <p>Skill-based based games for experiential brand engagement</p>
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
