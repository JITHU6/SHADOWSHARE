@extends('layouts.menubar')
@section('cont')


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <!-- Adding oh-autoVal css style -->
    <!-- <link rel="stylesheet" type="text/css" href="css/oh-autoval-style.css"> -->

    <!-- <link rel="stylesheet" type="text/css" href="regvalidation/css/screen.css"> -->
    <!-- Adding jQuery script. It must be before other script files -->

    <link rel="stylesheet" type="text/css" href="css/regform.css">

</head>

<body>
    <div class="bgcolor" style="margin-top:8%;">

        <form id="regForm" name="registration" action="/regaction" method=" POST">
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
            <h4 style="margin-top:-12%;">Register Here!</h4>
            <br><br>
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
                <p><input placeholder="Full name..." name="name"></p>
                <p><input placeholder="Mobile number..." name="phone"></p>
                <p><input placeholder="E-mail..." name="email"></p>
                @isset($a)
                <p><input name="cat" value="{{$a}}" readonly>
                </p>
                @else
                <div class="single-element-widget">
                    <h5 class="mb-30 title_color"></h5>
                    <div class="default-select" id="default-select">
                        <select name="catname" id="catname" class=" input">
                            <option disabled selected value> -- select Category -- </option>
                            @isset($category)
                            @foreach($category as $category)
                            <option value="{{$category->category_id}}">{{$category->categoryname}}</option>
                            @endforeach
                            @endisset

                        </select>
                    </div>
                </div>
                @endif<br>
                <p><input placeholder="Address line 1..." oninput="this.className = ''" name="add1"></p>

                <p><input placeholder="Address lne 2..." oninput="this.className = ''" name="add2"></p>

                <div class="single-element-widget">
                    <h5 class="mb-30 title_color"></h5>
                    <div class="default-select" id="default-select">
                        <select name="state" id="state" class=" input">
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
                        <select name="district" id="district" class=" input">
                            <option disabled selected value> -- select district -- </option>

                        </select>
                    </div>
                </div>
                <div class="single-element-widget">
                    <h5 class="mb-30 title_color"></h5>
                    <div class="default-select" id="default-select">
                        <select name="panchayath" id="panchayath" class=" input">
                            <option disabled selected value> -- select panchayath -- </option>

                        </select>
                    </div>
                </div><br>
                <p><input placeholder="Pincode..." oninput="this.className = ''" name="pincode"></p>
                <p><input type="password" placeholder="Password..." id="password" name="password" onclick="ps()"
                        oninput="this.reportValidity()"></p>
                <p><input type="password" placeholder="Confirm Password..." id="password_confirm" oninput="check(this)"
                        name="cpassword"></p>
            </div>
            <script language='javascript' type='text/javascript'>
            function check(input) {
                if (input.value != document.getElementById('password').value) {
                    input.setCustomValidity('Passwords are not Matching');
                } else {
                    input.setCustomValidity('');
                }

            }
            </script>

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

    <script src="admin/js/jquery-3.3.1.js"></script>
    <!-- form validation -->
    <script src="regvalidation/js/jquery.validate.js"> </script>
    <script src="regvalidation/js/additional-methods.js"> </script>
    <script src="regvalidation/js/valid.js">
    </script>
    <!-- ajax state -->
    <script src=" js/state.js"> </script>
</body>

</html> @endsection