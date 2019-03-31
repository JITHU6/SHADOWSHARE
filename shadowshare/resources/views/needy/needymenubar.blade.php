@if(session()->has('email'))
<!doctype html>
<html lang="en">


<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/favicon.png" type="image/png">
<title>ShadowShare</title>
<!-- Bootstrap CSS -->
<script src="js/state.js"> </script>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="vendors/linericon/style.css">
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
<link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
<!-- main css -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="needy/css/sidetoggle.css">

<style>
.bk {
    background: black;
}

</style>
<script>
    function openNav(){
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}
    </Script>
</head>

<header class="header_area bk">
        
    <div class="main_menu fixed-top" style="background:black;" >
        <div class="container ">


               
            <nav class="navbar navbar-expand-lg navbar-light">
                    
                <div class="container ">
                        <div id="main" >
                                <button class="openbtn"  onclick="openNav()">&#9776; </button> 
                                
                         </div>
                         <div id="mySidebar" class="sidebar">
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                <nav id="sidebar">
                    
        
                                        <ul class="list-unstyled components">
                                            <p></p>
                                            <li>
                                                <a href="/needyindex">Home</a>
                                            </li>
                                            <li>
                                                <a href="/needyprofile">Profile</a>
                                            </li>
                                            <li>
                                                <a href="/fundraiselist">My Fundraise Events</a>
                            
                                            <li>
                            
                                                <a href="/fundhistory">Donations Recieved</a>
                                            </li>
                            
                                            <li>
                                                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Add New
                                                    Case Story</a>
                                                <ul class="collapse list-unstyled" id="pageSubmenu">
                                                    <li>
                                                        <a href="/fstory">Request Fund</a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Request Equipment</a>
                                                    </li>
                            
                                                </ul>
                                            </li>
                                            </li>
                            
                                        </ul>
                            
                            
                                    </nav>
                                
                        </div>
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <!-- <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a> -->
                    
                    <a class="navbar-brand logo_h" href="">
                        <h1 class="" style="color:white;left-margin:10%;">SHADOWSHARE</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                                
                            <li class="nav-item active"><a class="nav-link" href="/Index">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="">Stories</a>


                            <li class="nav-item"><a class="nav-link" href="">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="/logoutt">Logout</a>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
@yield('menu')
@yield('about')
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
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
