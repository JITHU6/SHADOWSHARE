@if(session()->has('email'))
@extends('needy.index')

@section('title', '| fundrequeststory')



@section('stylesheet')
<meta name="csrf-token" content="{{csrf_token()}}">
{{-- <link rel="stylesheet" href="css/bootstrap.css"> 
 <link rel="stylesheet" href="js/bootstrap.min.js">  --}}
{{-- <link rel="stylesheet" href="needy/css/fundlist.css"> --}}

<link rel="stylesheet" href="needy/css/question.css">
<link rel="stylesheet" href="needy/css/storyprofile.css">


@endsection()
@section('sidemenu')

<body style="background-color: #28a778;">
    <div class="container" style="width:50%;margin-top:10%;">
        <div class="col-sm-12">
            <div class="right">
                @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('message')}}
                </div>
                @endif
            </div>
            <form action="/savestory" method="POST" class="form-signin " id="msform" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-md-2">
                        <label class=" genric-btn success-border medium">1</label>
                    </div>
                    <div class="col-md-8" style="margin-left:15%;">
                        <!-- ? script to dispalya question -->
                        <script src="admin/js/question.js"></script>

                        <div class=" form-group" style="Color:#ffff;width:87%;"><label>Choose Category </label>
                            <select id="option" name="cat" class="form-control default-select"
                                onchange="view_question()">
                                <option>--select category--</option>
                                @isset($data)
                                @foreach($data as $category)
                                <option value="{{$category->category_id}}">{{$category->categoryname}}</option>
                                @endforeach
                                @endisset
                            </select>

                        </div>
                    </div>
                </div>
                @isset($user)
                @foreach($user as $users)
                <div class="row">
                    <div class="col-md-2">
                        <label class="genric-btn success-border medium">2</label>
                    </div>
                    <div class="card card-container col-md-7" style="margin-left:15%; ">
                        <div>
                            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                            <!-- <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" /> -->
                            <div class="pt-3">
                                <label>Personal Details</label>
                            </div>
                            <div class="col-md-7" style="left:25%;">

                                <img id="image" class="profile-img-card large thumbnail"
                                    src="/uploads/needyprofile/{{$users->image}}" />
                            </div>

                            <div class="pt-3">
                                <input type="email" id="inputEmail" class="form-control" placeholder="Email address"
                                    value="{{$users->email}}" required autofocus readonly>
                            </div>
                            <div class="pt-3">
                                <input type="email" id="inputEmail" class="form-control" placeholder="Email address"
                                    value="{{$users->name}}" required autofocus readonly>
                            </div>
                            <div class="pt-3">
                                <input type="email" id="inputEmail" class="form-control" placeholder="Email address"
                                    value="{{$users->phonenumber}}" required autofocus readonly>
                            </div>
                            <div class="pt-3">
                                <input type="email" id="inputEmail" class="form-control" placeholder="Email address"
                                    value="{{$users->pname}}" required autofocus readonly>
                            </div>


                            {{-- <div class="pt-3">
                            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Update</button>
                        </div> --}}
                            <!-- /form -->


                        </div>
                    </div>

                </div>
                @endforeach
                @endisset
                <div class="row">
                    <div class="col-md-2">
                        <label class="genric-btn success-border medium">3</label>
                    </div>
                    <div class="col-md-5" style="margin-left:15%;">
                        <div class=" form-group" style="Color:black;width:87%;"><label>Provide another address to
                                verify.
                                you</label>
                            <div class="pt-3">
                                <textarea class="form-control" name="vaddress" id="" rows=" 6" required></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label class="genric-btn success-border medium">4</label>
                    </div>
                    <div class="col-md-5" style="margin-left:15%;">
                        <div class=" form-group" style="Color:black;width:87%;"><label>Upload an identity proof </label>
                            <div class="pt-3">
                                <img id="ima" src="" class="avatar img-circle img-thumbnail" alt="avatar">
                                <h6>Upload a different photo...</h6>
                                <input type="file" name="casefile" id="file" class="text-center file-upload"
                                    accept=".png, .jpg, .jpeg,.JPG" style="width:70%;" onchange="loadFile1(event)"
                                    required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label class="genric-btn success-border medium">5</label>
                    </div>
                    <div class="col-md-5" style="margin-left:15%;">
                        <div class=" form-group" style="Color:black;width:87%;"><label>Choose Requirement </label>
                            <div class="pt-3">
                                <select id="mode" class="form-control default-select" required onchange="Change() ">
                                    <option value="">--select Requirement--</option>
                                    <option value="fund">Fund</option>
                                    <option value="equipment">Equipment</option>

                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label class="genric-btn success-border medium"></label>
                    </div>
                    <div class="col-md-5" style="margin-left:15%;">
                        <div class=" form-group" id="equipment" style="Color:#black;width:87%;"><label>Choose Equipment
                            </label>
                            <div class="pt-3">
                                <select id="eq" name="equipment" class="form-control default-select">
                                    <option value="">--select Equipment--</option>
                                    @isset($equipment)
                                    @foreach($equipment as $eq)
                                    <option value="{{$eq->equipment_id}}">{{$eq->cname}}</option>

                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-5 " style="margin-left:15%;">

                        <div class=" form-group" id="fund" style="Color:#ffff;width:87%;"><label>Enter Required Amount
                            </label>

                            <div class="pt-3">
                                <input type="number" id="amount" name="amount" class="form-control"
                                    placeholder="enter amount" min="0" oninput="validity.valid||(value=''); " autofocus>
                            </div>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label class="genric-btn success-border medium">6</label>
                    </div>
                    <div class="col-md-5" style="margin-left:15%;margin-top:15%;">

                        <div class=" form-group" id="fund" style="Color:#ffff;width:87%;"><label
                                style="color:black;">Provide Case Titile </label>
                            <!--left col-->
                            <div class="pt-3">
                                <input type="text" id="inputEmail" name="casetitle" class="form-control"
                                    placeholder="enter case title" pattern="^[a-zA-Z][a-zA-Z0-9\s]+" max=" 100" required
                                    autofocus>
                            </div>
                        </div>
                        <br>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label class="genric-btn success-border medium">7</label>
                    </div>
                    <div class="col-md-5" style="margin-left:15%;margin-top:15%;">
                        <div class=" form-group" id="fund" style="Color:#ffff;width:87%;"><label
                                style="color:black;">Upload Case Image</label>
                            <!--left col-->
                            <div class="text-center">
                                <img id="im" class="avatar img-thumbnail" alt="avatar">
                                <h6>Upload a different photo...</h6>
                                <input type="file" name="file" id="file" class="text-center file-upload"
                                    style="width:70%;" accept=".png, .jpg, .jpeg,.JPG" onchange="loadFile(event)"
                                    required>

                            </div>
                        </div>
                        <br>

                    </div>

                </div>
                <div class="row">
                    <div class="col-md-2 pt-4">
                        <label class="genric-btn success-border medium">8</label>
                    </div>
                    <div class="col-md-8 pt-5">
                        <label class="label-primary" style="color:black;">Attend the questions to make case
                            story<br>(select category from the category list)</label>
                    </div>
                    <div class="col-md-12">


                        <div class="tab" id="">

                            <div id="count">

                            </div>




                        </div>
                    </div>
                </div>




                <div class="input-group-icon mt-10">




                    {{-- <-- multistep form --> --}}

                    <!-- progressbar -->
                    <ul id="progressbar">


                    </ul>
                    <!-- fieldsets -->
                    <div style="margin-left:8%;margin-bottom:20%;">
                        <fieldset id="a">

                            <!-- {{-- <h2 class="fs-title">Question 2</h2>
                        <h3 class="fs-subtitle">What do your colleagues consider your main strengths to be?</h3>
                        <textarea class="form-control" name="CAT_Custom_2" id="CAT_Custom_2" rows="4"
                            onkeydown="if(this.value.length>=4000)this.value=this.value.substring(0,3999);"></textarea>
                        <input type="button" name="previous" class="previous action-button" value="Previous" />
                        <input type="submit" name="next" class="next action-button" value="Next" /> --}} -->

                        </fieldset>

                        <div id="q" class="mt-10 ">


                        </div>
                    </div>

                    <!-- jQuery -->

                    <!-- jQuery easing plugin -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"
                        type="text/javascript"></script>



                    <script src="needy/js/question.js"></script>



                </div>



            </form>
        </div>

    </div>
    </div>
</body>
<script src="admin/js/jquery-3.3.1.js"> </script>

<script src="needy/js/fstory.js"></script>

<script>
var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('im');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};
var loadFile1 = function(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('ima');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
};
</script>

@endsection()

@else
<?php 
    return redirect('/loginn');

?>
@endif