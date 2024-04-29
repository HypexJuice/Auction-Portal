<?php
session_start();
$username = $_POST['user'] ;
$password = $_POST['pass'];
$connection = mysqli_connect("localhost","root","", "login");
if (!$connection) {
    die("Failed ". mysqli_connect_error());
  }
    $sql = "SELECT * FROM db WHERE username='$username'";
    $retval = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($retval);
    $pass = $row["Password"];
    $Team = $row["TeamID"];
    $Link = $row["Link"];
    if($pass== $password)
    {
        if($username == 'admin@gmail.com')
        {
            header('Location: adportal.php');
            exit;
        }
        
        $_SESSION['TeamID'] = $Team;
        $_SESSION['Link'] = $Link;
        header('Location: portal.php');
        exit;
    }
    else
    {   
        echo"<script language='javascript'>
            alert('Incorrect Username or Password');
            window.location.href='http://localhost/CricketAuction/login.html';
            </script>
            ";
        die;
    }
?>