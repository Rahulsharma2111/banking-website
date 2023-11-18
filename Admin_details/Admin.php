<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open Account</title>
</head>
<style>
    body {
        user-select: none;
    }
</style>
<link rel="stylesheet" href="../open_acc_style_sheet.css">
<?php

$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] ;
include $uploadDirectory.'/PHPauthemtication.php';
// include '../PHPauthemtication.php';
session_start();
 $sessAdminUsername=$_SESSION["sessAdminUsername"] ;
 $sessAdminUseremail=$_SESSION["sessAdminUseremail"];
 $sessAdminPassword=$_SESSION["sessAdminPassword"] ;
if (!isset($sessAdminUsername) || !isset($sessAdminUseremail) || !isset($sessAdminPassword)) {
    header("Location:./adminLogin.php");
    // exit;
}


// $sessAdminUsername = $_SESSION["sessAdminUsername"];
// $sessAdminUseremail = $_SESSION["sessAdminUseremail"];
// $sessAdminPassword = $_SESSION["sessAdminPassword"];
// 
// echo $sessAdminUsername;
// echo $sessAdminUseremail;
// echo $sessAdminPassword;
if (isset($_POST['submit'])) {

    echo "everything is right";
    $admin_firstname = $_POST['firstname'];
    $admin_middlename = $_POST['middlename'];
    $admin_lastname = $_POST['lastname'];
    $admin_fathername = $_POST['fathername'];
    $admin_mothername = $_POST['mothername'];
    $admin_mobilenumber = $_POST['mobilenumber'];
    $sessAdminUsername = $_SESSION["sessAdminUsername"];
    $sessAdminUseremail = $_SESSION["sessAdminUseremail"];
    $sessAdminPassword = $_SESSION["sessAdminPassword"];
    $admin_address = $_POST['permanant_address'];
    $admin_city = $_POST['city'];
    $admin_pincode = $_POST['pincode'];
    $admin_state = $_POST['state'];
    $admin_DOB = $_POST['DOB'];
    $admin_country_name = $_POST['country_name'];
    $admin_gender = $_POST['gender'];
    $admin_aadharCardNumber = $_POST['aadharNumber'];
    $admin_penCardNumber = $_POST['penCardNumber'];



    function empl_Id($length = 6)
    {
        $ID = '';
        for ($i = 0; $i < $length; $i++) {
            $ID .= random_int(1, 9);

        }

        return $ID;
    }

    $employee_Id = empl_Id();


    // if (isset($_FILES["image"])) {
    $admin_Personalphoto = $_FILES["Personalphoto"]["tmp_name"];
    $admin_aadhar_card_image_front = $_FILES["aadhar_card_image_front"]["tmp_name"];
    $admin_aadhar_card_image_back = $_FILES["aadhar_card_image_back"]["tmp_name"];
    $admin_pen_card_image_front = $_FILES["pen_card_image_front"]["tmp_name"];
    $admin_pen_card_image_back = $_FILES["pen_card_image_back"]["tmp_name"];
    // $uer2 = $_FILES["photo2"]["tmp_name"];

    $makefolder_Name = $employee_Id;

    // $file_extension = strtolower(pathinfo($_FILES["Personalphoto"]["name"], PATHINFO_EXTENSION);
    $image_AdminPersonalPhoto = $employee_Id . "_AdminPersonalPhoto." . strtolower(pathinfo($_FILES["Personalphoto"]["name"], PATHINFO_EXTENSION));
    $image_AdminAadharcardFront = $employee_Id . "_AdminAadharcardFront." . strtolower(pathinfo($_FILES["aadhar_card_image_front"]["name"], PATHINFO_EXTENSION));
    $image_AdminAadharcardBack = $employee_Id . "_AdminAadharcardBack." . strtolower(pathinfo($_FILES["aadhar_card_image_back"]["name"], PATHINFO_EXTENSION));
    $image_AdminPencardFront = $employee_Id . "_AdminPencardFront." . strtolower(pathinfo($_FILES["pen_card_image_front"]["name"], PATHINFO_EXTENSION));
    $image_AdminPencardBack = $employee_Id . "_AdminPencardBack." . strtolower(pathinfo($_FILES["pen_card_image_back"]["name"], PATHINFO_EXTENSION));

    // create folder
    if (mkdir("C:/xampp/htdocs/bank website using php/Admin_Images_Bank/" . $makefolder_Name)) {
        echo "folder is created";
    }
    move_uploaded_file($admin_Personalphoto, "$uploadDirectory/Admin_Images_Bank/" . $makefolder_Name . "/" . $image_AdminPersonalPhoto);

    move_uploaded_file($admin_aadhar_card_image_front, "$uploadDirectory/Admin_Images_Bank/" . $makefolder_Name . "/" . $image_AdminAadharcardFront);

    move_uploaded_file($admin_aadhar_card_image_back, "$uploadDirectory/Admin_Images_Bank/" . $makefolder_Name . "/" . $image_AdminAadharcardBack);

    move_uploaded_file($admin_pen_card_image_front, "$uploadDirectory/Admin_Images_Bank/" . $makefolder_Name . "/" . $image_AdminPencardFront);

    move_uploaded_file($admin_pen_card_image_back, "$uploadDirectory/Admin_Images_Bank/" . $makefolder_Name . "/" . $image_AdminPencardBack);

    echo "Image Upload successfully";


    $sql1 = "SELECT * FROM admin_details WHERE  EmpID= '$employee_Id'";
    $resultsql1 = $con->query($sql1);
    $data = $resultsql1->fetch_object();
    $dataEmpID = $data->EmpID;

    // echo $accountNumberr;

    if ($dataEmpID == $employee_Id) {
        empl_Id();
    } else {
        // Current time and Date of India
        date_default_timezone_set('Asia/Kolkata');
        $currentDateTime = date("Y-m-d H:i:s");

        // Admin name 
        $admin_Name = $admin_firstname . ' ' . $admin_middlename . ' ' . $admin_lastname;

        $sql1 = "INSERT INTO admin_details (EmpID, adminName, adminFatherName, adminMotherName, adminUsername, adminDOB, adminEmail, adminMobileNumber, adminGender, adminAddress, adminCity, adminState, adminPincode, adminPassword, adminAadharCardNumber, adminPenCardNumber, adminPhoto, adminAadharCardFront, adminAadharCardBack, adminPenCardFront, adminPenCardBack, DateToCreateAminAccount, adminUpdateAccount ) VALUES ( '$employee_Id','$admin_Name', '$admin_fathername','$admin_mothername','$sessAdminUsername','$admin_DOB', '$sessAdminUseremail', '$admin_mobilenumber', '$admin_gender', '$admin_address', '$admin_city', '$admin_state', '$admin_pincode', '$sessAdminPassword', '$admin_aadharCardNumber', '$admin_penCardNumber', '$image_AdminPersonalPhoto', '$image_AdminAadharcardFront', '$image_AdminAadharcardBack', '$image_AdminPencardFront','$image_AdminPencardBack','$currentDateTime ','$currentDateTime ' )";
        echo $sql1;
        // exit;
        $con->query($sql1);

        header("Location: ./admin_Profile.php");
    }

}
$con->close();

?>

<body>
    <p class=" main_header">Please fill the form with correct details</p>
    <!-- style="padding-bottom: 50px;" -->
    <div class="form_div">
        <form action="./Admin.php" class="form_fill" method="POST" enctype="multipart/form-data">
            <div class="accoun_holder_name">

                <div class="first_name">
                    First Name : <input type="text" maxlength="10" placeholder=" Enter your first name"
                        class="coustmor_name" id="coustmor_name" name="firstname" required>
                </div>

                <div class="middle_name">
                    Middle Name : <input type="text" maxlength="10" placeholder=" Middle name is optional"
                        id="Middle_name" name="middlename" class="">
                </div>

                <div class="last_name">
                    Last Name : <input type="text" maxlength="10" placeholder=" Enter your Last name" required class=""
                        name="lastname" id="Last_name">
                </div>
            </div>

            <div class="parents_details">
                <div class="father_detail"> Father's Name : <input type="text" placeholder=" Enter your Father's name"
                        name="fathername" id="fatherName" required>
                </div>
                <div class="mother_detail">
                    Mother's Name : <input type="text" maxlength="16" placeholder=" Enter your Mother's name"
                        name="mothername" id="motherName" required>
                </div>
            </div>

            <div class="mobile_number">
                <div>
                    <label for="mobile_number"> Mobile Number : </label><input type="number" maxlength="10"
                        placeholder=" Enter your mobile name" id="mobile_number" name="mobilenumber" required>
                </div>

            </div>


            <div class="address">

                <div id="Permanant">
                    Permanant Address : <input type="text" name="permanant_address" id="Permanant_address"
                        placeholder="Enter your permanat address" required></textarea>
                </div>
            </div>


            <div class="address_details">
                <div class="city"> City : <input type="text" maxlength="10" placeholder="Enter your city" id="city"
                        name="city" required>
                </div>

                <div class="pincode">
                    Pincode : <input type="number" maxlength="6" placeholder="Enter pincode" id="pincode" name="pincode"
                        required>

                </div>
                <div class="state">
                    State : <select name="state" id="state" required>
                        <option value="select state" selected="selected" disabled>select state</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhaya Pradesh">Madhaya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarkhand">Uttarkhand</option>
                        <option value="West Bengal">West Bengal</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                        <option value="Daman and Diu">Daman and Diu</option>
                        <option value="Dehli">Dehli</option>
                        <option value="Ladakh">Ladakh</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value=""></option>
                        <option value=""></option>


                    </select>
                </div>
            </div>

            <div class="date">
                <div class="country">
                    <div class="dob">
                        Date of birth : <input type="date" placeholder=" Enter your DOB" name="DOB" id="DOB" required>
                    </div>
                    <div class="country_select">

                        Country : <select name="country_name" id="country_name" required>
                            <option value="select contry">select contry</option>
                            <option value="India">India</option>
                            <!-- <option value="Nepal">Nepal</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bangladesh">Bangladesh</option> 
                            -->
                        </select>
                    </div>
                </div>
                <br>
                <div class="caste_gender">

                    Gender :
                    <input type="radio" value="Male" name="gender" class="gender"> Male
                    <input type="radio" value="Female" name="gender" class="gender"> Female
                    <input type="radio" value="Other" name="gender" class="gender"> Other
                </div>
            </div>


            <div class="card_number">

                <div class="aadhar_number">
                    Aadhar card Number : <input type="number" maxlength="12" placeholder=" Enter your aadhar number"
                        name="aadharNumber" id="aadharNumber" required>
                </div>

                <div class="pen_number">

                    Pen Card Number : <input type="text" maxlength="12" placeholder=" Enter your pen card number"
                        name="penCardNumber" id="penCardNumber" required>
                </div>
            </div>
            <br>

            <div class="upload_section">
                <div class="image_section_1">
                    <div class="image">

                        <!-- Your image upload -->

                        Please upload your Photo : <br>
                        <input type="file" name="Personalphoto" id="yourPhoto" required>
                        <img src="" alt="" id="profileimge" />

                    </div>

                    <br>

                    <div class="aadhar_card">

                        <!-- aadhar card front image -->

                        Please upload Aadhar Card : <br>
                        <input type="file" id="aadharcardimage" name="aadhar_card_image_front" required>
                        <img src="" alt="" id="aadharcard_image" />

                        <!-- Please upload Aadhar Card back: -->

                        <br>
                        <input type="file" id="aadharcardimageback" name="aadhar_card_image_back" required>
                        <img src="" alt="" id="aadharcardback_image" />
                    </div>

                </div>
                <br>
                <div class="image_section_2">

                    <div class="pen_card">
                        Please upload Pen Card : <br>

                        <!-- Pen card front image upload -->

                        <input type="file" id="pencardimage" name="pen_card_image_front" required>
                        <img src="" alt="" id="imes" />

                        <!-- Pen Card back image:  -->
                        <br>
                        <div class="pencardback">
                            <input type="file" id="pencardimageback" name="pen_card_image_back" required>
                            <img src="" alt="" id="pencardback_image" />
                        </div>
                    </div>




                </div>

            </div>

            <br><br>
            <div class="btn" style="margin-top: 110px; position: relative;
    z-index: 111;">
                <input type="submit" value="Submit" name="submit" id="submitbtn">

                <input type="Reset" id="resetbtn" onclick="window.document.location.reload()">

                <input type="button" value="Cancel" id="cancelbtn" onclick="window.document.location.replace('index.php')">
            </div>
            <br><br>
        </form>
    </div>


    <script defer>


    </script>
</body>


<style>
    #profileimge {
        height: 98px;
        width: 112px;
        position: relative;
        top: -99px;
        left: 69px;
        /* border: black 2px solid; */
        display: none;
    }


    #aadharcard_image {
        height: 96px;
        width: 171px;
        position: relative;
        bottom: 98px;
        right: -39px;
        display: none;
    }

    #aadharcardback_image {
        height: 96px;
        width: 171px;
        position: relative;
        bottom: 98px;
        right: -39px;
        display: none;
    }

    #imes {
        height: 96px;
        width: 168px;
        position: relative;
        bottom: 97px;
        left: 30px;
        /* background-color: black; */

        display: none;

    }

    #pencardback_image {
        height: 96px;
        width: 168px;
        position: relative;
        bottom: -2px;
        left: -220px;
        /* background-color: black; */
        display: none;

    }

    .pencardback {
        display: flex;
        position: relative;
        top: -1px;
    }
</style>



<script>

    function ImagePreview(ImageInput, imagesURL) {
        ImageInput.addEventListener("change", function (e) {
            imagesURL.src = URL.createObjectURL(e.target.files[0]);
            imagesURL.style.display = "block";
        });
    }
    // Your profile photo 
    var your_Photo = document.getElementById('yourPhoto');
    var profileimge = document.getElementById("profileimge");
    ImagePreview(your_Photo, profileimge);
    //     your_Photo.addEventListener("change", function (e) {
    //         profileimge.src = URL.createObjectURL(e.target.files[0]);
    //         profileimge.style.display = "block";
    //     });

    //  your birth certificate image
    // var DOB_image = document.getElementById('DOBimage');
    // var birth_document = document.getElementById("birth_imge");
    // ImagePreview(DOB_image, birth_document);



    // Your 10 marksheet image
    // var marksheetimage = document.getElementById('marksheetimage');
    // var marksheet_image = document.getElementById("marksheet_image");
    // ImagePreview(marksheetimage, marksheet_image);



    // Your Aahar card image
    var aadharcardimage = document.getElementById('aadharcardimage');
    var aadharcard_image = document.getElementById("aadharcard_image");
    ImagePreview(aadharcardimage, aadharcard_image);

    // Your Aahar card back image
    var aadharcardimageback = document.getElementById('aadharcardimageback');
    var aadharcardback_image = document.getElementById("aadharcardback_image");
    ImagePreview(aadharcardimageback, aadharcardback_image);

    // pen card image preview

    var pen_card_image = document.getElementById('pencardimage');
    var imes = document.getElementById("imes");
    ImagePreview(pen_card_image, imes);


    // pen card back image preview

    var pen_card_image_back = document.getElementById('pencardimageback');
    var pencardback_image = document.getElementById("pencardback_image");
    ImagePreview(pen_card_image_back, pencardback_image);

</script>




</html>