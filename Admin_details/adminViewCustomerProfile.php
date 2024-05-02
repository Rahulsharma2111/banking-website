<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View customer details</title>
</head>


<style>
    /* * {
        margin: 0;
        padding: 0;


    } */

    body {
        box-sizing: border-box;
        background: #a08f5f66;
        user-select: none;
    }

    .header {
        height: 45px;
        background: orange;
        text-align: center;

    }

    .main_header {
        font-size: 30px;
        font-weight: bold;
        /* text-align: center; */
        top: 5px;
        position: relative;
        left: -118px;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .form_div {
        margin: 0 15px 0 15px;
    }

    form {
        margin-top: 15px;
    }

    img {
        height: 100px;
        width: 100px;
    }
</style>

<?php


$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] ;
include $uploadDirectory.'/PHPauthemtication.php';
// include '../PHPauthemtication.php';
session_start();
 $sessAdminUsername=$_SESSION["sessAdminUsername"] ;
 $sessAdminPassword=$_SESSION["sessAdminPassword"] ;
if (!isset($sessAdminUsername) || !isset($sessAdminPassword)) {
    header("Location:./adminLogin.php");
    exit;
}



?>
<body>
    <div class="customer_details_form">

<form action="./adminViewCustomerProfile.php" method="post">
<div>
<label for="mobileNumber">Customer Mobile Number</label><br>
<input type="number" name="mobileNumber" id="mobileNumber" placeholder="Customer Mobile Number">
</div>
<br>
<div>
<label for="accountNumber">Customer Account Number</label><br>
<input type="number" name="accountNumber" id="accountNumber" placeholder="Customer Account Number">
</div>
<br>
<br>
<input type="submit" name="submitbtn" value="Submit">
</form>
    </div>

    <?php 
    if (isset($_POST['submitbtn'])) {
$mobileNumber=$_POST['mobileNumber'];
$accountNumber=$_POST['accountNumber'];
        if(empty ($mobileNumber)|| empty ($accountNumber)){
            echo "Please fill the all feilds";
            exit;
        }

        $sql="SELECT *  FROM bankcustmordetails WHERE bankcustmordetails.mobilenumber='$mobileNumber' AND bankcustmordetails.accountNumber='$accountNumber'  ";
// echo $sql;
$result = $con->query($sql);
$data = $result->fetch_object();


// $fullName=$data->firstname.' '.$data->middlename.' '.$data->lastname;
// echo $fullName;

    

        ?>

<style>
            .customer_details_form{
                display: none;
            }
        </style>
    <div class="header"> <span class=" main_header">Customer Profile</span></div>
    <div class="form_div">
        <form action="" class="form_fill">
            <div class="accoun_holder_name">

                <div class="first_name">
                    First Name : <span id="profilefirstname">
                        <?php echo $data->firstname; ?>
                    </span>
                </div>

                <div class="middle_name">
                    Middle Name : <span id="profilemiddlename">
                        <?php echo $data->middlename; ?>
                    </span>
                </div>

                <div class="last_name">
                    Last Name : <span id="profilelastname">
                        <?php echo $data->lastname; ?>
                    </span>
                </div>
            </div>

            <div class="parents_details">
                <div class="father_detail"> Father's Name : <span id="profilefathername">
                        <?php echo $data->fathername; ?>
                    </span>
                </div>
                <div class="mother_detail">
                    Mother's Name : <span id="profilemothername">
                        <?php echo $data->mothername; ?>
                    </span>
                </div>
            </div>

            <div class="mobile_number">
                Mobile Number : <span id="profilemobilenumber">
                    <?php echo $data->mobilenumber; ?>
                </span>
            </div>
            <div class="user_name">
                UserName : <span id="profileusername">
                    <?php echo $data->username; ?>
                </span>
            </div>
            <div class="account_Number">
                Account Number : <span id="accountnumber">
                    <?php echo $data->accountNumber; ?>
                </span>
            </div>

            <div class="email_id">
                Email Id : <span id="profileemail">
                    <?php echo $data->emailid; ?>
                </span>
            </div>

            <div class="address">
                Temperey Address : <span id="profiletempereyaddress">
                    <?php echo $data->temparyaddress; ?>
                </span>
                <br><br>
                Permanant Address : <span id="profilepermanantaddress">
                    <?php echo $data->premananetaddress; ?>
                </span>
            </div>


            <div class="address_details">
                <div class="city"> City : <span id="profilecity">
                        <?php echo $data->city; ?>
                    </span>
                </div>

                <div class="pincode">
                    Pincode : <span id="profilepincode">
                        <?php echo $data->pincode; ?>
                    </span>

                </div>
                <div class="state">
                    State : <span id="profilestate">
                        <?php echo $data->statee; ?>
                    </span>

                </div>
            </div>
            <div class="date">
                <div class="country">
                    <div class="dob">
                        Date of birth : <span id="profiledob">
                            <?php echo $data->DOB; ?>
                        </span>
                    </div>
                    <div class="country_select">

                        Country : <span name="" id="profilecountry">
                            <?php echo $data->country; ?>
                        </span>

                    </div>
                </div>
                <br>
                <div class="caste_gender">
                    Caste : <span id="profilecaste">
                        <?php echo $data->caste; ?>
                    </span>
                    <br><br>
                    Gender : <span id="profilegender">
                        <?php echo $data->gender; ?>
                    </span>
                </div>
            </div>



            <div class="card_number">

                <div class="aadhar_number">
                    Aadhar card Number : <span id="profileaadharnumber">
                        <?php echo $data->aadharcardnumber; ?>
                    </span>
                </div>

                <div class="pen_number">

                    Pen Card Number : <span id="profilepencardnumber">
                        <?php echo $data->pencardnumber; ?>
                    </span>
                </div>
            </div>
            <br>

            <div class="upload_section">
                <div class="image_section_1">
                    <div class="image">
                        Please upload your image : <br>

                        <?php
                        // $imagePath = $_FILES['C:/xampp/htdocs/bank website using php/Bank_customer_image/' . $data->accountNumber . '/' . $data->personal_Image];
                        // $image_data = file_get_contents($_FILES[$imagePath]);
                        //                     $imagePath = $_FILES['image'][$data->personal_Image];
                        // $image_data = file_get_contents($imagePath);
                        ?>

                        <span name="profilephoto" id="profilephoto">
                            <img alt="Your_Image"
                                src="<?php echo '../Bank_customer_image/' . $data->accountNumber . '/' . $data->personal_Image; ?>"
                                id='profilephoto_image' />


                        </span>
                    </div>

                    <br>

                    <div class="birth_cetifirate">
                        Please upload Birth Certificate : <br>
                        <span name="birth certificate" id="profilebirthdocument">
                            <img src="<?php echo '../Bank_customer_image/' . $data->accountNumber . '/' . $data->birth_certificate; ?>"
                                alt="birth certificate image" id="profilebirthdocument_image" /></span>
                    </div>
                </div>
                <br>
                <div class="image_section_2">
                    <div class="marksheet">
                        Please upload 10 Class Marksheet : <br>
                        <span name="marksheet" id="profilemarksheet">
                            <img src="<?php echo '../Bank_customer_image/' . $data->accountNumber . '/' . $data->class10Marksheet; ?>"
                                alt="" id="profilemarksheet_image" /></span>
                    </div>

                    <br>

                    <div class="aadhar_card">
                        Aadhar Card : <br>
                        Front<br>
                        <span name="birth certificate" id="profieaadharcardimage">
                            <img src="<?php echo '../Bank_customer_image/' . $data->accountNumber . '/' . $data->Aadharcard_Front; ?>"
                                alt="" id="profieaadharcardimage_image" /></span>
                        <br>
                        back<br>
                        <span id="profileaadharcardimageback" name="aadhar_card_image"><img
                                src="<?php echo '../Bank_customer_image/' . $data->accountNumber . '/' . $data->Aadharcard_Back; ?>"
                                alt="" id="profileaadharcardimageback_image" /></span>

                    </div>
                </div>
                <br>
                <div class="image_section_3">
                    <div class="pen_card">
                        Pen Card : <br>
                        Front<br>
                        <span name="pencard" id="profilepenimage"><img
                                src="<?php echo '../Bank_customer_image/' . $data->accountNumber . '/' . $data->Pencard_Front; ?>"
                                alt="" id="profilepencard_image" /></span>


                        <br>
                        back<br>
                        <span id="profilepencardimageback" name="pen_card_image"></span><img
                            src="<?php echo '../Bank_customer_image/' . $data->accountNumber . '/' . $data->Pencard_Back; ?>"
                            alt="" id="profilepencardimageback_image" />

                    </div>
                </div>


                <div id="dateToOpenAccount">
                    <span id="OpenDateTime">Date to open Account : <span id="dateTime"><?php echo $data->dateToCreateAccount?></span>
                    </span>
                </div>
                <br>
                <div id="dateToUpdateAccount">
                    <span id="UpDate_Time">Update Date to Account : <span id="UpdateDateTime"><?php echo $data->updateAccount?></span> </span>
                </div>
            </div>

        </form>
    </div>
    <?php  } ?>
</body>



</html>