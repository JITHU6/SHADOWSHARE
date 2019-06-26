@if(session()->has('sponsor'))
<html>

<head>
    <link rel="icon" href="../../images/images.png" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js"></script>
    <div style="background:#004eff">
        <!-- If you're using Stripe for payments -->
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
</head>

<body background=#004eff style="overflow: hidden">
    <div class="container" style="padding-top:5%;;padding-bottom:5%">
        <div class="row" style="padding-left:30%">
            <!-- You can make it whatever width you want. I'm making it full width
             on <= small devices and 4/12 page width on >= medium devices -->
            <div class="col-xs-12 col-md-7">


                <!-- CREDIT CARD FORM STARTS HERE -->
                <div class="panel panel-default credit-card-box" style="padding:10px">
                    <div class="panel-heading display-table">
                        <div class="row display-tr">
                            <h3 class="panel-title display-td" align=left style="font-size:25px"><b>Payment Details</b>
                            </h3>
                            <div class="display-td">
                                <img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
                            </div>
                        </div>
                    </div>
                    //startloop
                    <div class="panel-body">
                        <form role="form" id="payment-form" method="POST" action="#">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="cardNumber">Bank</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                            <select class="form-control" autofocus name="banktype">
                                                <option value="FCC">Federal Bank Credit Card</option>
                                                <option value="FDC">Federal Bank Debit Card</option>
                                                <option value="OCC">Other Bank Creadit Card</option>
                                                <option value="ODC">Other Bank Debit Card</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="cardNumber">CARD NUMBER</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                            <input type="tel" class="form-control" name="cardnumber"
                                                placeholder="Valid Card Number" autocomplete="cc-number" required />

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span
                                                class="visible-xs-inline">EXP</span> DATE</label>
                                        <div class="col-xs-6 col-md-6">
                                            <select name="month" class="form-control">
                                                <option value="Jan">Jan</option>
                                                <option value="Feb">Feb</option>
                                                <option value="Mar">Mar</option>
                                                <option value="Apr">Apr</option>
                                                <option value="May">May</option>
                                                <option value="Jun">Jun</option>
                                                <option value="Jul">Jul</option>
                                                <option value="Aug">Aug</option>
                                                <option value="Sept">Sept</option>
                                                <option value="Oct">Oct</option>
                                                <option value="Nov">Nov</option>
                                                <option value="Dec">Dec</option>
                                            </select>
                                        </div>
                                        <!-- <div class="col-xs-6 col-md-6">

                                            {{ $earliest_year = 2040}}

                                            <select name="year" class="form-control">

                                                @foreach (range(date('Y'), $earliest_year) as $x)

                                                <option value="{{$x}}">{{$x}}</option>
                                                @endforeach
                                            </select>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 pull-right">
                                    <div class="form-group">
                                        <label for="cardCVC">CVV</label>
                                        <input type="tel" class="form-control" name="cardCVV" placeholder="CVV"
                                            autocomplete="cc-csc" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="couponCode">Name</label>
                                        <input type="text" class="form-control" name="holdername"
                                            onkeyup="this.value = this.value.toUpperCase();"
                                            placeholder="Card Holder Name" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <div align=left class="col-xs-6"> <label style="font-size:14px">###</label>
                                        </div>
                                        <div align=right class="col-xs-6"> <label style="font-size:20px">₹###</label>
                                        </div>
                                    </div>
                                </div>
                            </div>loopend
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="hidden" name="price" value="###">
                                    <input type="hidden" name="mid" value="####">
                                    <input class="subscribe btn btn-success btn-lg btn-block" type="submit"
                                        value="Payment">
                                </div>
                            </div>
                            <div class="row" style="display:none;">
                                <div class="col-xs-12">
                                    <p class="payment-errors"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- CREDIT CARD FORM ENDS HERE -->


            </div>
        </div>
</body>

</html>

@else
<?php 
 return redirect('/loginn');

?>
@endif