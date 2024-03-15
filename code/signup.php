<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>User Signup | Freelancer</title>
</head>
<body>
    <main>
        <div class="login">
            <div class="contents">
                <div class="main-page">
                    <div class="contents-top">
                        <img src="../img/logo.png" alt="logo" class="logo-top">
                        <h1>Sign Up</h1>
                        <button class="with-fb-signup">
                            <h3>f</h3>
                            <p>Continue with Facebook</p>
                        </button>
                        <h4>OR</h4>
                        <div></div>
                    </div>
                    <form action="#" method="post">
                        <div class="name-enter">
                            <div class="first-name">
                                <input type="text" placeholder="First Name" name="first_name" class="input-su" >
                            </div>
                            <div class="last-name">
                                <input type="text" placeholder="Last Name" name="last_name" class="input-su" >
                            </div>
                        </div>
                        <div class="input-section-signup">
                            <input type="email" placeholder="Email" name="username" class="input-su" >  
                        </div>
                        <div class="input-section-signup">
                            <input type="password" placeholder="Password" name="pwd" class="input-su" >
                        </div>
                        <div class="input-next-signup">
                            <label><input type="checkbox" required> agree to the Freelancer <a href="#">User Agreement</a> and <a href="#">Privacy Policy</a>.</label>
                        </div>
                        <div class="input-section-signup">
                            <input type="submit" value="Join Freelancer" name="signup" class="input-btn-join">
                        </div>
                    </form>  
                    <div class="login-link">
                        <div></div>
                        <span>Already have an account?<a href="login.php">Log in</a></span>
                    </div>
                        
                    <?php
                    if($showAlert){
                    echo '<div class="alertBox-alert" role="alert" >Username Already Exists</div>';

                    }

                    if($showError){
                    echo '<div class="alertBox-alert red su" role="alert">fill up the empty areas</div>';
                    }
                    
                    ?>

                </div>
            </div>
        </div>
    </main>
</body>
</html>


<?php 

$showError = false;
$showAlert = false;

    if(isset($_POST['signup'])){

        include "connection.php"; 
        $fname    = $_POST['first_name'];
        $lname    = $_POST['last_name'];
        $username = $_POST['username'];
        $pwd      = $_POST['pwd'];

        $existsSql = "SELECT * FROM input_data WHERE username = '$username' ";
        $result = mysqli_query($mysqli, $existsSql);
        $numExistsRows = mysqli_num_rows($result);

        if($numExistsRows > 0)
        {
            $showAlert = true; //"Username Already Exists";
            //echo "<script>alert('Username Already Exists, please log in instead');</script>";
        }
        else
        {
            if($fname != "" && $lname != "" && $username != "" && $pwd != "")
            {
                $hash = password_hash($pwd, PASSWORD_DEFAULT);
                $query = "INSERT INTO input_data values('$fname','$lname','$username','$hash',current_timestamp())";
                $data = mysqli_query($mysqli, $query);

                if($data)
                {
                    //echo"ok";
                }
            }
            else
            {
                $showError = true;
                //echo "<script>alert('fill up the empty areas');</script>";           
            }

        }
    }

?>

