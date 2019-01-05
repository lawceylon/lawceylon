@extends('main.app')\
{{-- not in use --}}
@section('headSection')
<style>
    #background{
        background-image:url('/images/backgrounds/bg-2.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center; 
    }
</style>
<link rel="stylesheet" type="text/css" href="/css/piyumika.css">
<script type="text/javascript" src="/js/piyumika.js"></script>
@endsection
@section('content')
<body class="pbody"  id="background">
    <div class="container">
        <div class="palert palert-info" style="color:#0E145E">
            @if(session()->has('message'))
                {{ session()->get('message') }}
            @endif
        </div>
        <div class="pform">
            <form action="{{ route('reglawyer.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="ph1">
                    <h1>Lawyer Registration</h1>
                </div>
                <fieldset>
                    <legend><span class="number">1</span>Your basic info</legend>
                    <label class="plabel" for="honorific">Honorific:</label>
                    <select id="honorific" name="honorific">
                        <option value="Dr">Dr</option>
                        <option value="Mr">Mr</option>
                        <option value="Miss">Miss</option>
                        <option value="Mrs">Mrs</option>
                        
                    </select>
                    <label class="plabel" for="firstName">First Name:</label>
                    <input  type="ptext" id="first Name" name="firstName" pattern="[a-zA-Z. ]{2,30}"  required/><span></span>
                    
                    <label class="plabel" for="lastName">last Name:</label>
                    <input type="ptext" id="last Name" name="lastName" pattern="[a-zA-Z. ]{2,30}"  required><span ></span>
                    
                    <label class="plabel">Gender:</label>
                    <input type="radio" id="gender" value="male" name="gender"><label for="gender" class="light" required>male</label>
                    <input type="radio" id="gender" value="female" name="gender"><label for="gender" class="light" required>female</label><br><br>
                    
                    <label class="plabel" for="email">Email:</label><br>
                    <input type="email" id="email" name="Email" pattern="{6,}"  required ><span ></span>
                
                    <label class="plabel" for="nic">NIC/Passport Number:</label>
                    <input type="ptext" id="NIC" name="NIC/passportNumber"pattern="[V0-9]{10}"  required><span ></span>
                    
                    <label class="plabel" for="barnumber">Bar Number:</label>
                    <input type="ptext" id="bar" name="barnumber"pattern="[V0-9]{10}"  required><span ></span>
                
                    <label class="plabel" for="password">Password:</label>
                    <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,30}"  required><span ></span><br>
                    
                    <div id="message">
                        <h6>Password must contain the following:</h6>
                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                        <p id="number" class="invalid">A <b>number</b></p>
                        <p id="length" class="invalid">Minimum <b>5 characters</b></p>
                    </div>
                
                    <script>
                        var myInput = document.getElementById("password");
                        var letter = document.getElementById("letter");
                        var capital = document.getElementById("capital");
                        var number = document.getElementById("number");
                        var length = document.getElementById("length");

                        // When the user clicks on the password field, show the message box
                        myInput.onfocus = function() {
                        document.getElementById("message").style.display = "block";
                        }

                        // When the user clicks outside of the password field, hide the message box
                        myInput.onblur = function() {
                        document.getElementById("message").style.display = "none";
                        }

                        // When the user starts to type something inside the password field
                        myInput.onkeyup = function() {
                        // Validate lowercase letters
                        var lowerCaseLetters = /[a-z]/g;
                        if(myInput.value.match(lowerCaseLetters)) {  
                            letter.classList.remove("invalid");
                            letter.classList.add("valid");
                        } else {
                            letter.classList.remove("valid");
                            letter.classList.add("invalid");
                        }

                        // Validate capital letters
                        var upperCaseLetters = /[A-Z]/g;
                        if(myInput.value.match(upperCaseLetters)) {  
                            capital.classList.remove("invalid");
                            capital.classList.add("valid");
                        } else {
                            capital.classList.remove("valid");
                            capital.classList.add("invalid");
                        }

                        // Validate numbers
                        var numbers = /[0-9]/g;
                        if(myInput.value.match(numbers)) {  
                            number.classList.remove("invalid");
                            number.classList.add("valid");
                        } else {
                            number.classList.remove("valid");
                            number.classList.add("invalid");
                        }

                        // Validate length
                        if(myInput.value.length >= 5) {
                            length.classList.remove("invalid");
                            length.classList.add("valid");
                        } else {
                            length.classList.remove("valid");
                            length.classList.add("invalid");
                        }
                        }
                    </script>

                    <label class="plabel" for="password_confirmation">Confirm Password:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" onkeyup="checkPass(); " required ><br>
                    <span id="confirmMessage" class="confirmMessage"></span>
                </fieldset>

                <fieldset>
                    <legend><span class="number">2</span>Your profile</legend>
                    <label class="plabel" for="bio">Biography:</label>
                    <textarea id="bio" name="biography"></textarea>
                </fieldset>
                
                <fieldset>
                    <label class="plabel" for="job">Specialist Area:</label>
                    <select id="job" name="Specialist_Area" required>
                        <option value="All">All</option>
                        <option value="Debt Recovery">Debt Recovery</option>
                        <option value="Business">Business</option>
                        <option value="Contracts and Litigation">Contracts and Litigation</option>
                        <option value="Criminal Charges">Criminal Charges</option>
                        <option value="Employment and Labor">Employment and Labor</option>
                        <option value="Family">Family</option>
                        <option value="Government and Health">Government and Health</option>
                        <option value="Immigration">Immigration</option>
                        <option value="Intellectual Property">Intellectual Property</option>
                        <option value="Personal Injury">Personal Injury</option>
                        <option value="Real Estate">Real Estate</option>
                        <option value="Taxation">Taxation</option>
                        <option value="Trusts and Estates">Trusts and Estates</option>
                        <option value="Company Secretarial">Company Secretarial</option>
                        <option value="Notarial Services">Taxation</option>
                    </select>
                    <br>
                    <br>
                    <label class="plabel" for="profile image"style="display: inline-block;">Profile Image(.jpg/.png)</label>
                    <br>
                    <input type="file" name="file" id="file">
                    <br>
                    <br>
                    @if(count($errors)>0)
                        <ul style="color: red">
                            @foreach($errors->get('file') as $error)
                                <li>{{$error}}</li>  
                            @endforeach
                        </ul>
                    @endif
                    <label class="plabel" for="experiance_years">Experience Years:</label>
                    <input type="number" id="Experience_Period" name="Experience_Period" min="0" required><span ></span>
                        @if(count($errors)>0)
                            <ul style="color: red">
                                @foreach($errors->get('Experience_Period') as $error)
                                    <li>{{$error}}</li>  
                                @endforeach
                            </ul>
                        @endif
                    <label class="plabel" for="service_place">Service Place:</label>
                    <input type="ptext" id="Address" name="Address" max="100">
                    <label class="plabel" for="tpnumber">Contact number:</label>
                    <input type="ptel" id="TP_Number" name="TP_Number" pattern="[0-9]{10}" required><span></span>
                    @if(count($errors)>0)
                        <ul style="color: red">
                            @foreach($errors->get('TP_Number') as $error)
                                <li>{{$error}}</li>  
                            @endforeach
                        </ul>
                    @endif
                    <label class="plabel" for="fee">Online Consultation Fee(per hour):</label>
                    <input type="ptext" id="consultationFee" name="consultationFee" placeholder="LKR">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"><br/>
                    <input type="submit" class="pbutton" align="right"value= "Sign Up" >
                </fieldset>
            </form> 
        </div>
    </div>
</body>
@endsection