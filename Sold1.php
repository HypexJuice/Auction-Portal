<?php
session_start();
$connection = mysqli_connect("localhost","root","", "login");
$Team = $_SESSION['TeamID'];
$Link = $_SESSION['Link'];
$conn = mysqli_connect("localhost","root","","playerauction");
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="portalstyle.css">
    <!--Font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" href="Images/tabicon.ico">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="portal.php" class="logo">
                 <img src="Images/admin.png">
                 <span class="nav-item">Dashboard</span>   
                </a></li>
                <li><a href="portal.php">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a></li>
                <li><a href="Purse.php">
                    <i class="fas fa-wallet"></i>
                    <span class="nav-item">Purse</span>
                </a></li>
                <li><a href="Players.php">
                    <i class="fas fa-users"></i>
                    <span class="nav-item">Players</span>
                </a></li>
                <li><a href="Contact.html">
                    <i class="fas fa-question"></i>
                    <span class="nav-item">Help</span>
                </a></li>
                <li><a href="signout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Logout</span>
                </a></li>
            </ul>
        </nav>
        <section class="main">
            <div class="main-top">
            <h1>Players under the hammer</h1>
            <div>
                
                <br><br><br>
            <table BORDER ="2" cellspacing="25" cellpadding="10">
                <tr>
                <th> PlayerID </th>
                <th> Player Name </th>
                <th> Purchased (INR) </th>
                <th> Team </th>
                </tr>
                <?php
                    $Team = $_SESSION['TeamID'];
                    $Link = $_SESSION['Link'];

                    $auction = "SELECT * from auction ";
                    $retval = mysqli_query($conn,$auction);

                    $auctionplay = "SELECT * from pool ";
                    $retval1 = mysqli_query($conn,$auctionplay);

                    if(mysqli_num_rows($retval)>0)
                    {
                        while($row=mysqli_fetch_assoc($retval))
                        {
                            $pid=$row['PlayerID'];
                            $auctionplay = "SELECT PlayerName from pool where PlayerID = '$pid'";
                            $retval1 = mysqli_query($conn,$auctionplay);
                            $row1=mysqli_fetch_assoc($retval1);
                            $e1=$row['PlayerID'];
                            $e2=$row1['PlayerName'];
                            $e3=$row['Purchase'];
                            $e4=$row['TeamName'];
                           echo"
                            <tr>
                            <td> $e1 </td>
                            <td> $e2 </td>
                            <td> $e3</td>
                            <td> $e4</td>
                            <tr> ";
                        }
                    }
                    else
                    {
                        echo " <br><br><br>0 Players Auctioned";
                    }
                    $_SESSION['TeamID']=$Team;
                    $_SESSION['Link']=$Link;
                ?>
            <div>    
        </section>
    </div>
</body>
</html>