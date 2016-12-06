<html>
<head>
</head>
<body>

<form action="" method="post">
  ChampionName:<input type="text" name="cname"><br />
  ChampionLevel: <input type="text" name="clevel"><br />
  SummonerName: <input type="text" name="name"><br />
<Input type="submit" name="submit1">
</form>

<?php
$sql = "no value";
if (isset($_POST['submit1'])){
$sql = "test";

$con = mysql_connect("localhost", "root", "password") or
  die("Cannot connect: " . mysql_error());

mysql_select_db("database_project",$con);
$sql = "INSERT INTO Summoner (ChampionName, ChampionLevel, SummonerName) VALUES('$_POST[cname]','$_POST[clevel]','$_POST[name]')";

mysql_query($sql,$con);

mysql_close($con);
}


//echo $sql;
 ?>

<form action="" method="post">
  SummonerName:<input type="text" name="sname"><br />
  RuneName: <input type="text" name="rname"><br />
<Input type="submit" name="submit2">
</form>

<?php
$sql = "no value";
if (isset($_POST['submit2'])){
$sql = "test";

$con = mysql_connect("localhost", "root", "password") or
  die("Cannot connect: " . mysql_error());

mysql_select_db("database_project",$con);
$sql = "INSERT INTO SumRunes (SummonerName, RunesName) VALUES('$_POST[sname]','$_POST[rname]')";

mysql_query($sql,$con);

mysql_close($con);
}


//echo $sql;
 ?>

<form action="" method="post">
  SummonerName:<input type="text" name="sname"><br />
  MasteryID: <input type="text" name="mid"><br />
<Input type="submit" name="submit3">
</form>

<?php
$sql = "no value";
if (isset($_POST['submit3'])){
$sql = "test";

$con = mysql_connect("localhost", "root", "password") or
  die("Cannot connect: " . mysql_error());

mysql_select_db("database_project",$con);
$sql = "INSERT INTO SumMasteries (SummonerName, MasteryID) VALUES('$_POST[sname]','$_POST[mid]')";

mysql_query($sql,$con);

mysql_close($con);
}


//echo $sql;
 ?>

<form action="" method="post">
  SummonerName:<input type="text" name="sname"><br />
  ItemsName: <input type="text" name="iname"><br />
<Input type="submit" name="submit4">
</form>

<?php
$sql = "no value";
if (isset($_POST['submit4'])){
$sql = "test";

$con = mysql_connect("localhost", "root", "password") or
  die("Cannot connect: " . mysql_error());

mysql_select_db("database_project",$con);
$sql = "INSERT INTO SumItems (SummonerName, ItemsName) VALUES('$_POST[sname]','$_POST[iname]')";

mysql_query($sql,$con);

mysql_close($con);
}


//echo $sql;
 ?>

</body>
</html>
