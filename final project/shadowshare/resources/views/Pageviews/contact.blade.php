@extends('layouts.menubar')
@section('cont')
<!-- Header Image or Video -->
<section class="fly-header parallax overlay" style="background-image: url(needya/images/temp/slide-26.jpg);">
    <div class="fly-header-content">
        <div class="page-subtitle">contact page</div>
        <h1 class="page-title">Contact us</h1>
        <div class="right">
            @if (Session::has('message'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('message')}}
            </div>
            @endif
        </div>
    </div>
</section>
<!--/ Header Image or Video -->

<!-- Page -->
<div class="page-wrapper padding-top-120">
    <!-- TODO: additional classes are: .page-sidebar, .page-sidebar-left, .page-narrow -->
    <div class="container">
        <div class="row">
            <!-- Content -->
            <main itemprop="mainContentOfPage" itemscope itemtype="http://schema.org/WebPageElement" class="content">
                <!-- Map -->
                <div class="google-map" data-map-zoom="15"
                    data-map-address="https://www.google.com/maps/place/Amal+Jyothi+College+of+Engineering/@9.5284053,76.8203191,16.73z/data=!4m5!3m4!1s0x3b063626ed32c771:0xff305e1affdbb4b4!8m2!3d9.5283703!4d76.8222729"
                    data-map-type="roadmap" data-map-style="hency" data-map-marker="images/marker.png"
                    data-map-marker-size="[50,64]" data-map-marker-anchor="[26,64]">
                    <!-- May use data-map-coords="39.795180;-86.234819" instead of data-map-address -->
                </div>
                <!--/ Map -->

                <!-- Contact Form -->
                <form action="/contact" method="post" class="wpcf7-form" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group required">
                                <label for="your-name">NAME</label>
                                <br />
                                <span class="wpcf7-form-control-wrap your-name">
                                    <input type="text" name="yourname" value=""
                                        class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" id="your-name"
                                        placeholder="enter your name" />
                                </span>
                            </div>

                            <div class="form-group required">
                                <label for="your-email">Email address</label>
                                <br />
                                <span class="wpcf7-form-control-wrap your-email">
                                    <input type="email" name="youremail" value=""
                                        class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                                        id="your-email" placeholder="enter your email" />
                                </span>
                            </div>

                            <div class="form-group">
                                <label for="your-phone">PHONE</label>
                                <br />
                                <span class="wpcf7-form-control-wrap your-phone">
                                    <input type="text" name="yourphone" value="" class="wpcf7-form-control wpcf7-text"
                                        id="your-phone" placeholder="enter your phone number" />
                                </span>
                            </div>

                            <div class="form-group required">
                                <label for="your-subject">subject</label>
                                <br />
                                <span class="wpcf7-form-control-wrap your-subject">
                                    <input type="text" name="yoursubject" value="" class="wpcf7-form-control wpcf7-text"
                                        id="your-subject" placeholder="subject" />
                                </span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group required">
                                <label for="your-message">message</label>
                                <br />
                                <span class="wpcf7-form-control-wrap your-message">
                                    <textarea name="yourmessage" class="wpcf7-form-control wpcf7-textarea"
                                        id="your-message" placeholder="type in your message"></textarea>
                                </span>
                            </div>

                            <div class="text-right">
                                <input type="submit" value="Send Message" class="wpcf7-form-control wpcf7-submit btn" />
                            </div>
                        </div>
                    </div>
                </form>
                <!--/ Contact Form -->
            </main>
            <!--/ Content -->
        </div>
    </div>
</div>
<!--/ Page -->
<script src="admin/js/jquery-3.3.1.js"> </script>
<script src="regvalidation/js/jquery.validate.js"> </script>
<script src="regvalidation/js/additional-methods.js"> </script>
<script src="regvalidation/js/contactvalid.js"> </script>
@endsection