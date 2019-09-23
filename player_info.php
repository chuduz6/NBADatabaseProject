<html>
<body>
PLAYER INFO <br /> <br />
<table  title="PLAYER INFO" width="100" border="5" cellpadding="4px">

<?php 
$con = mysql_connect('localhost','root','');
if (!$con)
 {
  die('Could not connect: ' . mysql_error());
 } 
	mysql_select_db("nbagames", $con);
	$player_id=  $_POST["id"];
	$result = mysql_query("SELECT * from PLAYER where ID='".$player_id."'");
	$row = mysql_fetch_assoc($result);
	//first name and last name
	echo "Name :".$row["FIRST_NAME"]." ".$row["LAST_NAME"]."<br />"; 
	
	// age
	$birthday= $row["BIRTHDAY"];  
	define("Y",     "curdate()");
	$birthyear= date("Y", strtotime($birthday)); 
	$age= date(Y)-$birthyear;
	echo "Age: ".$age."<br />"; 
	
	// Height
	echo "Height: ".$row["HEIGHT_FEET"]." feet ".$row["HEIGHT_INCHES"]." inches <br />"; 
	
	//weight
	echo "Weight: ".$row["WEIGHT"]." pounds <br /> ";
	
	//college
	echo "College: ".$row["COLLEGE"]."<br />"; 
	
	//seasons played
	
	$seasons_played= mysql_query("select count(distinct(season)) ct from season as s, boxscore as b, game as g where b.id='".$player_id."' and s.start_date<=g.date and s.end_date>=g.date and g.id = b.game_id ");
	$season1 = mysql_fetch_assoc($seasons_played);
	echo "Seasons Played: ".$season1["ct"]."<br />";
	
	
	//career total points 
	$career_points=mysql_query("SELECT SUM(POINTS) FROM BOXSCORE where ID='".$player_id."' GROUP BY ID ");
	$row = mysql_fetch_assoc($career_points); 
	echo "Career Total Points: ".$row["SUM(POINTS)"]."<br />";	
	
	//career total Assists 
	$Assists=mysql_query("SELECT SUM(ASSISTS) FROM BOXSCORE where ID='".$player_id."' GROUP BY ID ");
	$row = mysql_fetch_assoc($Assists); 
	echo "Career Total Assists: ".$row["SUM(ASSISTS)"]."<br />";
	
	//career total points 
	$points=mysql_query("SELECT SUM(REBOUNDS) FROM BOXSCORE where ID='".$player_id."' GROUP BY ID ");
	$row = mysql_fetch_assoc($points); 
	echo "Career Total Rebounds: ".$row["SUM(REBOUNDS)"]."<br /><br /> ";
	//PER SEASON
	echo "PER SEASONS STATISTICS <br />";	
	
	 $result = mysql_query("SELECT SEASON, count( distinct GAME.ID ) count, SUM(MINUTES_PLAYED) min ,SUM(POINTS) pts,SUM(ASSISTS) asts, SUM(REBOUNDS) rebs FROM GAME, BOXSCORE, PLAYER, SEASON  WHERE START_DATE <= GAME.DATE AND   END_DATE >= GAME.DATE AND GAME.ID = BOXSCORE.GAME_ID AND PLAYER.ID = '".$player_id."' AND PLAYER.ID = BOXSCORE.ID  GROUP BY (SEASON)");
    ?>
	<tr> 
    <td> SEASON </td> <td>GAMES PLAYED </td> <td>MINUTES PLAYED</td> <td> POINTS </td> <td> ASSISTS</td> <td> REBOUNDS</td> 
    </tr> 
<?php while ($row = mysql_fetch_assoc($result)) {?>
  <tr> 
    
    <td><?php echo $row["SEASON"] ?> </td> <td><?php echo $row["count"] ?></td> <td> <?php echo $row["min"] ?> </td> <td> <?php echo $row["pts"] ?></td> <td> <?php echo $row["asts"] ?></td> <td> <?php echo $row["rebs"] ?></td> 
  </tr>	
<?php } 
?>
</table>
<br /> <br /> <br />
<table  title="PLAYER INFO" width="100" border="5" cellpadding="4px">
<?php
// PER TEAM
echo "PER TEAM STATISTICS <br />";	

	 $ram = mysql_query("SELECT NAME, count( distinct GAME.ID ) count, SUM(MINUTES_PLAYED) min ,SUM(POINTS) pts,SUM(ASSISTS) asts, SUM(REBOUNDS) rebs FROM GAME, BOXSCORE, PLAYER, SEASON, TEAM  WHERE START_DATE <= GAME.DATE AND   END_DATE >= GAME.DATE AND GAME.ID = BOXSCORE.GAME_ID AND PLAYER.ID = '".$player_id."' AND PLAYER.ID = BOXSCORE.ID  AND TEAM.ID=GAME.TEAM_ID GROUP BY (NAME)");
    ?>
	<tr> 
    <td> NAME </td> <td>GAMES PLAYED </td> <td>MINUTES PLAYED</td> <td> POINTS </td> <td> ASSISTS</td> <td> REBOUNDS</td> 
    </tr> 
<?php while ($row = mysql_fetch_assoc($ram)) {?>
  <tr> 
    
    <td><?php echo $row["NAME"] ?> </td> <td><?php echo $row["count"] ?></td> <td> <?php echo $row["min"] ?> </td> <td> <?php echo $row["pts"] ?></td> <td> <?php echo $row["asts"] ?></td> <td> <?php echo $row["rebs"] ?></td> 
  </tr>	
<?php }




	


//close the connection 
	mysql_close($con); ?>
	
</table>	
</body>
</html>