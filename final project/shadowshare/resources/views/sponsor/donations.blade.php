@if(session()->has('sponsor'))
@extends('layouts.sponsormenubar')
@section('content')

<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="profile/effect.css">


</head>
<div id="record">
    <div class=" col-md-12 card" style="margin-top:-7%;">
        <h5 class="project-title" itemprop="name">
            Fund Donated Deatails</h5>
    </div>
    <div class="left">
        @if (Session::has('message'))
        <script>
        alert("{{Session::get('message')}}");
        </script>
        @endif
    </div>
    <section class="section">
        <div class="container">

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Donated List</div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Beneficiry Name</th>
                                    <th>Beneficiry's Mobile</th>
                                    <th>Amount(Rs)/Equipment</th>
                                    <th>Date </th>
                                    <!-- <th>Details</th> -->

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

                                @isset($a->names)
                                <tr>
                                    <td>{{$count}}</td>
                                    <td>{{$a->names}}</td>
                                    <td>{{$a->phone}}</td>
                                    <td>{{$a->amount}}</td>
                                    <td>{{ date("Y-m-d", strtotime($a->updated_at))}}</td>
                                    <!-- <td class="align-content-center">

                                                    <button type="button" class="btn btn-danger btn-block"
                                                        data-toggle="modal" data-target="#myModal" id="equip###"
                                                        onclick="morea('{{$a->case_id}}')">
                                                        More Deatails
                                                    </button>

                                                </td> -->



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


</div>
<script src="sponsor/casedetails.js">
</script>
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
@else
<?php
return redirect('/loginn');

?>
@endif