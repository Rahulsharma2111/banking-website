<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPI Pay</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    #container {
        /* background-color: aquamarine; */
        width: 100vw;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url("bank_images/qrCode.gif");
        background-position: center;
        background-size: cover;
        border-radius: 15px;
    }

    #UPIsection {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border: 2px black solid;
        border-radius: 15px;
        padding: 20px;
        backdrop-filter: blur(2px);
    }

    #InputPay {
        display: flex;
        flex-direction: column;
        width: 250px;
        margin-top: 10px;
    }

    #scanner {
        height: 184px;
        width: 175px;
        border: 2px solid black;
        background-color: #4a79e17a;

    }

    label {
        text-align: center;
        font-size: 18px;
        font-weight: 500;
        font-family: serif;
        color: #ffff;
    }

    input {
        margin-bottom: 5px;
        height: 24px;
        font-size: 15px;
        font-weight: bold;
        padding-left: 7px;

    }

    #line {
        width: 100%;
        height: 3px;
        background-color: rgb(250, 249, 249);
        position: relative;
        animation: scanLine 6s infinite linear;
    }

    @keyframes scanLine {

        0%,
        100% {

            top: 0px;
        }

        50% {
            top: 182px;
        }


    }

    #activeupi {
        bottom: 55px;
        position: absolute;
        font-size: 20px;
        font-weight: bold;
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

    /* #activeupi {
        cursor: pointer;
        color: rgb(65, 30, 121);
        border-bottom: 2px solid rgb(65, 30, 121);
    } */
    #UPINumber {
        color: rgb(0, 0, 0);
        position: relative;
        top: -10px;
        font-size: 16px;
    }

    #yourId {
        color: rgba(7, 74, 150, 0.877);
    }

    /* #UPIsection{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    } */

    @media only screen and (min-width:100px) and (max-width:255px) {
        #UPIsection {
            transform: scaleX(0.7);
        }

        #UPINumber {
            font-size: 12px;
        }

        input {
            margin-bottom: 2px;
            height: 18px;
            font-size: 13px;
            font-weight: normal;
        }

        #scanner {
            height: 91px;
            width: 140px;
        }


        #line {
            animation: scanLinee 6s infinite linear;
        }

        @keyframes scanLinee {

            0%,
            100% {

                top: 0px;
            }

            50% {
                top: 87px;
            }

        }
    }

    @media only screen and (min-width:255px) and (max-width:300px) {
        #UPINumber {
            font-size: 13px;
        }


        #InputPay {
            width: 200px;

        }

        input {
            height: 20px;
        }

    }
</style>
<?php
include 'PHPauthemtication.php';
session_start();

if (!isset($_SESSION["username"]) || !isset($_SESSION["accountnumber"])) {
    header("Location: logIn.php");
    // exit;
}
$sessusername = $_SESSION["username"];
$sesspassword = $_SESSION["Password"];
$sessaccountnumber = $_SESSION["accountnumber"];
echo $sessusername."<br>";
echo $sesspassword."<br>";
echo $sessaccountnumber."<br>";

$sql1 = "SELECT * FROM bankcustmordetails WHERE  username= '$sessusername' AND userpassword='$sesspassword' ";


$result = $con->query($sql1);

$data = $result->fetch_object();
    
    // echo  $data->accountNumber;

?>

<body>
    <div id="container">
        <div id="error"></div>
        <!-- <div class="allcontant"> -->
        <form action="pay_UPi.php" method="POST">
        <div id="UPIsection">
            <div id="UPINumber">Your UPI ID: <span id="yourId">
                    <?php echo $data->mobilenumber . "@apnabank" ?>
                </span></div>
            <div id="scanner">
                <div id="line"></div>
            </div>
            <p style="font-size: 17px; color: #ffff;">Scanning.....</p>
            <div id="InputPay">
                <label for="ReciversUPIid">UPI Id</label>
                <input type="text" id="ReciversUPIid" name="ReciversUPIid" placeholder="UPI Id">
                <label for="UPIamount">Amount</label>
                <input type="number" id="UPIamount" name="UPIamount" placeholder="Amount">
                <!-- <input id="PayViaUPI" name="PayViaUPI" value="PAY"
                    style="text-align: center;padding-left: 0px;margin-top: 10px;cursor: pointer;" readonly> -->
                    
                    <button id="PayViaUPI" name="PayViaUPI" style="text-align: center;padding-left: 0px;margin-top: 10px;cursor: pointer;" >PAY</button>
            </div>
        </div>
        </form>
        <!-- </div> -->
        <!-- <div id="activeupi">Active your UPI Id</div> -->
    </div>
</body>

<?php
if (isset($_POST['PayViaUPI'])) {
    $ReciversUPIid = $_POST['ReciversUPIid'];
    $amount = $_POST['UPIamount'];
    $accNumberIsExitOrNot = $data->accountNumber;
echo $accNumberIsExitOrNot."<br>";

    if ($sessaccountnumber != $accNumberIsExitOrNot) {
        echo "Something Wrong Please Try again";
        exit;
    }


    $selectTable = "SELECT * FROM accountdebitcreditdetails WHERE  accountNumber= '$sessaccountnumber' ";
    $selectTableResult = $con->query($selectTable);
    $selectTabledata = $selectTableResult->fetch_object();


    $BankBalance = $selectTabledata->accountBalance;
echo $BankBalance;

    $updateBankBalance = $BankBalance - $amount;
    if ($BankBalance < $amount) {
        echo "you does not suffciant balance";
        // exit;
        return;
    }
    $InsertAmount = "UPDATE accountdebitcreditdetails SET accountBalance = '$updateBankBalance' WHERE accountdebitcreditdetails.accountNumber = '    $selectTabledata->accountNumber '";


    $con->query($InsertAmount);


    $paymentDetails = $selectTabledata->DebitAndCreditDetails;



    if ($paymentDetails != null) {
        date_default_timezone_set('Asia/Kolkata');
        $currentDate = date("Y-m-d");
        $currentTime = date("H:i:s");
        $newTransaction = array(
            "type" => "Credit",
            "amount" => $amount,
            "bankbalance" => $updateBankBalance,
            "date" => $currentDate,
            "time" => $currentTime,
            "method" => "UPI/Online",
            "Payment_To" => $ReciversUPIid
        );

        // Add the new transaction to the existing transactions array
        $decodedPaymentDetails = json_decode($paymentDetails, true);
        $decodedPaymentDetails['transactions'][] = $newTransaction;
        $updatedPaymentDetails = json_encode($decodedPaymentDetails);

        $updateQuery = "UPDATE accountdebitcreditdetails
                    SET DebitAndCreditDetails = '$updatedPaymentDetails'
                    WHERE accountNumber = '$selectTabledata->accountNumber'";

        $con->query($updateQuery);

        echo "Payment succesfully";

        if ($con->query($selectTable) === TRUE) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . $selectTable . "<br>" . $con->error;
        }

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
        errorDisplay.innerText = ' Payment successful!';

    

    var time = setInterval(() => {
        errorDisplay.style.display = 'none';
        
    }, 4000);   

        </script>";


}

$con->close();


?>
<!-- <script>

    const UPIPhonenumber = localStorage.getItem('MobileNumber');
    const upiAddnumber = UPIPhonenumber + "@apanaBank";
    localStorage.setItem('UPI_number', upiAddnumber)


    document.getElementById('yourId').innerHTML = localStorage.getItem('UPI_number');
    document.getElementById('PayViaUPI').addEventListener('click', () => {
        const errorDisplay = document.getElementById('error');
        let UPIid = document.getElementById('ReciversUPIid').value;
        let UPIamount = document.getElementById('UPIamount').value;
        const accBal = localStorage.getItem('AccountBalance');

        if (UPIid != '') {


            if (UPIamount != '' && UPIamount > !0 && UPIamount != 0) {


                if (accBal > parseInt(UPIamount)) {

                    const enterPassword = prompt('Please enter Profile Password');
                    const password = localStorage.getItem('password');
                    if (enterPassword == password) {

                        OTP();
                        function OTP() {
                            var OtpVerfication = Math.trunc(Math.random() * 999999);
                            var UserEnterOTP = prompt(`Please enter OTP is ${OtpVerfication} payment is decdacted Rs.${UPIamount}.
                        Please do not share OTP anyone `);

                            if (UserEnterOTP == OtpVerfication) {


                                // after decation amount is 
                                var afterDedaction = parseInt(accBal) - parseInt(UPIamount);
                                // console.log(afterDedaction);

                                localStorage.setItem('AccountBalance', afterDedaction)

                                // To Storage the trascation in locastorage



                                var openAccountDate = new Date;
                                var date = openAccountDate.getDate();
                                var month = openAccountDate.getMonth();
                                var year = openAccountDate.getFullYear();
                                var hour = openAccountDate.getHours();
                                var min = openAccountDate.getMinutes();
                                var sec = openAccountDate.getSeconds();

                                const trancationDate = date + "-" + month + "-" + year;
                                const trancationTime = hour + ":" + min + ":" + sec;


                                const trancation = "payment_by:/" + "UPI/" + UPIid + "/Date/" + trancationDate + "/time/" + trancationTime + "/tranType/Debit/amount/" + UPIamount + "/AccountBalance/" + afterDedaction;
                                // data retrive form localStorage

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








                                errorDisplay.style.display = "block";
                                errorDisplay.style.color = "green";
                                errorDisplay.style.backgroundColor = "#4ac6439f";
                                errorDisplay.style.border = "green";
                                errorDisplay.style.borderBottom = "green 2px solid";
                                errorDisplay.innerText = "Payment sucessful !";

                                var time = setInterval(() => {
                                    errorDisplay.style.display = "none";
                                    window.location.reload();

                                }, 3000);
                                // alert("Payment successful!");

                            }

                            else {

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
                        errorDisplay.innerText = "enter valid password Trasaction fail";

                        var time = setInterval(() => {
                            errorDisplay.style.display = "none";
                        }, 4000);
                    }
                }
                else {
                    errorDisplay.style.display = "block";
                    errorDisplay.innerText = "You have not enough Balance";

                    var time = setInterval(() => {
                        errorDisplay.style.display = "none";
                    }, 4000);
                }

            } else {
                errorDisplay.style.display = "block";
                errorDisplay.innerText = "Enter Amount";

                var time = setInterval(() => {
                    errorDisplay.style.display = "none";
                }, 4000);
            }
        }

        else {
            errorDisplay.style.display = "block";
            errorDisplay.innerText = "enter valid upi id";

            var time = setInterval(() => {
                errorDisplay.style.display = "none";
            }, 4000);
        }

    })








</script> -->

</html>