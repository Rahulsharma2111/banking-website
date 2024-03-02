<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Close Account</title>
</head>

<style>
    body {
        height: 100vh;
        width: 100vw;
        box-sizing: border-box;
        margin: 0px;
        padding: 0px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #Fromdiv {
        width: 254px;
        height: 255px;

        /* width: 315px; */
        /* height: 315px; */
        border: black 2px solid;
        border-radius: 10px;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        /* row-gap: 20px; */
        background-color: rgba(197, 165, 165, 0.336);
        backdrop-filter: blur(3px);
    }

    #Fromdiv form {
        display: flex;
        flex-direction: column;
        row-gap: 10px;
    }
</style>

<body>
    <!-- <div style="display: flex;    flex-direction: column;justify-content: center;align-items: center; width: 100vw; "> -->
    <div id="Fromdiv">
        <form action="closeAccount.php" method="POST" id="from">
            <div id="usernameDiv"> <label for="username">Username</label><br>
                <input type="text" name="username" id="username" placeholder="Username">
            </div>
            <div id="mobilenumberDiv"><label for="mobilenumber">Mobile Number</label><br>
                <input type="number" name="mobilenumber" id="mobilenumber" placeholder="Mobile Number">
            </div>
            <div id="accountnumberDiv">
                <label for="accountnumber">Account Number</label><br>
                <input type="number" name="accountnumber" id="accountnumber" placeholder="Account Number">

            </div>
            <div id="passwordDiv">
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" placeholder="Password">

            </div>
            <div id="submitbtn">
                <!-- <input type="button" name="submit" value="Close Account"> -->
                <button name="submit">Close Account</button>
            </div>
        </form>
    </div>


    <!-- Footer of the website -->
    <!-- footer section -->
    <!-- <div id="footer-container" style="padding-top: 5px;"></div>  -->
    <!-- </div> -->
    <!-- <script>
        fetch('footer.html')
            .then(response => response.text())
            .then(data => {
                document.getElementById('footer-container').innerHTML = data;
            });
    </script> -->




    <?php
    include 'PHPauthemtication.php';
    session_start();

    $sessUsername = $_SESSION["username"];
    $sessAccountnumber = $_SESSION["accountnumber"];
    $sesspassword = $_SESSION["Password"];
    echo $sessUsername . " " . $sessAccountnumber . " " . $sesspassword;

    if (!isset($_SESSION["username"]) || !isset($_SESSION["accountnumber"]) || !isset($_SESSION["Password"])) {
        header("Location: logIn.php");
        die();
    }
    if (isset($_POST['submit'])) {
        $username = $_POST["username"];
        $mobilenumber = $_POST["mobilenumber"];
        $accountnumber = $_POST["accountnumber"];
        $password = $_POST["password"];

        // session details store in variables
        $sessUsername = $_SESSION["username"];
        $sessAccountnumber = $_SESSION["accountnumber"];
        $sesspassword = $_SESSION["Password"];
        echo $sessUsername . " " . $sessAccountnumber;

        if (
            $username != $sessUsername || $accountnumber != $sessAccountnumber || $password != $sesspassword
        ) {
            echo "Please enter correct detials";
            exit;
        }
        if ($username == '' || $accountnumber == '' || $mobilenumber == '' || $password == '') {
            echo "Please Enter All felids";
            exit;
        }
        $sql1 = "DELETE FROM accountdebitcreditdetails WHERE accountdebitcreditdetails.accountNumber=$sessAccountnumber ;";
        $sql2 = "DELETE FROM bankcustmordetails WHERE bankcustmordetails.accountNumber=$sessAccountnumber AND bankcustmordetails.username= '$sessUsername';";
        // $con->multi_query($sql);
        if ($con->query($sql1) === TRUE && $con->query($sql2) === TRUE) {
            echo "<script>
           const FromdivDisplay= document.getElementById('Fromdiv');
           const fromDisplay= document.getElementById('from');
            setInterval(() => {

                fromDisplay.style.display = 'none';
                FromdivDisplay.innerHTML = '<h6>Your Account Close permamately</h6>';
                
            }, 4000);
            
          
            ?>
            </script>";
            session_unset();
            session_destroy();
            header("Location:index.php");

        } else {
            echo "Something gone wrong please try again";
        }


        if ($con->query($sql1) === TRUE && $con->query($sql2) === TRUE) {
            echo "Record inserted successfully.";
        } else {
            // header("alert.html");
            echo " Error: <br>" . $con->error;
        }

    }

    $con->close();


    ?>

</body>

</html>