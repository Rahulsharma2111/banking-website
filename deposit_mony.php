<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposit Money</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-image: url("bank_images/deposits money.gif");
        background-position: center;
        background-size: cover;
        border-radius: 15px;
    }

    #despoitDetails {
        width: 300px;
        height: 270px;
        background-color: rgba(136, 235, 235, 0.425);
        text-align: center;
        padding-top: 46px;
        border-radius: 55px;
        border: 2px solid #e9e9e9;
        backdrop-filter: blur(3px);

    }

    label {
        font-size: 20px;
        font-weight: 500;
    }

    input {
        height: 25px;
        width: 230px;
        border-radius: 5px;
        padding-left: 10px;
        font-size: 15px;
        /* outline: none; */
        border: transparent;
        margin-bottom: 10px;
        margin-top: 3px;
    }

    #btnDeposit {
        width: 150px;
        height: 30px;
        border-radius: 10px;
        background: #0accccee;
        margin-top: 15px;
    }


    #radio {
        height: 35px;
        font-size: 19px;
        font-weight: 400;
        width: 100%;
        /* height: 25px; */
        margin: 0 6px 0 0px;
        /* text-align: center; */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .CheakButton {
        height: 20px;
        width: 37px;
    }

    #error {
        color: red;
        height: 40px;
        width: 98%;
        background-color: rgba(212, 112, 112, 0.623);
        border-bottom: red 2px solid;
        border-radius: 15px 15px 0 0;
        text-align: center;
        font-size: 30px;
        position: absolute;
        top: 5px;
        z-index: 10;
        transition: 0.1s;
        display: none;

    }
</style>
<?php
require 'PHPauthemtication.php';
session_start();
// echo "<script>
// alert ('you are not enter corect details');
// </script>";

if (!isset($_SESSION["username"]) || !isset($_SESSION["accountnumber"])) {
    header("Location: logIn.php");
    // exit;
}
$sessusername = $_SESSION["username"];
$sesspassword = $_SESSION["Password"];
$sessaccountnumber =  $_SESSION["accountnumber"];
$sql1 = "SELECT * FROM bankcustmordetails WHERE  username= '$sessusername' AND userpassword='$sesspassword' ";


$result = $con->query($sql1);

$data = $result->fetch_object();
// echo 


// if (isset($_POST['btnDeposit'])) {
//     $accountnumber = $_POST['accountNo']; #Account Number
//     $check = $_POST['CheakButton']; #    
//     $amount = $_POST['AmountToDepositt'];
//     $accNumberIsExitOrNot = $data->accountNumber;
// 
// 
//     if ($accountnumber != $accNumberIsExitOrNot) {
//         echo "Please Enter Correct Account Number";
//         exit;
//     }
// 
//     $selectTable = "SELECT * FROM accountdebitcreditdetails WHERE  accountNumber= '$accountnumber' ";
//     $selectTableResult = $con->query($selectTable);
//     $selectTabledata = $selectTableResult->fetch_object();
// 
// 
//     $BankBalance = $selectTabledata->accountBalance;
//     $updateBankBalance = $BankBalance + $amount;
// 
//     $InsertAmount = "UPDATE accountdebitcreditdetails SET accountBalance = '$updateBankBalance' WHERE accountdebitcreditdetails.accountNumber = '    $selectTabledata->accountNumber '";
// 
// 
//     $con->query($InsertAmount);
// 
// 
//     $paymentDetails = $selectTabledata->DebitAndCreditDetails;
// 
// 
// 
//     if ($paymentDetails != null) {
//         date_default_timezone_set('Asia/Kolkata');
//         $currentDate = date("Y-m-d");
//         $currentTime = date("H:i:s");
//         $newTransaction = array(
//             "type" => "debit",
//             "amount" => $amount,
//             "bankbalance" => $updateBankBalance,
//             "date" => $currentDate,
//             "time" => $currentTime,
//             "method" => $check
//         );
// 
//         // Add the new transaction to the existing transactions array
//         $decodedPaymentDetails = json_decode($paymentDetails, true);
//         $decodedPaymentDetails['transactions'][] = $newTransaction;
//         $updatedPaymentDetails = json_encode($decodedPaymentDetails);
// 
//         $updateQuery = "UPDATE accountdebitcreditdetails
//                     SET DebitAndCreditDetails = '$updatedPaymentDetails'
//                     WHERE accountNumber = '$selectTabledata->accountNumber'";
// 
//         $con->query($updateQuery);
// 
//         echo "Deposit succesfully";
//         
// 
//         // echo "<pre>";
//         // print_r($decodedPaymentDetails);
//         // echo "</pre>";
//         
//     }


// }



// $con->close();
?>

<body>
    <div id="error"> </div>
    <form action="deposit_mony.php" method="post">
        <div id="despoitDetails">
            <label for="accountNo.">Account Number</label><br>
            <input type="number" name="accountNo" id="accountNo." value="<?php echo $data->accountNumber; ?>">

            <br>
            <div id="radio"><input type="radio" value="Cash" id="cash" name="CheakButton" class="CheakButton" checked>
                <label for="cash">Cash</label>
                <input value="Check" type="radio" id="check" name="CheakButton" class="CheakButton"><label for="check">
                    Check</label>
            </div>
            <label for="AmountToDeposit">Amount to deposit</label><br>
            <input type="number" name="AmountToDepositt" id="AmountToDepositt" placeholder="Amount">
            <button id="btnDeposit" name="btnDeposit">Deposit</button>
            <!-- <button id="btnDeposit" onclick="depoistMoney()">Deposit</button> -->
        </div>
    </form>


</body>



<?php 
// include 'allfunctionHere.php';
if (isset($_POST['btnDeposit'])) {
    $accountnumber = $_POST['accountNo']; #Account Number
    $check = $_POST['CheakButton']; #    
    $amount =abs( $_POST['AmountToDepositt']);
    $accNumberIsExitOrNot = $data->accountNumber;


    if ($accountnumber != $accNumberIsExitOrNot) {
        echo "Please Enter Correct Account Number";
        exit;
    }

    //function is calling in allfunctionHere.php(otpfunc()) page
 
    // $OTP=otpfunc();
    // echo $OTP;

    //otp script
    // echo "<script>
    // var UserEnterOTP = prompt('Please enter OTP is $OTP payment is deposit amount is Rs.$amount, Please do not share OTP anyone ');
    // 
    // if(UserEnterOTP!=$OTP){
    // console.log('enter correct OTP');
    // 
    // }
    // </script>";

    $selectTable = "SELECT * FROM accountdebitcreditdetails WHERE  accountNumber= '$accountnumber' ";
    $selectTableResult = $con->query($selectTable);
    $selectTabledata = $selectTableResult->fetch_object();


    $BankBalance = $selectTabledata->accountBalance;
    $updateBankBalance = $BankBalance + $amount;
        
    $InsertAmount = "UPDATE accountdebitcreditdetails SET accountBalance = '$updateBankBalance' WHERE accountdebitcreditdetails.accountNumber = '    $selectTabledata->accountNumber '";


    $con->query($InsertAmount);


    $paymentDetails = $selectTabledata->DebitAndCreditDetails;



    if ($paymentDetails != null) {
        date_default_timezone_set('Asia/Kolkata');
        $currentDate = date("Y-m-d");
        $currentTime = date("H:i:s");
        $newTransaction = array(
            "type" => "Debit",
            "amount" => $amount,
            "bankbalance" => $updateBankBalance,
            "date" => $currentDate,
            "time" => $currentTime,
            "method" => $check,
            "Payment_To"=>"self"
        );

        // Add the new transaction to the existing transactions array
        $decodedPaymentDetails = json_decode($paymentDetails, true);
        $decodedPaymentDetails['transactions'][] = $newTransaction;
        $updatedPaymentDetails = json_encode($decodedPaymentDetails);

        $updateQuery = "UPDATE accountdebitcreditdetails
                    SET DebitAndCreditDetails = '$updatedPaymentDetails'
                    WHERE accountNumber = '$selectTabledata->accountNumber'";

        $con->query($updateQuery);

        echo "Deposit succesfully";
        

        // echo "<pre>";
        // print_r($decodedPaymentDetails);
        // echo "</pre>";
        // 
    }





echo "<script defer>
        const errorDisplay = document.getElementById('error'); 
        errorDisplay.style.display = 'block';
        errorDisplay.style.color = 'green';
        errorDisplay.style.backgroundColor = '#4ac6439f';
        errorDisplay.style.border = 'green';
        errorDisplay.style.borderBottom = 'green 2px solid';
        errorDisplay.innerText = ' Deposit successful!';

    

    var time = setInterval(() => {
        errorDisplay.style.display = 'none';
        
    }, 4000);   

        </script>";


}

$con->close();


?>



<!-- <script defer>


    // console.log(localStorage.getItem('accountNumber'));
    const accountNo = document.getElementById("accountNo.");
    accountNo.value = localStorage.getItem('accountNumber');
    // const accnumber = localStorage.getItem('accountNumber');


    function depoistMoney() {

        const AmountToDeposit = document.getElementById("AmountToDepositt").value;

        console.log(AmountToDeposit);
        const errorDisplay = document.getElementById("error");
        if (localStorage.getItem('accountNumber') == accountNo.value) {

            if (AmountToDeposit == "" || AmountToDeposit <= 0) {
                errorDisplay.style.display = "block";
                errorDisplay.innerText = "Please enter a valid amount";

                var time = setInterval(() => {
                    errorDisplay.style.display = "none";
                    
                }, 4000);

            } else {
                const enterPassword = prompt('Please enter Profile Password');
                const password = localStorage.getItem('password');
                if (enterPassword == password) {
                    OTP();
                    function OTP() {
                        var OtpVerfication = Math.trunc(Math.random() * 999999);
                        var UserEnterOTP = prompt(`Please enter OTP is ${OtpVerfication} payment is deposit amount is Rs.${AmountToDeposit}
                        Please do not share OTP anyone `);

                        // funtion for passbook make link and details
                        function passbookEnter() {

                           
                            // tran type is cash or check




                            var openAccountDate = new Date;
                            var date = openAccountDate.getDate();
                            var month = openAccountDate.getMonth();
                            var year = openAccountDate.getFullYear();
                            var hour = openAccountDate.getHours();
                            var min = openAccountDate.getMinutes();
                            var sec = openAccountDate.getSeconds();

                            const trancationDate = date + "-" + month + "-" + year;
                            const trancationTime = hour + ":" + min + ":" + sec;
                            const AfterDeposit = localStorage.getItem('AccountBalance');


                            var CheakButton = document.getElementsByName("CheakButton");

                            for (let i = 0; i <= CheakButton.length - 1; i++) {
                                if (CheakButton[i].checked) {
                                    const CheckCash = CheakButton[i].value;


                                    const trancation = "Deposit_by:/" + CheckCash + "/--" + "/Date/" + trancationDate + "/time/" + trancationTime + "/tranType/Credit/amount/" + AmountToDeposit + "/AccountBalance/" + AfterDeposit;
                                    // data retrive form localStorage
                                    console.log(trancation)

                                    const trancationDetails = JSON.parse(localStorage.getItem('trancation'));
                                    // var tranNo = String((trancationDetails))

                                    console.log(trancationDetails);

                                    if (trancationDetails == null) {
                                        let data = [trancation];
                                        localStorage.setItem('trancation', JSON.stringify(data));

                                    }
                                    else {
                                        trancationDetails.push(trancation);
                                        localStorage.setItem('trancation', JSON.stringify(trancationDetails));

                                    }

                                }

                            }

 

                        }
                        if (UserEnterOTP == OtpVerfication) {
                            if (localStorage.getItem('AccountBalance') == null || localStorage.getItem('AccountBalance') == undefined) {


                                localStorage.setItem('AccountBalance', AmountToDeposit);


                                //funtion call for data store
                                passbookEnter();


                                errorDisplay.style.display = "block";
                                    errorDisplay.style.color = "green";
                                    errorDisplay.style.backgroundColor = "#4ac6439f";
                                    errorDisplay.style.border = "green";
                                    errorDisplay.style.borderBottom = "green 2px solid";
                                    errorDisplay.innerText = " Deposit successful!";

                                

                                var time = setInterval(() => {
                                    errorDisplay.style.display = "none";
                                    window.location.reload();
                                }, 4000);
                            }
                            else {
                                const accBalance = localStorage.getItem('AccountBalance');
                                //  amount to deposit is updated 

                                var r = parseInt(AmountToDeposit) + parseInt(accBalance);
                                localStorage.setItem('AccountBalance', r);

                                //funtion call for data store
                                passbookEnter();



                                errorDisplay.style.display = "block";
                                    errorDisplay.style.color = "green";
                                    errorDisplay.style.backgroundColor = "#4ac6439f";
                                    errorDisplay.style.border = "green";
                                    errorDisplay.style.borderBottom = "green 2px solid";
                                    errorDisplay.innerText = " Deposit successful!";

                                

                                var time = setInterval(() => {
                                    errorDisplay.style.display = "none";
                                    window.location.reload();
                                }, 4000);
                            }

                        } else {
                            errorDisplay.style.display = "block";
                                errorDisplay.innerText = "Please enter corret OTP";

                                var time = setInterval(() => {
                                    errorDisplay.style.display = "none";
                                    window.location.reload();
                                }, 4000);
                            
                            

                        }
                    }
                } else {
                    errorDisplay.style.display = "block";
                                errorDisplay.innerText = "Please enter correct password";

                                var time = setInterval(() => {
                                    errorDisplay.style.display = "none";
                                }, 4000);
                }

            }
        } else if (localStorage.getItem('accountNumber') != accountNo.value) {
            errorDisplay.style.display = "block";
                                errorDisplay.innerText = "Please enter corret Account number";

                                var time = setInterval(() => {
                                    errorDisplay.style.display = "none";
                                }, 4000);
        }
        else if (accountNo == "") {
            errorDisplay.style.display = "block";
                                errorDisplay.innerText = "Please enter your account number";

                                var time = setInterval(() => {
                                    errorDisplay.style.display = "none";
                                }, 4000);
            return false;
        }

        else {
            errorDisplay.style.display = "block";
                                errorDisplay.innerText = "something wrong Please try after some time";

                                var time = setInterval(() => {
                                    errorDisplay.style.display = "none";
                                     window.location.reload();
                                }, 4000);
           

        }

    }




</script> -->

</html>