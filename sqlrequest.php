<?php
echo "This page contains examples for SQL requests to the localhosted databases.<br><br>";
// This configures the variables for database access
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'password';
$dbname = 'database_project';


// This will connect to the server and then the correct database
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);

echo "<table><tr><td align = center><br>==================================================".
     "<br>Example 1".
     "<br>Select All Champions with >600 Base HP".
     "<br>==================================================<br></td></tr></table>";
$condition = "(HP) > '600'";
$result = mysql_query("SELECT Name FROM champions WHERE ".$condition,$conn);

while($row = mysql_fetch_row($result)){
	echo "<br>";
	foreach($row as $item)
	{
		echo "|";
		echo " ".$item." ";
		echo "|";
	}
	echo "<br>";
}

echo "<table><tr><td align = center><br>==================================================".
     "<br>Example 2".
     "<br>Shows all keystone masteries by name and their abilities".
     "<br>==================================================<br></td></tr></table>";

$result = mysql_query("SELECT masteries.Name, effect FROM masteries JOIN (masteryabilities JOIN abilities ON masteryabilities.AName = abilities.Name) ON masteries.MasteryID = masteryabilities.Mid WHERE MaxRank = 1");

while($row = mysql_fetch_row($result)){
	echo "<br>";
	foreach($row as $item)
	{
		echo "|";
		echo " ".$item." ";
		echo "|";
	}
	echo "<br>";
}

echo "<table><tr><td align = center><br>==================================================".
     "<br>Example 3".
     "<br>Shows champions and their abilities with significant cooldowns (>30s)".
     "<br>==================================================<br></td></tr></table>";

$result = mysql_query("SELECT CName, AName, Cooldown FROM championabilities JOIN abilities ON AName = Name WHERE Cooldown > 30");

while($row = mysql_fetch_row($result)){
	echo "<br>";
	foreach($row as $item)
	{
		echo "|";
		echo " ".$item." ";
		echo "|";
	}
	echo "<br>";
}

echo "<table><tr><td align = center><br>==================================================".
     "<br>Example 4".
     "<br>Shows all masteries by name and counts their abilities".
     "<br>==================================================<br></td></tr></table>";

$result = mysql_query("SELECT masteries.Name, count(*) FROM masteries JOIN (masteryabilities JOIN abilities ON masteryabilities.AName = abilities.Name) ON masteries.MasteryID = masteryabilities.Mid GROUP BY masteries.Name");

while($row = mysql_fetch_row($result)){
	echo "<br>";
	foreach($row as $item)
	{
		echo "|";
		echo " ".$item." ";
		echo "|";
	}
	echo "<br>";
}
?>
