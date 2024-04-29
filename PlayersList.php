<?php
session_start();
$connection = mysqli_connect("localhost","root","", "login");
$conn = mysqli_connect("localhost","root","","playerauction");
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="portalstyle1.css">
    <!--Font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" href="Images/tabicon.ico">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="adportal.php" class="logo">
                 <img src="Images/admin.png">
                 <span class="nav-item">Dashboard</span>   
                </a></li>
                <li><a href="adportal.php">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a></li>
                <li><a href="PlayersList.php">
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
                <h1>Players Participating in the Auction</h1>
                <div>
                <br><br><br>
                <table BORDER ="2" cellspacing="25" cellpadding="10">
                <tr>
                <th> Player Name </th>
                <th> Player Set ID </th>
                <th> Base Price (INR) </th>
                </tr>
                <?php
                    $conn = mysqli_connect("localhost","root","","playerauction");
                    $q="SELECT * from pool";
                    $retval=mysqli_query($conn,$q);
                    if(mysqli_num_rows($retval)>0)
                    {
                        while($row=mysqli_fetch_assoc($retval))
                        {
                            if($row['PlayerID']<25)
                            {
                                $e1=$row['SetID'];
                                $e2=$row['PlayerName'];
                                $e3=$row['BasePrice'];
                                
                               echo"
                                <tr>
                                <td> $e2 </td>
                                <td> $e1 </td>
                                <td> $e3</td>
                                <tr> ";
                            }
                        }
                    }
                    else
                    {
                        echo " <br><br><br>0 Players Participating in Auction";
                    }
                    
                ?>
                </div>
        </section>
    </div>
</body>
</html>