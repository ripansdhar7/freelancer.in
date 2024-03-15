<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login to Hire Freelacers & Find Work | Freelancer</title>
</head>
<body>
    <main>
        <div class="login">
            <div class="contents">
                <div class="main-page">
                    <div class="contents-top">
                        <img src="../img/logo.png" alt="logo" class="logo-top">
                        <h1>Welcome Back</h1>
                        <button class="with-fb">
                            <h3>f</h3>
                            <p>Log in with Facebook</p>
                        </button>
                        <h4>OR</h4>
                        <div></div>
                    </div>
                        <form action="#" method="post" class="in-details">
                            <div class="input-section">
                            <input type="email" placeholder="Email or Username" name="username" class="input" required>  
                            </div>
                            <div class="input-section">
                                <input type="password" placeholder="Password" name="pwd" class="input" required>
                            </div>
                            <div class="input-next">
                                <label><input type="checkbox">Remember me</label>
                                <a href="#">Forgot Password?</a>
                            </div>
                            <div class="input-section">
                                <input type="submit" value="Log in" name="login" class="input-btn">
                            </div>
                        </form> 
                    <div class="signup-link">
                        <div></div>
                        <span>Don't have an account?<a href="signup.php">Sign up</a></span>
                    </div>
                    <section class="app">
                        <a href="#play-store"><img src="..//img/gp.png" alt=""></a>
                        <a href="#app-store"><img src="..//img/as.png" alt=""></a>
                    </section>

                    <?php
                    
                    echo '<div class="alertBox-alert red li">fill up the empty areas</div>';

                    echo'<div class="alertBox-alert yellow li">fill up the empty areas</div>';

                    echo'<div class="alertBox-alert red">fill up the empty areas</div>';
                    ?>

                </div>
            </div>
        </div>
    </main>
</body>
</html>


<?php 
include "connection.php"; 

$login     = false;
$showError = false;
$showAlert = false;

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $pwd      = $_POST['pwd'];

    $query = "SELECT * FROM input_data WHERE username = '$username'";
    $data = mysqli_query($mysqli, $query);
    $total = mysqli_num_rows($data);
    //echo $total;

    if($total == 1)
    {   
        while ($row = mysqli_fetch_assoc($data)) 
        {
            if(password_verify($pwd, $row['pwd']))
            {
                $login = true;

                $_SESSION['loggedin'] = true;
                $_SESSION['user_name'] = $username;

                header('location:home.php');
            }
        }

        ?>

        <!--<meta http-equiv="Refresh" content="0; url='http://localhost/profile/code/home.php'"/>-->

        <?php
    }
    else
    {
        echo "<script>alert('Invalid Credentials');</script>";
        //$showError = "Invalid Credentials";
    }
}
?>