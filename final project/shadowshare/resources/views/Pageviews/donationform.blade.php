<!-- Donation Form -->
@extends('layouts.menubar')
@section('title', '| mystorylist')

<head>
    <meta name="csrf-token" content="{{csrf_token()}}">


</head>
<style>
input.error {
    color: black;
}

label.error {
    color: red;
}
</style>
@section('cont')
<!------ Include the above in your HEAD tag ---------->


<!------ Include the above in your HEAD tag ---------->



<section class="section">
    <div class="container">
        <div class=" col-md-12 card" style="margin-top:10%;margin-left:10%;">
            <h5 class=" project-title" itemprop="name">
                Urgent Fundraise Events</h5>
        </div>
        <div class="left">


        </div>
        @foreach($data as $data)
        <article class="card-body  fly-card fly-project fly-flip-effect vertical" style="margin-top:17%;">


            <div class="project-content ">
                <h3 class="project-title" itemprop="name">
                    <a href="#">{{$data->casetitle}}</a>
                </h3>

                <div class="project-location">
                    <a href="#" class="flip-button" itemprop="location"><i
                            class="material-icons">location_on</i>{{$data->city}}</a>
                </div>

                <div class="project-description" itemprop="description">
                    <p>
                        {{$data->discription}}
                    </p>
                </div>
                <div class="project-description" itemprop="description">
                    <ul class="project-stats">
                        <li>
                            <div class="label">goal</div>
                            <div class="value"><sup>Rs</sup>{{$data->amount}}</div>
                        </li>

                    </ul>
                </div>


            </div>

            <div class="boxed flip-back">
                <div class="card-map" data-placeholder="waiting for map">
                    <div class="google-map" data-map-zoom="14" data-map-type="roadmap" data-map-style="onehope"
                        data-map-address="1998 Hulman Blvd, Speedway, IN, 46222" data-map-marker="images/marker.png"
                        data-map-marker-size="[31,46]" data-map-marker-anchor="[16,46]">
                        <!-- May use data-map-coords="39.795180;-86.234819" instead of data-map-address -->
                    </div>
                </div>


            </div>
        </article>
        @endforeach
        <form action="/savedonors" method="post" class="donate-form">
            @csrf
            <h4 class="title-styled">Make a donation</h4>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group ">
                        <label for="country">COUNTRY</label>

                        <select name="country" id="country" class="select2" data-placeholder="- select a country -">
                            <option value="">&nbsp;</option>
                            <option value="India">India</option>

                        </select>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group ">
                        <label for="city">TOWN / CITY</label>
                        <input class="form-control" type="text" id="city" name="city" placeholder="Town or City" />
                        <input type="hidden" id="fid" name="fid" value="{{$data->fid}}" />
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group ">
                        <label for="state">STATE / PROVINCE</label>
                        <select name="state" id="state" class="form-control">
                            <option disabled selected value> -- select state -- </option>
                            @isset($state)
                            @foreach($state as $states)
                            <option value="{{$states->state_id}}">{{$states->sname}}</option>
                            @endforeach
                            @endisset

                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group ">
                        <label for="first-name">First Name</label>
                        <input class="form-control" type="text" id="first-name" name="firstname" placeholder="" />
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group ">
                        <label for="last-name">Last Name</label>
                        <input class="form-control" type="text" id="last-name" name="lastname" placeholder="" />
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="email">e-mail address</label>
                        <input class="form-control" type="email" id="email" name="email" placeholder="Email" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="company">Occupation</label>
                        <input class="form-control" type="text" id="company" name="occu" placeholder="" />
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="form-group ">
                        <label for="phone">phone number</label>
                        <input class="form-control" type="number" id="phone" name="phone" placeholder="Phone Number" />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group ">
                        <label for="address1">address</label>
                        <input class="form-control" type="text" id="address1" name="address1"
                            placeholder="Enter your address" />
                        <input class="form-control" type="text" id="address2" name="address2"
                            placeholder="Second address line" />
                    </div>

                    <!-- <div class="form-group required">
                        <label for="payment">pAYMENT mETHOD</label>

                        <ul class="payment-method clearfix">
                            <li class="active">
                                <div class="payment-logo"><img src="images/payment-1.png" alt="" /></div>
                                <input type="radio" name="payment" id="payment" value="1" checked />
                            </li>

                            <li>
                                <div class="payment-logo"><img src="images/payment-2.png" alt="" /></div>
                                <input type="radio" name="payment" value="2" />
                            </li>

                            <li>
                                <div class="payment-logo"><img src="needya/images/payment-3.png" alt="" /></div>
                                <input type="" name="payment" value="3" />
                            </li>

                            <li>
                                <div class="payment-logo"><span>Direct Bank Transfer</span></div>
                                <input type="radio" name="payment" value="4" />
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group ">
                        <label for="amount">amount</label>
                        <input class="form-control" type="text" id="amount" name="amount" placeholder="$ 100" />
                    </div>
                </div>



                <div class="col-sm-4">
                    <div class="form-submit">
                        <button type="submit" class="btn btn-medium js-wave" came="sub" value="Submit">Donate</button>
                        <!-- <a href="donationpayment" class="btn btn-medium js-wave">Submit</a> -->

                    </div>
                </div>
            </div>
        </form>
        <!--/ Donation Form -->
    </div>
</section>
<script src="{{asset('admin/js/jquery-3.3.1.js')}}"></script>
<script src="{{asset('regvalidation/js/jquery.validate.js')}}"> </script>
<script src="{{asset('regvalidation/js/additional-methods.js')}}"> </script>
<script src="{{asset('regvalidation/js/donationvalid.js')}}"> </script>
@endsection