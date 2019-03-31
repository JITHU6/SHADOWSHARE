@if(session()->has('email'))
@extends('needy.index')
@section('title', '| fundhistory')
@section('stylesheet')
<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
<!-- <link rel="stylesheet" href="js/bootstrap.min.js"> -->
<link rel="stylesheet" href="needy/css/fundlist.css">
<script src="admin/js/jquery-3.3.1.min.js"></script>
@endsection()
@section('sidemenu')


<div class="container" style="width:50%;">
    <div class="mt-9">
        <div class="col-md-12">aa</div>

        <div class="col-md-12">aa</div>

        <div class="col-md-12">aa</div>
        <div class="section-top-border ">
            <h3 class=" mb-30 title_color">My History</h3>
            <div class="progress-table-wrap">
                <div class="progress-table">
                    <div class="table-head">
                        <div class="serial">#</div>
                        <div class="country bold">Case Title</div>
                        <div class="visit">Date</div>
                        <div class="percentage">Amount Requested(Rs)</div>
                        <div class="percentage">Amount Recieved(Rs)</div>
                    </div>
                    <div class="table-row">
                        <div class="serial">01</div>
                        <div class="country">Accident</div>
                        <div class="visit">10-1-19</div>
                        <div class="percentage">10000 </div>
                        <div class="percentage">5000 </div>
                    </div>
                    <div class="table-row">
                        <div class="serial">02</div>
                        <div class="country">EducationE</div>
                        <div class="visit">12-10-18</div>
                        <div class="percentage">12000</div>
                        <div class="percentage">8000</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection()

@else
<?php 
    return redirect('/login');

?>
@endif