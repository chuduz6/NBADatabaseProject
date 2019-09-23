<html>
<body>
FACTS!!!
<br />
<br />

<?php
$con = mysql_connect('localhost','root','');
if (!$con)
 {
  die('Could not connect: ' . mysql_error());
  } 
mysql_select_db("nbagames", $con);

// 40 OR MORE IN AT LEAST 3 CONSECUTIVE GAMES ...REMEMEBER THE QUESTION SAYS MORE THAN 40. I HAVE DONE THIS BECAUSE NO PLAYER HAS FOR MORE THAN 40 
echo "1) NAMES OF PLAYERS THAT HAVE SCORED 40 OR MORE IN AT LEAST 3 CONSECUTIVE GAMES <br /><br />";
$result= mysql_query("select boxscore.id id, first_name, last_name, points from boxscore, player where player.id=boxscore.id order by boxscore.id, game_id"); 
$prevId = 'ABCDEF01';
$counter1=0;
$counter2=0;
while($row= mysql_fetch_assoc($result)){ 
if($row["points"]>=40)
{
	if($prevId==$row["id"])
	{
		$counter1=$counter1+1;
	}
	else
	{
		$counter=1;
	}
	if($counter1==3)
	{
	
	echo "<br />";
	echo "<br />";
	echo "<br />";
	echo " PlayerName: ".$row["first_name"]. " " .$row["last_name"]. "<br />ID: ( " . $row["id"]. ")"; 
	}
	$prevId=$row["id"];
}
else
	$counter1=0;
	

//echo " PlayerName: ".$row["first_name"]. " " .$row["last_name"]. "<br />Points: ( " . $row["ptr"]. ")";  
//echo "<br />";
}
echo "<br />";
echo "<br />";



mysql_close($con);
?>

</body>
</html>