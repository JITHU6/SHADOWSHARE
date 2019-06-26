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
        Approved Equipment Requests</h5>
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
            @foreach($a as $equip)
            <div class="column" style="height:90%;">
                <!-- Event -->

                <article class=" fly-card fly-event fly-flip-effect" id="myDIV" itemscope itemtype="#">
                    <div class="boxed flip-front">
                        <a class="event-media js-wave" href="#" itemprop="url">
                            <img src="/uploads/equipment/{{$equip->cimage}}" style="height:200px;width:100%;" alt=""
                                itemprop="image" />
                        </a>

                        <div class="event-content">
                            <h6 class="event-title" itemprop="name">
                                <a href="#">{{$equip->cname}}</a>
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
                                    <h6 class="card-text" style="display: inline-block;">
                                        Condition:<span>
                                            <p style="display: inline-block;margin-left:.03 %;" class=" ">
                                                {{$equip->condition}}
                                            </p>

                                        </span></h6><br>
                                    <h6 class="card-text" style="display: inline-block;">
                                        Category:<span>
                                            <p style="display: inline-block;margin-left:.03 %;" class=" ">
                                                {{$equip->categoryname}}
                                            </p>

                                        </span></h6>
                                </p>
                            </div>

                            <div class="event-footer">
                                <div class="project-buttons">
                                    <a href="#" class="btn btn-yellow js-wave" itemprop="potentialAction"
                                        data-toggle="modal" data-target="#myModal" id="equip{{$equip->equipment_id}}"
                                        onclick="equipdetails('{{$equip->equipment_id}}')">
                                        Pickup Details</a><br><br>
                                    @if($equip->cstatus=3)
                                    <button type="button" class="btn btn-success btn-block" style="margin-bottom:5%;">
                                        Not Delivered
                                    </button>

                                    @elseif($equip->cstatus=7)
                                    <button type="button" class="btn btn-success btn-block" style="margin-bottom:5%;">
                                        Delivered
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div
                                        class="boxed flip-back">
                                    <div class="card-map" data-placeholder="waiting for map">
                                        <div class="google-map" data-map-zoom="14" data-map-type="roadmap"
                                            data-map-style="onehope"
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
<script src="needy/js/equipmentdetails.js">
</script>
@endsection()

<div class="modal fade in background " id="myModal" style="margin-top:5%;margin-left:20%;width:60%;">
    <div class="modal-dialog" style="width:80%;">

        <form action="/eqstory" method="post" enctype="multipart/data">
            @csrf
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Request Item</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class=" modal-body">
                    <div class="col-md-12">
                        <div class="card mb-4 ml-12">
                            <div class="card-body " style="margin-left:35%;">
                                <h5 class="card-title">View
                                    Item
                                </h5>
                                <h5 class="card-title" id=""></h5>

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
                                <h5>Item Name :
                            </label>
                        </div>
                        <div class="col-7">
                            <span id="cctitle">
                            </span></h5>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-5 pt-2">
                            <label for="">
                                <h5>Category Name</h5>
                            </label>
                        </div>
                        <div class="col-7">
                            <span id="ccname">

                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-5 pt-2">
                            <label for="">
                                <h5>Actual Cost</h5>
                            </label>
                        </div>
                        <div class="col-7">
                            <span id="ccamount">
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-5 pt-2">
                            <label for="">
                                <h5>Condition</h5>
                            </label>
                        </div>
                        <div class="col-7">
                            <span id="ccequip"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">
                            <h5>Discription</h5>
                        </label> <span id="vvimage"></span>
                    </div>

                    <!-- <div class="form-group">
                                                                        <label for="exampleFormControlTextarea1">
                                                                            <h5>
                                                                                PickUp
                                                                                Address</h5>
                                                                        </label>
                                                                        <span id="vvaddresss"></span>
                                                                    </div> -->
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">
                            <h5>
                                Uploaded Date :</h5>
                        </label>
                        <span id="cdate"></span>
                    </div>
        </form>
    </div>
    <!-- Modal
                                                                                footer -->
    <div class="modal-footer">
        <span id="eid"></span>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="button" b data-toggle="modal" data-target="#myModal1" class="btn btn-danger" value="Pick Up">
        <!-- //start -->



    </div>
</div>

<!-- //end -->
</div>
</div>
</form>
</div>
</div>
<div class="modal fade" id="myModal1" style="margin-top:0%;margin-left:10%;width:80%;">
    <div class="modal-dialog" style="width:60%;">

        <form action="/eqstory" method="post" enctype="multipart/data">
            @csrf
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <div class="col-md-12">

                        <div class="card-body ">
                            <h5 class="card-title">
                                PickUp
                                Details</h5>
                            <h5 class="card-title" id="">
                            </h5>
                        </div>

                    </div>



                    <div class="form-group row">
                        <div class="col-5 pt-2">
                            <label for="">
                                <h5>Sponsor Name</h5>
                            </label>
                        </div>
                        <div class="col-7">
                            <span id="sname">
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-5 pt-2">
                            <label for="">
                                <h5>Phone Number</h5>
                            </label>
                        </div>
                        <div class="col-7">
                            <span id="sphone">
                            </span>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="exampleFormControlTextarea1">
                            <h5>
                                PickUp
                                Address</h5>
                        </label>
                        <span id="vvaddresss"></span>
                    </div>
                    <!-- <div class="form-group">
                                                                                <label
                                                                                    for="exampleFormControlTextarea1">
                                                                                    <h5>
                                                                                        Uploaded Date :</h5>
                                                                                </label>
                                                                                <span id="cdate"></span>
                                                     </div> -->
                </div>
                <div class="modal-footer">
                    <span id="eid"></span>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <!-- <input type="submit" class="btn btn-danger"
                                                                value="Request Equipment"> -->

                </div>
            </div>
        </form>

    </div>
    <!-- Modal
                                                                                footer -->

</div>
@else <?php 
    return redirect('/login');

?> @endif