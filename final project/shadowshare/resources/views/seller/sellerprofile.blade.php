@if(session()->has('seller'))

@extends('layouts.sellermenubar')
@section('content')

<body style="background-image: url(needya/images/temp/slide-2.jpg);">
    <div id="container">
        <div class=" container" style=" width:60%;margin-top:-10%;background-color:#46B5B5;border-radius: 10px">
            <div class="card card-container col-12">


                <div class="row">
                    <div class="right">
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-10">
                        <h1></h1>
                    </div>
                </div>
                <form method="post" action="/sellerupdateprofile" id="registrationForm" class="form"
                    enctype="multipart/form-data">
                    @csrf
                    @isset($users)
                    @foreach($users as $user)
                    <div class="row">
                        <div class="col-sm-3">
                            <!--left col-->
                            <div class="text-center">
                                <img id="image" src="/uploads/sellerprofile/{{$user->image}}"
                                    class="avatar img-circle img-thumbnail" alt="avatar">
                                <h6>Upload a different photo...</h6>
                                <input type="file" name="file" class="text-center file-upload" style="width:70%;"
                                    onchange="readURL(this);">
                                {{-- <div class="col-xs-4 pt-4">
                                                        <input  type="submit"  class="btn btn-lg btn-success" id="updateimage" name="updateimage"   value="updateimage" >
                                                        
                                                    </div> --}}
                            </div>

                            </hr><br>
                        </div>
                        <!--/col-3-->
                        <div class="col-sm-9">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <hr>

                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="first_name">
                                                <h6>Name</h6>
                                            </label>
                                            <input type="text" name="name" id="name" value="{{$user->name}}"
                                                class="form-control cv-username" cv-message="Enter valid username"
                                                title="enter your first name if any." readonly required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="email">
                                                <h6>Email</h4>
                                            </label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                value="{{$user->email}}" title="enter your email." readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="phone">
                                                <h6>Phone</h6>
                                            </label>
                                            <input type="text" class="form-control" name="phone" id="phone"
                                                value="{{$user->phonenumber}}" title="enter your phone number if any."
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="last_name">
                                                <h6>Address line 1</h6>
                                            </label>
                                            <input type="text" class="cv-username form-control"
                                                av-message="Invalid Address" name="add1" id="add1"
                                                value="{{$user->addressline1}}" title="enter your last name if any."
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="last_name">
                                                <h6>Address line 2</h6>
                                            </label>
                                            <input type="text" class="cv-username form-control"
                                                av-message="Invalid Address" name="add2" id="add2"
                                                value="{{$user->addressline2}}" title="enter your last name if any."
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="last_name">
                                                <h6>State</h6>
                                            </label>


                                            <select name="state" id="state" class=" input form-control" disabled
                                                required>
                                                <option disabled selected value> {{$user->sname}}</option>
                                                @isset($state)
                                                @foreach($state as $states)
                                                <option value="{{$states->state_id}}">{{$states->sname}}
                                                </option>
                                                @endforeach
                                                @endisset

                                            </select>
                                        </div>

                                    </div>

                                    <script src="admin/js/jquery-3.3.1.js"></script>
                                    {{-- <script src="admin/js/jquery-3.3.1.min.js"></script> --}}


                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="last_name">
                                                <h6>District</h6>
                                            </label>

                                            <select name="district" id="district" class=" form-control " disabled
                                                required>

                                                <option disabled selected value=""> {{$user->dname}} </option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="last_name">
                                                <h6>Panchayath</h6>
                                            </label>

                                            <select name="panchayath" id="panchayath" class=" form-control " readOnly>

                                                <option selected value="{{$user->panchayath_id}}">
                                                    {{$user->pname}} </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="password">
                                                <h6>Pincode</h6>
                                            </label>
                                            <input type="number" class="cv-pincode form-control "
                                                av-message="invalid pincode" name="pincode" id="pincode"
                                                value="{{$user->pincode}}" title="." readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="password">
                                                <h6></h6>
                                            </label>
                                            <input type="hidden" class=" form-control " title="." readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="password">
                                                <h6></h6>
                                            </label>
                                            <input type="hidden" class=" form-control " title="." readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="password">
                                                <h6></h6>
                                            </label>
                                            <input type="hidden" class=" form-control " title="." readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="col-xs-6">
                                            <label for="password">
                                                <h6></h6>
                                            </label>
                                            <input type="hidden" class=" form-control " title="." readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class=" row">

                                            {{-- <button ><i class="glyphicon glyphicon-ok-sign" onclick="edit()"></i>Edit</button> --}}

                                            <div class="col-xs-4 pl-4">
                                                <input class="btn btn-lg btn-success" id="edit" type="button"
                                                    name="edit" value="Edit">
                                            </div>
                                            <div class="col-xs-4 pl-4">
                                                <input class="btn btn-lg btn-success" type="submit" name="submit"
                                                    id="update" style="display:none;" value="update">

                                            </div>
                                            {{-- <button class="btn btn-lg btn-success"  id="update" type="submit" onclick="update();"><i
                                                                        class="glyphicon glyphicon-ok-sign"></i>Update</button> --}}
                                            {{-- <div class="col-xs-4 pl-4">     
                                                                <button class="btn btn-lg" type="reset" id="reset"><i
                                                                        class="glyphicon glyphicon-repeat"></i>
                                                                    Reset</button>
                                                                </div> --}}
                                        </div>

                                    </div>



                                    <hr>

                                </div>
                                <!--/tab-pane-->



                            </div>
                            <!--/tab-content-->

                        </div>
                        <!--/col-9-->
                    </div>
                    @endforeach
                    @endisset
                </form>

                <!--/row-->
            </div>

        </div>
    </div>
</body>

<script src="seller/js/profile.js"></script>
<script src="js/state.js"> </script>
<script src="regvalidation/js/jquery.validate.js"> </script>
<script src="regvalidation/js/additional-methods.js"> </script>
<script src="regvalidation/js/valid.js"></script>

@endsection
@else
<?php 
 return redirect('/loginn');

?>
@endif