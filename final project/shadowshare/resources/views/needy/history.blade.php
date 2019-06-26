@if(session()->has('email'))
@extends('layouts.needymenubar')
@section('title', '| fundhistory')

<meta name="csrf-token" content="{{csrf_token()}}">
<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
<!-- <link rel="stylesheet" href="js/bootstrap.min.js"> -->
<!-- <link rel="stylesheet" href="needy/css/fundlist.css"> -->
<!-- <script src="admin/js/jquery-3.3.1.min.js"></script> -->
<script src="admin/js/jquery-3.3.1.js"></script>
<style>
.zoom {


    transition: transform .2s;
    /* Animation */

    margin: 0 auto;
}

.zoom:hover {
    transform: scale(2.2);
    /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
</style>
@section('content')


<section class="section" style="margin-top:-7%;">
    <div class="container" id="record">
        <div class=" card ">
            <a class="card-title " data-toggle="collapse" href="#collapseOne">
                <h5>
                    Donation Recieved Details</h5>
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
                                <th>Donator Name</th>
                                <th>Donator's Mobile</th>
                                <th>Amount(Rs)/Equipment</th>
                                <th>Date </th>
                                <th>Details</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>


                            </tr>
                        </tfoot>
                        <tbody>
                            @isset($data)
                            <input type="hidden" value=" {{$count=1}} ">
                            @foreach($data as $a)

                            @isset($a->spnames)
                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$a->spnames}}</td>
                                <td>{{$a->phonenumber}}</td>
                                <td>{{$a->amount}}</td>
                                <td>{{ date("Y-m-d", strtotime($a->updated_at))}}</td>
                                <td class="align-content-center">

                                    <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                                        data-target="#myModal" id="equip###" onclick="morea('{{$a->case_id}}')">
                                        More Deatails
                                    </button>

                                </td>



                            </tr>
                            @endisset

                            @isset($a->names)

                            <tr>
                                <td>{{$count}}</td>
                                <td>{{$a->names}}</td>
                                <td>{{$a->phonenumber}}</td>
                                <td>{{$a->eqname}}</td>
                                <td>{{ date("Y-m-d", strtotime($a->updated_at))}}</td>
                                <td class="align-content-center">

                                    <button type="button" class="btn btn-danger btn-block" data-toggle="modal"
                                        data-target="#myModal" id="equip###" onclick="morea('{{$a->case_id}}')">
                                        More Deatails
                                    </button>

                                </td>
                            </tr>
                            @endisset
                            <input type="hidden" value=" {{$count++}} ">

                            <!-- The Modal -->






                            @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
            <button type="submit" style="margin-top:5%;color:white;background:gray;"
                class="btn btn-success-outline pull-right" onclick="createPDF()">Download</button>
            <div class=" card-footer small text-muted">
            </div>
        </div>




    </div>
</section>
<script src="admin/js/jquery-3.3.1.min.js">
</script>
<script src="needy/js/history.js">
</script>
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
@endsection()
<div class="modal fade " id="myModal" style="margin-top:5%;margin-left:20%:width:40%;">
    <div class="modal-dialog" style="width:40%;">
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
                            <h5 class="card-title">My Case deatils</h5>
                            <h5 class="card-title" id="cdate"></h5>

                        </div>


                    </div>
                    <div class=" card-body " style="margin-left:15%;" id="ccimage">

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
                    <div class=" card-body " style="margin-left:23%;">
                        <label for="" id="veri">

                        </label>
                        <div class="zoom" id="vvimage">

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
                        <label for="" id="eedeslabel">

                        </label>
                        <span id="eedes"></span>
                    </div>
                </form>
            </div>
            <!-- Modal
                                                                                footer -->
            <div class="modal-footer"><span id="eid"></span>

                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

@else
<?php 
    return redirect('/loginn');

?>
@endif