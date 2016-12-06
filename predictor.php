<html>
<head>
	<h2>League of Legends - Duel Decider</h2>
</head>
<body>
	<p>
		Hello! and welcome to the Duel Decider!<br>
		This application will gather some statistics about<br>
		a given state of two players: their runes and masteries<br>
		levels, items, and champion played. After this information<br>
		has been gathered, it will then provide a break down of how<br>
		the one on one matchup between the two can be expected to go.<br><br>
		NOTE: In its current state, this calculator will not account for<br>
		extraneous variables, including but not limited to: active abilities,<br>
		champion abilities, and third party stat modifications not included<br>
		in the static data for an item's statistics.<br><br>
		As such this tool will most accurately represent AD Carries<br>
		and other auto attack based champions in its current state.<br><br>
		Please select two summoners from the drop down list!<br>
		If your summoner does not appear follow <a href="/summonerinsert.php">this link</a> to <br>
		create a new one.<br>
	</p>
	
	<?php
		// This configures the variables for database access
		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = 'password';
		$dbname = 'database_project';


		// This will connect to the server and then the correct database
		$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
		mysql_select_db($dbname);
		
		echo "
		<datalist id='summoner1'>";
		
		$sql="SELECT SummonerName FROM summoner";
		$ret = mysql_query($sql,$conn);
		while($row = mysql_fetch_row($ret)){
			echo "<option value=$row[0]>";
		}
		
		echo "</datalist>";
	?>
    <p>
	<form action="results.php" method="get">
	  Summoner 1: <input type="text" name="s1" list="summoner1"><br><br />
	  Summoner 2: <input type="text" name="s2" list="summoner1"><br><br />
	<Input type="submit" name="summoners">
	</form>
	</p>
</body>
</html>