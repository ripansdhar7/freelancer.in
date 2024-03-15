<?php
session_start();
//echo "welcome".$_SESSION['username'] = $username;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title> HOME PAGE</title>
</head>
<body>
    <H1>HOME PAGE</H1>
    <a href="logout.php"><input type="submit" value="Log out" name= "logout" class="input-btn"></a>
</body>
</html>

<?php
include "connection.php";

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true)
{
    header('location:login.php');
    exit;
}
?>


<?php
/*$userprofile = $_SESSION['user_name'];
if($userprofile == true)
{

}
else
{
    header('location:login.php');
}
?>*/