@if(session()->has('email'))
@extends('needy.fstory')
@section('head')
<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from html.flytemplates.com/onehope/projects-4cols.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Apr 2019 13:45:47 GMT -->


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shadowshare</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- FontAwesome -->
    <link href="needya/css/font-awesome.css" media="screen" rel="stylesheet" type="text/css" />

    <!-- Select 2 -->
    <link href="needya/css/select2.css" media="screen" rel="stylesheet" type="text/css" />

    <!-- Core CSS -->

    <link href="needya/css/bootstrap.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="needya/css/style.css" media="screen" rel="stylesheet" type="text/css" />

    <!-- Animate.css -->
    <link href="needya/css/animate.css" media="screen" rel="stylesheet" type="text/css" />

    <!-- Modernizr Library -->
    <script src="needya/js/libs/modernizr-3.6.0.min.js"></script>
</head>

<body itemscope itemtype="http://schema.org/WebPage">
    <!-- Google Tag Manager (noscript) -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src = '../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-WPWGNL');
    </script><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WPWGNL" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript><!-- End Google Tag Manager -->

    <!-- Page Loader -->
    <!-- <div class="page-loader">
        <div class="preloader-wheel active">
            <div class="spinner-layer">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>

                <div class="gap-patch">
                    <div class="circle"></div>
                </div>

                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div> -->
    <!--/ Page Loader -->

    <!-- Header -->
    <header id="header" class="header" itemscope itemtype="http://schema.org/WPHeader">
        <!-- Navigation Bar -->
        <nav class="navigation-bar" data-become-sticky="600" data-no-placeholder>
            <div class="container">
                <div class="hamburger"><a href="#"></a></div>

                <div class="navigation-bar-flex">
                    <!-- Logo TODO: Use 2 images for normal and sticky navigation, or just text -->
                    <div class="logo">
                        <a href="index-2.html">
                            <!--<img class="logo-normal" src="images/logo-x2.png" alt=""/>
						<img class="logo-sticky" src="images/logo-sticky-x2.png" alt=""/>-->
                            Shadow<span>share</span>
                        </a>
                    </div>
                    <!--/ Logo -->

                    <!-- Dropdown Menu -->
                    <ul class="nav-menu clearfix" itemscope itemtype="http://schema.org/SiteNavigationElement">
                        <li>
                            <a href="/needyindex">Home</a>
                            <!-- <ul>
                                <li><a href="/needyindex">Home</a></li>
                                <li><a href="index-slider2.html">Home Classic Slider</a></li>
                                <li><a href="index-image.html">Home Single Image</a></li>
                                <li><a href="video-slider.html">Home Video Slider</a></li>
                                <li><a href="video-local.html">Home Self Hosted Video</a></li>
                                <li><a href="video-youtube.html">Home Youtube Video</a></li>
                                <li><a href="video-vimeo.html">Home Vimeo Video</a></li>
                                <li><a href="404.html">404 Page</a></li>
                            </ul> -->
                        </li>
                        <li>
                            <a href="/needyprofile">Profile</a>
                            <!-- <ul>
                                <li><a href="projects.html">Projects Listed Style</a></li>
                                <li><a href="projects-2cols.html">Projects 2 Columns</a></li>
                                <li><a href="projects-3cols.html">Projects 3 Columns</a></li>
                                <li class="current-menu-item"><a href="projects-4cols.html">Projects 4
                                        Columns</a></li>
                                <li><a href="project-details.html">Project Details</a></li>
                            </ul> -->
                        </li>
                        <li>
                            <a href="/fundraiselist">My Fundraise Events</a>
                            <!-- <ul>
                                <li><a href="events-2cols.html">Events 2 Columns</a></li>
                                <li><a href="events-3cols.html">Events 3 Columns</a></li>
                                <li><a href="events-4cols.html">Events 4 Columns</a></li>
                                <li><a href="event-details.html">Event Details</a></li>
                            </ul> -->
                        </li>
                        <li>
                            <a href="#">Add New
                                Case Story</a>
                            <ul>
                                <li><a href="/fstory">Request Fund</a></li>
                                <li><a href="/needyequipment">Request Equipment</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="#">Approvals</a>
                            <ul>
                                <li><a href="/needyapprovedfund">Fund Approved</a></li>
                                <li><a href="/equipmentapproved">Equipment Approved</a></li>

                            </ul>
                        </li>
                        <li><a href="/historytable">History</a></li>


                    </ul>

                    <!--/ Dropdown Menu -->

                    <!-- Search Form -->
                    <!-- <form action="#" class="form-search-header">
                        <input type="search" name="site-search" class="form-control" placeholder="search for something"
                            required />
                        <button type="submit" name="site-search-submit"
                            class="form-submit material-icons">search</button>
                    </form> -->
                    <!--/ Search Form -->

                    <!--<a href="#" class="btn btn-yellow btn-donate js-wave">DONATE</a>-->
                </div>
            </div>
        </nav>

        <!--/ Navigation Bar -->
    </header>

    <script src="needy/js/libs/jquery-1.12.2.min.js">
    </script>
    <script src="needy/js/libs/jquery-ui-1.11.4.min.js"></script>
    <script src="needy/js/libs/bootstrap-3.3.6.min.js"></script>

    <!-- Placeholders -->
    <script src="needy/js/jquery.powerful-placeholder.min.js"></script>

    <!-- Select2  -->
    <script src="needy/js/select2.full.min.js"></script>

    <!-- InputMask -->
    <script src="needy/js/inputmask.min.js"></script>
    <script src="needy/js/jquery.inputmask.min.js"></script>

    <!-- LightBox -->
    <script src="needy/js/jquery.swipebox.min.js"></script>

    <!-- Owl Slider -->
    <script src="needy/js/owl.carousel.js"></script>

    <!-- CarouFredSel -->
    <script src="needy/js/jquery.carouFredSel-6.2.1-packed.js"></script>

    <!-- MouseWheel -->
    <script src="needy/js/jquery.mousewheel.min.js"></script>

    <!-- TouchSwipe -->
    <script src="needy/js/jquery.touchSwipe.min.js"></script>

    <!-- ScrollBar -->
    <script src="needy/js/jquery.nicescroll.min.js"></script>

    <!-- StickyKit -->
    <script src="needy/js/jquery.sticky-kit.min.js"></script>

    <!-- TweenLite, used for smooth scrolling -->
    <script src="needy/js/TweenLite.min.js"></script>
    <script src="needy/js/ScrollToPlugin.min.js"></script>

    <!-- Google Map -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDw2p1HpU_Ng_yCbqGBnstSPwKWfQtKwak"></script>
    <script src="needy/js/jquery.gmap.min.js"></script>
    <script src="needy/js/gmap-style.js"></script>
    <script src="needy/js/gmap-init.js"></script>

    <!-- Youtube Api -->
    <script src="https://www.youtube.com/iframe_api"></script>

    <!-- FroogaLoop for Vimeo  -->
    <script src="../../f.vimeocdn.com/js/froogaloop2.min.js"></script>

    <!-- Waves -->
    <script src="needy/js/waves.min.js"></script>

    <!-- Object Fit PolyFill -->
    <script src="needy/js/ofi.browser.js"></script>

    <!-- General Scripts -->
    <script src="needy/js/general.js"></script>

    @endsection
    @else <?php 
    return redirect('/loginn');

?> @endif