@if(session()->has('email'))
@extends('layouts.needymenubar')
@section('title', '| fundhistory')

<!-- <link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="js/bootstrap.min.js">
<link rel="stylesheet" href="needy/css/equipments.css"> -->
<meta name="csrf-token" content="{{csrf_token()}}">
<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> -->
<!-- <link rel="stylesheet" href="needy/css/fundlist.css"> -->
<!-- <script src="admin/js/jquery-3.3.1.min.js"></script> -->

<link rel="stylesheet" href="profile/effect.css">

@section('content')
<div class=" col-md-12 card" style="margin-top:-7%;">
    <h5 class="project-title" itemprop="name">
        Approved Fund Requests</h5>
</div>
<div class="left">
    @if (Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{Session::get('message')}}
    </div>
    @endif
</div>

<!-- Events -->
<section class="section">
    <div class="container">
        <div class="fly-events columns4 flex-container">
            @isset($a)

            @foreach($a as $data)
            <div class="column" style="height:90%;">
                <!-- Event -->

                <article class="fly-card fly-event fly-flip-effect" id="myDIV" itemscope
                    itemtype="http://schema.org/Event">
                    <div class="boxed flip-front">
                        <a class="event-media js-wave" href="#" itemprop="url">
                            <img src="/uploads/caseimage/{{$data->caseimage}}" style="height:200px;width:100%;" alt=""
                                itemprop="image" />
                        </a>

                        <div class="event-content">
                            <h6 class="event-title" itemprop="name">
                                <a href="#">{{$data->casetitle}}</a>
                            </h6>

                            <!-- <div class="event-location">
                                <a href="#" class="flip-button" itemprop="location"><i
                                        class="material-icons">location_on</i>Mombasa, Kenya</a>
                                <time class="event-date" datetime="2016-12-12T20:11:00" itemprop="startDate">
                                    <i class="material-icons">query_builder</i>12 Dec 2016, 11:00 AM
                                </time>
                            </div> -->

                            <div class="event-description" itemprop="description">
                                <p>
                                    <h6 class="card-text">
                                        Name:<span>
                                            <p style="display: inline-block;margin-left:.03 %;" class=" card-text">
                                                {{$data->name}}
                                            </p>

                                        </span></h6>
                                    <h6 class=" card-text">
                                        Category:<span>
                                            <p style="display: inline-block;margin-left:.03 %;" class=" card-text">
                                                {{$data->categoryname}}
                                            </p>

                                        </span></h6>
                                    <h6 class="card-text">
                                        Fund Required:<span>
                                            <p style="display: inline-block;margin-left:.03 %;" class=" card-text">
                                                RS.{{$data->amount}}
                                            </p>

                                        </span></h6>
                                </p>
                            </div>

                            <div class="event-footer">
                                <div class="project-buttons">
                                    @if($data->cstatus==4)
                                    <a href="#" class="btn btn-yellow js-wave" itemprop="potentialAction"
                                        data-toggle="modal" data-target="#myModal" id="equip###"
                                        onclick="needycasedetails('{{$data->case_id}}')">
                                        View & Confirm</a>
                                    @else
                                    <a href="#" class="btn btn-yellow js-wave">
                                        waiting for payment</a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="boxed flip-back">
                        <div class="card-map" data-placeholder="waiting for map">
                            <div class="google-map" data-map-zoom="14" data-map-type="roadmap" data-map-style="onehope"
                                data-map-address="1998 Hulman Blvd, Speedway, IN, 46222"
                                data-map-marker="images/marker.png" data-map-marker-size="[31,46]"
                                data-map-marker-anchor="[16,46]">
                                <!-- May use data-map-coords="39.795180;-86.234819" instead of data-map-address -->
                    <!-- </div>
        </div> -->

                    <!-- <ul class="card-social">
            <li><a href="#" class="fa fa-facebook js-wave"></a></li>
            <li><a href="#" class="fa fa-twitter js-wave"></a></li>
            <li><a href="#" class="fa fa-instagram js-wave"></a></li>
            <li><a href="#" class="fa fa-google js-wave"></a></li>
        </ul> -->
                    <!-- </div> -->
                </article>

                <!--/ Event -->
            </div>
            @endforeach
            @endisset
        </div>
    </div>
</section>






<script src="admin/js/jquery-3.3.1.min.js"> </script>
<script src="sponsor/casedetails.js"></script>
@endsection()
<div class="modal fade " id="myModal" style="margin-top:5%;margin-left:20%;width:60%;">
    <div class="modal-dialog" style="width:80%;">

        <form action="/confirmpay" method="post" enctype="multipart/data">
            @csrf
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Needy Case Profile </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class=" modal-body">
                    <div class="col-md-12">
                        <div class="card mb-4 ml-12">
                            <div class="card-body " style="margin-left:35%;">
                                <h5 class="card-title">
                                </h5>
                                <h5 class="card-title" id="cctitle">
                                </h5>

                            </div>


                        </div>
                        <div class=" card-body " style="margin-left:15%;" id="ccimage">

                            <!-- <input type="file" name="file" id="file"
                                class="text-center file-upload form-control"
                                accept=".png, .jpg, .jpeg,.JPG" style="width:70%;"
                                onchange=""> -->
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-5 pt-2"> <label for="">
                                <h6>Needy Name :
                            </label>
                        </div>
                        <div class="col-7">
                            <span id="uuname">
                            </span></h6>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-5 pt-2">
                            <label for="">
                                <h6>Category Name</h6>
                            </label>
                        </div>
                        <div class="col-7">
                            <span id="ccname">

                            </span>
                        </div>
                    </div>


                    <div class=" card-body " style="margin-left:23%;">
                        <label for="" id="veri">
                            veri image
                        </label>
                        <div id="vvimage">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" id="veriad">
                            <h5>
                                Verification
                                Address</h5>
                        </label>
                        <span id="vvaddresss"></span>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">
                            <h6>
                                Uploaded Date :</h6>
                        </label>
                        <span id="cdate"></span>
                    </div>
                    <div id="accordion">

                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                    <h6>
                                        Case Deatails +</h6>
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                <div class="card-body">
                                    <h5 id="qq1"> Question1</h5>

                                    <span id="aanswer1"><input type="text" class="form-control" id="answer1"
                                            placeholder=""></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Modal
                                            footer -->
                <div class="modal-footer">
                    <span id="eid"></span>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                    <input type="submit" class="btn btn-danger" value="Confirm">


                </div>
            </div>
        </form>
    </div>
</div>

@else <?php 
    return redirect('/login');

?> @endif