<?php
    session_start();
    $connection = mysqli_connect("localhost","root","", "login");
    $conn = mysqli_connect("localhost","root","","playerauction");
    $PID = $_POST['PID'];
    $SID = $_POST['SID'];
    if($PID == '50')
        header("Location: complete.html");
    $help1="SELECT * from pool where PlayerID = '$PID'";
    $value = mysqli_query($conn,$help1);
    $info = mysqli_fetch_assoc($value);
    $BP= $info['BasePrice'];
    $P= $info['Purchase'];
    if(!empty($P)){
        $T=$info['TeamID'];

        $help2="SELECT * from teams where TeamID = '$T'";
        $value2 = mysqli_query($conn,$help2);
        $info2 = mysqli_fetch_assoc($value2);
        $Tn=$info2['TeamName'];
        if($SID == 'MQ' || $SID == '1ALL' || $SID == '1BAT'|| $SID == '1BOW'|| $SID == '1WK')
            $AucID='A3';
        else if( $SID == '2ALL' || $SID == '2BAT')
            $AucID='A2';
        else
            $AucID ='A1';
        $insert= "INSERT into auction(AuctioneerID,PlayerID,SetID,BasePrice,Purchase,TeamID,TeamName) values('$AucID','$PID','$SID',$BP,$P,'$T','$Tn')" ;
        $command= mysqli_query($conn,$insert);

        $purse="UPDATE teams set Purse = Purse - $P where TeamID = '$T'";
        $perf=mysqli_query($conn,$purse);
    }
    
    $intPID= intval($PID);
    $intPID= $intPID+1;
    $query5="SELECT * from pool where Purchase is NULL and PlayerID in (SELECT PlayerID from pool where PlayerID = '$intPID' )";
    $retval5 = mysqli_query($conn,$query5);
    $row5 = mysqli_fetch_assoc($retval5);

    if(mysqli_num_rows($retval5)==0)
    {
        if(intval($PlayerID)>10 && intval($PlayerID)<16)
        {
            $SetID ='1BAT';
            header("Location: endbid.php");
        }
        else if($PlayerID>15 && $PlayerID<21)
        {
            $SetID ='1BOW';
            header("Location: endbid.php");
        }
        else if($PlayerID>20 && $PlayerID<26)
        {
            $SetID ='1ALL';
            header("Location: endbid.php");
        }
        else if($PlayerID>25 && $PlayerID<31)
        {
            $SetID ='1WK';
            header("Location: endbid.php");
        }
        else if($PlayerID>30 && $PlayerID<36)
        {
            $SetID ='2BAT';
            header("Location: endbid.php");
        }
        else if($PlayerID>35 && $PlayerID<41)
        {
            $SetID ='2BOW';
            header("Location: endbid.php");
        }
        else if($PlayerID>40 && $PlayerID<46)
        {
            $SetID ='2ALL';
            header("Location: endbid.php");
        }
        else 
        {
            $SetID ='2WK';
            header("Location: endbid.php");
        }
        
            
    }
    else{
        $PlayerID = $row5['PlayerID'];
        $SetID = $row5['SetID'];
    }
    
    $Team = $_POST['TeamID'];
    $Link = $_POST['Link'];
    $_SESSION['PlayerID']=$PlayerID;
    $_SESSION['SetID']=$SetID;
    $_SESSION['TeamID']=$Team;
    $_SESSION['Link']=$Link;
    echo $PlayerID;
    echo $PID;
    header("Location: window1.php");
?>