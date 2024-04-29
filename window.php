<?php
    session_start();
    $connection = mysqli_connect("localhost","root","", "login");
    $Team = $_SESSION['TeamID'];
    $Link = $_SESSION['Link'];
    $conn = mysqli_connect("localhost","root","","playerauction");
    $PID ='1';
    $SID ='MQ';
    $q="SELECT * FROM pool WHERE PlayerID='$PID'";
    $retval = mysqli_query($conn,$q);
    $row = mysqli_fetch_assoc($retval);
    $PhotoLink = $row["PhotoLink"];
    $Pname = $row['PlayerName'];
    $Bp = $row['BasePrice'];
    $Nation = $row['Nationality'];
    $DOB = $row['DOB'];
    $q1="SELECT * FROM pool WHERE SetID='$SID' and PlayerID > '$PID'";
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
      <div class="player-image" style="background-image: url('<?php echo $PhotoLink?>');"></div>
      <div class="card-body player-details">
        <h5 class="card-title player-name"><?php echo $Pname ?></h5>
        <br><br>
        <br>
        <div class="player-info">
          <p class="player-age">Date Of Birth: <?php echo $DOB ?></p>
          <br><br><br>
          <p class="player-country">Country: <?php echo $Nation ?></p>
        </div>
        <p class="player-price"></p>
        <p class="player-price">Base Price :<?php echo $Bp ?></p>
        <p class="player-price">Current Bid :<?php
          if(is_null($row['Purchase']))
            echo "-";
          else
            echo  $row['Purchase']; 
        ?>
        <p class="player-price">Highest Bidder :<?php
          if(is_null($row['Purchase']))
            echo "-";
          else
            echo  strtoupper($row['TeamID']); 
        ?>
      <br><br><br>
      <form action="update.php" method="post" >
        <input type="hidden" name="Team" value="<?php echo $Team; ?> ">
        <input type="hidden" name="PlayerID" value="<?php echo $PID; ?> ">
        <input type="hidden" name="SetID" value="<?php echo $SID; ?> ">
        <input type="hidden" name="row" value="<?php echo $row; ?> ">
        <input type="hidden" name="Link" value="<?php echo $Link; ?> ">
        <input type="hidden" name="Highest" value="<?php echo $bool; ?>">
        <input type="hidden" name="OppTeam" value="<?php echo $OppTeam; ?>">
        <input type="submit" class="submit-btn" value="Bid" id="submit-bid" onclick="disableBtn()">
      </form>
      <br><br><br><!--FOR ENDING BID ON PLAYER-->
      <form action ="endbid.php" method="post">
        <input type="hidden" name="PID" value="<?php echo $PID; ?> ">
        <input type="hidden" name="SID" value="<?php echo $SID; ?> ">
        <input type="hidden" name="TeamID" value="<?php echo $Team; ?> ">
        <input type="hidden" name="Link" value="<?php echo $Link; ?> ">
        <input type="submit" class="submit-btn" value="End Bid For Player"> <!--endbid-->
      </form>

      <br><br><br>
      </div>
    
      <div class="highlight"></div>
    </div>
    
    
    <section class="up-section">
        <div class="upcoming"> Upcoming players in Set:<?php echo $SID; ?></div>
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