<?php
$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] ;
include $uploadDirectory.'/PHPauthemtication.php';
// include 'PHPauthemtication.php';
session_start();

$username = $_SESSION['username'];
$accountnumber = $_SESSION['accountnumber'];
$updateSessionValue = $_SESSION['updateSessionValue'];
// echo $inputType[$updateSessionValue];

// $secondUpdateValue = $_POST['secondUpdateValue']; 
// echo " <br>" . $updateSessionValue . " 1<br>";
// echo " <br>" . $accountnumber . " 2<br>";
// Check if user is logged in
if (!isset($username) || !isset($accountnumber) || !isset($updateSessionValue)) {
    header("Location: logIn.php");
    exit;
}





// dynamic input type select using  assoscitive array 
$inputType = [
    'First Name' => 'text',
    'Middle Name' => 'text',
    'Last Name' => 'text',
    "Father's Name" => 'text',
    "Mother's Name" => 'text',
    'Mobile Number' => 'number',
    'Email Id' => 'email',
    'Username' => 'text',
    'Temperey Address' => 'text',
    'Permanant Address' => 'text',
    'City' => 'text',
    'Pincode' => 'number',
    'State' => 'select',
    'Date of birth' => 'date',
    'Country' => 'select',
    'Caste' => 'radio',
    'Gender' => 'radio',
    'Aadhar card Number' => 'number',
    'Pen Card Number' => 'text',
    'Photo' => 'file',
    'Birth Certificate' => 'file',
    '10 Class Marksheet' => 'file',
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
        // echo "safg";
        echo $inputValueUpdate;
    }
    
if ($inputValueUpdate == '') {
        echo "Please enter $updateSessionValue";
        exit;
    }
   
    // echo $inputValueUpdate . " <br>";

    $dbAssocArray = [
        'First Name' => 'firstname',
        'Middle Name' => 'middlename',
        'Last Name' => 'lastname',
        "Father's Name" => 'fathername',
        "Mother's Name" => 'mothername',
        'Mobile Number' => 'mobilenumber',
        'Email Id' => 'emailid',
        'Username' => 'username',
        'Temperey Address' => 'temparyaddress',
        'Permanant Address' => 'premananetaddress',
        'City' => 'city',
        'Pincode' => 'pincode',
        'State' => 'statee',
        'Date of birth' => 'DOB',
        'Country' => 'country',
        'Caste' => 'caste',
        'Gender' => 'gender',
        'Aadhar card Number' => 'aadharcardnumber',
        'Pen Card Number' => 'pencardnumber ',
        'Photo' => 'personal_Image',
        'Birth Certificate' => 'birth_certificate',
        '10 Class Marksheet' => 'class10Marksheet',
        'Aadhar Card front' => 'Aadharcard_Front',
        'Aadhar Card back' => 'Aadharcard_Back',
        'Pen Card front' => 'Pencard_Front',
        'Pen Card back' => 'Pencard_Back'
    ];
    $dbtableColumn = $dbAssocArray[$updateSessionValue];
    // echo $dbtableColumn . " <br>";

    // current time and date
    date_default_timezone_set('Asia/Kolkata');
    $currentDateTime = date("Y-m-d H:i:s");

        
        if ($inputTypeField == "file") {
            // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";
        $dbImageUpdateAssocArray = [
            'Photo' => '_PersonalPhoto.',
            'Birth Certificate' => '_birthCertificate.',
            '10 Class Marksheet' => '_class10Marksheet.',
            'Aadhar Card front' => '_AadharcardFront.',
            'Aadhar Card back' => '_AadharcardBack.',
            'Pen Card front' => '_PencardFront.',
            'Pen Card back' => '_PencardBack.'
        ];

        $dbImageUpdateName = $dbImageUpdateAssocArray[$updateSessionValue];
        // echo $dbImageUpdateName . " <br>";

        $UpdateDocumentImage = $_FILES["firstInputValue"]["tmp_name"];
        // echo $UpdateDocumentImage;
        $image_docPhoto = $accountnumber . "$dbImageUpdateName" . strtolower(pathinfo($_FILES["firstInputValue"]["name"], PATHINFO_EXTENSION));

        // C:/xampp/htdocs/bank website using php
        $image_12 = move_uploaded_file($UpdateDocumentImage, "../Bank_customer_image/$accountnumber" . "/" . $image_docPhoto);

// exit;

        $sql = " UPDATE bankcustmordetails SET $dbtableColumn='$image_docPhoto', updateAccount='$currentDateTime'  WHERE accountNumber='$accountnumber' ";
        echo $sql;
        if ($con->query($sql)) {

            echo "Successfully upload Image ";

            header("Location: ../check_status.php");

        } else {
            echo "something Is wrong";
        }
    } else {
        $sql = " UPDATE bankcustmordetails SET $dbtableColumn='$inputValueUpdate', updateAccount='$currentDateTime'  WHERE accountNumber='$accountnumber' ";
        echo $sql;
        if ($con->query($sql)) {

            // echo "successfully update password ";

            header("Location: ../check_status.php");

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
    <title>Update profile</title>
</head>

<body>
    <div>
        <form action="./updateProfile.php" method="POST" enctype="multipart/form-data">
            <label for="firstInput"><b> Enter
                    <?php echo $updateSessionValue ?>
                </b></label><br />

            <!-- If input type "number" and "text" -->
            <?php if ($inputTypeField == "text" || $inputTypeField == "number") { ?>
                <input type="<?php echo $inputTypeField ?>" class="firstInput" name="firstInputValue" id="firstInput"
                    placeholder="Enter <?php echo $updateSessionValue ?>"><br><br>
            <?php } ?>

            <!-- If input type "radio" and "gender" -->
            <?php if ($inputTypeField == "radio" && $updateSessionValue == "Caste") { ?>
                <input type="<?php echo $inputTypeField ?>" value="General" name="firstInputValue" id="Cas"> General
                <input type="<?php echo $inputTypeField ?>" value="OBC" name="firstInputValue"> OBC
                <input type="<?php echo $inputTypeField ?>" value="ST" name="firstInputValue"> ST
                <input type="<?php echo $inputTypeField ?>" value="SC" name="firstInputValue"> SC
                <br><br>
            <?php } ?>


                 <!-- If input type "date" and "date of brith" -->
            <?php if ($inputTypeField == "date" && $updateSessionValue == "Date of birth") { ?>
                <input type="<?php echo $inputTypeField ?>"  name="firstInputValue" class="DOB"> 
                
            <?php } ?>
            
                    <!-- If input type "email" and "E mail" -->
                    <?php if ($inputTypeField == "email" && $updateSessionValue == "Email Id") { ?>
                <input type="<?php echo $inputTypeField ?>"  name="firstInputValue" class="email"> 
                
            <?php } ?>

            <!-- If input type "radio" and "caste" -->
            <?php if ($inputTypeField == "radio" && $updateSessionValue == "Gender") { ?>
                <input type="<?php echo $inputTypeField ?>" value="Male" name="firstInputValue" class="gender"> Male
                <input type="<?php echo $inputTypeField ?>" value="Female" name="firstInputValue" class="gender"> Female
                <input type="<?php echo $inputTypeField ?>" value="Other" name="firstInputValue" class="gender"> Other
            <?php } ?>

            <!-- If input type "select" and "state" -->
            <?php if ($inputTypeField == "select" && $updateSessionValue == "State") { ?>
                <select name="firstInputValue" id="state" required>
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

            <!-- If input type "select" and "country" -->
            <?php if ($inputTypeField == "select" && $updateSessionValue == "Country") { ?>
                <select name="state" id="state" required>
                    <option value="Select Country" selected="selected" disabled>Select Country</option>
                    <option value="India">India</option>

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




    // if (isset($_FILES["image"])) {
    $Personalphoto = $_FILES["Personalphoto"]["tmp_name"];
    $birth_certificate = $_FILES["birth_certificate"]["tmp_name"];
    $marksheet10 = $_FILES["marksheet10"]["tmp_name"];
    $aadhar_card_image_front = $_FILES["aadhar_card_image_front"]["tmp_name"];
    $aadhar_card_image_back = $_FILES["aadhar_card_image_back"]["tmp_name"];
    $pen_card_image_front = $_FILES["pen_card_image_front"]["tmp_name"];
    $pen_card_image_back = $_FILES["pen_card_image_back"]["tmp_name"];
    // $uer2 = $_FILES["photo2"]["tmp_name"];

    $makefolder_Name = $accountNumber;

    // $file_extension = strtolower(pathinfo($_FILES["Personalphoto"]["name"], PATHINFO_EXTENSION);
    $image_PersonalPhoto = $accountNumber . "_PersonalPhoto.".strtolower(pathinfo($_FILES["Personalphoto"]["name"], PATHINFO_EXTENSION));
    $image_class10Marksheet = $accountNumber . "_class10Marksheet.".strtolower(pathinfo($_FILES["marksheet10"]["name"], PATHINFO_EXTENSION));
    $image_birthCertificate = $accountNumber . "_birthCertificate.".strtolower(pathinfo($_FILES["birth_certificate"]["name"], PATHINFO_EXTENSION));
    $image_AadharcardFront = $accountNumber . "_AadharcardFront.".strtolower(pathinfo($_FILES["aadhar_card_image_front"]["name"], PATHINFO_EXTENSION));
    $image_AadharcardBack = $accountNumber . "_AadharcardBack.".strtolower(pathinfo($_FILES["aadhar_card_image_back"]["name"], PATHINFO_EXTENSION));
    $image_PencardFront = $accountNumber . "_PencardFront.".strtolower(pathinfo($_FILES["pen_card_image_front"]["name"], PATHINFO_EXTENSION));
    $image_PencardBack = $accountNumber . "_PencardBack.".strtolower(pathinfo($_FILES["pen_card_image_back"]["name"], PATHINFO_EXTENSION));

    // create folder
    if (mkdir("C:/xampp/htdocs/bank website using php/Bank_customer_image/" . $makefolder_Name)) {
        echo "folder is created";
    }

    move_uploaded_file($Personalphoto, "C:/xampp/htdocs/bank website using php/Bank_customer_image/" . $makefolder_Name . "/" . $image_PersonalPhoto);

    move_uploaded_file($marksheet10, "C:/xampp/htdocs/bank website using php/Bank_customer_image/" . $makefolder_Name . "/" . $image_class10Marksheet);

    move_uploaded_file($birth_certificate, "C:/xampp/htdocs/bank website using php/Bank_customer_image/" . $makefolder_Name . "/" . $image_birthCertificate);

    move_uploaded_file($aadhar_card_image_front, "C:/xampp/htdocs/bank website using php/Bank_customer_image/" . $makefolder_Name . "/" . $image_AadharcardFront);

    move_uploaded_file($aadhar_card_image_back, "C:/xampp/htdocs/bank website using php/Bank_customer_image/" . $makefolder_Name . "/" . $image_AadharcardBack);

    move_uploaded_file($pen_card_image_front, "C:/xampp/htdocs/bank website using php/Bank_customer_image/" . $makefolder_Name . "/" . $image_PencardFront);

    move_uploaded_file($pen_card_image_back, "C:/xampp/htdocs/bank website using php/Bank_customer_image/" . $makefolder_Name . "/" . $image_PencardBack);

    echo "Image Upload successfully";

 -->