<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp In Apna Bank</title>
</head>
<?php

$uploadDirectory = $_SERVER['DOCUMENT_ROOT'];
include $uploadDirectory . '/PHPauthemtication.php';

// include '../PHPauthemtication.php';
session_start();


if (isset($_POST['signupbtn'])) {

    $username = $_POST["username"];
    $useremail = $_POST["useremail"];
    $Password = $_POST["Password"];
    $confirmPassword = $_POST["confirmPassword"];



    if ($username == '' && $useremail == '' && $Password == '' && $confirmPassword == '') {
        echo " Please enter the correct Details try again";
        exit;
    } else {

        $sql = "SELECT adminUsername,adminEmail FROM admin_details WHERE  adminUsername= '$username' OR adminEmail='$useremail'";
        // Checking for valid username and password length
        // if (!preg_match("/^[a-zA-Z]{2,30}$/", $username)) {
        //     die("Please Enter a Valid Username");
        // }
        // if (!filter_var($useremail, FILTER_VALIDATE_EMAIL)) {
        //     die('Invalid email format');
        // }

        // echo $sql;
        $resultsql = $con->query($sql);
        $data = $resultsql->fetch_object();

        $dataUsername = $data->adminUsername;
        $dataemailid = $data->adminEmail;


        if ($dataUsername == $username) {
            echo "Please Choose Unique <b> Username</b>";
            exit;
        }
        if ($dataemailid == $useremail) {
            echo "Email is alerady exist";
            exit;
        }


        if ($Password == $confirmPassword) {


            $_SESSION["sessAdminUsername"] = $username;
            $_SESSION["sessAdminEmail"] = $useremail;
            $_SESSION["sessAdminPassword"] = $Password;
            header("Location: $uploadDirectory/Admin_details/Admin.php");

        } else {
            echo "Please enter same password in the place of confirm password";
            exit;
        }


    }



    // if ($con->query($sql) === TRUE) {
    //     echo "Record inserted successfully.";
    // } else {
    //     echo " Error: <br>" . $con->error;
    // }

$con->close();

}



?>

<style>
    body {
        display: flex;
        height: 96vh;
        width: 100vw;
        justify-content: center;
        align-items: center;
        /* filter: opacity(0.5); */
        background-image: url("../bank_images/images.png");
        background-position: center;
        background-size: cover;
        border-radius: 15px;

    }

    #wrapper {
        width: 315px;
        height: 315px;
        border: black 2px solid;
        border-radius: 10px;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        /* margin-top: 125px; */
        row-gap: 20px;
        /* z-index: 11; */
        background-color: rgba(197, 165, 165, 0.336);
        backdrop-filter: blur(3px);

    }

    input {
        width: 217px;
        height: 18px;
        border: 2px solid rgba(58, 54, 54, 0.76);
        border-radius: 5px;

        font-size: 15px;
        font-weight: bold;

    }

    #loninBtnVerfiy {
        width: 100px;
        height: 25px;
        border-radius: 15px;
        border-color: #000000;
        color: #fff;
        cursor: pointer;
        background-color: #3a2c2cc7;

    }

    #text {
        font-size: 22px;
        font-weight: bold;
        font-family: cursive;

    }

    .validation {
        height: auto;
        width: 217px;
        font-size: 12px;
        color: #ff0000e6;
        margin-top: 2px;
        text-align: center;
        position: absolute;
        display: none;
    }

    @media only screen and (max-width:254px) {
        body {
            overflow: hidden;
        }

        input {
            width: 73vw;
            height: 15px;

        }

        #Verifitiondiv {
            height: 94vh;
        }

        #text {
            font-size: 10vw;
        }
    }
</style>

<body>
    <div class="wrapper" id="wrapper">


        <span><b style="color: #000; font-size:18px;">SignUp as Administrator</b></span>
        <form action="./admin_signUp.php" method="POST" onsubmit="return validateForm()">

            <input type="text" name="username" id="UsernameVerfiy" placeholder="Enter Username"
                onkeyup="UsernameValidation(this.value)" />
            <!-- <br> -->
            <div class="validation usernameError"> </div>
            <br><br>
            <input type="email" name="useremail" id="UseremailVerfiy" placeholder="Enter E-mail">
            <div class="validation useremailError"> </div>
            <br><br>
            <input type="password" name="Password" id="passwordVerfiy" placeholder=" Enter Password"
                onkeyup="passwordValidation(this.value)" />
            <div class="validation PasswordError"> </div>
            <br><br>
            <!-- <span> -->
            <input type="password" name="confirmPassword" id="confirmpasswordVerfiy" placeholder=" confirm Password" onkeyup="confirmPasswordValidation(this.value)" />
            <div class="validation confirmPasswordError"> </div>
            <br>
            <br>
            <input type="submit" name="signupbtn" value="Sign Up" id="loninBtnVerfiy" disabled="disabled">
            <P style="font-size: 16px;"><a href="./adminLogin.php">LogIn</a></P>

        </form>

    </div>
</body>

<script>
    const usernameError = document.getElementById('usernameError');
    const useremailError = document.getElementById('useremailError');
    const PasswordError = document.getElementById('PasswordError');
    const confirmPasswordError = document.getElementById('confirmPasswordError');
    const signUpbtn = document.getElementById('loninBtnVerfiy');
    const validation = document.getElementsByClassName('validation');
    let validate = false;
    const lowerCase = new RegExp('(?=.*[a-z])');
    const upperCase = new RegExp('(?=.*[A-Z])');
    const specialCase = new RegExp('(?=.*[@#$%&^()])');
    const numberCase = new RegExp('(?=.*[0-9])');
    const lengthCase = new RegExp('(?=.{8})');
    // const numberCase = new RegExp('(?=.*[/\s/g])');
    // const spaceCase = /\s/g;

    // Username Validation
    function UsernameValidation(data) {
        const usernameValid = document.getElementById('UsernameVerfiy').value;

        if (usernameValid.length == 0) {
            validation[0].style.display = "none";
            validation[0].innerHTML = "";
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
            console.log('hello');
            console.log(data.length);
            return false;
        }


        if (!lowerCase.test(data)) {
            validation[0].style.display = "block";
            validation[0].innerHTML = "Enter at least one lower charater";
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
            validate = false;
            return false;
        } else {
            validation[0].style.display = "none";
            validation[0].innerHTML = "";
            validate = true;

        }


        if (!upperCase.test(data)) {
            validation[0].style.display = "block";
            validation[0].innerHTML = "Enter at least one Upper charater";
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
            validate = false;
            return false;
        } else {
            validation[0].style.display = "none";
            validation[0].innerHTML = "";
            validate = true;

        }


        if (!numberCase.test(data)) {
            validation[0].style.display = "block";
            validation[0].innerHTML = "Enter at least one Number";
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
            validate = false;
            return false;
        } else {
            validation[0].style.display = "none";
            validation[0].innerHTML = "";
            validate = true;

        }

        if (!specialCase.test(data)) {
            validation[0].style.display = "block";
            validation[0].innerHTML = "Enter at least one (@#$%&^)";
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
            validate = false;
            return false;
        } else {
            validation[0].style.display = "none";
            validation[0].innerHTML = "";
            validate = true;

        }

        if (!lengthCase.test(data)) {
            validation[0].style.display = "block";
            validation[0].innerHTML = "Enter at least 8 character length";
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
            validate = false;
            return false;
        } else {
            validation[0].style.display = "none";
            validation[0].innerHTML = "";
            validate = true;

        }

        if (validate == true) {
            // signUpbtn.remove.getattributes('disabled',);
            signUpbtn.removeAttribute('disabled');
            signUpbtn.style.opacity = "1";
            return validate = true;
        } else {
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
            return false;
        }



    }

    // password Validation
    function passwordValidation(data) {
        const password = document.getElementById('passwordVerfiy').value;
        if (password.length == 0) {
            validation[2].style.display = "none";
            validation[2].innerHTML = "";
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
            validate = false;
            return false;
        }


        if (!lowerCase.test(data)) {
            validation[2].style.display = "block";
            validation[2].innerHTML = "Enter at least one lower charater";
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
            validate = false;
            return false;
        } else {
            validation[2].style.display = "none";
            validation[2].innerHTML = "";
            validate = true;

        }


        if (!upperCase.test(data)) {
            validation[2].style.display = "block";
            validation[2].innerHTML = "Enter at least one Upper charater";
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
            validate = false;
            return false;
        } else {
            validation[2].style.display = "none";
            validation[2].innerHTML = "";
            validate = true;

        }


        if (!numberCase.test(data)) {
            validation[2].style.display = "block";
            validation[2].innerHTML = "Enter at least one Number";
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
            validate = false;
            return false;
        } else {
            validation[2].style.display = "none";
            validation[2].innerHTML = "";
            validate = true;

        }

        if (!specialCase.test(data)) {
            validation[2].style.display = "block";
            validation[2].innerHTML = "Enter at least one (@#$%&^)";
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
            validate = false;
            return false;
        } else {
            validation[2].style.display = "none";
            validation[2].innerHTML = "";
            validate = true;

        }

        if (!lengthCase.test(data)) {
            validation[2].style.display = "block";
            validation[2].innerHTML = "Enter at least 8 character length";
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
            validate = false;
            return false;
        } else {
            validation[2].style.display = "none";
            validation[2].innerHTML = "";
            validate = true;

        }

        if (validate == true) {
            // signUpbtn.remove.getattributes('disabled',);
            signUpbtn.removeAttribute('disabled');
            signUpbtn.style.opacity = "1";
            return validate = true;
        } else {
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
            return false;
        }

        console.log(data);

    }

    //confirm Password Validation
    function confirmPasswordValidation(data) {
        const password = document.getElementById('passwordVerfiy').value;
        const confirmPassword = document.getElementById('confirmpasswordVerfiy').value;
        console.log(password);
        console.log(confirmPassword);
        if (confirmPassword.length == 0) {
            validation[3].style.display = "none";
            validation[3].innerHTML = "";
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
            return false;
        }


        if (password !== confirmPassword) {
            validation[3].style.display = "block";
            validation[3].innerHTML = "Pasword does not match";
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
            validate = false;
            return false;
        } else if (password === confirmPassword) {
            validation[3].style.display = "none";
            validation[3].innerHTML = "";
            validate = true;

        }



        if (validate == true) {
            // signUpbtn.remove.getattributes('disabled',);
            signUpbtn.removeAttribute('disabled');
            signUpbtn.style.opacity = "1";
            return validate = true;
        } else {
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
            return false;
        }

        console.log(data);

    }


    // form validation
    function validateForm() {

        const username = document.getElementById('UsernameVerfiy').value;
        const useremail = document.getElementById('UseremailVerfiy').value;
        const confirmPassword = document.getElementById('confirmpasswordVerfiy').value;
        const validation = document.getElementsByClassName('validation');


        // if (validate == true) {
        //     // signUpbtn.remove.getattributes('disabled',);
        //     signUpbtn.removeAttribute('disabled');
        //     signUpbtn.style.opacity = "1";
        // } else {
        //     signUpbtn.setAttribute('disabled', 'disabled');
        //     signUpbtn.style.opacity = "0.7";
        //     return false;
        // }



        if (!username) {
            validation[0].style.display = "block";
            validation[0].innerHTML = "Please enter username.";

            return false;
        }
        if (!useremail) {
            validation[1].style.display = "block";
            validation[1].innerHTML = "Please enter email.";
            return false;
        }

        if (!password) {
            validation[2].style.display = "block";
            validation[2].innerHTML = "Please enter password.";
            return false;
        }

        if (password !== confirmPassword) {
            validation[3].style.display = "block";
            validation[3].innerHTML = "Passwords does not match.";
            return false;
        }


        return true;
    }
</script>

</html>