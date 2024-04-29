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
                <h1>Players bought by your team</h1>
                <br><br><br>
                <?php
                    $conn = mysqli_connect("localhost","root","","playerauction");
                    $Team = $_SESSION['TeamID'];
                    $Link = $_SESSION['Link'];
                    $q="SELECT * from pool where TeamID ='$Team' ";
                    $retval=mysqli_query($conn,$q);
                    if(mysqli_num_rows($retval)>0)
                    {
                        while($row=mysqli_fetch_assoc($retval))
                        {
                            echo"Player ID : {$row['PlayerID']} <br> ".
                                "Player Name : {$row['PlayerName']} <br> ".
                                "Purchased(in rupees) : {$row['Purchase']} <br> ".
                                "<br><br>";
                        }
                    }
                    else
                    {
                        echo " <br><br><br>0 Players Purchased";
                    }
                    $_SESSION['TeamID']=$Team;
                    $_SESSION['Link']=$Link;
                ?>
        </section>
    </div>
</body>
</html>