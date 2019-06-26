
@extends('needy.index')
@section('title', '| detailedstory')
@section('sidemenu')

<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
<!-- <link rel="stylesheet" href="js/bootstrap.min.js"> -->
@section('stylesheet')
<link rel="stylesheet" href="needy/css/fundlist.css">

<!-- <link rel="stylesheet" href="needy/css/question.css"> -->
<!-- <link rel="stylesheet" href="needy/css/storyprofile.css"> -->
<link rel="stylesheet" href="needy/css/viewstory.css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
@endsection()

<div class="container" style="width:50%;margin-top:-35%;">
    <div class="col-sm-12">

        <div class="product">
            <div class="img-container">
                <img
                    src="https://images.unsplash.com/photo-1491553895911-0055eca6402d?dpr=1&auto=compress,format&fit=crop&w=1400&h=&q=80&cs=tinysrgb&crop=">
            </div>
            <div class="product-info">
                <div class="product-content">
                    <h1>Personal Details</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit ariatur</p>
                    <ul>
                        <li>Lorem ipsum dolor sit ametconsectetu.</li>
                        <li>adipisicing elit dlanditiis quis ip.</li>
                        <li>lorem sde glanditiis dars fao.</li>
                    </ul>
                    <div class="buttons">

                    </div>
                </div>
            </div>
        </div>

        <div class="product">
            <div class="img-container">
                <img
                    src="https://images.unsplash.com/photo-1434493907317-a46b5bbe7834?dpr=1&auto=compress,format&fit=crop&w=1500&h=&q=80&cs=tinysrgb&crop=">
            </div>
            <div class="product-info">
                <div class="product-content">
                    <h1>Case Story Details</h1>
                    <p>Case Title</p>
                    <ul>
                        <li>Amount Requested:<span class="button" id="price">$120,99</span></li>
                        <li>Problem Description:
                            ipbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbvvvvvvvvbbb<br> bbbbbbbbbbbbbbbbbbbbbbvv. </li>
                        <li>Account Deatils:
                        </li>
                        <li>Date of Post:
                        </li>

                    </ul>
                    <div class="buttons">
                        <a class="button buy" href="#">Update</a>
                        <a class="button add" href="#">Remove</a>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">


        </div>


        <div class="row">






        </div>
    </div>
</div>
</div>

@endsection()