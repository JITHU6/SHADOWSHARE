@if(session()->has('seller'))
@extends('layouts.sellermenubar')
@section('content')

<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="profile/effect.css">
</head>

<body style="background-image: url(needya/images/temp/slide-21.jpg);">
    <div id="wrapper">

        <div id="content-wrapper">
            <div class="container-fluid" style="margin-top:-10%;">
                <label for="last_name">
                    <h4 style="color:white;">Equipments Added</h4>
                </label>
                <div class="left col-5">
                    @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                    @endif
                </div>
                <div class="row" style="margin-top:0%;">

                    @isset($data)


                    @foreach($data as $list)

                    <div class="col-md-3 mt-4" id="myDIV"
                        style=" margin-top:3%;margin-left:5%;background:white;border-radius:5px;">
                        <div class="card text-white bg-secondary flex-md-row mb-4 shadow-sm h-md-250">
                            <div class="card-body d- fflexlex-column align-items-start ">
                                <strong class="d-inline-block mb-4  text-white">
                                    <h4 style="margin-top:3%;">{{$list->cname}}</h4>
                                </strong>
                                <div style="margin-left:0%;">
                                    <img class="card" alt="Thumbnail [200x250]"
                                        src="uploads/equipment/{{$list->cimage}}" style="width:100%; height: 200px;">
                                </div>
                                <h6 class="mb-0">
                                    Condition:<a class="text-white" href="#">{{$list->condition}}</a>
                                </h6>
                                <div class="mb-1" style="color:black;">{{$list->updated_at}}</div><br>
                                {{-- <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p> --}}
                                <!-- {{-- <a class="btn btn-outline-light btn-sm" role="button" data-toggle="modal" id="save{{$list->equipment_id}}" data-target="#product_view"  >More Detailes</a> --}} -->
                                <div style="margin-bottom:4%;"> <input class="btn btn-outline-light btn-sm"
                                        type="button" role="button" data-toggle="modal" data-target="#product_view"
                                        name="itemdetails" id="itemdetails{{$list->equipment_id}}" value="More Details"
                                        onclick="more('{{$list->equipment_id}}')">
                                    <a class="btn btn-outline-light btn-sm"
                                        href="{{url('removeequip/'.$list->equipment_id)}}">Remove</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                    @endisset




                </div>

            </div>

        </div>
    </div>

</body>
<script src="seller/js/itemdetails.js"></script>
<script src="seller/js/update.js"></script>

@endsection
<div class="modal pt-5 product_view " id="product_view" area-hiddden="true">
    <div class=" modal-dialog" style="width:60%;">
        <div class="modal-content">
            <div class="modal-header">
                <a href="#" data-dismiss="modal" class=" class pull-left">Close</span></a>
                <h3 class="modal-title"> </h3>

            </div>

            <div class="modal-body">
                <div class="row">
                    <form method="POST" action="/updateeqdata" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6 product_img card" id="image">


                        </div>

                        <div class="col-md-6 product_content">
                            <h6>Product Name</h6> <span id="name"></span>
                            <span id="pid"></span>
                            <h6>Product Category:</h6> <span id="cat"></span>

                            <h6>About: <span id="about"></span></h6>



                            <h6 class="cost">Price: <span></span>
                                <small id="price" class="cost"><span class="glyphicon glyphicon-usd" id="price"></span>
                                </small></h6>
                            <div class="row">
                                <div class="col-md-6 product_content">
                                    <h6>Condition:</h6> <span id="cond"></span>

                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6 product_content">
                                    <h6>PickupAddress: <span id="picka"></span></h6>
                                    <h6>Updated date: <span id="date"></span></h6>
                                    {{-- <p> <input type="text"  name="name" id="name" class="form-control "  value=" " readOnly></p> --}}
                                </div>
                            </div>
                            <div class="space-ten"></div>
                            <div class="btn-ground">
                                <button type="button" class="btn btn-primary" id="up"
                                    onClick="Updateitem()"><span></span>
                                    Edit</button>
                                <input type="submit" style="display:none;" class="btn btn-primary" id="done"
                                    value="Update"><span></span>
                                <script src="seller/js/updatedata.js"></script>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
<script src="admin/js/jquery-3.3.1.min.js"></script>
<script src="regvalidation/js/jquery.validate.js"> </script>
<script src="regvalidation/js/additional-methods.js"> </script>
<script src="seller/js/edititemvalid.js"></script>
@else
<?php 
 return redirect('/loginn');

?>
@endif