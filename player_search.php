<html >
<body>
SEARCH RESULT FOR THE NAME YOU TYPED:
<br /> 
2) PLEASE CLICK ON THE PLAYER ID TO SEE THE PLAYER DETAILS. <br />
<table title= "PLAYER SEARCH INFO" width="200" border="5" cellpadding="4px">
<?php 

$con = mysql_connect('localhost','root','');
if (!$con)
 {
  die('Could not connect: ' . mysql_error());
  } 
mysql_select_db("nbagames", $con);
$name= $_POST["name"]; 
$result = mysql_query("SELECT * from PLAYER where LAST_NAME='". $name."' or FIRST_NAME='". $name."'");
    ?>
	<tr> 
    <td> Id </td> <td>FirstName </td> <td>LastName</td> <td> Position </td> <td> FirstSeason</td> <td> LastSeason</td> <td> HeightFeet</td> <td> HeightInches</td> <td> Weight</td> <td> College</td> <td> BirthDate</td> 
    </tr> 
<?php while ($row = mysql_fetch_assoc($result)) {?>
  <tr> 
    <td> <form action="player_info.php" method="post"> 
	<input type="submit" value="<?php echo $row["ID"] ?>" name="id" />     
    </form></td> <td><?php echo $row["FIRST_NAME"] ?> </td> <td><?php echo $row["LAST_NAME"] ?></td> <td> <?php echo $row["POSITION"] ?> </td> <td> <?php echo $row["FIRST_SEASON"] ?></td> <td> <?php echo $row["LAST_SEASON"] ?></td> <td> <?php echo $row["HEIGHT_FEET"] ?></td> <td> <?php echo $row["HEIGHT_INCHES"] ?></td> <td> <?php echo  $row["WEIGHT"] ?></td> <td> <?php echo $row["COLLEGE"] ?></td> <td> <?php echo $row["BIRTHDAY"] ?></td> 
  </tr>
<?php }
mysql_close($con);
?>
</table>
</body>
</html>