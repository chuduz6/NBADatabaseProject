<html>
<body>
WELCOME TO THE NBA DATABASE:
<br />
WE ANSWER VARIOUS QUESTIONS.
<br />
<br />
1) If you want to search a player by lastname or firstname. <br />
Please enter the name of the player you want to search:  <br />
The search result will give you an option to click on player id to display player info.  <br />

<form method="post" action="player_search.php" >
<input name="name" type="text" />
<input name="aa" type="submit" value="click" />
</form>
<br />
<br />

3) Please enter the desired year you want to search: 
<br />
This search is show you the season statistics for the specific year you typed.
<form method="post" action="season_stat.php" >
<input name="year" type="text" />
<input name="bb" type="submit" value="click" />
</form>
<br /><br />
4) Global Statistics Click here
<br />
<form method="post" action="global_stat.php" >
<input name="bb" type="submit" value="GlobalStats" />
</form>
<br /><br />

5) Facts 
<form method="post" action="facts.php" >
<input name="bb" type="submit" value="Facts" />
</form>
<br /><br />

6) Bonus 
<form method="post" action="bonus.php" >
<input name="bb" type="submit" value="Bonus" />
</form>
<br /><br />

</body>
</html>