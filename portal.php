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
                <li><a href="#" class="logo">
                 <img src="Images/admin.png">
                 <span class="nav-item">Dashboard</span>   
                </a></li>
                <li><a href="#">
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
                <h1>Player Auction is now live!<i class="fas fa-"></i></h1>
            </div>
            <div class="main-auction">
                <div class="card">
                    <i class="fas fa-wallet"></i>
                    <h3>All Purses</h3>
                    <p>Display all Teams participating Purses</p>
                    <button onclick="purse()">View</button>
                </div>
                <div class="card">
                    <i class="fas fa-file-signature"></i>
                    <h3>Players Auctioned</h3>
                    <p>All the Players succesfully bought in the  bid-out</p>
                    <button onclick="sold()">View</button>
                </div>
                
                <div class="card">
                    <i class="fas fa-gavel"></i>
                    <h3>Auction</h3>
                    <p>Auction is underway!</p>
                        <button onclick="redirect()">Start</button>

                </div>
            </div>

            <section class="main-auction">

            </section>
        </section>
    </div>
    <script>
        function redirect()
        {
            window.location.href = 'http://localhost/CricketAuction/window.php';
        }
        function purse()
        {
            window.location.href = 'http://localhost/CricketAuction/PurseAll1.php';
        }
        function sold()
        {
            window.location.href = 'http://localhost/CricketAuction/Sold1.php';
        }
    </script>
</body>
</html>     