<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apna Bank</title>
</head>

<body>
    <link rel="stylesheet" href="style_sheet.css">
    <?php
    include 'PHPauthemtication.php';

    $sql1 = "SELECT * FROM page_counter ";
    $resultsql1 = $con->query($sql1);
    $data = $resultsql1->fetch_object();
    $dataaccountNumber = $data->count;

    ?>
    <style>
        #asdf {
            padding: 25px;
        }

        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
        }

        #PageVeiwerCouter {
            /* background: #ffeb3bde; */
            width: 98vw;
            height: auto;
            /* position: relative; */
            text-align: end;
            padding: 5px;
        }

        #counter {
            position: relative;
            right: 50px;
            font-size: 20px;

        }
    </style>

    <body>

        <div class="contanier">
            <div class="well" id="bgimage">Well Come in Apana Bank</div>
            <header class="header " id="nav_bar">
                <div class="nar_bar ">
                    <span class="logo" style="--i:1;">
                        <img src="images\creditCard.gif" alt="logo" class="logo_img"></span>
                    <div class="menu">
                        <ul>

                            <li><a href="index.php" class="home" style="--i:2;">Home</a></li>
                            <li><a href="./logIn.php " class="Services" style="--i:3;">Services</a></li>
                            <li><a href="./Pages/about_us_page.html" class="About us" style="--i:4;">About us</a></li>
                            <li><a href="./Pages/contact_us_page.html" class="Contact us" style="--i:5;">Contact</a></li>
                            <li><a href="./Pages/querie_help.html" class="Help" style="--i:6;">Help</a></li>
                        </ul>
                    </div>
                </div>
            </header>

            <div class="button">
                <div class="but1">
                    <p class="open_pra acc" style="--i:7;">You can open account in this Bank</p>
                    <!-- <input type="button" value=""  name="open_account"> -->


                    <a href="Signup.php">
                        <button class="but open_account" id="open_account" style="--i:9;">Open Account</button>
                    </a>
                </div>
                <div class="but2">
                    <p class="check_pra acc" style="--i:8;">You can check your bank account Balance </p>
                    <!-- <input type="button" value="Cheak Balance" class="but cheak_balance" name="cheak_balance"> -->
                    <a href="logIn.php">
                        <button class="but cheak_account" style="--i:10;">Log In</button>
                    </a>

                </div>
                <span><img src="bank_images\images.png" alt="Image" id="img_Ani"></span>
            </div>
<!-- 👀👀👀👀👀👀 -->
<div style="height: 250px;" class="button_2">
    <!-- <a href="./Admin_details/adminLogin.php">
        <button class="but cheak_account" style="--i:10;">Admin LogIn</button>
    </a> -->
<!-- <div class="Admim_panel"> -->

    <div class="but1"style="padding-left: 76px;">
                    <p class="open_pra acc" style="--i:11;">You are Bank employee, Only Bank employee Open Admin account
                        </p>
                    <a href="./Admin_details\admin_signUp.php">
                        <button class="but open_account" id="open_account" style="--i:12;">Signup Admin </button>
                    </a>
                </div>
                <div class="but2">
                    <p class="check_pra acc" style="--i:13;">LogIn Only Bank employee if admin have username</p>
                    <a href="./Admin_details/adminLogin.php">
                        <button class="but cheak_account" style="--i:14;">LogIn Admin</button>
                    </a>
                    <span><img src="bank_images\EagerAlarmedKillifish-size_restricted.gif" alt="Image" id="img_Admin"></span>
                </div>
                <!-- </div> -->
                

</div>
<!-- 👀👀👀👀👀👀 -->

            <div id="PageVeiwerCouter">
                <!-- <span name="counter"> -->
                <b id="counter">
                    <?php echo $dataaccountNumber; ?>
                </b>
                <!-- </span> -->
            </div>
            <footer class="footer">
                <!-- <span class="footerAnimation"></span> -->
                <!-- <div class="rights" style="text-align: center;font-size: 30px;background-color: rgb(60, 130, 221);">@ 2023
                All
                rights reserve from Apana Bank</div> -->
                <?php
                include "footer.html";
                ?>
            </footer>

    </body>

    <script defer>

        window.addEventListener('scroll', function () {
            let navbar = document.getElementById('nav_bar');
            if (window.pageYOffset >= 159) {
                navbar.classList.add('sticky');
            }
            else {
                navbar.classList.remove('sticky');
            }

        });


    </script>

    <?php
    $sql2 = "UPDATE page_counter SET count=count + 1 ";
    $con->query($sql2);
    // $resultsql2 = $con->query($sql2);
// $data = $resultsql2->fetch_object();
    ?>
</body>

</html>