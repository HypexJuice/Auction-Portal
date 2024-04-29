<?php
    $connection = mysqli_connect("localhost","root","", "login");
    $conn = mysqli_connect("localhost","root","","playerauction");
    $q="UPDATE  pool SET Purchase = NULL ";
    $q1="UPDATE  pool SET TeamID = NULL ";
    $retval = mysqli_query($conn,$q);
    $retval1 = mysqli_query($conn,$q1);
    header("Location: Resetalert.html");
    ?>