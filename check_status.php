<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cheak Status</title>
</head>
<?php
include "PHPauthemtication.php";
session_start();
if (!isset($_SESSION["username"]) || !isset($_SESSION["accountnumber"])) {
    header("Location: logIn.php");
    die();
}

// LogOut form the page
if (isset($_POST['logoutbtn'])) {
    session_destroy();
    header("Location:index.php");
    die();
}



?>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        /* overflow-x: hidden; */
        /* background-color: #ffffff; */


    }

    .header {
        width: 100%;
        height: 65px;
        /* width: 100vw;
        height: 65px; */
        text-align: center;
        margin-top: 20px;
        font-size: 55px;
        user-select: none;
        color: #838384ad;
        -webkit-text-stroke-width: 2px;
        /* -webkit-text-stroke-color: rgb(12, 12, 12); */
        -webkit-text-stroke-color: rgb(12 12 12 / 74%);

    }

    #logout {
        font-size: 23px;
    width: 109px;
    height: 34px;
        /* padding: 5px; */

        text-align: center;
        border-radius: 10px;
        cursor: pointer;
        font-weight: bold;
        /* -webkit-text-stroke-width: 0px; */
        background: #8080804d;
        color: #ff0000ba;
        box-shadow: 9px 6px 5px gray;
        display: flex;
        justify-content: center;
        align-items: center;
        user-select: none;
    }

    #logout:hover {
        background-color: #80808096;
        color: red;
    }

    .span1 {
        /* width: 100%; */
        height: 100px;
        /* background: #ff5722a6; */
        background: #d7d8dbab;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 18px;
        border-radius: 25px;
        box-shadow: 0px 0px 17px 4px black;
        user-select: none;
        transition: 0.2s;
    }

    .span1:hover {
        background: rgba(118, 156, 189, 0.562);
        border: 1px solid white;

    }

    .status_container {
        display: grid;
        grid-column: 3;
        grid-template-columns: 150px 150px 150px;
        grid-column-gap: 110px;
        grid-row-gap: 56px;
        /* margin-left: 190px; */
        margin-top: 50px;
        justify-content: center;
        margin-bottom: 25px;

    }

    .href_class {
        text-decoration: none;
        color: black;
        font-family: sans-serif;
        background-image: url('bank_images/images (7).jpeg');
        /* z-index: 10000; */
        background-position: center;
        background-size: cover;
        border-radius: 25px;
    }

    /* span:hover{
        position:absolute;
        z-index: 2;
        border-bottom: 2px solid white;

    } */


    @media only screen and (min-width:10px) and (max-width:445px) {
        body {
            overflow-x: hidden;
        }

        .header {
            font-size: 7vw;
            -webkit-text-stroke-width: 1px;
        }

        #logout {
            font-size: 14px;
            width: 66px;
            height: 24px;
            /* padding: 3px; */
        }

        .status_container {

            margin-top: 9px;
            grid-column: 1;
            grid-template-columns: 150px;
            grid-column-gap: 0px;
            grid-row-gap: 25px;
            margin-bottom: 25px;
        }

        .span1 {
            box-shadow: 0px 0px 8px 3px black;
            height: 87px;
        }
    }

    @media only screen and (min-width:445px) and (max-width:772px) {
        body {
            overflow-x: hidden;
        }

        .header {
            font-size: 7vw;
        }

        #logout {
            font-size: 17px;
            width: 84px;
            height: 28px;
        }

        .status_container {

            /* margin-top: 9px; */
            grid-column: 2;
            grid-template-columns: 150px 150px;
            grid-column-gap: 100px;
            grid-row-gap: 25px;
            margin-bottom: 25px;
        }

        .span1 {
            box-shadow: 0px 0px 8px 3px black;
            height: 87px;
        }
    }
</style>

<body>
    <div style=" width: 84vw; height: 65px;display: flex;align-items: baseline;">
        <!-- <h1 class="header">Account holder Dashboard</h1> -->
        <h1 class="header">User Account Dashboard</h1>
        <form method="post">
            <button id="logoutbtn" name="logoutbtn" style="border: none;">
                <span id="logout" name="logout">LogOut</span>
            </button>
        </form>
    </div>
    <div class="status_container">
        <a href="./profile_page.php" class="href_class">
            <div class="span1"> Profile</div>
        </a>
        <a href="./passbook.php" class="href_class">
            <div class="span1">Passbook </div>
        </a>
        <a href="./pay_UPi.php" class="href_class">
            <div class="span1">Pay via UPI</div>
        </a>
        <a href="./pay_account.php" class="href_class">
            <div class="span1">Pay via Account</div>

        </a>
        <a href="./cards/pay_Card.html" class="href_class">
            <div class="span1">Pay via card</div><!-- <div>debit card and credit card</div> -->
        </a>
        <a href="./Pay_EMI.html" class="href_class" target="_blank">
            <div class="span1">Pay EMI</div>
        </a>
        <a href="./deposit_mony.php" class="href_class">
            <div class="span1">Deposit Money</div>
        </a>
        <a href="./loan_details.html" class="href_class" target="_blank">
            <div class="span1">Loans details</div>
        </a>

        <!-- Some new Bank funtion on work it make the pages  -->
        <a href="./querie_help.html" class="href_class" target="_blank">
            <div class="span1">Active/Block Card</div>
        </a>
        <a href="./forgetPassword.php" class="href_class">
            <div class="span1">Change Password</div>
        </a>
        <a href="./updateUserDetails/selectUpdateProfile.php" class="href_class" target="_blank">
            <div class="span1">Update Profile</div>
        </a>
        <a href="./closeAccount.php" class="href_class">
            <div class="span1">Close Account</div>
        </a>
        <a href="./querie_help.html" class="href_class">
            <div class="span1">Queries</div>
        </a>

        
    </div>
    
    
    <!-- Footer of the website -->
          <!-- footer section -->
          <div id="footer-container" style="padding-top: 30px;">
          </div>
<script>
fetch('footer.html')
       .then(response => response.text())
       .then(data => {
           document.getElementById('footer-container').innerHTML = data;
       });
</script>
</body>


</html>