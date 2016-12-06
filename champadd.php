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
	$UpdateQuery = "UPDATE Champions SET Name = '$_POST[name]', HPscaling = '$_POST[hpscaling]', HP = '$_POST[hp]', MPscaling = '$_POST[mpscaling]',MP = '$_POST[mp]', ADscaling = '$_POST[adscaling]', ad = '$_POST[ad]', AtkSscaling = '$_POST[atksscaling]',AtkS = '$_POST[atks]', ARscaling = '$_POST[arscaling]',AR = '$_POST[ar]', MRscaling = '$_POST[mrscaling]',MR = '$_POST[mr]' WHERE Name='$_POST[hidden]'";
	mysql_query($UpdateQuery, $con);
};

if (isset($_POST['delete'])){
	//echo "Delete Called!<br>";
	$DeleteQuery = "DELETE FROM Champions WHERE Name = '$_POST[hidden]'";
	mysql_query($DeleteQuery, $con);
};

if (isset($_POST['add'])){
	//echo "Add Called!<br>";
	$AddQuery = "INSERT INTO Champions (Name, HPscaling, HP, MPscaling, MP, ADscaling, AD, AtkSscaling, AtkS, ARscaling, AR, MRscaling, MR) VALUES('$_POST[uname]','$_POST[uhpscaling]','$_POST[uhp]','$_POST[umpscaling]','$_POST[ump]','$_POST[uadscaling]','$_POST[uad]','$_POST[uatksscaling]','$_POST[uatks]','$_POST[uarscaling]','$_POST[uar]','$_POST[umrscaling]','$_POST[umr]')";
	mysql_query($AddQuery, $con);
};


$sql = "SELECT * FROM Champions";
$myData = mysql_query($sql,$con);
echo "<table border=1>
<tr>
<th>Name</ th>
<th>HPscaling</ th>
<th>HP</ th>
<th>MPscaling</ th>
<th>MP</ th>
<th>ADscaling</ th>
<th>AD</ th>
<th>AtkSscaling</ th>
<th>AtkS</ th>
<th>ARscaling</ th>
<th>AR</ th>
<th>MRscaling</ th>
<th>MR</ th>
</tr>";


while($record=mysql_fetch_array($myData)){
echo "<form action = '' method = post>";
echo "<tr>";
echo "<td>" . "<input type = text name = name value =" . $record['Name'] . "> </td>";
echo "<td>" . "<input type = text name = hpscaling value =" . $record['HPscaling'] . "> </td>";
echo "<td>" . "<input type = text name = hp value =" . $record['HP'] . "> </td>";
echo "<td>" . "<input type = text name = mpscaling value =" . $record['MPscaling'] . "> </td>";
echo "<td>" . "<input type = text name = mp value =" . $record['MP'] . "> </td>";
echo "<td>" . "<input type = text name = adscaling value =" . $record['ADscaling'] . "> </td>";
echo "<td>" . "<input type = text name = ad value =" . $record['AD'] . "> </td>";
echo "<td>" . "<input type = text name = atksscaling value =" . $record['AtkSscaling'] . "> </td>";
echo "<td>" . "<input type = text name = atks value =" . $record['AtkS'] . "> </td>";
echo "<td>" . "<input type = text name = arscaling value =" . $record['ARscaling'] . "> </td>";
echo "<td>" . "<input type = text name = ar value =" . $record['AR'] . "> </td>";
echo "<td>" . "<input type = text name = mrscaling value =" . $record['MRscaling'] . "> </td>";
echo "<td>" . "<input type = text name = mr value =" . $record['MR'] . "> </td>";
echo "<td>" . "<input type = hidden name = hidden value =" . $record['Name'] . "> </td>";
echo "<td>" . "<input type = submit name = update value = update" . "> </td>";
echo "<td>" . "<input type = submit name = delete value = delete" . "> </td>";
echo "</tr>";
echo "</form>";
}
echo "<form action = '' method = post>";
echo "<tr>";
echo "<td><input type = text name = uname></td>";
echo "<td><input type = text name = uhpscaling></td>";
echo "<td><input type = text name = uhp></td>";
echo "<td><input type = text name = umpscaling></td>";
echo "<td><input type = text name = ump></td>";
echo "<td><input type = text name = uadscaling></td>";
echo "<td><input type = text name = uad></td>";
echo "<td><input type = text name = uatksscaling></td>";
echo "<td><input type = text name = uatks></td>";
echo "<td><input type = text name = uarscaling></td>";
echo "<td><input type = text name = uar></td>";
echo "<td><input type = text name = umrscaling></td>";
echo "<td><input type = text name = umr></td>";
echo "<td>" . "<input type = submit name = add value = add" . "> </td>";

echo "</tr>";
echo "</form>";
echo "</table>";

mysql_close($con);

 ?>
</body>
</html>
