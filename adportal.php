<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard|Admin</title>
    <link rel="stylesheet" href="portalstyle1.css">
    <!--Font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" href="Images/tabicon.ico">
</head>
<body>
    <div class="container">
        <nav>
            <ul>
                <li><a href="#" class="logo">
                 <img src="Images/admin.png">
                 <span class="nav-item">Dashboard</span>   
                </a></li>
                <li><a href="#">
                    <i class="fas fa-home"></i>
                    <span class="nav-item">Home</span>
                </a></li>
                <li><a href="PlayersList.php">
                    <i class="fas fa-users"></i>
                    <span class="nav-item">Players List</span>
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
                <h1>Player Auction is now live!<i class="fas fa-"></i></h1>
            </div>
            <div class="main-auction">
                <div class="card">
                    <i class="fas fa-wallet"></i>
                    <h3>All Purses</h3>
                    <p>Reset Participating Team Purses</p>
                    <button onclick="Resetpurse()">Reset</button>
                </div>
                <div class="card">
                    <i class="fas fa-file-signature"></i>
                    <h3>Players Auctioned</h3>
                    <p>Reset Players Succesfully Bought in the Bid-Out</p>
                    <button onclick="Resetsold()">Reset</button>
                </div>
                
                <div class="card">
                    <i class="fas fa-gavel"></i>
                    <h3>Auction</h3>
                    <p>Restart Auction</p>
                        <button onclick="ResetAuction()">Reset</button>

                </div>
            </div>

            <section class="main-auction">

            </section>
        </section>
    </div>
    <script>
        function ResetAuction()
        {
            window.location.href = 'http://localhost/CricketAuction/resetAuc.php';
        }
        function Resetpurse()
        {
            window.location.href = 'http://localhost/CricketAuction/ResetPurse.php';
        }
        function Resetsold()
        {
            window.location.href = 'http://localhost/CricketAuction/ResetSold.php';
        }
    </script>
</body>
</html>     