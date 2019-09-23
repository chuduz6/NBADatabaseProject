<html>
<body>
SEASON STATISTICS FOR SPECIFIC YEAR YOU ENTERED
<br /> <br /> 
<?php 

$con = mysql_connect('localhost','root','');
if (!$con)
 {
  die('Could not connect: ' . mysql_error());
  } 
mysql_select_db("nbagames", $con);
$year= $_POST["year"]; 

//print season year
echo "Season: ".$year."<br />  "; 

//Duration 
$result = mysql_query("SELECT * from SEASON where SEASON='".$year."'");
$row = mysql_fetch_assoc($result);
echo "Duration: ".$row["START_DATE"]." to ".$row["END_DATE"]."<br /> ";

//Number of teams participated
$result= mysql_query("SELECT count(DISTINCT(TEAM_ID)) TEAMCOUNT FROM GAME, SEASON WHERE SEASON = '".$year."' AND DATE >= START_DATE AND DATE <= END_DATE "); 
$row= mysql_fetch_assoc($result); 
echo "Teams Participated: ".$row["TEAMCOUNT"];  
echo "<br />";

//games played
$result= mysql_query("SELECT count((TEAM_ID)) GAMECOUNT FROM GAME, SEASON WHERE SEASON = '".$year."' AND DATE >= START_DATE AND DATE <= END_DATE "); 
$row= mysql_fetch_assoc($result); 
$row["GAMECOUNT"]=$row["GAMECOUNT"]/2;
echo "Games Played: ".$row["GAMECOUNT"]; 
echo "<br />";

// most points scored
$result= mysql_query("select a.id, first_name, last_name, max(s) as pr from (select id, sum(points) as s from boxscore where boxscore.game_id in(select distinct(boxscore.game_id ) from boxscore, season, game where season = '".$year."' and date>=start_date and date <= end_date and game.id = boxscore.game_id) group by boxscore.id order by s desc) as a, player where player.id=a.id"); 
while($row= mysql_fetch_assoc($result)){ 
echo " Most Points Scored: ".$row["first_name"]. " " .$row["last_name"]. " ( " . $row["pr"]. ")";  
echo "<br />";
}

// most assists made
$result= mysql_query("select a.id, first_name, last_name, max(s) as pr from (select id, sum(assists) as s from boxscore where boxscore.game_id in(select distinct(boxscore.game_id ) from boxscore, season, game where season = '".$year."' and date>=start_date and date <= end_date and game.id = boxscore.game_id) group by boxscore.id order by s desc) as a, player where player.id=a.id"); 
while($row= mysql_fetch_assoc($result)){
echo " Most Assists Made: ".$row["first_name"]. " " .$row["last_name"]. " ( " . $row["pr"]. ")";  
echo "<br />";
}
 
mysql_close($con);
?>
</body>
</html>