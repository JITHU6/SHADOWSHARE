@extends('layouts.menubar')
@section('title', '| Equipments')



<head>

    <meta name="csrf-token" content="{{csrf_token()}}">
    <style>
    #myDIV {

        background-color: ;
        color: white;
        -webkit-animation: mymove 5s infinite;
        /* Safari 4.0 - 8.0 */
        animation: mymove 5s infinite;
    }

    /* Safari 4.0 - 8.0 */
    @-webkit-keyframes mymove {
        50% {
            box-shadow: 30px 10px 20px 30px blue;
        }
    }

    @keyframes mymove {
        50% {
            box-shadow: 10px 20px 30px blue;
        }
    }
    </style>
</head>
@section('cont')

<!-- Search Form -->
<div class=" col-md-12 card" style="margin-top:10%;width:30%;margin-left:35%;">

    <h5 class="project-title" itemprop="name">
        Equipments available</h5>

    <form action="#" class="form-search-header">
        <input type="search" name="site-search" id="myInput" class="form-control" placeholder="search for something" />
        <label name="site-search-submit" class="form-submit material-icons">search</label>
    </form>
</div>
<!--/ Search Form -->


<!-- Events -->
<section class="section">
    <div class="container">
        <div class="fly-events columns4 flex-container" style="margin-top:20%;">
            @isset($a)
            @foreach($a as $equip)
            <div class="column" style="height:90%;" id="sdiv">
                <!-- Event -->

                <article class="fly-card fly-event fly-flip-effect" id="myDIV" itemscope itemtype="#">
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
                                            <p style="display: inline-block;margin-left:.03 %;" class=" card-text">
                                                {{$equip->condition}}
                                            </p>

                                        </span></h6><br>
                                    <h6 class="card-text" style="display: inline-block;">
                                        Category:<span>
                                            <p style="display: inline-block;margin-left:.03 %;" class=" card-text">
                                                {{$equip->categoryname}}
                                            </p>

                                        </span></h6>
                                </p>
                            </div>

                            <div class="event-footer">
                                <div class="project-buttons">
                                    <a href="#" class="btn btn-yellow js-wave" itemprop="potentialAction"
                                        data-toggle="modal" data-target="#myModal" id="equip{{$equip->equipment_id}}"
                                        onclick="equipdetails('{{$equip->equipment_id}}')">More
                                        Details</a>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#sdiv ").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>
@endsection()
<script src="admin/js/jquery-3.3.1.js"> </script>
<script src="needy/js/equipmentdetails.js"></script>
<div class="modal fade " id="myModal" style="margin-top:5%;margin-left:20%;width:60%;">
    <div class="modal-dialog" style="width:50%;">

        <form action="/itemrequest" method="post" enctype="multipart/data">
            @csrf
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Request Equipment</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class=" modal-body">
                    <div class="col-md-12">
                        <div class="card mb-4 ml-12">
                            <div class="card-body " style="margin-left:35%;">
                                <h6 class="card-title">View Equipment</h6>
                                <h6 class="card-title" id="">
                                </h6>

                            </div>


                        </div>
                        <div class=" card-body " style="margin-left:25%;" id="ccimage">

                            <!-- <input type="file" name="file" id="file"
                                                                    class="text-center file-upload form-control"
                                                                    accept=".png, .jpg, .jpeg,.JPG" style="width:70%;"
                                                                    onchange=""> -->
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-5 pt-2"> <label for="">
                                <h6>Equipment Name :
                            </label>
                        </div>
                        <div class="col-7">
                            <span id="cctitle">
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
                    <div class="form-group row">
                        <div class="col-5 pt-2">
                            <label for="">
                                <h6>Actual Cost</h6>
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
                                <h6>Condition</h6>
                            </label>
                        </div>
                        <div class="col-7 margin-5">
                            <span id="ccequip"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">
                            <h6>Discription</h6>
                        </label> <span id="vvimage"></span>
                    </div>

                    <!-- <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1">
                                                                        <h6>
                                                                            PickUp
                                                                            Address</h6>
                                                                    </label>
                                                                    <span id="vvaddresss"></span>
                                                                </div> -->
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">
                            <h6>
                                Uploaded Date :</h6>
                        </label>
                        <span id="cdate"></span>
                    </div>

                </div>
                <!-- Modal
                                                                                footer -->
                <div class="modal-footer">
                    <span id="eid"></span>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-danger" value="Request Equipment">
                </div>
            </div>
        </form>
    </div>

</div>