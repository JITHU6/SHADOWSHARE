@if(session()->has('seller'))


@include('seller.sellerheader')

@include('seller.nav')

<div id="wrapper">
    @include('seller.sidebar')
    <div id="content-wrapper">
        <div class="container-fluid" style="margin-top:5%;">
            <label for="last_name">
                <h4>Equipments Added</h4>
            </label>
            <div class="row" style="margin-top:5%;">

                @isset($data)


                @foreach($data as $list)

                <div class="col-md-4">
                    <div class="card text-white bg-secondary flex-md-row mb-4 shadow-sm h-md-250">
                        <div class="card-body d-flex flex-column align-items-start ">
                            <strong class="d-inline-block mb-4 text-white">
                                <h2>{{$list->cname}}</h2>
                            </strong>
                            <h5 class="mb-0">
                                Condition:<a class="text-white" href="#">{{$list->condition}}</a>
                            </h5>
                            <div class="mb-1 text-white-50 small">{{$list->updated_at}}</div>
                            {{-- <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p> --}}
                            <!-- {{-- <a class="btn btn-outline-light btn-sm" role="button" data-toggle="modal" id="save{{$list->equipment_id}}" data-target="#product_view"  >More Detailes</a> --}} -->
                            <input class="btn btn-outline-light btn-sm" type="button" role="button" data-toggle="modal"
                                data-target="#product_view" name="itemdetails" id="itemdetails{{$list->equipment_id}}"
                                value="More Details" onclick="more('{{$list->equipment_id}}')">
                        </div>
                        <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]"
                            src="uploads/equipment/{{$list->image}}" style="width: 200px; height: 250px;">
                    </div>
                </div>
                @endforeach
                @endisset

                <div class="modal pt-5 product_view " id="product_view" area-hiddden="true">
                    <div class=" modal-dialog" style="width:120%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <a href="#" data-dismiss="modal" class=" class pull-left">Close</span></a>
                                <h3 class="modal-title"> </h3>

                            </div>
                            <form method="POST" action="/updateitem" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">

                                        <div class="col-md-6 product_img" id="image">


                                        </div>

                                        <div class="col-md-6 product_content">
                                            <h4>Product Category:</h4> <span id="name"></span>
                                            <h4>Product Category:</h4> <span id="cat"></span>

                                            <h4>About: <span id="about"></span></h4>



                                            <h3 class="cost">Price: <span class="glyphicon glyphicon-usd"></span>
                                                <small id="price" class="cost"><span class="glyphicon glyphicon-usd"
                                                        id="price"></span>
                                                </small></h3>
                                            <div class="row">
                                                <div class="col-md-6 product_content">
                                                    <h4>Condition:</h4> <span id="cond"></span>

                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class="col-md-6 product_content">
                                                    <h4>PickupAddress: <span id="picka"></span></h4>
                                                    <h4>Updated date: <span id="date"></span></h4>
                                                    {{-- <p> <input type="text"  name="name" id="name" class="form-control "  value=" " readOnly></p> --}}
                                                </div>
                                            </div>
                                            <div class="space-ten"></div>
                                            <div class="btn-ground">
                                                <button type="button" class="btn btn-primary" id="up"
                                                    onClick="Updateitem()"><span
                                                        class="glyphicon glyphicon-shopping-cart"></span>
                                                    Update</button>
                                                <button type="button" style="display:none;" class="btn btn-primary"
                                                    id="done"><span class="glyphicon glyphicon-shopping-cart"></span>
                                                    Done</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>



            </div>

        </div>

    </div>
</div>


<script src="seller/js/itemdetails.js"></script>
<script src="seller/js/update.js"></script>
@include('seller.footer')
@else
<?php 
 return redirect('/loginn');

?>
@endif