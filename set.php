<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{   $conn = mysqli_connect("localhost","root","","playerauction");
    $Team = $_POST['Team'];
    $flow = $_POST['Flow'];
    if($flow == True)
    {   
        $_SESSION['PlayerID'] = 1;
        $_SESSION['SetID'] = 'MQ';
        header("Location: window.php");
    }
    else
    {
        
        


    }
}