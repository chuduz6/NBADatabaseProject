<html>
<body>
<table title= "GLOBAL STATS TABLW" width="200" border="5" cellpadding="4px">
GLOBAL STATISTICS
<br />
<br />

<?php
$con = mysql_connect('localhost','root','');
if (!$con)
 {
  die('Could not connect: ' . mysql_error());
  } 
mysql_select_db("nbagames", $con);

// all time highest score
echo "1) PLAYERS WITH ALL TIME HIGHEST SCORE <br/>";
echo "<br />";
?>
	<tr> 
    <td> Player ID </td> <td>First Name </td> <td>Last Name</td> <td> Minutes Played</td> <td> Field Goals Made </td> <td> Free Throws Made</td> <td> Rebounds</td> <td> Assists</td> <td> Steals</td> <td> Points</td> <td> Attendance</td> <td> Game ID</td> 
	</tr> 
<?php
$result= mysql_query("select b.id id, first_name, last_name, minutes_played, field_goals_made, free_throws_made, rebounds, assists, steals, points, attendance, game_id from boxscore as b, player as p where p.id = b.id and points >= all (select points from boxscore)"); 

while($row= mysql_fetch_assoc($result)){ 
?>
<tr> 
    <td><?php echo $row["id"] ?> </td> <td><?php echo $row["first_name"] ?></td> <td> <?php echo $row["last_name"] ?> </td> <td> <?php echo $row["minutes_played"] ?></td> <td> <?php echo $row["field_goals_made"] ?></td> <td> <?php echo $row["free_throws_made"] ?></td> <td> <?php echo $row["rebounds"] ?></td> <td> <?php echo  $row["assists"] ?></td> <td> <?php echo $row["steals"] ?></td> <td> <?php echo $row["points"] ?></td> <td> <?php echo $row["attendance"] ?></td> <td> <?php echo $row["game_id"] ?></td>
  </tr>   
<?php
}
?> </table> <?php
echo "<br />";
echo "<br />";

// names of teams that won the largest number of games in season 1995 and the numbers of games won
echo "2) TEAMS WITH HIGHEST WIN IN 1995 <br/>";
echo "<br />";
$result= mysql_query("select b.team_id, name, max(a) as cm from (select team_id, count(team_id) as a from game where team_score > opposition_team_score and id in (select id from season, game where season='1995' and date >= start_date and date <= end_date) group by team_id order by a desc) as b, team where team.id=b.team_id"); 
while($row= mysql_fetch_assoc($result)){ 
echo " TeamName: ".$row["name"]. "<br/>Number of Wins: ( " . $row["cm"]. ")";  
echo "<br />";
}

echo "<br />";
echo "<br />";

// names of team that won with highest margin 
echo "3) TEAMS WITH HIGHEST DIFFERENCE WIN <br/>";
echo "<br />";
$result= mysql_query("select CMPUNK.team_id as hh, CMPUNK.ddd as gg, name from (SELECT team_id, ABS( team_score - opposition_team_score ) as ddd FROM game WHERE team_score > opposition_team_score AND id IN ( SELECT id FROM game WHERE ABS( team_score - opposition_team_score ) >= ALL (SELECT ABS( team_score - opposition_team_score ) AS ab FROM game))) as CMPUNK, team where CMPUNK.team_id=team.id"); 
while($row= mysql_fetch_assoc($result)){ 
echo " TeamId: ".$row["hh"]. "<br/> TeamName: ".$row["name"]. "<br/>Points Difference: ( " . $row["gg"]. ")";  
echo "<br />";
}
echo "<br />";
echo "<br />";

mysql_close($con);
?>

</body>
</html>