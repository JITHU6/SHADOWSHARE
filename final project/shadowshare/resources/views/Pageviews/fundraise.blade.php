@extends('layouts.menubar')
@section('title', '| mystorylist')

<head>
    <meta name="csrf-token" content="{{csrf_token()}}">

    <script src="admin/js/jquery-3.3.1.js"></script>
</head>
@section('cont')
<!------ Include the above in your HEAD tag ---------->


<!------ Include the above in your HEAD tag ---------->

<div class=" col-md-12 card" style="margin-top:10%;margin-left:10%;">
    <h5 class=" project-title" itemprop="name">
        Urgent Fundraise Events</h5>
</div>
<div class="left">
    @if (Session::has('message'))
    <script>
    alert("{{Session::get('message')}}");
    </script>
    @endif
</div>

<!--/ Header -->

<!-- Header Image or Video -->

<!--/ Header Image or Video -->

<!-- Projects Grid Style -->
<section class="section">
    <div class="container">
        <div class="fly-projects" style="margin-top:15%;">
            <!-- Project -->
            @isset($data)
            @foreach($data as $data)
            <article class="fly-card fly-project fly-flip-effect vertical" style="margin-top:1%;">
                <div class="boxed flip-front">
                    <a class="project-media " href="#" itemprop="url">
                        <img src="uploads/urgentcase/{{$data->image}}" alt="" itemprop="image" />
                        <span class="progress">
                            <span class="progress-label">0%</span>
                            <span class="progress-bar"></span>
                        </span>
                    </a>

                    <div class="project-content">
                        <h3 class="project-title" itemprop="name">
                            <a href="#">{{$data->casetitle}}</a>
                        </h3>

                        <div class="project-location">
                            <a href="#" class="flip-button" itemprop="location"><i
                                    class="material-icons">location_on</i>{{$data->city}}</a>
                        </div>

                        <div class="project-description" itemprop="description">
                            <p>
                                {{$data->discription}}
                            </p>
                        </div>

                        <div class="project-footer">
                            <ul class="project-stats">
                                <li>
                                    <div class="label">raised</div>

                                    <div class="value" data-raised="12731"><sup>Rs</sup>{{$data->amt}}</div>

                                </li>
                                <li>
                                    <div class="label">goal</div>
                                    <div class="value" data-goal="22500" itemprop="target">
                                        <sup>Rs</sup>{{$data->amount}}
                                    </div>
                                </li>
                            </ul>

                            <div class="project-buttons">
                                <a href="{{ url('donationform/'.$data->fid)}}" class="btn btn-yellow js-wave"
                                    itemprop="potentialAction">Donate
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="boxed flip-back">
                    <div class="card-map" data-placeholder="waiting for map">
                        <div class="google-map" data-map-zoom="14" data-map-type="roadmap" data-map-style="onehope"
                            data-map-address="1998 Hulman Blvd, Speedway, IN, 46222" data-map-marker="images/marker.png"
                            data-map-marker-size="[31,46]" data-map-marker-anchor="[16,46]">
                            <!-- May use data-map-coords="39.795180;-86.234819" instead of data-map-address -->
                        </div>
                    </div>

                    <ul class="card-social">
                        <li><a href="#" class="fa fa-facebook js-wave"></a></li>
                        <li><a href="#" class="fa fa-twitter js-wave"></a></li>
                        <li><a href="#" class="fa fa-instagram js-wave"></a></li>
                        <li><a href="#" class="fa fa-google js-wave"></a></li>
                    </ul>
                </div>
            </article>
            <!--/ Project -->
            @endforeach
            @endisset
        </div>
    </div>
</section>










<script src="admin/js/jquery-3.3.1.min.js">
</script>



@endsection