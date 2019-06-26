@if(session()->has('email'))
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>ShadowShare</title>
    <!-- Bootstrap CSS -->

    <script src="js/state.js"> </script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="profile/effect.css">
    <style>
    #mybutton {
        position: fixed;
        top: 100px;
        right: 10px;
    }

    #mybutton2 {
        position: fixed;
        top: 150px;
        right: 10px;
    }

    #welcomename {
        position: fixed;
        top: 60px;
        right: 10px;
    }

    .custom_nav .navbar {
        background: rgba(0, 0, 0, 0.6);
        opacity: ;
    }

    .logo {
        font-family: 'Raleway', sans-serif;
        font-size: 28px;
        text-align: center;
    }

    .logo img {
        max-width: 97px;
    }

    .logo a {
        color: #fff;
        display: inline-block;
    }

    .sticky .logo a {
        color: #efc427;
    }

    .logo a span {
        font-weight: 600;
    }
    </style>
</head>

<header class="header_area  bk custom_nav">



    <div class="">

        @if (Session::has('appovedfund'))
        <a class="btn btn-outline-success" href="/needyapprovedfund" id="mybutton">Approvedfund
            <span class="badge badge-success">{{Session::get('appovedfund')}}</span>
        </a>
        @endif
        @if (Session::has('appovedequip'))
        <a class="btn btn-outline-success" href="/equipmentapproved" id="mybutton2">ApproveItem
            <span class="badfage badge-success">{{Session::get('appovedequip')}}</span>
        </a>
        @endif
    </div>





    <nav class="navbar navbar-expand-lg navbar-light fixed-top ">




        <div class="container-fluid" id="myDIV">
            <!-- Brand and toggle get grouped for better mobile display -->
            <!-- <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a> -->

            <a class="logo " href="#">
                Shadow<span>share</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">

                    <li class="nav-item active"><a class="nav-link" href="/needyindex">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/needyprofile">
                            Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="/fundraiselist">My Fundraise Events</a>


                    <li class="nav-item submenu dropdown active">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">Add New
                            Case Story</a>
                        <ul class="dropdown-menu fade-effect" style="border-radius:5px;">
                            <li class="nav-item"><a class="nav-link" href="/fstory">Request Fund</a>
                            <li class="nav-item"><a class="nav-link" href="/needyequipment">Request
                                    Item</a>

                        </ul>
                    </li>
                    <li class="nav-item submenu dropdown active">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="false">Approvals</a>
                        <ul class="dropdown-menu fade-effect" style="border-radius:5px;">
                            <li class="nav-item"><a class="nav-link" href="/needyapprovedfund">Fund Approved</a>
                            <li class="nav-item"><a class="nav-link" href="/equipmentapproved">Item
                                    Approved</a>

                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/historytable">History</a>
                    <li class="nav-item"><a class="nav-link" href="/logoutt">Logout</a>
                    <li class="nav-item">
                        @if (Session::has('name'))
                        <span class="fa fa-user" id="welcomename"
                            style="color:yellow;">&nbsp;&nbsp;{{(Session::get('name'))}}</span>
                        @endif
                        <!-- @if (Session::has('appovedequip'))
                                <a class="nav-link dropdown-toggle" href="/equipmentapproved" role="button"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <span class="badge badge-danger"> {{Session::get('appovedequip')}}</span>
                                </a>

                                @endif -->

                    </li>

                </ul>
            </div>
        </div>
    </nav>


</header>
<div class="container-flex">
    @yield('menu')
    @yield('about')
</div> {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script> --}}
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
    integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
</script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
    integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
</script>
<!-- jQuery Custom Scroller CDN -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js">
</script>

{{-- <script type="text/javascript">
    $(document).ready(function() {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
    </script> --}}





@endif
{{--  --}}