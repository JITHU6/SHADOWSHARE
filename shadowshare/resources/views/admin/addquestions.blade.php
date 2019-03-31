@if(session()->has('status2'))
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body id="page-top">

@include('admin.nav')

<div id="wrapper">
         @include('admin.sidebar')
        <div id="content-wrapper">
                <div class="container-fluid">
                    <form role="form" action="/question" post="POST">
                      @csrf
                    <div class="row">
  
                        <div class="col-md-6" style="margin-left: 10%;margin-top: 5%;">
                        
                        <div  class="" >
                                <label class="h3">Add Questions</label>
                        </div>
                        <div class="right">
                                @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('message')}}
                                </div>
                                @endif
                        </div>
                        
                          
                          <div class="pt-5" >
                            <select class="form-control" id="productSelect" name="cat" onclick="val" required>
                               
                                <label for="productname" class="loginFormElement">Select Category</label>
                                <option value="">--Select category--</option>
                                @foreach($data as $category)
                                <option value="{{$category->category_id}}">{{$category->categoryname}}</option>  
                                @endforeach
                            </select>
                          </div>
                          <div class="pt-5">
                            <select class="form-control" id="type" onchange="return Displayoption()" required>
                                <option>Select Question Type</option>
                                <option value="1">Only Add Question </option>
                                <option value="2">Add Question with Options</option>
                     </select>
                        </div>
                    
                       <div class="form-group">
                         <label for="productname" class="loginFormElement">Question</label>
                         <input class="form-control" id="productname" type="text" name="question" onkeydown="upperCaseF(this)" required>
                       </div>
                       <div style="display:none;" id="qoption">
                       <div class="form-group">
                         <label for="productprice" class="loginFormElement">Option 1</label>
                         <input class="form-control" id="productprice" type="text" name="option1" onkeydown="upperCaseF(this)" >
                       </div>
                       <div class="form-group">
                        <label for="productprice" class="loginFormElement">Option 2</label>
                        <input class="form-control" id="productprice" type="text" name="option2" onkeydown="upperCaseF(this)" >
                      </div>
                      <div class="form-group">
                        <label for="productprice" class="loginFormElement">Option 3</label>
                        <input class="form-control" id="productprice" type="text" name="option3" onkeydown="upperCaseF(this)" >
                      </div>
                      <div class="form-group">
                        <label for="productprice" class="loginFormElement">Option 4</label>
                        <input class="form-control" id="productprice" type="text" name="option4" onkeydown="upperCaseF(this)" >
                      </div>
                   
                  </div>
                      {{-- <div class="form-group">
                       
                      <label class="control-label">Product Image</label>
                       
                      <input class="filestyle" data-icon="false" type="file">
                       
                      </div> --}}
                          
                          {{-- <div class="form-group">
                            <label class="loginformelement" for="productdescription">Product Description</label>
                              <input id="productdescription" class="form-control input-lg" placeholder="Large" type="text"><div class="container">
                            </div> --}}
                       <div>
                          <button type="submit" id="loginSubmit" class="btn btn-success loginFormElement " style="margin-top:5%;">Add Question</button>
                       </div>
                      </div></form>
                          
                          </div>


                        

                
                </div>
                
        </div>
</div>
<script>
function Displayoption(){
    var x=document.getElementById("qoption");
    x.style.display = "none";
    var u = document.getElementById("type").value;
    if(u>1){
        var x= document.getElementById("qoption");
        x.style.display = "block";
    }
   
}
</script>
<script>
    function upperCaseF(a){
        setTimeout(function(){
            a.value = a.value.toUpperCase();
        }, 1);
    }
    </script>
@include('admin.footer')
@else
<?php 
    return redirect('/loginn');

?>
@endif