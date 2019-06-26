@if(session()->has('email'))
@extends('layouts.needymenubar')
@section('title', '| mystorylist')

<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="needy/css/card.css">
    <script src="admin/js/jquery-3.3.1.js"></script>
</head>
<style>
.modalquestion {
    color: green;
    background: transparent;
    border: none;
}

.modalanswer {

    background: transparent;

}
</style>@section('content')
<!------ Include the above in your HEAD tag ---------->


<!------ Include the above in your HEAD tag ---------->

<div class=" col-md-12 card" style="margin-top:-7%;">
    <h5 class="project-title" itemprop="name">
        My Fundraise Events</h5>
</div>
<div class="left">
    @if (Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{Session::get('message')}}
    </div>
    @endif
</div>
<section class="section">
    <div class="container">
        <div class="fly-projects alternate-layout">
            <!-- Project -->
            @isset($storydata)

            @foreach($storydata as $data)
            <article class="fly-card fly-project fly-flip-effect vertical" itemscope
                itemtype="http://schema.org/DonateAction">
                <div class="boxed flip-front">
                    <a class="project-media js-wave" href="#" itemprop="url">
                        <img src="uploads/caseimage/{{$data->caseimage}}" style="height:230px;width:100%;" alt=""
                            itemprop="image" />
                        <!-- <span class="progress">
                                <span class="progress-label">0%</span>
                                <span class="progress-bar"></span>
                            </span> -->
                    </a>

                    <div class="project-content">
                        <h5 class="" itemprop="name">
                            <a href="#">{{$data->casetitle}}</a>
                        </h5>

                        <div class="project-location">
                            <a href="#" class="flip-button" itemprop="location"><i class="material-icons"></i></a>
                        </div>

                        <div class="project-description" itemprop="description">
                            @if($data->amount)
                            <div class="stats">
                                <h6>Amount Requested:<font color="green"> &nbsp;&nbsp;Rs.
                                        {{$data->amount}}</font>
                                </h6> <small>
                                </small>
                            </div>
                            @endif
                            @if($data->equipmentid)

                            <div class="stats ">
                                <h6>Item Requested:<font color="green"> &nbsp;&nbsp;
                                        {{$data->cname}}</font>
                                </h6> <small>
                                </small>
                            </div>

                            @endif
                            <div class="card-body">
                                <h6><span><i class=""></i>Date:&nbsp;&nbsp;</span>
                                    <span><i class=""></i>
                                        <font color="green"> {{$data->updated_at}}</font>
                                    </span></h6>
                            </div>
                        </div>

                        <div class="project-footer">
                            <ul class="project-stats">
                                <li>
                                    <div class="label"></div>
                                    <div class="value" data-raised="12731"><sup></sup></div>
                                </li>
                                <li>
                                    <div class="label"></div>
                                    <div class="value" data-goal="22500" itemprop="target"><sup></sup></div>
                                </li>
                            </ul>

                            <div class="project-buttons">
                                <a href="#" class="btn btn-yellow js-wave" itemprop="potentialAction"
                                    data-toggle="modal" data-target="#myModal" id="case{{$data->case_id}}"
                                    onclick="more('{{$data->case_id}}')">More
                                    Details</a>
                            </div>
                            <div class="project-buttons">

                                <a class="btn btn-yellow js-wave"
                                    href="{{url('removecase/'.$data->case_id)}}">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="boxed flip-back">
                    <!-- <div class="card-map" data-placeholder="waiting for map">
                            <div class="google-map" data-map-zoom="14" data-map-type="roadmap" data-map-style="onehope"
                                data-map-address="1998 Hulman Blvd, Speedway, IN, 46222"
                                data-map-marker="images/marker.png" data-map-marker-size="[31,46]"
                                data-map-marker-anchor="[16,46]">
                                <!-- May use data-map-coords="39.795180;-86.234819" instead of data-map-address 
                    </div>
            </div>

            <ul class="card-social">
                <li><a href="#" class="fa fa-facebook js-wave"></a></li>
                <li><a href="#" class="fa fa-twitter js-wave"></a></li>
                <li><a href="#" class="fa fa-instagram js-wave"></a></li>
                <li><a href="#" class="fa fa-google js-wave"></a></li>
            </ul> -->
                </div>

            </article>
            @endforeach
            @endisset
        </div>
    </div>
</section>

<!--/ Project -->








<script src="admin/js/jquery-3.3.1.min.js">
</script>
<script src="needy/js/casedetails.js">

</script>
@endsection

<div class="modal fadeIn " id="myModal" style="margin-top:5%;margin-left:20%width:60%;">
    <div class="modal-dialog" style="width:50%;">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card mb-4 ml-12">
                        <div class="card-body " style="margin-left:35%;">
                            <h5 class="card-title">My Case Story</h5>
                            <h5 class="card-title" id="cdate"></h5>

                        </div>


                    </div>
                    <div class=" card-body " style="margin-left:27%;" id="ccimage">

                        <!-- <input type="file" name="file" id="file"
                                                                    class="text-center file-upload form-control"
                                                                    accept=".png, .jpg, .jpeg,.JPG" style="width:70%;"
                                                                    onchange=""> -->
                    </div>
                </div>
                <form>
                    <div class="form-group">
                        <label for="">
                            <h5>Case Title</h5>
                        </label><span id="cctitle">
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="">
                            <h5>Category Name</h5>
                        </label> <span id="ccname">

                        </span>
                    </div>

                    <div class="form-group" id="ccamount">

                    </div>

                    <div class="form-group" id="ccequip">
                        <label> N/A</label>
                    </div>
                    <div class="form-group" id="ddescrip">

                    </div>
                    <div class=" card-body " style="margin-left:27%;">
                        <label for="" id="veri">

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
                    <div id="accordion">

                        <div class="card">
                            <div class="card-header">
                                <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                    <h5>
                                        Case Deatails +</h5>
                                </a>
                            </div>
                            <div id="collapseOne" class="" data-parent="#accordion">
                                <div class="card-body">
                                    <span id="eedescrip"><textarea class='form-control' id='edescrip' name='edescrip'
                                            rows='6' column='6' readonly></textarea></span>
                                    <h6 id="qq1"> Question1</h6>

                                    <span id="aanswer1"><textarea class='form-control' id='answer1' rows='6' column='15'
                                            readonly></textarea></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Modal
                                                                                footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

@else <?php 
    return redirect('/loginn');

?> @endif