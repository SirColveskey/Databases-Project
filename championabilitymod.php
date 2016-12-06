<html>
<head>
</head>
<body>
<?php

$con = mysql_connect("localhost", "root", "password");
if (!$con){
  die("Cannot connect: " . mysql_error());
}

mysql_select_db("database_project",$con);
/*if (empty($_POST)){echo "First time?<br>";}
else{echo "Action occurred?<br>";
	 echo $_POST['name']."<br>";};*/

if (isset($_POST['update'])){
	//echo "Update Called!<br>";
	$UpdateQuery = "UPDATE championabilities SET ID = '$_POST[id]', CName = '$_POST[cname]', AName = '$_POST[aname]' WHERE ID='$_POST[hidden]'";
	mysql_query($UpdateQuery, $con);
};

if (isset($_POST['delete'])){
	//echo "Delete Called!<br>";
	$DeleteQuery = "DELETE FROM championabilities WHERE ID = '$_POST[hidden]'";
	mysql_query($DeleteQuery, $con);
  //echo $DeleteQuery;
};

if (isset($_POST['add'])){
	//echo "Add Called!<br>";
	$AddQuery = "INSERT INTO championabilities (ID, CName, AName) VALUES('$_POST[uid]','$_POST[ucname]','$_POST[uaname]')";
	mysql_query($AddQuery, $con);
};


$sql = "SELECT * FROM championabilities";
$myData = mysql_query($sql,$con);
echo "<table border=1>
<tr>
<th>ID</ th>
<th>CName</ th>
<th>AName</ th>
</tr>";


while($record=mysql_fetch_array($myData)){
echo "<form action = '' method = post>";
echo "<tr>";
echo "<td>" . "<input type = text name = id value ='" . $record['ID'] . "'> </td>";
echo "<td>" . "<input type = text name = cname value ='" . $record['CName'] . "'> </td>";
echo "<td>" . "<input type = text name = aname value ='" . $record['AName'] . "'> </td>";
echo "<td>" . "<input type = hidden name = hidden value ='" . $record['ID'] . "'> </td>";
echo "<td>" . "<input type = submit name = update value = update" . "> </td>";
echo "<td>" . "<input type = submit name = delete value = delete" . "> </td>";
echo "</tr>";
echo "</form>";
}
echo "<form action = '' method = post>";
echo "<tr>";
echo "<td><input type = text name = uid></td>";
echo "<td><input type = text name = ucname></td>";
echo "<td><input type = text name = uaname></td>";
echo "<td>" . "<input type = submit name = add value = add" . "> </td>";

echo "</tr>";
echo "</form>";
echo "</table>";

mysql_close($con);

 ?>
</body>
</html>
