@extends('layouts.menubar')
@section('cont')
<!-- Fly Slider -->
<div class="fly-slider invisible" data-rotation-interval="10000" data-rotation-duration="1000">
    <div class="cube">
        <section class="slide" style="background-image: url(needya/images/temp/slide-1.jpg);">
            <div class="slide-content">
                <h1 class="page-title">Helping Hands for Everyone</h1>

                <div class="page-subtitle">Choose the way to help people in need</div>
                <div class="right">
                    @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                    @endif
                </div>
                <div class="volunteer-cta">
                    <a href="#" class="btn btn-large btn-icon js-wave"><i
                            class="material-icons">arrow_downward</i>BECOME
                        A VOLUNTEER TODAY</a>
                    <div class="note">secure Doantions</div>
                </div>
            </div>
        </section>

        <section class="slide" style="background-image: url(needya/images/temp/slide-2.jpg);">
            <div class="slide-content">
                <h2 class="page-title">Helping Hands for Everyone</h2>

                <div class="page-subtitle">Choose the way to help people in need</div>

                <div class="volunteer-cta">
                    <a href="#" class="btn btn-large btn-icon js-wave"><i
                            class="material-icons">arrow_downward</i>BECOME
                        A VOLUNTEER TODAY</a>
                    <div class="note">no credit card needed / secure payments</div>
                </div>
            </div>
        </section>

        <section class="slide" style="background-image: url(needya/images/temp/slide-3.jpg);">
            <div class="slide-content">
                <h2 class="page-title">Helping Hands for Everyone</h2>

                <div class="page-subtitle">Choose the way to help people in need</div>

                <div class="volunteer-cta">
                    <a href="#" class="btn btn-large btn-icon js-wave"><i
                            class="material-icons">arrow_downward</i>BECOME
                        A VOLUNTEER TODAY</a>
                    <div class="note">secure Doantions</div>
                </div>
            </div>
        </section>

        <section class="slide" style="background-image: url(needya/images/temp/slide-4.jpg);">
            <div class="slide-content">
                <h2 class="page-title">Helping Hands for Everyone</h2>

                <div class="page-subtitle">Choose the way to help people in need</div>

                <div class="volunteer-cta">
                    <a href="#" class="btn btn-large btn-icon js-wave"><i
                            class="material-icons">arrow_downward</i>BECOME
                        A VOLUNTEER TODAY</a>
                    <div class="note">no credit card needed / secure payments</div>
                </div>
            </div>
        </section>
    </div>

    <a class="slider-control prev js-wave" href="#"><i class="material-icons">keyboard_arrow_left</i></a>
    <a class="slider-control next js-wave" href="#"><i class="material-icons">keyboard_arrow_right</i></a>
</div>
<!--/ Fly Slider -->
<!-- Services -->
<section class="flex-container fly-services">
    <div class="fly-service">
        <div class="service-content">
            <i class="material-icons">language</i>
            <h3 class="title">Request Help</h3>
            <div class="description">Always find helping hands here</div>
        </div>

        <div class="service-buttons">
            <a href="/loginn" class="btn btn-medium js-wave">Login</a>
        </div>
    </div>

    <div class="fly-service">
        <div class="service-content">
            <i class="material-icons">face</i>
            <h3 class="title">Donate Money</h3>
            <div class="description">Want to sevice society?Then go for it</div>
        </div>

        <div class="service-buttons">
            <a href="/loginn" class="btn btn-medium js-wave">Login</a>
        </div>
    </div>

    <div class="fly-service">
        <div class="service-content">
            <i class="material-icons">favorite_border</i>
            <h3 class="title">Donate Products/Equipments</h3>
            <div class="description">Help others by providing the fresh equipments or reusable equipments </div>
        </div>

        <div class="service-buttons">
            <a href="/loginn" class="btn btn-medium js-wave">Login</a>
        </div>
    </div>

    <div class="fly-service">
        <div class="service-content">
            <i class="material-icons">AboutUS</i>
            <h3 class="title">We do Better jobs for you</h3>
            <div class="description">Do all the things that make others happy</div>
        </div>

        <div class="service-buttons">
            <a href="/about" class="btn btn-medium js-wave">READ MORE</a>
        </div>
    </div>
</section>
<!--/ Services -->
<!-- Call To Action -->
<section class="section section-cta parallax" style="background-image: url(images/temp/slide-5.jpg);">
    <div class="container">
        <h2 class="section-title">We help people in need</h2>
        <div class="section-subtitle">Become a volunteer and help others</div>
        <a href="#" class="btn btn-medium btn-yellow js-wave">SIGN UP TODAY

        </a>
    </div>
</section>
<!--/ Call To Action -->
<!-- Testimonials -->
<section class="section gray section-testimonials" style="background-image: url(images/map.png);">
    <div class="section-heading">
        <div class="container">
            <div class="section-subtitle">CLIENT TESTIMONAILS</div>
            <h2 class="section-title">What do others say about Charity</h2>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="fly-card">
                    <div class="boxed">
                        <!-- Testimonials Slider -->
                        <div class="testimonials-slider">
                            <article class="testimonial">

                                “The life of a man consists not in seeing visions and in dreaming dreams, but in
                                active charity and in willing service”.


                                <div class="testimonial-author">
                                    <div class="avatar"><img src="images/temp/avatar-1.jpg" alt="" /></div>
                                    <div class="name">– Henry Wadsworth Longfellow</div>
                                    <div class="job">Charity Men</div>
                                </div>
                            </article>

                            <article class="testimonial">
                                <blockquote class="">
                                    “It’s not how much we give but how much love we put into giving.”
                                </blockquote>

                                <div class="testimonial-author">
                                    <div class="avatar"><img src="images/temp/avatar-2.jpg" alt="" /></div>
                                    <div class="name">– Mother Teresa</div>
                                    <!-- <div class="job">Manager</div> -->
                                </div>
                            </article>
                        </div>
                        <!--/ Testimonials Slider -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ Testimonials -->
<!-- Contact Us -->
<section class="section gray">
    <div class="section-heading">
        <div class="container">
            <div class="section-subtitle">CONTACT US</div>
            <h2 class="section-title">Get in touch with us</h2>
        </div>
    </div>

    <div class="container">
        <!-- Contact Form -->
        <form action="/feedback" method="post" class="wpcf7-form" novalidate="novalidate">
            @csrf
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group required">
                        <label for="your-name">NAME</label>
                        <br />
                        <span class="wpcf7-form-control-wrap your-name">
                            <input type="text" name="yourname" value=""
                                class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="your-name"
                                placeholder="Name" />
                        </span>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group required">
                        <label for="your-email">Email address</label>
                        <br />
                        <span class="wpcf7-form-control-wrap your-email">
                            <input type="email" name="youremail" value=""
                                class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                id="your-email" placeholder="Email Address" />
                        </span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group required">
                        <label for="your-phone">Mobile Number</label>
                        <br />
                        <span class="wpcf7-form-control-wrap your-email">
                            <input type="phone" name="yourphone" value=""
                                class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                id="your-phone" placeholder="phone number" />
                        </span>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group required">
                        <label for="your-subject">subject</label>
                        <br />
                        <span class="wpcf7-form-control-wrap your-subject">
                            <input type="text" name="yoursubject" value="" class="wpcf7-form-control wpcf7-text"
                                id="your-subject" placeholder="Subject" />
                        </span>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group required">
                        <label for="your-message">message</label>
                        <br />
                        <span class="wpcf7-form-control-wrap your-message">
                            <textarea name="yourmessage" class="wpcf7-form-control wpcf7-textarea" id="your-message"
                                placeholder="Type in your message"></textarea>
                        </span>
                    </div>

                    <div class="text-right">
                        <input type="submit" value="Send Message" class="wpcf7-form-control wpcf7-submit" />
                    </div>
                </div>

            </div>
        </form>
        <!--/ Contact Form -->
    </div>
</section>
<!--/ Contact Us -->
<script src="admin/js/jquery-3.3.1.js"> </script>
<script src="regvalidation/js/jquery.validate.js"> </script>
<script src="regvalidation/js/additional-methods.js"> </script>
<script src="regvalidation/js/contactvalid.js"> </script>
@endsection