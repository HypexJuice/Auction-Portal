<?php
    $connection = mysqli_connect("localhost","root","", "login");
    $conn = mysqli_connect("localhost","root","","playerauction");
    $q="TRUNCATE table auction";
    $retval = mysqli_query($conn,$q);
    header("Location: Resetalert.html");
    ?>