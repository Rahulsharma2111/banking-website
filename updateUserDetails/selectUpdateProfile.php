<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>
<style>
    body {
        /* width: 96vw; */
        box-sizing: border-box;
        margin: 15px;
        /* border: 2px solid black; */
    }

    .updateTitle {
        text-align: center;
        font-size: 23px;
    }
</style>
<?php 
session_start();
$username = $_SESSION['username'];
$accountnumber = $_SESSION['accountnumber'];
// Check if user is logged in
if (!isset($username) || !isset($accountnumber)) {
    header("Location: logIn.php");
    // exit;
}
if (isset($_POST['submitbtn'])) {
$firstUpdateValue = $_POST['firstUpdateValue'];
$_SESSION['updateSessionValue']=$firstUpdateValue;
header("Location: updateProfile.php");
}

?>

<body>
    <div class="contanier">
        <header class="updateTitle"><b>Update profile</b></header>
        <div class="updateSection">
            <div>In <b>24 hours</b> you will update only one information  </div>
            <form action="./selectUpdateProfile.php" method="POST" >
                <label for="firstUpdateValue"></label>
                <select name="firstUpdateValue" class="firstUpdateValue " id="firstUpdateValue" >
                </select>
                <!-- <label for="secondUpdateValue"></label>
                <select name="secondUpdateValue" class="secondUpdateValue " id="secondUpdateValue" >
                </select> -->
                <input type="submit" value="Submit" id="submitbtn" 
                 name="submitbtn" ><!--onclick="SubmitfeildUpdate()"  -->
                
            </form>
        </div>
    </div>
</body>
<script>
    

    const createOption_firstUpdateValue = document.getElementsByClassName("firstUpdateValue")[0];
    // const createOption_secondUpdateValue = document.getElementsByClassName("secondUpdateValue")[0];
    const createOption_array = ['First Name', 'Middle Name', 'Last Name', "Father's Name", "Mother's Name", 'Mobile Number', 'Email Id', 'Username', 'Temperey Address', 'Permanant Address', 'City', 'Pincode', 'State', 'Date of birth', 'Country', 'Caste', 'Gender', 'Aadhar card Number', 'Pen Card Number', 'Photo', 'Birth Certificate', '10 Class Marksheet', 'Aadhar Card front',  'Aadhar Card back', 'Pen Card front', 'Pen Card back'];

    let optionHtml = `<option value="select field" selected disabled>select field</option>`;

    for (let i = 0; i < createOption_array.length; i++) {
        optionHtml += `<option value="${createOption_array[i]}">${createOption_array[i]}</option>`;
    }
    createOption_firstUpdateValue.innerHTML = optionHtml;
    // createOption_secondUpdateValue.innerHTML = optionHtml; 
 
function SubmitfeildUpdate(){

    const select_firstValue = createOption_firstUpdateValue.value;
    // const select_secondValue = createOption_secondUpdateValue.value;

    document.write(select_firstValue,"<br>");
    // document.write(select_secondValue);

}

const updateForm = document.getElementById("submitbtn");
updateForm.addEventListener("submit", function (event) {
    event.preventDefault(); 
    console.log("Form submission prevented. You can add your custom logic here.");

});

</script>

</html>