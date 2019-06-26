@if(session()->has('email'))
@extends('needy.index')

@section('title', '| fundrequeststory')



@section('stylesheet')

{{-- <link rel="stylesheet" href="css/bootstrap.css"> 
 <link rel="stylesheet" href="js/bootstrap.min.js">  --}}
{{-- <link rel="stylesheet" href="needy/css/fundlist.css"> --}}

<link rel="stylesheet" href="needy/css/question.css">
<link rel="stylesheet" href="needy/css/storyprofile.css">
<link rel="stylesheet" href="profile/effect.css">

@endsection()
<style>
input.error {
    background: white;
    color: rgb(10, 10, 10);
}



label.error {
    color: white;
    background-color: #db4437;

    padding: 10px 20px;
    border-radius: 4px;
    font-family: 'Courier New', Courier, monospace;
}

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
@section('sidemenu')

<body class="">
    <div class="container">
        <div class="col-12 " id="myDIV" style="background-color: #00735D;margin-top:10%;">

            <form action="/saveeqstory" method="POST" class="form-signin " id="msform" enctype="multipart/form-data">
                @csrf


                <div class="card-header" style="margin-top:20%;background:#00365C;">
                    <label class="card-title">
                        <h4 style="color:white;">
                            Item Case Story</h4>
                    </label>
                </div>
                <div class="right">
                    @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                    @endif
                </div>
                <div class="row">


                    <div class="col-md-8" style="margin-left:18%;margin-top:10%;">
                        <!-- ? script to dispalya question -->
                        <!-- <script src="admin/js/question.js"></script> -->

                        <div class=" form-group" style="Color:#ffff;width:87%;"><label>Equipment Category</label>
                            <select id="option" name="cataaa" class="form-control default-select">
                                @isset($data)
                                @foreach($data as $category)
                                <option value="{{$category->category_id}}">{{$category->categoryname}}</option>
                                <input type="hidden" id="inputEmail" name="cat" class="form-control"
                                    value="{{$category->category_id}}">
                                @endforeach
                                @endisset

                            </select>

                        </div>
                    </div>
                </div>
                @isset($user)
                @foreach($user as $users)
                <div class=" row">

                    <div class="card card-container col-md-7" style="margin-left:20%; ">
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

                <div id="accordion">

                    <div class="card">
                        <div class="card-header">
                            <a class="card-link " data-toggle="collapse" href="#collapseOne">
                                <h5>
                                    Provide another address to
                                    verify.
                                    you</h5>
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <div class="pt-3">
                                    <textarea class="form-control" name="vaddress" id="" rows=" 6"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="accordion">

                    <div class="card">
                        <div class="card-header">
                            <a class="card-link " data-toggle="collapse" href="#collapse2">
                                <h5>
                                    Upload an identity proof</h5>
                            </a>
                        </div>
                        <div id="collapse2" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <div class="pt-3">
                                    @if($users->verification_document)
                                    <div class="zoom">
                                        <img id="imaa" src="uploads/verify/{{$users->verification_document}}"
                                            class="avatar img-circle img-thumbnail ima" style="width:200;height:200;"
                                            alt="avatar">
                                    </div>
                                    <button id="changefile">
                                        <h6>Upload a different photo...</h6>
                                    </button>
                                    <input type="file" name="casefile" id="filea" class="text-center file-upload"
                                        style="width:70%;display:none;" onchange="loadFile2(event)">

                                    @else
                                    <div class="zoom">
                                        <img id="ima" src="" class="avatar img-circle img-thumbnail ima"
                                            style="width:200;height:200;" alt="avatar">
                                    </div>
                                    <h6>Upload a different photo...</h6>
                                    <input type="file" name="casefile" id="file" class="text-center file-upload"
                                        style="width:70%;" onchange="loadFile1(event)">

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endisset
                <div id="accordion">

                    <div class="card">
                        <div class="card-header">
                            <a class="card-link " data-toggle="collapse" href="#collapse3">
                                <h5>
                                    Selected
                                    Item</h5>
                            </a>
                        </div>
                        <div id="collapse3" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <div class="pt-3">
                                    <select id="eq" name="equipmentaa" class="form-control default-select">
                                        @isset($equipment)
                                        @foreach($equipment as $eq)
                                        <option value="{{$eq->equipment_id}}">{{$eq->cname}}</option>
                                        <input type="hidden" id="inputEmail" name="equipment" class="form-control"
                                            value="{{$eq->equipment_id}}">
                                        <input type="hidden" id="inputEmail" name="ename" class="form-control"
                                            value="{{$eq->name}}">
                                        <input type="hidden" id="inputEmail" name="eemail" class="form-control"
                                            value="{{$eq->email}}">
                                        @endforeach
                                        @endisset

                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div id="accordion">

                    <div class="card">
                        <div class="card-header">
                            <a class="card-link " data-toggle="collapse" href="#collapse4">
                                <h5>
                                    Provide Case Titile</h5>
                            </a>
                        </div>
                        <div id="collapse4" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <div class="pt-3">
                                    <input type="text" id="inputEmail" name="casetitle" class="form-control"
                                        placeholder="enter case title" autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="accordion">

                    <div class="card">
                        <div class="card-header">
                            <a class="card-link " data-toggle="collapse" href="#collapse5">
                                <h5>
                                    Upload Case Image</h5>
                            </a>
                        </div>
                        <div id="collapse5" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <div class="pt-3">
                                    <img id="im" class="avatar img-thumbnail" alt="avatar">
                                    <h6>Upload a different photo...</h6>
                                    <input type="file" name="file" id="file" class="text-center file-upload"
                                        style="width:70%;" onchange="loadFile(event)" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="accordion">

                    <div class="card">
                        <div class="card-header">
                            <a class="card-link " data-toggle="collapse" href="#collapseOne">
                                <h5>
                                    Describe you current situation.
                                </h5>
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                <div class="pt-3">
                                    <textarea class="form-control" name="edescription" id="" rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">

                    <!-- <div class="card-header">
                        <label class="card-link " data-toggle="collapse" href="#collapse5">
                            <h5 style="color:white;">Attend the questions to make case
                                story <br>(select category from the category list)</h5>
                        </label>
                    </div> -->
                    <!-- <div class="col-md-12">


                        <div class="tab" id="">

                            <div id="count1">

                            </div>




                        </div>
                    </div> -->





                    <!-- <div class="input-group-icon mt-10">




                        {{-- <-- multistep form --> --}}

                    <!-- progressbar -->
                    <!-- <ul id="progressbar">


                    </ul> -->
                    <!-- fieldsets -->
                    <!-- <div style="margin-left:8%;margin-bottom:20%;">
                        <fieldset>
                            <div style="color:rgb(90, 167, 150);">
                                {{$a=1}}
                            </div>
                            @isset($question)
                            @foreach($question as $aa)

                            @if ($aa->option_a == null && $aa->option_b == null && $aa->option_c == null &&
                            $aa->option_d == null)
                            <h2 class=" fs-title">Question {{$a}}</h2>

                            <h3 class="fs-subtitle">{{$aa->question}}</h3><input type="hidden" name="question{{$a}}"
                                value="{{$aa->question_id}}" <br>
                            <label>
                            </label></br><textarea class="form-control" name="answer{{$a}}" id=" CAT_Custom_7" rows="4"
                                onkeydown='if(this.value.length>=4000)this.value=this.value.substring(0,3999);'
                                required></textarea>
                            @endif
                            @if($aa->option_a && $aa->option_b && $aa->option_c && $aa->option_d)
                            <h2 class=" fs-title">Question{{$a}} </h2>
                            <h3 class="fs-subtitle">{{$aa->question}}</h3>
                            <input type="hidden" name="question{{$a}}" value=" {{$aa->question_id}}"> <br>
                            <label>Choose
                                Option </label></br><select id="op1" class="form-control" name="answer{{$a}}" required>
                                <option value="{{$aa->option_a}}">{{$aa->option_a}}</option>
                                <option value="{{$aa->option_b}}">{{$aa->option_b}}</option>
                                <option value="{{$aa->option_c}}">{{$aa->option_c}}</option>
                                <option value="{{$aa->option_d}}">{{$aa->option_d}}</option>
                            </select></br>

                            @endif
                            <div style="color:rgb(90, 167, 150);">
                                {{$a++}}



                                @endforeach
                                @endisset
                                <input type="hidden" name="count" value="{{$a}}">

                                <input type="submit" name="submit" class="genric-btn success-border medium"
                                    value="submit" />

                        </fieldset>

                    </div> -->

                    <!-- jQuery -->

                    <!-- jQuery easing plugin -->
                    <!-- <script src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"
                        type="text/javascript"></script>



                    <script src="needy/js/question.js"></script>



                </div> -->


                    <input type="submit" name="submit" class="genric-btn success-border medium" value="submit" />
            </form>
        </div>

    </div>
    </div>
</body>
<script src="admin/js/jquery-3.3.1.js"> </script>
<script src="regvalidation/js/jquery.validate.js"> </script>
<script src="regvalidation/js/additional-methods.js"> </script>
<script src="needy/js/fstoryvalid.js"></script>
<!-- <script src="needy/js/fstory.js"></script> -->

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
var el9 = document.getElementById('changefile');

el9.onclick = function() {

    document.getElementById("filea").style.display = "block";
    //document.getElementById("reset").style.display = "block";
};
</script>

@endsection()

@else
<?php 
    return redirect('/loginn');

?>
@endif