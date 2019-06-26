@if(session()->has('seller'))
@extends('layouts.sellermenubar')
@section('content')

<body style="background-image: url(needya/images/temp/slide-14.jpg);">
    <section class="section">
        <div class="container" style=" width:70%;margin-top:-10%;background-color:#46B5B5;border-radius: 10px">
            <div class=" col-md-12 card" style="margin-top:5%;">
                <h5 class="project-title" itemprop="name">
                    Add Product</h5>
            </div>
            <div class=" col-12" style="background:#F7F7F7">
                <div class="row">

                    <div class="col-sm-2"><a href="/users" class="pull-right"><img class="img-circle img-responsive"
                                src=""></a></div>
                </div>
                <div class="right">
                    @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('message')}}
                    </div>
                    @endif
                </div>
                <div class="row ">

                    <!--left col-->


                    <form class="form" action="/additem" method="post" name="registrationForm" id="registrationForm"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-3 mt-5">
                            <div class="text-center mt-10" style="margin-left:3%;">

                                <img src=" seller/images/item.png" name="image" id="image"
                                    class="avatar img-circle img-thumbnail">

                                <h6>Upload photo of Item</h6>
                                <input type="file" name="itemimage" id="itemimage"
                                    class="text-center center-block file-upload" style="width:90%;" accept=""
                                    onchange="readURL(this);">

                                <font color="#FF0000" size="+1" face="Courier New, Courier, monospace">


                                </font>
                            </div>
                            </hr><br>



                        </div>
                        <!--/col-3-->
                        <div class="col-sm-9">



                            <div class="tab-content">
                                <div class="tab-pane active" id="home">
                                    <hr>
                                    <div class="col-6">
                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="first_name">
                                                    <h6>Equipment Name</h6>
                                                </label>
                                                <input type="text" class="form-control" name="item_name" id="item_name"
                                                    placeholder="Item Name">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="last_name">
                                                    <h6>Category</h6>
                                                </label>

                                                <select name="category" id="category" class="form-control"
                                                    onChange="getSubcategory(this.value)">
                                                    <option value="">--select category--</option>
                                                    @isset($data)
                                                    @foreach($data as $category)
                                                    <option value="{{$category->category_id}}">
                                                        {{$category->categoryname}}
                                                    </option>
                                                    @endforeach
                                                    @endisset



                                                    <option value=""></option>

                                                </select>

                                            </div>

                                        </div>
                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="email">
                                                    <h6>Discription</h6>
                                                </label>

                                                <textarea class="form-control" rows="5" name="discription"
                                                    id="discription"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="phone">
                                                    <h6>Price</h6>
                                                </label>
                                                <input type="number" class="form-control" name="price" id="price"
                                                    placeholder="enter price of the item in Rupees.">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mobile">
                                                    <h6>Condition</h6>
                                                </label><br>
                                                <div class="radio">
                                                    <input type="radio" id="Perfect" name="condition" value="Perfect"
                                                        checked>
                                                    <label for="Perfect" selected> Perfect</label>
                                                </div>
                                                <div class="radio">
                                                    <input type="radio" id="Good" name="condition" value="Good">
                                                    <label for="Good"> Good&nbsp;&nbsp;&nbsp;&nbsp;</label> </div>
                                                <div class="radio">
                                                    <input type="radio" id="Poor" name="condition" value="Poor">
                                                    <label for="Poor"> Poor&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mobile">
                                                    <h6>Date</h6>
                                                </label>
                                                <input type="text" class="form-control" name="date" id="date"
                                                    value="<?php echo date("Y.m.d");?>" readOnly>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <label for="email">
                                                    <h6>Pickup Address</h6>
                                                </label>

                                                <textarea class="form-control" rows="5" name="Pickup" id="Pickup"
                                                    required></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12" style="margin-bottom:5%;">
                                                <br>


                                                <button class=" btn btn-lg btn-success" type="submit" name="submitform"
                                                    id="submit" onClick="validate_dropdown()"><i></i> Add</button>
                                                <button class="btn btn-lg" type="reset"><i></i> Reset</button>
                                                <script type="text/javascript">
                                                $('#submit').click(function() {
                                                    $(this).attr('disabled', 'true');
                                                });
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                    </form>

                    <hr>

                </div>
                <!--/tab-pane-->

            </div>
            <!--/tab-content-->

        </div>
        <!--/col-9-->
        </div>
        <!--/row-->

        <!-- /.row -->

        <!-- /#page-wrapper -->


        <!-- /#wrapper -->

        <!-- jQuery -->


        </div>
        </div>
    </section>
</body>
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#image').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<script src="admin/js/jquery-3.3.1.min.js"></script>
<script src="regvalidation/js/jquery.validate.js"> </script>
<script src="regvalidation/js/additional-methods.js"> </script>
<script src="regvalidation/js/extension.js"> </script>
<script src="seller/js/addequipmentvalid.js"></script>
@endsection
@else
<?php 
        return redirect('/loginn');
    
    ?>
@endif