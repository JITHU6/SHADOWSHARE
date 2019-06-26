@if(session()->has('seller'))
@extends('layouts.sellermenubar')
@section('content')

<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="profile/effect.css">
</head>



<section class="section" style="margin-top:-7%;">
    <div class="container" id="record">
        <div class=" card ">
            <a class="card-title " data-toggle="collapse" href="#collapseOne">
                <h5>
                    View Equipment Requests</h5>
            </a>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sl.No</th>
                                <th>Needy Name</th>
                                <th>Category</th>
                                <th>Equipment name</th>
                                <th>status</th>
                                <th>date</th>
                                <th>Details</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>


                            </tr>
                        </tfoot>
                        <tbody>
                            @isset($a)
                            <input type="hidden" value=" {{$count=1}} ">
                            @if(Session()->has('message'))
                            <script>
                            alert("{{Session::get('message')}}");
                            </script>
                            @endif


                            @foreach($a as $data)

                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$data->name}}</td>
                                <td> {{$data->categoryname}}</td>
                                <td> {{$data->cname}}</td>
                                <td>
                                    @if($data->cstatus==3)
                                    <form method="post" action="/confirmdelivery">
                                        @csrf
                                        <input type="hidden" name="user" value="{{$data->user_id}}">
                                        <input type="hidden" name="case" value="{{$data->case_id}}">
                                        <input type="submit" class="btn btn-success btn-block" style="margin-bottom:5%;"
                                            value="Submit when Delivery completes">

                                        </button>
                                    </form>
                                    @endif
                                    @if($data->cstatus==7)

                                    <button type="button" class="btn btn-success btn-block" style="margin-bottom:5%;"
                                        id="equip###">
                                        Delivered
                                    </button>

                                    @endif
                                    @if($data->cstatus==2)

                                    <button type="button" class="btn btn-success btn-block" style="margin-bottom:5%;"
                                        id="equip###">
                                        Delivered
                                    </button>

                                    @endif
                                </td>
                                <td>{{ $data->updated_at}}</td>
                                <td class="align-content-center">

                                    <a href="#" class="btn btn-yellow js-wave" itemprop="potentialAction"
                                        data-toggle="modal" data-target="#myModal" id="equip###"
                                        style="margin-bottom:5%;" onclick="needycasedetails('{{$data->case_id}}')">
                                        View</a>

                                </td>



                            </tr>
                            <input type="hidden" value=" {{$count++}} ">
                            @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>

            <button type="submit" style="margin-top:5%;color:white;background:gray;"
                class="btn btn-success-outline pull-right" onclick="createPDF()">Download</button>
            <div class=" card-footer small text-muted">
                <div class=" card-footer small text-muted">
                </div>
            </div>




        </div>
</section>
<script src="admin/js/jquery-3.3.1.js"></script>
<script src="seller/js/casedetails.js">
</script>
<script src="seller/js/profile.js"></script>
<script src="js/state.js"> </script>
<script>
function createPDF() {
    var sTable = document.getElementById('record').innerHTML;

    var style = "<style>";
    style = style + "table {width: 100%;font: 17px Calibri;}";
    style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
    style = style + "padding: 2px 3px;text-align: center;}";
    style = style + "</style>";

    // CREATE A WINDOW OBJECT.
    var win = window.open('', '', 'height=700,width=700');

    win.document.write('<html><head>');
    win.document.write('<title>Ticket Details</title>'); // <title> FOR PDF HEADER.
    win.document.write(style); // ADD STYLE INSIDE THE HEAD TAG.
    win.document.write('</head>');
    win.document.write('<body>');
    win.document.write(sTable); // THE TABLE CONTENTS INSIDE THE BODY TAG.
    win.document.write('</body></html>');

    win.document.close(); // CLOSE THE CURRENT WINDOW.

    win.print(); // PRINT THE CONTENTS.

}
</script>
@endsection
<div class="modal fade " id="myModal" style="margin-left:20%;width:60%;">
    <div class="modal-dialog" style="width:80%;">

        <form action="/approveequipcase" method="post" enctype="multipart/data">
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
                                <h5 class="card-title" id="cctitle"></h5>

                            </div>


                        </div>
                        <div class="card-body" style="margin-left:15%;" id="ccimage">

                            <!-- <input type="file" name="file" id="file"
                                                    class="text-center file-upload form-control"
                                                    accept=".png, .jpg, .jpeg,.JPG" style="width:70%;"
                                                    onchange=""> -->
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="col-5 pt-2"> <label for="">
                                <h6>Needy Name :
                            </label>
                        </div>
                        <div class="col-7">
                            <span id="uuname">
                            </span></h6>
                        </div>
                    </div>
                    <div class="card-body">
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
                    <div class="card-body" id="ccequip">
                        <label> N/A</label>
                    </div>

                    <div class="card-body" style="margin-left:15%;">
                        <label for="" id="veri">
                            veri image
                        </label>
                        <div id="vvimage">

                        </div>
                    </div>
                    <div class="card-body">
                        <label for="" id="veriad">
                            <h6>
                                Verification
                                Address</h6>
                        </label>
                        <span id="vvaddresss"></span>
                    </div>


                    <div class="card-body">
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
                    <!-- <input type="submit" class="btn btn-danger"
                                                            value="Approve Request"> -->

                </div>
            </div>
        </form>
    </div>
</div>


<!--endmodal -->
@else
<?php 
 return redirect('/loginn');

?>
@endif