@extends('layout.menubar')
@section('menu')
<!DOCTYPE html>
<html>
    <head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
 <!-- Adding oh-autoVal css style -->
 <link rel="stylesheet" type="text/css" href="css/oh-autoval-style.css">
 <!-- Adding jQuery script. It must be before other script files -->

 <script src="js/amalvalidation/jquery.min.js"> </script>
 <!-- Adding oh-autoVal script file -->
 <script src="js/amalvalidation/oh-autoval-script.js"></script>
 <script src="js/valid.js"></script>
<style>
* {

    box-sizing: border-box;
}

body {
    background-color: #f1f1f1;
}

#regForm {
    background-color: #ffffff;
    margin: -100px auto;
    font-family: Raleway;
    padding: 200px;
    width: 70%;
    min-width: 300px;
}

h1 {
    text-align: center;
}

h4 {
    text-align: center;
}

input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
}

.input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
    background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
    display: none;
}

button {
    background-color: #4CAF50;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer;
}

button:hover {
    opacity: 0.8;
}

#prevBtn {
    background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
    height: 15px;
    width: 15px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: inline-block;
    opacity: 0.5;
}

.step.active {
    opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
    background-color: #4CAF50;
}

.bgcolor {
    background-color: #4CAF50;
}
</style>
</head>
<body>
    <div class="bgcolor">

        <form id="regForm" action="/regaction" method=" POST" onsubmit="return" class="oh-autoval-form">
            @csrf
            <div>
                <h1>Register Here!</h1>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h4>Personal Details:</h4><br><br>
            <div>
                    @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
            </div>
            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <div class="single-element-widget">
                    <!-- <h5 class="mb-30 title_color">Selectboxes</h5> -->
                    <!-- <div class="default-select" id="default-select">
                        <select class="input" require>
                            <option value="1">---select category--</option>
                            <option value="1">Spanish</option>
                            <option value="1">Arabic</option>
                            <option value="1">Portuguise</option>
                            <option value="1">Bengali</option>
                        </select> 
                </div> -->
                </div>
                <p><input type="text" placeholder="Full name..."  name="name" class="av-username" av-message="Enter valid username"></p>
                <p><input placeholder="Mobile number..." oninput="this.className = ''" name="phone" class="av-mobile" av-message="Invalid mobile number"></p>
                <p><input placeholder="E-mail..." oninput="this.className = ''" name="email" class="av-email" av-message="Invalid  Email"></p>
                <p><input placeholder="Address line 1..." oninput="this.className = ''" name="add1" class="av-username" av-message="Invalid Address"></p>

                <p><input placeholder="Address lne 2..." oninput="this.className = ''" name="add2" class="av-username" av-message="Invalid Address"></p>

                <div class="single-element-widget">
                    <h5 class="mb-30 title_color"></h5>
                    <div class="default-select" id="default-select" >
                        <select  name="state" id="state" class="av-required input" av-message="select state" required>
                                <option disabled selected value> -- select state -- </option>
                                @isset($state)
                                @foreach($state as $states)
                                <option value="{{$states->state_id}}">{{$states->sname}}</option>  
                                @endforeach
                                @endisset

                        </select>
                    </div>
                </div>
                <div class="single-element-widget">
                    <h5 class="mb-30 title_color"></h5>
                    <div class="default-select" id="default-select">
                        <select  name="district" id="district" class="av-required input" av-message="select state"required>
                                <option disabled selected value> -- select district -- </option>
            
                        </select>
                    </div>
                </div>
                <div class="single-element-widget">
                    <h5 class="mb-30 title_color"></h5>
                    <div class="default-select" id="default-select" >
                        <select  name="panchayath" id="panchayath" class="av-required input" av-message="select state"required >
                                <option disabled selected value> -- select panchayath -- </option>

                       </select>
                    </div>
                </div>
                
                    
                <p><input placeholder="Pincode..." oninput="this.className = ''" name="pincode" class="av-pincode"  av-message="invalid pincode"></p>
                <p><input type="password" placeholder="Password..." id="password" name="password" required onclick="ps()" oninput="this.reportValidity()" ></p>
                <p><input type="password" placeholder="Confirm Password..." id="password_confirm" oninput="check(this)"  name="cpassword" ></p>
            </div>
            <script language='javascript' type='text/javascript'>
                function check(input) 
                {
                    if(input.value != document.getElementById('password').value)
                    {
                        input.setCustomValidity('Passwords are not Matching');
                    }
                    else{
                        input.setCustomValidity('');
                    }

                } 
                </script>
            <!-- <div class="tab">Contact Info:

                <h3 class="mb-30 title_color">Form Element</h3>
                <div class="input-group-icon mt-10">
                    <div class="form-select" id="default-select">
                        <select class="input">
                            <option value="1">--category--</option>
                            <option value="1">Dhaka</option>
                            <option value="1">Dilli</option>
                            <option value="1">Newyork</option>
                            <option value="1">Islamabad</option>
                        </select>
                    </div>
                </div>
                <div class="input-group-icon mt-10 ">
                    <input type="text" class="input" name="" placeholder="Case Title" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Case Title'" required class="single-input">
                </div>
                <div class="input-group-icon mt-10">
                    <input type="text" class="input" name="address" placeholder="Goal Amount"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Goal Amount'" required
                        class="single-input">
                </div>
                <div class="input-group-icon mt-10">
                    <div class="form-select" id="default-select">
                        <select class="input">
                            <option value="1">--Required Equipment--</option>
                            <option value="1">Dhaka</option>
                            <option value="1">Dilli</option>
                            <option value="1">Newyork</option>
                            <option value="1">Islamabad</option>
                        </select>
                    </div>
                </div>
                <div class="input-group-icon mt-10">
                    <input type="text" class="input" name="Beneficiary Name" placeholder="Beneficiary Name"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Beneficiary Name'" required
                        class="single-input">
                </div>
                <div class="input-group-icon mt-10">
                     <div class="icon"><i class="fa fa-globe" aria-hidden="true"></i></div> 
            <div class="form-select" id="default-select2">
                <select class="input">
                    <option value="1">--Relation with Benefiaciary--</option>
                    <option value="1">Sibiling</option>
                    <option value="1">Parent</option>
                    <option value="1">Relative</option>
                    <option value="1">Other</option>
                </select>
            </div>
    </div>
    <div class="input-group-icon mt-10">
        <div class="icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i></div>
        <input type="text" class="input" name="Location" placeholder="Location" onfocus="this.placeholder = ''"
            onblur="this.placeholder = 'Location'" required class="single-input">
    </div>
    <div class="switch-wrap d-flex justify-content-between">
        <p>Agree to the terms</p>
        <div class="primary-checkbox">
            <input type="checkbox" id="primary-checkbox" checked>
            <label for="primary-checkbox"></label>
        </div>
    </div>

    </div> -->
            {{-- <div class="tab">Verification

                <p>Registered Phone Number:</p>
                <p><input placeholder="123456789..." oninput="this.className = ''" name="vaddress"></p>
                <p><input type="submit" id="prevBtn" oninput="this.className = ''" name="Register"></p>
                <p>OTP:</p>
                <p><input placeholder="enter otp send to your mobile..." oninput="this.className = ''" name="vaddress">
                </p>
            </div> --}}
            


            <!-- <div class="tab">Login Info:
  <p><input placeholder="Verification..." oninput="this.className = ''" name="vaddress"></p>
    <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
  </div> -->
            <div style="overflow:auto;">
                <div style="float:right;">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="submit" name="sub" value="Submit" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    
                </div>
            </div>
            <!-- Circles which indicates the steps of the form: -->
            <div style="text-align:center;margin-top:40px;">
                <span class="step"></span>

                <span class="step"></span>

            </div>
        </form>
    </div>
    <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
    </script>
<script src="js/state.js"> </script>
</body>

</html>
@endsection