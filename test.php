<?php
    $conn = mysqli_connect("localhost","root","","playerauction");
    $randq = "SELECT TeamID from teams ORDER BY rand() LIMIT 1";
    $randval = mysqli_query($conn,$randq);
    $rowrand = mysqli_fetch_assoc($randval);
    $OppTeam = $rowrand['TeamID'];
    $Team = 'rcb';
    echo $OppTeam;
    echo $Team;
    if  ($Team != $OppTeam)
        echo "Not Same";
    else
        echo "Same";
