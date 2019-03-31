@if(session()->has('email'))
@extends('needy.index')
@section('menu')
<div id="colorlib-main">
    <aside id="colorlib-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image: url(images/img_bg_1.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div
                                class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <h1>An Inspiring Built Space</h1>
                                        <h2>100% html5 bootstrap templates Made by <a href="https://colorlib.com/"
                                                target="_blank">colorlib.com</a></h2>
                                        <p><a class="btn btn-primary btn-learn">View Project <i
                                                    class="icon-arrow-right3"></i></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(images/img_bg_2.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div
                                class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <h1>Interior Design Studio</h1>
                                        <h2>100% html5 bootstrap templates Made by <a href="https://colorlib.com/"
                                                target="_blank">colorlib.com</a></h2>
                                        <p><a class="btn btn-primary btn-learn">View Project <i
                                                    class="icon-arrow-right3"></i></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li style="background-image: url(images/img_bg_3.jpg);">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div
                                class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 js-fullheight slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <h1>The National Gallery</h1>
                                        <h2>100% html5 bootstrap templates Made by <a href="https://colorlib.com/"
                                                target="_blank">colorlib.com</a></h2>
                                        <p><a class="btn btn-primary btn-learn">View Project <i
                                                    class="icon-arrow-right3"></i></a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>









    <div class="colorlib-blog">
        <div class="colorlib-narrow-content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
                    <span class="heading-meta">Read</span>
                    <h2 class="colorlib-heading">Recent Blog</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="blog-entry">
                        <a href="blog.html" class="blog-img"><img src="images/blog-1.jpg" class="img-responsive"
                                alt="HTML5 Bootstrap Template by colorlib.com"></a>
                        <div class="desc">
                            <span><small>April 14, 2018 </small> | <small> Web Design </small> | <small> <i
                                        class="icon-bubble3"></i> 4</small></span>
                            <h3><a href="blog.html">Renovating National Gallery</a></h3>
                            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                                language ocean.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="blog-entry">
                        <a href="blog.html" class="blog-img"><img src="images/blog-2.jpg" class="img-responsive"
                                alt="HTML5 Bootstrap Template by colorlib.com"></a>
                        <div class="desc">
                            <span><small>April 14, 2018 </small> | <small> Web Design </small> | <small> <i
                                        class="icon-bubble3"></i> 4</small></span>
                            <h3><a href="blog.html">Wordpress for a Beginner</a></h3>
                            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                                language ocean.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="blog-entry">
                        <a href="blog.html" class="blog-img"><img src="images/blog-3.jpg" class="img-responsive"
                                alt="HTML5 Bootstrap Template by colorlib.com"></a>
                        <div class="desc">
                            <span><small>April 14, 2018 </small> | <small> Inspiration </small> | <small> <i
                                        class="icon-bubble3"></i> 4</small></span>
                            <h3><a href="blog.html">Make website from scratch</a></h3>
                            <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                                language ocean.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection()

@else
<?php 
    return redirect('/loginn');

?>
@endif