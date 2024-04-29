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
                            echo "Player ID : {$row['PlayerID']} <br> ".
                                "Player Name : {$row1['PlayerName']} <br> ".
                                "Purchased(in rupees) : {$row['Purchase']} <br> ".
                                "Team : {$row['TeamName']} <br> ".
                                "<br><br>";
                        }
                    }
                    else
                    {
                        echo " <br><br><br>0 Players Auctioned";
                    }
                    $_SESSION['TeamID']=$Team;
                    $_SESSION['Link']=$Link;
                ?>
        </section>
    </div>
</body>
</html>