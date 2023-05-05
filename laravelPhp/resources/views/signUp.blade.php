<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mock project</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box
    }

    /* Full-width input fields */
    input[type=text], input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* Set a style for all buttons */
    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    button:hover {
        opacity: 1;
    }

    /* Extra styles for the cancel button */
    .cancelbtn {
        padding: 14px 20px;
        background-color: #f44336;
    }

    /* Float cancel and signup buttons and add an equal width */
    .cancelbtn, .signupbtn {
        float: left;
        width: 50%;
    }

    /* Add padding to container elements */
    .container {
        padding: 16px;
    }

    /* Clear floats */
    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    /* Change styles for cancel button and signup button on extra small screens */
    @media screen and (max-width: 300px) {
        .cancelbtn, .signupbtn {
            width: 100%;
        }
    }
</style>

<script>

    function validateSignUpForm() {
        if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($('#user_name').val()))) {
            $('#validateEmai').text('Email is not valid!');
            $('#validateEmai').show();
            return
        }
        if ($('#password').val().length < 8) {
            $('#validatePassword').text('Password must be at least 8 characters');
            $('#validatePassword').show();
            return;
        }
        if ($('#password').val() != $('#rePassword').val()) {
            $('#validateRePassword').text('Password and Repeat Password must be the same');
            $('#validateRePassword').show();
            return;
        }

        $('#formForSignUp').submit();

    }

</script>
<body>

<form action="{{route('signupComplete')}}" style="border:1px solid #ccc" method="post" id="formForSignUp">
    @csrf
    <div class="container">
        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="email"><b>Email</b></label>
        @if($errors->login->get('user_name'))
            <div style="color: red">{{$errors->login->get('user_name')[0]}}</div>
        @endif
         <div style="color: red" hidden id="validateEmai"></div>
        <input type="text" placeholder="Enter Email" name="user_name" id="user_name" value="{{old('user_name')}}"
               required>

        <label for="psw"><b>Password</b></label>
        <div style="color: red" id='validatePassword' hidden></div>
        <input type="password" placeholder="Enter Password" name="password" id="password" value="{{old('password')}}"
               required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <div style="color: red" id='validateRePassword' hidden></div>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" id="rePassword" required>

        <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
        </label>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">
            <button type="button" class="cancelbtn" id="cancelId">Cancel</button>
            <button type="button" class="signupbtn" onclick="validateSignUpForm()">Sign Up</button>
        </div>

    </div>
</form>
<script>
    document.getElementById("cancelId").onclick = function () {
        location.href = '/login'
    }
</script>

</body>
</html>
