@if(session()->has('status2'))
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>
    <script src="admin/js/jquery-3.3.1.min.js"></script>
    <script src="admin/js/question.js"></script>
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
                    <div class="row">
  
                        <div class="col-md-6" style="margin-left: 10%;margin-top: 5%;">
                        <form role="form" action="/listquestion" post="POST">
                            @csrf
                        <div  class="" >
                                <label class="h3">Update Questions</label>
                        </div>
                        <div class="right">
                                @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('message')}}
                                </div>
                                @endif
                            </div>
                          <div class="row" >
                                <div class="mt-1" >
                                    <select class="form-control" id="productSelect" name="category" required>
                                    
                                        <option>Select Category</option>
                                        @isset($data)
                                        @foreach($data as $category)
                                        <option value="{{$category->category_id}}">{{$category->categoryname}}</option>  
                                        @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div  class="ml-4">
                                    <button type="submit" id="loginSubmit" class="btn btn-success loginFormElement " style="margin-top:5%;">submit</button>
                                </div>
                          </div>
                         
                  
                         </div>
                        </form>

                          
                    </div>
                  
                            <div class="card mb-3 mt-4">
                                <div class="card-header">
                                  <i class="fas fa-table"></i>
                                  </div>
                                <div class="card-body">
                                    @if(Session::has('flash_message'))
                                    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div>
                                @endif
                                        @if (count($errors) > 0)
                                            <div class = "alert alert-danger">
                                                <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="80%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                            <th>Sl.No</th>
                                                            <th>Question</th>
                                                            <th>Option1</th>
                                                            <th>Option2</th>
                                                            <th>Option3</th>
                                                            <th>Option4</th>
                                                            <th>Edit</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        
                                                        
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                        
                                                        @isset($quest)

                                                        {{$count=1}}
                                                        @foreach ($quest as $user) 
                                                            
                                                        
                                                    <tr id="row{{$user->question_id}}">
                                                        <td>{{$count}}</td>
                                                    <td>{{$user->question}}</td>
                                                        <td id="option1{{$user->question_id}}">{{$user->option_a}}</td>
                                                        <td id="option2{{$user->question_id}}">{{$user->option_b}}</td>
                                                        <td id="option3{{$user->question_id}}">{{$user->option_c}}</td>
                                                        <td id="option4{{$user->question_id}}">{{$user->option_d}}</td>
                                                        <td class="align-content-center">
                                                            
                                                            <input type="button" class="genric-btn default-border radius" name="edit" id="edit{{$user->question_id}}"  value="Edit" onclick="edit_row('{{$user->question_id}}')">
                                                           <input type="button" name="save" id="save{{$user->question_id}}"  value="save" onclick="save_row('{{$user->question_id}}')">
                                                              {{--<button name="save" id="save" class="btn btn-outline-primary ml-3">save</button>
                                                            {{-- <a  class="btn btn-outline-primary ml-3" href=""  id="edit" >Save</a> 
                                                            <a class="btn btn-outline-primary ml-3" href="{{ url('updatequestion/'.$user->question_id)}}">Submit</a> --}}
                                                        </td>
                                                    </tr>
                                                    {{$count=$count+1}}
                                                @endforeach
                                                @endisset
                            
                                            
                                                </tbody>
                                            </table>

                                        </div>
                                </div>
                                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                            </div>

                  
                        </form>

                
                </div>
                
        </div>
</div>


<script>
// function Displayoption(){
//     var x=document.getElementById("qoption");
//     x.style.display = "none";
//     var u = document.getElementById("type").value;
//     if(u>1){
//         var x= document.getElementById("qoption");
//         x.style.display = "block";
//     }
   
// }


// $('.edit').click(function(){
//         $(}}).prop('disabled', false);
        
// });

// $('#save').click(function(){
//         $('.op').prop('disabled', true);
// });
//ajax code 
</script>
@include('admin.footer')
@else
<?php 
    return redirect('/loginn');

?>
@endif