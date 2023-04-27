<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <title>SignUp Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
</head>

<body>
    <!-- main -->
   
    <div class="main-w3layouts wrapper">
        <h1> SignUp Form</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="{{ url('register-user') }}" method="post">
                    @csrf
                    @if (count($errors))
                        @foreach ($errors->all() as $error)
                            <div style="color: black;"> {{ $error }}</div>
                        @endforeach
                    @endif
                    <input class="text" type="text" name="username" placeholder="Username"
                        value="{{ old('username') }}" required>
                    <input class="text email" type="email" name="email" placeholder="Email"
                        value="{{ old('email') }}" required>
                    <input class="text email" type="password" name="password" placeholder="Password"
                        value="{{ old('password') }}" required>
                    <input class="text email" type="password" name="password_confirmation"
                        placeholder="Confirm Password" required>
                    <input class="text" type="text" name="firstName" placeholder="Firstname"
                        value="{{ old('firstName') }}" required>
                    <input class="text email" type="text" name="lastName" placeholder="Lastname"
                        value="{{ old('lastName') }}" required>
                    <input class="text email" type="text" name="address" placeholder="Address"
                        value="{{ old('address') }}" required>
                    <input class="text email" type="date" name="dob" placeholder="dob"
                        value="{{ old('dob') }}" required>
                    <input class="text email" type="text" name="postcode" placeholder="Postcode"
                        value="{{ old('postcode') }}" required>
                    {{-- <input type="text"> --}}

                    <input class="text email" type="text" name="phonenumber" placeholder="Phone Number"
                        value="{{ old('phonenumber') }}" required>
                    {{-- <input class="text w3lpass" type="password" name="password" placeholder="Confirm Password"
							required=""> --}}
                    {{-- <label  for="gender">gender</label> --}}
                    <select name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <select name="role">
                        <option value="parent">Parent</option>
                        <option value="swimmer">Swimmer</option>
                        <option value="coach">Coach</option>
                    </select>
                    <div class="wthree-text">
                        <label class="anim">
                            <input type="checkbox" class="checkbox" required>
                            <span>I Agree To The Terms & Conditions</span>
                        </label>
                        <div class="clear"> </div>
                    </div>
                    <input type="submit" value="SIGNUP">
                    <link rel="stylesheet" href="css/regi.css">
                </form>
                <p>Have an Account? <a href="login"> Login Now!</a></p>
            </div>
        </div>
        <!-- copyright -->
        <div class="colorlibcopy-agile">
            <p></a></p>
        </div>
        <!-- //copyright -->
        <ul class="colorlib-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <!-- //main -->
</body>

</html>
