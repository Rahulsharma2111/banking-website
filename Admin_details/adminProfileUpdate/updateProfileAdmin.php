<?php

// $localhost = 'localhost';
// $username = 'root';
// $password = '';
// $db = 'apnabankdetails';
// $dbtable = 'bankcustmordetails';
// try {
//     $con = new mysqli($localhost, $username, $password, $db, 3308);
//     echo "connection successfully";
// } catch (Throwable $th) {
//     echo "not connected" . $th;
//     exit;
// }
$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] ;
include $uploadDirectory.'/PHPauthemtication.php';
session_start();

$sessAdminUsername = $_SESSION['sessAdminUsername'];
$sessAdminPassword = $_SESSION['sessAdminPassword'];
$sessAdminEmpID = $_SESSION['sessAdminEmpID'];
$updateSessionValue = $_SESSION['updateSessionValue'];
// echo $inputType[$updateSessionValue];

// $secondUpdateValue = $_POST['secondUpdateValue']; 
// echo " <br>" . $updateSessionValue . " 1<br>";
// echo " <br>" . $accountnumber . " 2<br>";
// Check if user is logged in
if (!isset($sessAdminUsername) || !isset($sessAdminEmpID) || !isset($updateSessionValue)) {
    header("Location: ../adminLogin.php");
    // echo "something wrong";
    exit;
}

// admin_details (EmpID, adminName, adminFatherName, adminMotherName, adminUsername, adminDOB, adminEmail, adminMobileNumber, adminGender, adminAddress, adminCity, adminState, adminPincode, adminPassword, adminAadharCardNumber, adminPenCardNumber, adminPhoto, adminAadharCardFront, adminAadharCardBack, adminPenCardFront, adminPenCardBack, DateToCreateAminAccount, adminUpdateAccount

// ['Admin Name', "Father's Name", "Mother's Name", 'Mobile Number', 'Email Id', 'Username', ' Address',  'City', 'Pincode', 'State', 'Date of birth',  'Gender', 'Aadhar card Number', 'Pen Card Number', 'Photo', 'Aadhar Card front',  'Aadhar Card back', 'Pen Card front', 'Pen Card back']

// dynamic input type select using  assoscitive array 
$inputType = [
    'Admin Name' => 'text',
    "Father's Name" => 'text',
    "Mother's Name" => 'text',
    'Mobile Number' => 'number',
    'Email Id' => 'email',
    'Username' => 'text',
    'Address' => 'text',
    'City' => 'text',
    'Pincode' => 'number',
    'State' => 'select',
    'Date of birth' => 'date',
    'Caste' => 'radio',
    'Gender' => 'radio',
    'Aadhar card Number' => 'number',
    'Pen Card Number' => 'text',
    'Photo' => 'file',
    'Aadhar Card front' => 'file',
    'Aadhar Card back' => 'file',
    'Pen Card front' => 'file',
    'Pen Card back' => 'file'
];
$inputTypeField = $inputType[$updateSessionValue];

if (isset($_POST['updatebtn'])) {

    if ($inputTypeField == "file") {
        $inputValueUpdate = $_FILES['firstInputValue']["name"];

    } else {
        $inputValueUpdate = $_POST['firstInputValue'];
    }

    if ($inputValueUpdate == '') {
        echo "Please enter $updateSessionValue";
        exit;
    }

    // echo $inputValueUpdate . " <br>";
    // , , , , , , , , , , , , , adminPassword, , , , , , , , DateToCreateAminAccount, adminUpdateAccount

    $dbAssocArray = [
        'Admin Name' => 'adminName',
        "Father's Name" => 'adminFatherName',
        "Mother's Name" => 'adminMotherName',
        'Mobile Number' => 'adminMobileNumber',
        'Email Id' => 'adminEmail',
        'Username' => 'adminUsername',
        'Address' => 'adminAddress',
        'City' => 'adminCity',
        'Pincode' => 'adminPincode',
        'State' => 'adminState',
        'Date of birth' => 'adminDOB',
        'Gender' => 'adminGender',
        'Aadhar card Number' => 'adminAadharCardNumber',
        'Pen Card Number' => 'adminPenCardNumber',
        'Photo' => 'adminPhoto',
        'Aadhar Card front' => 'adminAadharCardFront',
        'Aadhar Card back' => 'adminAadharCardBack',
        'Pen Card front' => 'adminPenCardFront',
        'Pen Card back' => 'adminPenCardBack'
    ];
    $dbtableColumn = $dbAssocArray[$updateSessionValue];
    // echo $dbtableColumn . " <br>";

    // Current time and Date of India
    date_default_timezone_set('Asia/Kolkata');
    $currentDateTime = date("Y-m-d H:i:s");

    if ($inputTypeField == "file") {

        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";

        $dbImageUpdateAssocArray = [
            'Photo' => '_AdminPersonalPhoto.',
            'Aadhar Card front' => '_AdminAadharcardFront.',
            'Aadhar Card back' => '_AdminAadharcardBack.',
            'Pen Card front' => '_AdminPencardFront.',
            'Pen Card back' => '_AdminPencardBack.'
        ];

        $dbImageUpdateName = $dbImageUpdateAssocArray[$updateSessionValue];
        // echo $dbImageUpdateName . " <br>";

        $UpdateDocumentImage = $_FILES["firstInputValue"]["tmp_name"];
        $image_docPhoto = $sessAdminEmpID . "$dbImageUpdateName" . strtolower(pathinfo($_FILES["firstInputValue"]["name"], PATHINFO_EXTENSION));

        // C:/xampp/htdocs/bank website using php
$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] ;

        $image_12= move_uploaded_file($UpdateDocumentImage, "$uploadDirectory/Admin_Images_Bank/$sessAdminEmpID" . "/" . $image_docPhoto);
        // C:\xampp\htdocs\bank website using php\Admin_Images_Bank\498172\498172_AdminAadharcardBack.jpg

        $sql = " UPDATE admin_details SET $dbtableColumn='$image_docPhoto', adminUpdateAccount='$currentDateTime' WHERE EmpID ='$sessAdminEmpID' ";
        echo $sql;
        if ($con->query($sql)) {

            echo "Successfully upload Image ";

            header("Location: ../admin_Profile.php");

        } else {
            echo "something Is wrong";
        }
    } else {
        $sql = " UPDATE admin_details SET $dbtableColumn='$inputValueUpdate', adminUpdateAccount='$currentDateTime'  WHERE EmpID ='$sessAdminEmpID' ";
        echo $sql;
        if ($con->query($sql)) {

            echo "successfully update password ";

            header("Location: ../admin_Profile.php");

        } else {
            echo "something Is wrong";
        }
    }
    // exit;

}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Update profile</title>
</head>

<body>
    <div>
        <form action="./updateProfileAdmin.php" method="POST" enctype="multipart/form-data">
            <label for="firstInput"><b> Enter
                    <?php echo $updateSessionValue ?>
                </b></label><br />

            <!-- If input type "number" and "text" -->
            <?php if ($inputTypeField == "text" || $inputTypeField == "number") { ?>
                <input type="<?php echo $inputTypeField ?>" class="firstInput" name="firstInputValue" id="firstInput"
                    placeholder="Enter <?php echo $updateSessionValue ?>"><br><br>
            <?php } ?>



            <!-- If input type "radio" and "caste" -->
            <?php if ($inputTypeField == "radio" && $updateSessionValue == "Gender") { ?>
                <input type="<?php echo $inputTypeField ?>" value="Male" name="firstInputValue" class="gender"> Male
                <input type="<?php echo $inputTypeField ?>" value="Female" name="firstInputValue" class="gender"> Female
                <input type="<?php echo $inputTypeField ?>" value="Other" name="firstInputValue" class="gender"> Other
            <?php } ?>

            <!-- If input type "select" and "state" -->
            <?php if ($inputTypeField == "select" && $updateSessionValue == "State") { ?>
                <select name="state" id="state" required>
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
                <br><br>
            <?php } ?>

           
            <!-- If input type "file" and "images" -->
            <?php if ($inputTypeField == "file") { ?>
                <input type="<?php echo $inputTypeField ?>" id="updateImage" name="firstInputValue" required>
                <br><br>
            <?php } ?>

            <input type="submit" value="Update" id="updatebtn" name="updatebtn">
        </form>
    </div>
</body>
<style>
    body {
        width: 98vw;
        height: 98vh;
        /* display: flex;
        align-items: center;
        justify-content: center; */
    }
</style>

</html>


<!-- 




     $image_AdminPersonalPhoto = $employee_Id . "" . strtolower(pathinfo($_FILES["Personalphoto"]["name"], PATHINFO_EXTENSION));
    $image_AdminAadharcardFront = $employee_Id . "_AdminAadharcardFront." . strtolower(pathinfo($_FILES["aadhar_card_image_front"]["name"], PATHINFO_EXTENSION));
    $image_AdminAadharcardBack = $employee_Id . "_AdminAadharcardBack." . strtolower(pathinfo($_FILES["aadhar_card_image_back"]["name"], PATHINFO_EXTENSION));
    $image_AdminPencardFront = $employee_Id . "_AdminPencardFront." . strtolower(pathinfo($_FILES["pen_card_image_front"]["name"], PATHINFO_EXTENSION));
    $image_AdminPencardBack = $employee_Id . "_AdminPencardBack." . strtolower(pathinfo($_FILES["pen_card_image_back"]["name"], PATHINFO_EXTENSION));

    // create folder
    if (mkdir("C:/xampp/htdocs/bank website using php/Admin_Images_Bank/" . $makefolder_Name)) {
        echo "folder is created";
    }
    move_uploaded_file($admin_Personalphoto, "C:/xampp/htdocs/bank website using php/Admin_Images_Bank/" . $makefolder_Name . "/" . $image_AdminPersonalPhoto);

    move_uploaded_file($admin_aadhar_card_image_front, "C:/xampp/htdocs/bank website using php/Admin_Images_Bank/" . $makefolder_Name . "/" . $image_AdminAadharcardFront);

    move_uploaded_file($admin_aadhar_card_image_back, "C:/xampp/htdocs/bank website using php/Admin_Images_Bank/" . $makefolder_Name . "/" . $image_AdminAadharcardBack);

    move_uploaded_file($admin_pen_card_image_front, "C:/xampp/htdocs/bank website using php/Admin_Images_Bank/" . $makefolder_Name . "/" . $image_AdminPencardFront);

    move_uploaded_file($admin_pen_card_image_back, "C:/xampp/htdocs/bank website using php/Admin_Images_Bank/" . $makefolder_Name . "/" . $image_AdminPencardBack);-->