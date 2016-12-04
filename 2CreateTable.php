<html>
<head>
</head>
<body>
<?php
$con = mysql_connect("localhost", "root", "");
if (!$con){
  die("Cannot connect: " . mysql_error());
}

mysql_select_db("League Project",$con);
$sql = "CREATE TABLE Summoner(
ChampionName varchar(20),
ChampionLevel INT,
SummonerName varchar(20)
)";
mysql_query($sql,$con);
$sql = "CREATE TABLE SumRunes(
SummonerName varchar(20),
RunesName varchar(20),
/*FOREIGN KEY (SummonerName) REFERENCES Summoner(SummonerName),
FOREIGN KEY (RunesName) REFERENCES Runes(Name)*/
)";
mysql_query($sql,$con);
$sql = "CREATE TABLE SumMasteries(
SummonerName varchar(20),
MasteryID INT,
/*FOREIGN KEY (SummonerName) REFERENCES Summoner(SummonerName),
FOREIGN KEY (MasteryID) REFERENCES MasteryID(Name)*/
)";
mysql_query($sql,$con);
$sql = "CREATE TABLE SumItems(
SummonerName varchar(20),
ItemsName varchar(20),
/*FOREIGN KEY (SummonerName) REFERENCES Summoner(SummonerName),
FOREIGN KEY (ItemsName) REFERENCES Items(Name)*/
)";
mysql_query($sql,$con);

mysql_close($con);
 ?>
</body>
</html>
