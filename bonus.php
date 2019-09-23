<html>
<body>
BONUS QUESTIONS!!!
<br />
<br />

<?php
$con = mysql_connect('localhost','root','');
if (!$con)
 {
  die('Could not connect: ' . mysql_error());
  } 
mysql_select_db("nbagames", $con);

// Skyline of Jason Kidd as per the recommendation of Prof. Dr. Chengkai Li
echo "SKYLINE POINTS OF DALLAS TEAM <br />";
$result=mysql_query("select b.id, first_name, last_name, (sum(points)+sum(rebounds)+sum(assists))/3 as averg
from boxscore as b, player as p
where b.id=p.id and b.id in (select b.id
from boxscore as b, team as t, game as g
where b.game_id=g.id and g.team_id=t.id and t.name='MAVERICKS')
group by b.id
order by averg desc");
$counter2=0;
while($row= mysql_fetch_assoc($result)){ 
if($counter==5)
{
	break;
}
else
{
	echo "PlayerName: " .$row["first_name"]. " " .$row["last_name"]. "<br/>";
	$counter2=$counter+1;
}
}




mysql_close($con);
?>

</body>
</html>