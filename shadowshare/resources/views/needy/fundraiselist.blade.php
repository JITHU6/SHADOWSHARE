@if(session()->has('email'))
@extends('needy.index')
@section('title', '| mystorylist')
@section('stylesheet')
<meta name="csrf-token" content="{{csrf_token()}}">
<!-- <link rel="stylesheet" href="js/bootstrap.min.js"> -->
<link rel="stylesheet" href="needy/css/fundlist.css">
<link rel="stylesheet" href="needy/css/card.css">
<!-- <link rel="stylesheet" href="js/bootstrap.js"> -->
<script src="admin/js/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
    integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
@endsection()
@section('sidemenu')


<!------ Include the above in your HEAD tag ---------->


<!------ Include the above in your HEAD tag ---------->


@endsection


<div class="container">
    <div class="mt-9">

        <div class="row">
            <div class="container" style="width:70%;margin-top:5%;">

                <div class="row">


                    <div class="row card col-md-12 " style="margin-top:7%;height:12%;">

                        <div class="col-md-7 card-body">
                            <h4 class="left">My Fundraise Event</h4>
                        </div>
                        <div class="col-md-4 card-body ">
                            <a class="color-5" href="#">Add New Case Story<a>
                        </div>

                    </div>
                    <div class="row col-md-12 " style="margin-top:02%;">
                        @isset($storydata)
                        @foreach($storydata as $data)
                        <div class="mt-2 col-md-12 card">
                            <div class="media  ">
                                <div class="card">
                                    <div class="fav-box"><i class="fa fa-heart-o" aria-hidden="true"></i>
                                    </div>
                                    <img class="d-flex align-self-start" src="uploads/caseimage/{{$data->caseimage}}"
                                        alt=" Generic placeholder image">
                                </div>
                                <div class="media-body card  " style="margin-left:01%;">
                                    <div class="price">
                                        <h4>
                                            <font color="green"> {{$data->casetitle}}</font>
                                        </h4><small></small>
                                    </div>
                                    <div class="stats">
                                        <h6>Amount Requested:<font color="green"> &nbsp;&nbsp;Rs.
                                                {{$data->amount}}</font>
                                        </h6> <small>
                                        </small>
                                    </div>
                                    <div class="">
                                        <h6><span><i class=""></i>Date:&nbsp;&nbsp;</span>
                                            <span><i class=""></i>
                                                <font color="green"> {{$data->updated_at}}</font>
                                            </span></h6>
                                    </div>

                                    <div class=" price">

                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#myModal" id="casedetails{{$data->case_id}}"
                                            onclick="more('{{$data->case_id}}')">
                                            More Deatails
                                        </button>

                                        <!-- The Modal -->
                                        <div class="modal fade " id="myModal" style="margin-top:5%;width:100%;">
                                            <div class="modal-dialog" style="width:80%;">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Modal Heading</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="col-md-12">
                                                            <div class="card mb-4 ml-12">
                                                                <div class="card-body " style="margin-left:35%;">
                                                                    <h5 class="card-title">My Story</h5>
                                                                    <h5 class="card-title" id="cdate"></h5>

                                                                </div>


                                                            </div>
                                                            <div class=" card-body " style="margin-left:23%;"
                                                                id="ccimage">

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
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5>Amount Requested</h5>
                                                                </label><span id="ccamount"> </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">
                                                                    <h5>Equipment Needed</h5>
                                                                </label> <span id="ccequip"></span>
                                                            </div>
                                                            <div class=" card-body " style="margin-left:23%;">
                                                                <label for="">
                                                                    <h5>Verification
                                                                        Document</h5>
                                                                    <div id="vvimage">

                                                                    </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlTextarea1">
                                                                    <h5>
                                                                        Verification
                                                                        Address</h5>
                                                                </label>
                                                                <span id="vvaddresss"></span>
                                                            </div>
                                                            <div id="accordion">

                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <a class="card-link" data-toggle="collapse"
                                                                            href="#collapseOne">
                                                                            <h5>
                                                                                Case Deatails +</h5>
                                                                        </a>
                                                                    </div>
                                                                    <div id="collapseOne" class="collapse show"
                                                                        data-parent="#accordion">
                                                                        <div class="card-body">
                                                                            <h5 id="qq1"> Question1</h5>

                                                                            <span id="aanswer1"><input type="text"
                                                                                    class="form-control" id="answer1"
                                                                                    placeholder=""></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- Modal
                                                                                footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!--endmodal -->

                                    </div>

                                </div>

                            </div>
                        </div>
                        @endforeach
                        @endisset







                    </div>
                    <!--/row-->

                </div>

            </div>
        </div>
    </div>
</div>



<script src="admin/js/jquery-3.3.1.min.js"> </script>
<script src="needy/js/casedetails.js">

</script>
@else <?php 
    return redirect('/login');

?> @endif