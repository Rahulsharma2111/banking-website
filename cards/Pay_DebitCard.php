<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Debit Card</title>
</head>
<style>
    header,
    footer {
        background-color: rgba(97, 135, 238, 0.774);
        text-align: center;
        height: auto;
        font-size: 40px;
        font-weight: 600;
        border-radius: 15px;
    }

    section {
        border: 2px solid black;
        height: 516px;
        /* width: ; */
        margin-top: -28px;
        margin-bottom: 10px;
        border-radius: 15px;

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
        z-index: 10;
        transition: 0.1s;
        display: none;

    }

    #cardDetails {
        height: 100%;
        /* width: 100%; */
        display: flex;
        align-items: center;
        justify-content: center;
        background-image: url("../bank_images/swapCard.gif");
        /* background-image: url("bank_images/debitCard.jpeg"); */

        background-position: center;
        background-size: cover;
        border-radius: 12px;


    }

    .inputDetails {
        height: 44px;
        display: flex;
        flex-direction: column;
        text-align: center;
        font-size: 17px;
        font-weight: bold;
        margin-top: 6px;
    }

    fieldset {
        border-radius: 15px;
        height: 306px;
        width: 222px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        backdrop-filter: blur(3px);

        /* gap: 10px; */
    }

    legend {
        font-size: 20px;
        /* color: #ffff; */
        font-weight: bold;
    }

    button {
        width: 100%;
        height: 25px;
        margin-top: 8px;


    }
</style>
<?php
require '../PHPauthemtication.php';
session_start();

if (!isset($_SESSION["username"]) || !isset($_SESSION["accountnumber"])) {
    header("Location: logIn.php");
    // exit;
}
$sessusername = $_SESSION["username"];
$sesspassword = $_SESSION["Password"];
$sessaccountnumber = $_SESSION["accountnumber"];
echo $sessusername . "<br>";
echo $sesspassword . "<br>";
echo $sessaccountnumber . "<br>";

$sql1 = "SELECT * FROM bankcustmordetails WHERE  username= '$sessusername' AND userpassword='$sesspassword' ";


$result = $con->query($sql1);

$data = $result->fetch_object();

// echo  $data->accountNumber;

?>

<body>
    <header style="margin-top: -27px;">
        <p> Debit Card </p>
    </header>
    <section>
        <div id="error"></div>

        <div id="cardDetails">
            <fieldset>
                <legend>Debit Card Details</legend>
                <div id="FieldInside">
                    <form action="Pay_DebitCard.php" method="POST">
                        <div class="inputDetails">
                            <label for="debitCardHolderName">Card holder name</label>
                            <input type="text" placeholder="Card holder name" id="debitCardHolderName"
                                name="debitCardHolderName">
                        </div>
                        <div class="inputDetails">
                            <label for="debitCardNumber">Card Number</label>
                            <input type="number" placeholder="Debit card number" id="debitCardNumber"
                                name="debitCardNumber">
                        </div>
                        <div class="inputDetails">
                            <label for="DateCardNumber">Date</label>
                            <input type="number" placeholder="Date" id="DateCardNumber" name="DateCardNumber">
                        </div>
                        <div class="inputDetails">
                            <label for="CVVnumber">CVV Number</label>
                            <input type="number" placeholder="CVV number" id="CVVnumber" name="CVVnumber">
                        </div>
                        <div class="inputDetails">
                            <label for="amount">Amount</label>
                            <input type="number" placeholder="Amount" id="amount" name="amount">
                        </div>
                        <button id="payBtn" name="payBtn">Pay Now</button>
                    </form>
                </div>
            </fieldset>
        </div>

    </section>
    <!-- Footer of the website -->
    <!-- footer section -->
    <div id="footer-container" style="padding-top: 5px;"></div>
</body>
<script>
    fetch('../footer.html')
        .then(response => response.text())
        .then(data => {
            document.getElementById('footer-container').innerHTML = data;
        });
</script>



<?php
if (isset($_POST['payBtn'])) {
    $debitCardHolderName = $_POST['debitCardHolderName'];
    $debitCardNumber = $_POST['debitCardNumber'];
    $DateCardNumber = $_POST['DateCardNumber'];
    $CVVnumber = $_POST['CVVnumber'];
    $amount = $_POST['amount'];
    $accNumberIsExitOrNot = $data->accountNumber;
    echo $accNumberIsExitOrNot . "<br>";

    if ($sessaccountnumber != $accNumberIsExitOrNot) {
        echo "Something Wrong Please Try again";
        exit;
    }

    if ($debitCardHolderName == null && $debitCardHolderName == '' && $debitCardNumber == null && $debitCardNumber == '' && $DateCardNumber == null && $DateCardNumber == '' && $CVVnumber == null && $CVVnumber == '' && $amount == null && $amount == '') {
        echo "Please enter correct details";
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
            "type" => "Debit",
            "amount" => $amount,
            "bankbalance" => $updateBankBalance,
            "date" => $currentDate,
            "time" => $currentTime,
            "method" => "Debit Card",
            "Payment_To" => "Other Person"
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
    var debitCardHolderName = document.getElementById("debitCardHolderName");
    var debitCardNumber = document.getElementById("debitCardNumber");
    var CVVnumber = document.getElementById("CVVnumber");
    var amount = document.getElementById("amount");
    var DateCardNumber = document.getElementById("DateCardNumber");
    const errorDisplay = document.getElementById('error');

    document.getElementById('payBtn').addEventListener('click', () => {
        var cardHolderName = debitCardHolderName.value;
        var cardNumber = debitCardNumber.value;
        var cvvNumber = CVVnumber.value;
        var amountPay = amount.value;
        var dateOnCard = DateCardNumber.value;

        if (cardHolderName != '' && cardHolderName != undefined) {


            if (cardNumber != '' && cardNumber != undefined) {

                if (dateOnCard != '' && dateOnCard != undefined) {
                    if (cvvNumber != '' && cvvNumber != undefined) {

                        if (amountPay != '' && amountPay > 0 && amountPay != 0) {
                            // generateOTP and Calling otp function


                            const generateOTP = () => {

                                let otp = '';
                                for (let i = 0; i < 6; i++) {
                                    otp += Math.floor(Math.random() * 10);
                                }
                                return otp;
                            }
                            const accBal = localStorage.getItem('AccountBalance');
                            if (accBal > parseInt(amountPay)) {
                            const OTP = generateOTP();
                            const OTPvalidation = prompt(` Hello! ${cardHolderName} OTP is ${OTP} Amount is dedacted in your bank account ${amountPay} Rs. Please don't share any one. `);

                            console.log(OTPvalidation);
                            console.log(OTP);

                            if (parseInt(OTPvalidation) == OTP) {
                                
                                // after decation amount is 
                                var afterDedaction = parseInt(accBal) - parseInt(amountPay);
                                    // console.log(afterDedaction);

                                    localStorage.setItem('AccountBalance', afterDedaction)

                                

                                var openAccountDate = new Date;
                                var date = openAccountDate.getDate();
                                var month = openAccountDate.getMonth();
                                var year = openAccountDate.getFullYear();
                                var hour = openAccountDate.getHours();
                                var min = openAccountDate.getMinutes();
                                var sec = openAccountDate.getSeconds();

                                const trancationDate = date + "-" + month + "-" + year;
                                const trancationTime = hour + ":" + min + ":" + sec;


                                const trancation = "payment_by/Debit Card/"+ "No Id avaliable"+"/Date/" + trancationDate +"/time/"+trancationTime +"/tranType/Debit/amount/" + amountPay+"/AccountBalance/"+afterDedaction;
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

                                    // alert("Payment successful!");


                                var time = setInterval( () => {
                                    errorDisplay.style.display = "none";
                                }, 4000);
                                debitCardHolderName.value =  '';
                                debitCardNumber.value = '';
                                CVVnumber.value = '';
                                amount.value = '';
                                DateCardNumber.value = '';

                            } else {
                                errorDisplay.style.display = "block";
                                errorDisplay.innerText = "Please Invaid OTP";

                                var time = setInterval(() => {
                                    errorDisplay.style.display = "none";
                                }, 4000);

                            }
                        }else{
                            errorDisplay.style.display = "block";
                                errorDisplay.innerText = "You have not enough balnce";

                                var time = setInterval(() => {
                                    errorDisplay.style.display = "none";
                                }, 4000);
                        }
                        }
                        else {
                            errorDisplay.style.display = "block";
                            errorDisplay.innerText = "Please enter correct amount";

                            var time = setInterval(() => {
                                errorDisplay.style.display = "none";
                            }, 4000);
                        }
                    }
                    else {
                        errorDisplay.style.display = "block";
                        errorDisplay.innerText = "Please enter CVV number";

                        var time = setInterval(() => {
                            errorDisplay.style.display = "none";
                        }, 4000);
                    }
                
            } 
            else {
                errorDisplay.style.display = "block";
                errorDisplay.innerText = "Please enter Expiry date of card";

                var time = setInterval(() => {
                    errorDisplay.style.display = "none";
                }, 4000);
            }
            }
        
            else {
                errorDisplay.style.display = "block";
                errorDisplay.innerText = "Please enter card number";

                var time = setInterval(() => {
                    errorDisplay.style.display = "none";
                }, 4000);
            }
        }
        else {

            errorDisplay.style.display = "block";
            errorDisplay.innerText = "Please enter card holder name";

            var time = setInterval(() => {
                errorDisplay.style.display = "none";
            }, 4000);

        }

    })

</script> -->

</html>