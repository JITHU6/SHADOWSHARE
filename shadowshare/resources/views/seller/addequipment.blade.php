@if(session()->has('seller'))
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
                   

        

            <!-- Navigation -->
             

            


           <hr>

                <div class=" col-12" style="background:lightseagreen">
                    <div class="row">
                        <div class="col-sm-10"><h1>Add Item</h1></div>
                        <div class="col-sm-2"><a href="/users" class="pull-right"><img  class="img-circle img-responsive" src=""></a></div>
                    </div>
                    <div class="right">
                        @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                        @endif
                    </div>
                    <div class="row " >
                        <div class="col-sm-3 mt-5"><!--left col-->


                            <form class="form" action="/additem" method="post" name="registrationForm" id="registrationForm" enctype="multipart/form-data">
                                @csrf
                                <div class="text-center mt-10">

                                    <img src="'images/logo.png');"   name="image" id="image" class="avatar img-circle img-thumbnail" >

                                    <h6>Upload photo of Item</h6>
                                    <input type="file" name="itemimage" id="itemimage" class="text-center center-block file-upload"  accept=".png, .jpg, .jpeg,.JPG" onchange="readURL(this);" required>

                                    <font color="#FF0000" size="+1" face="Courier New, Courier, monospace">
                                    

                                    </font>
                                </div></hr><br>



                        </div><!--/col-3-->
                        <div class="col-sm-9" >

                            

                                <div class="tab-content" >
                                    <div class="tab-pane active" id="home">
                                        <hr>
                                        <div class="col-6">
                                            <div class="form-group">

                                                <div class="col-xs-6">
                                                    <label for="first_name"><h4>Equipment Name</h4></label>
                                                    <input type="text" class="form-control" name="item_name" id="item_name" placeholder="Item Name" required>
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <div class="col-xs-6">
                                                    <label for="last_name"><h4>Category</h4></label>

                                                    <select name="category" id="category" class="form-control" onChange="getSubcategory(this.value)" required>
                                                        <option>--select category--</option>
                                                        @isset($data)
                                                        @foreach($data as $category)
                                                        <option  value="{{$category->category_id}}">{{$category->categoryname}}</option>  
                                                        @endforeach
                                                        @endisset
                                                    
                                                

                                                    <option value=""></option>
                                                    
                                                    </select>

                                                </div>

                                            </div>
                                            <div class="form-group">

                                                    <div class="col-xs-6">
                                                        <label for="email"><h4>Discription</h4></label>
    
                                                        <textarea class="form-control" rows="5" name="discription" id="discription" required></textarea>
                                                    </div>
                                                </div>
                                            <div class="form-group">

                                                <div class="col-xs-6">
                                                    <label for="phone"><h4>Price</h4></label>
                                                    <input type="number" class="form-control" name="price" id="price"  placeholder="enter price of the item in Rupees." required >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            
                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="mobile"><h4>Condition</h4></label><br>
                                                    <input type="radio" name="condition" value="Perfect" selected> Perfect<br>
                                                    <input type="radio" name="condition" value="Good"> Good<br>
                                                    <input type="radio" name="condition" value="Poor"> Poor
                                                </div>
                                            </div>
                                                

                                            <div class="form-group">
                                                <div class="col-xs-6">
                                                    <label for="mobile"><h4>Date</h4></label>
                                                    <input type="text" class="form-control" name="date" id="date" value="<?php echo date("Y.m.d");?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                    <div class="col-xs-6">
                                                        <label for="email"><h4>Pickup Address</h4></label>
    
                                                        <textarea class="form-control" rows="5" name="Pickup" id="Pickup" required></textarea>
                                                    </div>
                                                </div>

                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                        <br>


                                                        <button class="btn btn-lg btn-success" type="submit" name="submitform" id="submit" onClick="validate_dropdown()"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                                        <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                                                        <script type="text/javascript">
                                                        $('#submit').click(function(){
                                                            $(this).attr('disabled','true');
                                                        });
                                                        </script>
                                                    </div>
                                            </div>
                                        </div>
                                        </form>

                                    <hr>

                                    </div><!--/tab-pane-->

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

@include('seller.footer')
@else
    <?php 
        return redirect('/loginn');
    
    ?>
    @endif