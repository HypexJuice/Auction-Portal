<?php
    $connection = mysqli_connect("localhost","root","", "login");
    $conn = mysqli_connect("localhost","root","","playerauction");
    $q="UPDATE teams SET Purse = 800000000";
    $retval = mysqli_query($conn,$q);
    header("Location: Resetalert.html");
    ?>