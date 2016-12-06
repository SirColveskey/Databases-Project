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
	$UpdateQuery = "UPDATE abilities SET Name = '$_POST[name]', effect = '$_POST[effect]', mTrigger = '$_POST[mtrigger]', Scaling = '$_POST[scaling]',Damage = '$_POST[damage]', DamageType = '$_POST[damagetype]', Cooldown = '$_POST[cooldown]' WHERE Name='$_POST[hidden]'";
	mysql_query($UpdateQuery, $con);
};

if (isset($_POST['delete'])){
	//echo "Delete Called!<br>";
	$DeleteQuery = "DELETE FROM abilities WHERE Name = '$_POST[hidden]'";
	mysql_query($DeleteQuery, $con);
  
};

if (isset($_POST['add'])){
	//echo "Add Called!<br>";
	$AddQuery = "INSERT INTO abilities (Name, effect, mTrigger, Scaling, Damage, DamageType, Cooldown) VALUES('$_POST[uname]','$_POST[ueffect]','$_POST[umtrigger]','$_POST[uscaling]','$_POST[udamage]','$_POST[udamagetype]','$_POST[ucooldown]')";
	mysql_query($AddQuery, $con);
};


$sql = "SELECT * FROM abilities";
$myData = mysql_query($sql,$con);
echo "<table border=1>
<tr>
<th>Name</ th>
<th>effect</ th>
<th>mTrigger</ th>
<th>Scaling</ th>
<th>Damage</ th>
<th>DamageType</ th>
<th>Cooldown</ th>
</tr>";


while($record=mysql_fetch_array($myData)){
echo "<form action = '' method = post>";
echo "<tr>";
echo "<td>" . "<input type = text name = name value ='" . $record['Name'] . "'> </td>";
echo "<td>" . "<input type = text name = effect value ='" . $record['effect'] . "'> </td>";
echo "<td>" . "<input type = text name = mtrigger value ='" . $record['mTrigger'] . "'> </td>";
echo "<td>" . "<input type = text name = scaling value ='" . $record['Scaling'] . "'> </td>";
echo "<td>" . "<input type = text name = damage value ='" . $record['Damage'] . "'> </td>";
echo "<td>" . "<input type = text name = damagetype value ='" . $record['DamageType'] . "'> </td>";
echo "<td>" . "<input type = text name = cooldown value ='" . $record['Cooldown'] . "'> </td>";
echo "<td>" . "<input type = hidden name = hidden value ='" . $record['Name'] . "'> </td>";
echo "<td>" . "<input type = submit name = update value = update" . "> </td>";
echo "<td>" . "<input type = submit name = delete value = delete" . "> </td>";
echo "</tr>";
echo "</form>";
}
echo "<form action = '' method = post>";
echo "<tr>";
echo "<td><input type = text name = uname></td>";
echo "<td><input type = text name = ueffect></td>";
echo "<td><input type = text name = umtrigger></td>";
echo "<td><input type = text name = uscaling></td>";
echo "<td><input type = text name = udamage></td>";
echo "<td><input type = text name = udamagetype></td>";
echo "<td><input type = text name = ucooldown></td>";
echo "<td>" . "<input type = submit name = add value = add" . "> </td>";

echo "</tr>";
echo "</form>";
echo "</table>";

mysql_close($con);

 ?>
</body>
</html>
