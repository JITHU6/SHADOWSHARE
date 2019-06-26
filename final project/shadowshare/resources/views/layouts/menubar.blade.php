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
    <link href="{{asset('needya/css/font-awesome.css')}}" media="screen" rel="stylesheet" type="text/css" />

    <!-- Select 2 -->
    <link href="{{asset('needya/css/select2.css')}}" media="screen" rel="stylesheet" type="text/css" />

    <!-- Core CSS -->

    <link href="{{asset('needya/css/bootstrap.css')}}" media="screen" rel="stylesheet" type="text/css" />
    <link href="{{asset('needya/css/style.css')}}" media="screen" rel="stylesheet" type="text/css" />

    <!-- Animate.css -->
    <link href="{{asset('needya/css/animate.css')}}" media="screen" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('profile/effect.css')}}">
    <!-- Modernizr Library -->
    <script src="{{asset('needya/js/libs/modernizr-3.6.0.min.js')}}"></script>
    <!-- page error-->


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
    <div class="page-loader">
        <div class="preloader-wheel active">
            <div class="spinner-layer">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>

                <div class="gap-patch">
                    <div class="circle"></div>
                </div>


            </div>
        </div>
    </div>
    <!--/ Page Loader -->

    <!-- Header -->
    <header id="header" class="header" itemscope itemtype=" http://schema.org/WPHeader">
        <!-- Navigation Bar -->
        <nav class="navigation-bar" data-become-sticky="600" data-no-placeholder>
            <div class="container" id="myDIV">
                <div class="hamburger"><a href="#"></a></div>

                <div class="navigation-bar-flex">
                    <!-- Logo TODO: Use 2 images for normal and sticky navigation, or just text -->
                    <div class="logo">
                        <a href="#">
                            <!--<img class="logo-normal" src="images/logo-x2.png" alt=""/>
						<img class="logo-sticky" src="images/logo-sticky-x2.png" alt=""/>-->
                            Shadow<span>share</span>
                        </a>
                    </div>
                    <!--/ Logo -->

                    <!-- Dropdown Menu -->
                    <ul class="nav-menu clearfix" itemscope itemtype="http://schema.org/SiteNavigationElement">
                        <li>
                            <a href="/">Home</a>

                        </li>
                        <li>
                            <a href="#">Donate Now</a>

                            <ul>
                                <li><a href="/fundraiseevent"> Donate to a fundraise Event </a></li>
                                <li><a href="/Donateindividual">Donate fund to individual</a></li>
                                <li><a href="/sellerregister">Donate Materials</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="/about">About Us</a>

                        </li>
                        <li>
                            <!-- <a href="/contactus">Contact Us</a> -->
                            <a href="/viewequipments">Items to Donate</a>
                        </li>

                        <li>
                            <a href="#">Sign Up</a>
                            <ul>
                                <li><a href="/needyregister">Needy</a></li>
                                <li><a href="/sponsorregister">Fund Donor</a></li>
                                <li><a href="/sellerregister">Equipment Donor</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="/loginn">Sign In</a>

                        </li>

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

    <!--/ Header -->
    <!-- Header Image or Video -->

    @yield('cont')

    <!-- Footer -->
    <footer class="footer" itemscope itemtype="http://schema.org/WPFooter">
        <div class="container">


            <div class="footer-bottom flex-container">
                <!-- Social Links -->
                <ul class="footer-social clearfix">
                    <li><a href="#" class="fa fa-facebook js-wave"></a></li>
                    <li><a href="#" class="fa fa-twitter js-wave"></a></li>
                    <li><a href="#" class="fa fa-instagram js-wave"></a></li>
                    <li><a href="#" class="fa fa-google js-wave"></a></li>
                    <li><a href="#" class="fa fa-dribbble js-wave"></a></li>
                    <li><a href="#" class="fa fa-vimeo js-wave"></a></li>
                    <li><a href="#" class="fa fa-pinterest-p js-wave"></a></li>
                    <li><a href="#" class="fa fa-linkedin js-wave"></a></li>
                </ul>
                <!--/ Social Links -->

                <!-- Copyright -->
                <div class="footer-copyright">
                    &copy; <span itemprop="copyrightYear">2019</span> by <a rel="nofollow"
                        href="http://flytemplates.com/" target="_blank" itemprop="copyrightHolder">Shadowshare</a> |
                    Shadowshare Donations
                </div>
                <!--/ Copyright -->
            </div>
        </div>
    </footer>
    <!--/ Footer -->

    <!-- JS Section -->

    <!-- Libs -->
    <script src="{{asset('needya/js/libs/jquery-1.12.2.min.js')}}">
    </script>
    <script src="{{asset('needya/js/libs/jquery-ui-1.11.4.min.js')}}"></script>
    <script src="{{asset('needya/js/libs/bootstrap-3.3.6.min.js')}}"></script>

    <!-- Placeholders -->
    <script src=" {{asset('needya/js/jquery.powerful-placeholder.min.js')}}"> </script> <!-- Select2 -->
    <script src="{{asset('needya/js/select2.full.min.js')}}">
    </script>

    <!-- InputMask -->
    <script src="{{asset('needya/js/inputmask.min.js')}}"></script>
    <script src="{{asset('needya/js/jquery.inputmask.min.js')}}"></script>

    <!-- LightBox -->
    <script src="{{asset('needya/js/jquery.swipebox.min.js')}}"></script>

    <!-- Owl Slider -->
    <script src="{{asset('needya/js/owl.carousel.js')}}"></script>

    <!-- CarouFredSel -->
    <script src="{{asset('needya/js/jquery.carouFredSel-6.2.1-packed.js')}}"></script>

    <!-- MouseWheel -->
    <script src="{{asset('needya/js/jquery.mousewheel.min.js')}}"></script>

    <!-- TouchSwipe -->
    <script src="{{asset('needya/js/jquery.touchSwipe.min.js')}}"></script>

    <!-- ScrollBar -->
    <script src="{{asset('needya/js/jquery.nicescroll.min.js')}}"></script>

    <!-- StickyKit -->
    <script src="{{asset('needya/js/jquery.sticky-kit.min.js')}}"></script>

    <!-- TweenLite, used for smooth scrolling -->
    <script src="{{asset('needya/js/TweenLite.min.js')}}"></script>
    <script src="{{asset('needya/js/ScrollToPlugin.min.js')}}"></script>

    <!-- Google Map -->
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyDw2p1HpU_Ng_yCbqGBnstSPwKWfQtKwak"></script>
    <script src="{{asset('needya/js/jquery.gmap.min.js')}}"></script>
    <script src="{{asset('needya/js/gmap-style.js')}}"></script>
    <script src="{{asset('needya/js/gmap-init.js')}}"></script>

    <!-- Youtube Api -->
    <script src="https://www.youtube.com/iframe_api"></script>

    <!-- FroogaLoop for Vimeo  -->
    <script src="{{asset('../../f.vimeocdn.com/js/froogaloop2.min.js')}}"></script>

    <!-- Waves -->
    <script src="{{asset('needya/js/waves.min.js')}}"></script>

    <!-- Object Fit PolyFill -->
    <script src="{{asset('needya/js/ofi.browser.js')}}"></script>

    <!-- General Scripts -->
    <script src="{{asset('needya/js/general.js')}}"></script>

</body>

<!-- Mirrored from html.flytemplates.com/onehope/projects-4cols.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 11 Apr 2019 13:45:48 GMT -->

</html>