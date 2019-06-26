@extends('layouts.menubar')
@section('cont')


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!-- Adding oh-autoVal css style -->
    <link rel="stylesheet" type="text/css" href="css/oh-autoval-style.css">
    <!-- Adding jQuery script. It must be before other script files -->

    <link rel="stylesheet" type="text/css" href="css/regform.css">
</head>

<body>
    <div class="bgcolor" style="margin-top:8%;">

        <form id="regForm" action="/sponsorregaction" method=" POST">
            @csrf

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h4 style="margin-top:-12%;">Register Here!</h4><br><br>
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
                <p><input type="text" placeholder="Full name..." name="name"></p>
                <p><input placeholder=" Mobile number..." name="phone"></p>
                <p><input placeholder="E-mail..." name="email"></p>
                <p><input placeholder="Address line 1..." name="add1"></p>

                <p><input placeholder="Address lne 2..." name="add2"></p>

                <div class="single-element-widget">
                    <h5 class="mb-30 title_color"></h5>
                    <div class="default-select" id="default-select">
                        <select name="state" id="state" class="input">
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
                        <select name="district" id="district" class="input" required>
                            <option disabled selected value> -- select district -- </option>

                        </select>
                    </div>
                </div>
                <div class="single-element-widget">
                    <h5 class="mb-30 title_color"></h5>
                    <div class="default-select" id="default-select">
                        <select name="panchayath" id="panchayath" class="input" required>
                            <option disabled selected value> -- select panchayath -- </option>

                        </select>
                    </div>
                </div>


                <p><input placeholder="Pincode..." oninput="this.className = ''" name="pincode"></p>
                <p><input type="password" placeholder="Password..." id="password" name="password"></p>
                <p><input type="password" placeholder="Confirm Password..." id="confirm_password" name="cpassword"></p>
            </div>

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
                    <button type="submit" name="sub" value="Submit" id="nextBtn"
                        onclick="validatePassword()">Next</button>

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

    <script>
    var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirm_password");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
    </script>
    <script src="admin/js/jquery-3.3.1.js"></script>

    <!-- form validation -->
    <script src="regvalidation/js/jquery.validate.js"> </script>
    <script src="regvalidation/js/additional-methods.js"> </script>
    <script src="regvalidation/js/valid.js"> </script>
    <script src="js/state.js"> </script>
</body>

</html>
@endsection