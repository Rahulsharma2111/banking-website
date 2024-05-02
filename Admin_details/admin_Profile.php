<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;


    }

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
        text-align: center;
        top: 5px;
        position: relative;
        left: -118px;

    }

    .form_div {
        margin: 0 15px 0 15px;
    }

    form {
        margin-top: 15px;
    }

    .edit_your_profile {
        font-size: 24px;
        font-weight: bold;
        position: relative;
        right: -248px;
        top: 4px;
        cursor: pointer;
        color: #0b4790d6;
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

$sessAdminUsername = $_SESSION["sessAdminUsername"];
$sessAdminUseremail = $_SESSION["sessAdminEmail"];
$sessAdminPassword = $_SESSION["sessAdminPassword"];
// 
// // Check if user is logged in
// if (!isset($sessAdminUsername) || !isset($sessAdminUseremail)) {
//     echo "Please set the session";
//     // header("Location: chekStatusVerfiy.php");
//     exit;
// }

// $sql1 = "SELECT * FROM admin_details WHERE  adminUsername= '$sessAdminUsername' AND adminPassword='$sessAdminPassword'";

// echo $sql1;

$Adminpass = "123";
// 
$sql1 = "SELECT * FROM admin_details WHERE  adminUsername= '$sessAdminUsername' AND adminPassword='$sessAdminPassword'";
$result = $con->query($sql1);

$data = $result->fetch_object();
// print_r($data);
$con->close();

?>

<body>
    <div class="header"> <span class=" main_header">Your Profile</span> <span class="edit_your_profile"><a
                href="adminProfileUpdate\adminSelectUpdateProfile.php" 
                style="text-decoration: none; font-size:24px ; color:#0b4790d6;"
                id="editProfilelink">
                Edit Profile</a></span></div>
    <div class="form_div">
        <form action="" class="form_fill">
            <div class="accoun_holder_name">

                <div class="first_name">
                    Name : <span id="profilefirstname">
                        <?php echo $data->adminName; ?>
                    </span>
                </div>

            </div>

            <div class="parents_details">
                <div class="father_detail"> Father's Name : <span id="profilefathername">
                        <?php echo $data->adminFatherName; ?>
                    </span>
                </div>
                <div class="mother_detail">
                    Mother's Name : <span id="profilemothername">
                        <?php echo $data->adminMotherName; ?>
                    </span>
                </div>
            </div>

            <div class="mobile_number">
                Mobile Number : <span id="profilemobilenumber">
                    <?php echo $data->adminMobileNumber; ?>
                </span>
            </div>
            <div class="user_name">
                UserName : <span id="profileusername">
                    <?php echo $data->adminUsername; ?>
                </span>
            </div>
            <div class="account_Number">
                Empolyee Id : <span id="accountnumber">
                    <?php echo $data->EmpID; ?>
                </span>
            </div>

            <div class="email_id">
                Email Id : <span id="profileemail">
                    <?php echo $data->adminEmail; ?>
                </span>
            </div>

            <div class="address">
                <!-- Temperey Address : <span id="profiletempereyaddress">
                     <?php
                     //   echo $data->temparyaddress; 
                     ?> 
                </span>
                <br><br> -->
                Address : <span id="profilepermanantaddress">
                    <?php echo $data->adminAddress; ?>
                </span>
            </div>


            <div class="address_details">
                <div class="city"> City : <span id="profilecity">
                        <?php echo $data->adminCity; ?>
                    </span>
                </div>

                <div class="pincode">
                    Pincode : <span id="profilepincode">
                        <?php echo $data->adminPincode; ?>
                    </span>

                </div>
                <div class="state">
                    State : <span id="profilestate">
                        <?php echo $data->adminState; ?>
                    </span>

                </div>
            </div>
            <div class="date">
                <div class="country">
                    <div class="dob">
                        Date of birth : <span id="profiledob">
                            <?php echo $data->adminDOB; ?>
                        </span>
                    </div>
                    <!-- <div class="country_select">

                        Country : <span name="" id="profilecountry">
                            <?php echo $data->adminCountry; ?>
                        </span>

                    </div> -->
                </div>
                <br>
                <div class="caste_gender">
                    <!-- Caste : <span id="profilecaste">
                        <?php echo $data->caste; ?>
                    </span>
                    <br><br> -->
                    Gender : <span id="profilegender">
                        <?php echo $data->adminGender; ?>
                    </span>
                </div>
            </div>



            <div class="card_number">

                <div class="aadhar_number">
                    Aadhar card Number : <span id="profileaadharnumber">
                        <?php echo $data->adminAadharCardNumber; ?>
                    </span>
                </div>

                <div class="pen_number">

                    Pen Card Number : <span id="profilepencardnumber">
                        <?php echo $data->adminPenCardNumber; ?>
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
                                src="<?php echo '../Admin_Images_Bank/' . $data->EmpID . '/' . $data->adminPhoto; ?>"
                                id='profilephoto_image' />


                        </span>
                    </div>

                    <br>

                    <br>

                    <div class="aadhar_card">
                        Aadhar Card : <br>
                        Front<br>
                        <span name="birth certificate" id="profieaadharcardimage">
                            <img src="<?php echo '../Admin_Images_Bank/' . $data->EmpID . '/' . $data->adminAadharCardFront; ?>"
                                alt="" id="profieaadharcardimage_image" /></span>
                        <br>
                        back<br>
                        <span id="profileaadharcardimageback" name="aadhar_card_image"><img
                                src="<?php echo '../Admin_Images_Bank/' . $data->EmpID . '/' . $data->adminAadharCardBack; ?>"
                                alt="" id="profileaadharcardimageback_image" /></span>

                    </div>
                </div>
                <br>
                <div class="image_section_3">
                    <div class="pen_card">
                        Pen Card : <br>
                        Front<br>
                        <span name="pencard" id="profilepenimage"><img
                                src="<?php echo '../Admin_Images_Bank/' . $data->EmpID . '/' . $data->adminPenCardFront; ?>"
                                alt="" id="profilepencard_image" /></span>


                        <br>
                        back<br>
                        <span id="profilepencardimageback" name="pen_card_image"></span><img
                            src="<?php echo '../Admin_Images_Bank/' . $data->EmpID . '/' . $data->adminPenCardBack; ?>"
                            alt="" id="profilepencardimageback_image" />

                    </div>
                </div>


                <div id="dateToOpenAccount">
                    <span id="OpenDateTime">Date to open Account : <span id="dateTime">
                            <?php echo $data->DateToCreateAminAccount; ?>
                        </span>
                    </span>
                </div>
                <br>
                <div id="dateToUpdateAccount">
                    <span id="UpDate_Time">Update Date to Account : <span id="UpdateDateTime">
                            <?php echo $data->adminUpdateAccount; ?>
                        </span> </span>
                </div>
            </div>

            <!-- <br><br>
            <div class="btn">
            <input type="submit">

            <input type="Reset">

            <input type="button" value="Cancel">
        </div>
            <br><br> -->
        </form>
    </div>
</body>
<!-- <script src="script.js" defer></script> -->

<style>
    * {
        font-size: 20px;
        /* font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; */
    }

    /* #profilepencardimageback_image{
        height: 140px;
        background-color: red;
        width : 140px;
    } */
    
</style>

</html>