<?php
    session_start();
    $connection = mysqli_connect("localhost","root","", "login");
    $Team = $_SESSION['TeamID'];
    $Link = $_SESSION['Link'];
    $conn = mysqli_connect("localhost","root","","playerauction");
    
    
    $PlayerID = $_SESSION['PlayerID'];
    $SetID = $_SESSION['SetID'];
    $query5="SELECT * from pool where PlayerID = '$PlayerID'";
    $retval5 = mysqli_query($conn,$query5);
    $row5 = mysqli_fetch_assoc($retval5);
    
    $q1="SELECT * FROM pool WHERE SetID='$SetID' and PlayerID > '$PlayerID'";
    $retval1= mysqli_query($conn,$q1);
    
?>
<?php
  $randq = "SELECT TeamID from teams ORDER BY rand() LIMIT 1";
  $randval = mysqli_query($conn,$randq);
  $rowrand = mysqli_fetch_assoc($randval);
  $OppTeam = $rowrand['TeamID'];
  if(strcmp($OppTeam,$Team)!=0)
     $bool = true;
  else
  $bool = false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Player Auction</title>
  <script src="random.js"></script>
  <!-- Link to CSS stylesheet -->
  <link rel="stylesheet" href="window.css">
  <link rel="icon" href="Images/tabicon.ico">
</head>
<body>
  <!-- Navigation bar -->
  <header class="header">
    <div class="header__logo">
      <?php echo "<img src=\"$Link\" style=\"width:45px;height:45px;\">";?>
    </div>
    <div class="header_title"><h1>Player Auction</h1></div>
    <nav class="header__nav">
      
      
    </nav>
  </header>

    <!-- Player cards -->
    <section class="main-section">
        <div class="card player-card">
      <div class="player-image" style="background-image: url('<?php echo $row5['PhotoLink']?>');"></div>
      <div class="card-body player-details">
        <h5 class="card-title player-name"><?php echo $row5['PlayerName'] ?></h5>
        <br><br>
        <br>
        <div class="player-info">
          <p class="player-age">Date Of Birth: <?php echo $row5['DOB'] ?></p>
          <br><br><br>
          <p class="player-country">Country: <?php echo $row5['Nationality'] ?></p>
        </div>
        <p class="player-price"></p>
        <p class="player-price">Base Price :<?php echo $row5['BasePrice'] ?></p>
        <p class="player-price">Current Bid :<?php
          if(is_null($row5['Purchase']))
            echo "-";
          else
            echo  $row5['Purchase']; 
        ?>
        <p class="player-price">Highest Bidder :<?php
          if(is_null($row5['Purchase']))
            echo "-";
          else
            echo  strtoupper($row5['TeamID']); 
        ?>
        <div id='Announce'><p></p></div>
        <br><br><br>
        <form action="update1.php" method="post" >
        <input type="hidden" name="Team" value="<?php echo $Team; ?> ">
        <input type="hidden" name="PlayerID" value="<?php echo $row5['PlayerID']; ?> ">
        <input type="hidden" name="SetID" value="<?php echo $row5['SetID']; ?> ">
        <input type="hidden" name="Link" value="<?php echo $Link; ?> ">
        <input type="hidden" name="Highest" value="<?php echo $bool; ?>">
        <input type="hidden" name="OppTeam" value="<?php echo $OppTeam; ?>">
        <input type="submit" class="submit-btn" value="Bid" id="submit-bid" onclick="disableBtn()">
      </form>
      <br><br><br><!--FOR ENDING BID ON PLAYER-->
      <form action ="endbid.php" method="post">
        <input type="hidden" name="PID" value="<?php echo $PlayerID; ?> ">
        <input type="hidden" name="SID" value="<?php echo $SetID; ?> ">
        <input type="hidden" name="TeamID" value="<?php echo $Team; ?> ">
        <input type="hidden" name="Link" value="<?php echo $Link; ?> ">
        <input type="submit" class="submit-btn" value="End Bid For Player"> <!--endbid-->
      </form>

      <br><br><br>
      </div>
    
      <div class="highlight"></div>
    </div>
    
    
    <section class="up-section">
        <div class="upcoming"> Upcoming players in Set:<?php echo $SetID; ?></div>
        <div><br></div>
        


    <div class="card player-card">
      
      <div class=" card_body player-details">
        <h6 class="card_title upplayer-name">
          <?php if(mysqli_num_rows($retval1) > 0)
            {
              echo "Player Name:<br>";
              while($row1 = mysqli_fetch_assoc($retval1))
              {
                echo "{$row1['PlayerName']} <br> ";
              }
            }
            else
            {
                echo "Next Set Upcoming";
            }
          ?></h6>
        
      </div>
    </div>
    <!-- Repeat player cards as needed -->
    <div><br><br><br></div>



  </section>
  <script>
    function disableBtn() 
    { 

        document.getElementById("submit-bid").disabled = <?php  if($Bp ==$row['Purchase'] || is_null($row['Purchase'])) echo false; else echo $bool;?>
    }
    </script>
</body>
</html>
