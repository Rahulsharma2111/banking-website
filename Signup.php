<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp In Apna Bank</title>
</head>
<style>
    #errorDisplay {
        width: 100%;
        height: 40px;
        /* display: flex; */
        align-items: center;
        justify-content: center;
        position: fixed;
        top: 0px;
        margin-top: 0px;
        background-color: #969292ba;
        color: #ff0000bf;
        font-size: 20px;
        font-weight: bold;
        display: none;
        /* z-index: 1111; */
        border-radius: 20px;
    }
</style>
<script>
    let errorDisplay = document.getElementById('errorDisplay');
    function errorHideTime() {
        errorDisplay.style.display = "none";
    }
</script>
<?php
require './PHPauthemtication.php';
session_start();


if (isset($_POST['signupbtn'])) {

    $username = $_POST["username"];
    $useremail = $_POST["useremail"];
    $Password = $_POST["Password"];
    $confirmPassword = $_POST["confirmPassword"];


    if ($username == '' || $useremail == '' || $Password == '' || $confirmPassword == '') {
        // echo "<script></script>";
        if (empty($username) || $username == '') {
            echo "<script>
                errorDisplay.style.display = 'flex';
                errorDisplay.innerHTML = 'Please Enter Username';
                setInterval(errorHideTime, 6000);
            </script>";
            die();

        }
        if (empty($useremail) || $useremail == '') {
            echo "<script>
                errorDisplay.style.display = 'flex';
                errorDisplay.innerHTML = 'Please Enter Email';
                setInterval(errorHideTime, 6000);
            </script>";
            die();

        }
        if (empty($Password) || $Password == '') {
            echo "<script>
                errorDisplay.style.display = 'flex';
                errorDisplay.innerHTML = 'Please Enter Password';
                setInterval(errorHideTime, 6000);
            </script>";
            die();

        }
        if (empty($confirmPassword) || $confirmPassword == '') {
            echo "<script>
                errorDisplay.style.display = 'flex';
                errorDisplay.innerHTML = 'Please Enter confirm Password';
                setInterval(errorHideTime, 6000);
            </script>";
            die();

        }
        // echo "hdjd";
        // exit;
    } else {

        $sql1 = "SELECT username,emailid FROM bankcustmordetails WHERE  username= '$username' OR emailid='$useremail'";
        // 
        $resultsql1 = $con->query($sql1);
        $data = $resultsql1->fetch_object();
        $dataUsername = $data->username;
        $dataemailid = $data->emailid;

        // if ($dataUsername = $data->username==null) {
//     echo "You are not allow";
// }


        // if ($dataUsername == $username || $dataemailid == $useremail) {
        if ($dataUsername == $username) {
            echo "Please Choose Unique <b> Username</b>";
            exit;
        }
        if ($dataemailid == $useremail) {
            echo "Email is aleady exit";
            exit;
        }


        if ($Password == $confirmPassword && !empty($username) && !empty($useremail) && !empty($Password) && !empty($confirmPassword)) {


            $_SESSION["username"] = $username;
            $_SESSION["useremail"] = $useremail;
            $_SESSION["Password"] = $Password;

            header("Location:open_account.php");

        } else {
            echo "Please enter same password in the place of confirm password";
            exit;
        }


    }



    if ($con->query($sql1) === TRUE) {
        echo "Record inserted successfully.";
    } else {
        // header("alert.html");
        echo " Error: <br>" . $con->error;
    }

}


$con->close();


?>
<style>
    body {
        display: flex;
        height: 100vh;
        width: 100vw;
        justify-content: center;
        align-items: center;
        /* filter: opacity(0.5); */
        background-image: url("bank_images/login money.gif");
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

    #signUpbtn {
        width: 100px;
        height: 25px;
        border-radius: 15px;
        border-color: #000000;
        color: #fff;
        background-color: #3a2c2cc7;
        opacity: 0.7;
        cursor: pointer;

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


        <span><b style="color: #000; font-size:18px;">Sign Up in Apna Bank</b></span>
        <div id="errorDisplay"></div>
        <form action="./Signup.php" method="POST" onsubmit="return validateForm()">

            <input type="text" name="username" id="UsernameVerfiy" placeholder="Enter Username"
                onkeyup="UsernameValidation(this.value)" />
            <!-- <br> -->
            <div class="validation usernameError"> </div>
            <br><br>
            <input type="email" name="useremail" id="UseremailVerfiy" placeholder="Enter E-mail">
            <div class="validation useremailError"> </div>
            <br><br>
            <!-- <span style="width: 100%;height: 100%;"> -->
            <input type="password" name="Password" id="passwordVerfiy" placeholder=" Enter Password"
                onkeyup="passwordValidation(this.value)" />
            <!-- <span style="position: absolute;right: 35px;display: flex;align-items: center;justify-content: center;"><b>R</b></span> -->
            <!-- </span> -->
            <div class="validation PasswordError"> </div>
            <br><br>
            <!-- <span> -->
            <input type="password" name="confirmPassword" id="confirmpasswordVerfiy" placeholder=" confirm Password"
                onkeyup="confirmPasswordValidation(this.value)" />
            <!-- </span> -->
            <div class="validation confirmPasswordError"> </div><br>
            <br>

            <input type="submit" name="signupbtn" value="Sign Up" id="signUpbtn" disabled="disabled">

            <P style="font-size: 16px;"><a href="./logIn.php">LogIn</a>
                <br>
                <a href="./Admin_details/admin_signUp.php">SignUp As Admin</a>
            </P>


        </form>

    </div>
</body>

<script>

    const usernameError = document.getElementById('usernameError');
    const useremailError = document.getElementById('useremailError');
    const PasswordError = document.getElementById('PasswordError');
    const confirmPasswordError = document.getElementById('confirmPasswordError');
    const signUpbtn = document.getElementById('signUpbtn');
    const validation = document.getElementsByClassName('validation');
    let validate = false;
    const lowerCase = new RegExp('(?=.*[a-z])');
    const upperCase = new RegExp('(?=.*[A-Z])');
    const specialCase = new RegExp('(?=.*[@#$%&^()])');
    const numberCase = new RegExp('(?=.*[0-9])');
    const lengthCase = new RegExp('(?=.{8})');
    // const numberCase = new RegExp('(?=.*[/\s/g])');
    // const spaceCase = /\s/g;

    // check the submit button is visible or not
    function updateSignUpButton(validate) {
        if (validate) {
            signUpbtn.removeAttribute('disabled');
            signUpbtn.style.opacity = "1";
        } else {
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
        }
    }


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


        updateSignUpButton(validate);
        // if (validate == true) {
        //     // signUpbtn.remove.getattributes('disabled',);
        //     signUpbtn.removeAttribute('disabled');
        //     signUpbtn.style.opacity = "1";
        //     return validate = true;
        // } else {
        //     signUpbtn.setAttribute('disabled', 'disabled');
        //     signUpbtn.style.opacity = "0.7";
        //     return false;
        // }


    }

    // password Validation
    function passwordValidation(data) {
        const password = document.getElementById('passwordVerfiy').value;
        if (password.length == 0) {
            validation[2].style.display = "none";
            validation[2].innerHTML = "";
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
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
            signUpbtn.setAttribute('disabled', 'disabled');
            signUpbtn.style.opacity = "0.7";
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


        updateSignUpButton(validate);
        // if (validate == true) {
        //     // signUpbtn.remove.getattributes('disabled',);
        //     signUpbtn.removeAttribute('disabled');
        //     signUpbtn.style.opacity = "1";
        //     return validate;
        // } else {
        //     signUpbtn.setAttribute('disabled', 'disabled');
        //     signUpbtn.style.opacity = "0.7";
        //     return false;
        // }

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
            updateSignUpButton(validate);
            return validate;
        }


        // updateSignUpButton(validate);
        // if (validate == true) {
        //     // signUpbtn.remove.getattributes('disabled',);
        //     signUpbtn.removeAttribute('disabled');
        //     signUpbtn.style.opacity = "1";
        //     return validate;
        // } else {
        //     signUpbtn.setAttribute('disabled', 'disabled');
        //     signUpbtn.style.opacity = "0.7";
        //     return false;
        // }

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

        updateSignUpButton(validate);
        validate = true;
        return validate;
    }




    //     const validation = document.getElementsByClassName('validation')[0];
    //     validation.style.display = "none"; // Hide any previous error messages
    //     validation.innerHTML = ""; // Clear previous error messages
    //
    //     if (!lowerCase.test(data)) {
    //         validation.style.display = "block";
    //         validation.innerHTML += " - Must include at least one lowercase character.<br>";
    //     }
    //
    //     if (!upperCase.test(data)) {
    //         validation.style.display = "block";
    //         validation.innerHTML += " - Must include at least one uppercase character.<br>";
    //     }
    //
    //     if (!numberCase.test(data)) {
    //         validation.style.display = "block";
    //         validation.innerHTML += " - Must include at least one number.<br>";
    //     }
    //
    //     if (!specialCase.test(data)) {
    //         validation.style.display = "block";
    //         validation.innerHTML += " - Must include at least one special character (@#$%&^).<br>";
    //     }
    //
    //     if (!lengthCase.test(data)) {
    //         validation.style.display = "block";
    //         validation.innerHTML += " - Must be at least 8 characters long.<br>";
    //     }
    //
    //     return validation.style.display === "none";









    //     function useremailValidtion(data) {
    //         const validation = document.getElementsByClassName('validation');
    //
    //         const pattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
    //         // const comCase = new RegExp('(?=.*[c-o-m])');
    //
    //         if (pattern.test(data) ) {
    //             validation[1].style.display = "block";
    //             validation[1].innerHTML = "Enter correct E-mail";
    //             return;
    //         } else {
    //             validation[1].style.display = "none";
    //         }
    //         console.log(data);
    //     }

</script>




</html>