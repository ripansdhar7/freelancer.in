 <?php
    /*$servername =   "localhost";
    $username   =   "root";
    $password   =   "";
    $dbname     =   "fake_freelancer";

    $conn       =   mysqli_connect($servername,$username,$password,$dbname);*/


    $mysqli     =   new mysqli("localhost","root","","fake_freelancer");


    if($mysqli)
    {
        //echo "Connection ok";
    }
    else
    {
        //echo "Connection failed";
    }
?>