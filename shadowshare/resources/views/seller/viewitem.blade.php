
@include('seller.sellerheader')

@include('seller.nav')
<script type="text/javaScript">
    function validate_dropdown(){

         if (document.registrationForm.item_name.value=="")
   {
       alert ("Please enter the item name.");
       document.registrationForm.item_name.value.focus();
       return false;
   }
    if (document.registrationForm.price.value=="")
   {
       alert ("Please enter the item price.");
       document.registrationForm.price.value.focus();
       return false;
   }
   if (document.registrationForm.stock.value=="")
   {
       alert ("Please enter the stock you have.");
       document.registrationForm.stock.value.focus();
       return false;
   }
   if (document.registrationForm.quantity.value=="")
   {
       alert ("Please enter the quantity in the packet/Number of  items in the packet.");
       document.registrationForm.quantity.value.focus();
       return false;
   }


        if (document.registrationForm.category.value=="0")
   {
       alert ("Please select your category.");
       document.registrationForm.category.value.focus();
       return false;
   }

   if (document.registrationForm.subcategory.value=="0")
   {
       alert ("Please select your subcategory.");
       document.registrationForm.subcategory.value.focus();
       return false;
   }

    if (document.registrationForm.discription.value=="")
   {
       alert ("Please provide the description of your product.");
       document.registrationForm.discription.value.focus();
       return false;
   }

   }
   </script>

<div id="wrapper">
         @include('seller.sidebar')
        <div id="content-wrapper">
                <div class="container-fluid">
                        <div  class="" >
                                <label class="h3">View Items</label>
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
                                                            <th>Item Image</th>
                                                            <th>Name</th>
                                                            <th>Description</th>
                                                            <th>Condition</th>
                                                            <th>Pickup Location</th>
                                                            <th>Edit/remove</th>
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

                                </div><!--/tab-content-->
                            
                        </div><!--/col-9-->
                    </div><!--/row-->

                <!-- /.row -->
         
            <!-- /#page-wrapper -->

        
        <!-- /#wrapper -->

        <!-- jQuery -->
        {{-- <script src="js/jquery.min.js');"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="('js/bootstrap.min.js');"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="('js/metisMenu.min.js');"></script>

        <!-- DataTables JavaScript -->
        <script src="('js/dataTables/jquery.dataTables.min.js');"></script>
        <script src="('js/dataTables/dataTables.bootstrap.min.js');"></script>

        <!-- Custom Theme JavaScript -->
        <script src="'js/startmin.js')"></script> --}}
        
                </div>
        </div>
</div>

<script src="admin/js/profile.js"></script> 
<script src="admin/js/jquery-3.3.1.min.js"></script> 
<script>
    var loadFile = function(event) {
var reader = new FileReader();
reader.onload = function(){
var output = document.getElementById('im');
output.src = reader.result;
};
reader.readAsDataURL(event.target.files[0]);
};
     </script>
@include('seller.footer')
