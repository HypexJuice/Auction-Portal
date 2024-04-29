<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $Team = $_POST['Team'];
    $OppTeam = $_POST['OppTeam'];
    $PID = $_POST['PlayerID'];
    $SID = $_POST['SetID'];
    $Link = $_POST['Link'];
    $bool = $_POST['Highest'];
    $_SESSION['Link']=$Link;
    $connection = mysqli_connect("localhost","root","", "login");
    $conn = mysqli_connect("localhost","root","","playerauction");
    $q="SELECT * FROM pool WHERE PlayerID='$PID'";
    $retval = mysqli_query($conn,$q);
    $row = mysqli_fetch_assoc($retval);

    
        $check = $row['Purchase'];
          if(is_null($check))
          {
            $update = "UPDATE pool set Purchase = BasePrice where PlayerID = '$PID'";
            
            $v = mysqli_query($conn,$update);
            if($bool)
            {
            $updateT = "UPDATE pool set TeamID ='$OppTeam' where PlayerID = '$PID'";
            $vt = mysqli_query($conn,$updateT);
            echo $bool;
            }
            else
            {
            $updateT3 = "UPDATE pool set TeamID ='$Team' where PlayerID = '$PID'";
            $vt3 = mysqli_query($conn,$updateT3);
            echo $bool;
            }
          }
          else if($bool)
          {
            
            $update1 = "UPDATE pool  set Purchase = Purchase+5000000 where PlayerID = '$PID'";
            $v1 = mysqli_query($conn,$update1);
            $updateT1 = "UPDATE pool set TeamID ='$OppTeam' where PlayerID = '$PID'";
            $vt1= mysqli_query($conn,$updateT1);
            echo $bool;
            
          }
          else
          {
            $update2 = "UPDATE pool  set Purchase = Purchase+5000000 where PlayerID = '$PID'";
            $v2= mysqli_query($conn,$update2);
            $updateT2 = "UPDATE pool set TeamID ='$Team' where PlayerID = '$PID'";
            $vt2 = mysqli_query($conn,$updateT2);
            echo $bool;
            
          }
}
?>