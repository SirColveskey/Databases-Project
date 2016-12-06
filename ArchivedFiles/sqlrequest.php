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
$condition = "(HP) > '600'";
$result = mysql_query("SELECT * FROM champions WHERE ".$condition,$conn);

while($row = mysql_fetch_row($result)){
	echo "<br>".$row[0]."<br>";
}

?>
