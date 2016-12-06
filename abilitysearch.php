<?php
if(isset($_POST['search'])){
  $valueToSearch = $_POST['valueToSearch'];
  $sql = "SELECT * FROM abilities WHERE CONCAT(Name, effect, mTrigger, Scaling, Damage, DamageType, Cooldown)LIKE'%".$valueToSearch."%'";
  $search_result = filterTable($sql);
  //echo "Result object: ".$search_result."<br>";
}
else{
  $sql = "SELECT * FROM abilities";
  $search_result = filterTable($sql);
  //echo mysql_num_rows($search_result)."<br>";

}

function filterTable($sql){
  /*echo $sql;*/
  $connect = mysql_connect("localhost", "root", "password") or die ('Error connecting to mysql');
  mysql_select_db("database_project");
  $filter_Result = mysql_query($sql, $connect);
  //echo mysql_num_rows($filter_Result)."rows in object<br>";
  if(!$filter_Result){
    echo "RETURNED TRUE?<br>";
    $filter_Result = mysql_query("SELECT * FROM abilities",$connect);
  }
  return $filter_Result;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>PHP HTML TABLE DATA SEARCH </title>
	<h2>Ability Data Search!</h2>
  <!--  <style>
      table,tr, th, td{
        border: lpx solid black;
      }
    </style> -->
  </head>
  <body>

    <form action="" method = "post">
      <input type = "text" name = "valueToSearch" placeholder = "Value To Search"><br><br>
      <input type = "submit" name = "search" value = "Filter"><br><br>
    <table border=1>
        <tr>
          <th>Name</th>
          <th>effect</th>
          <th>mTrigger</th>
          <th>Scaling</th>
          <th>Damage</th>
          <th>DamageType</th>
          <th>Cooldown</th>
        </tr>
        <?php while($row = mysql_fetch_array($search_result)): ?>
          <tr>
            <td><?php echo $row['Name']; ?> </td>
            <td><?php echo $row['effect']; ?> </td>
            <td><?php echo $row['mTrigger']; ?> </td>
            <td><?php echo $row['Scaling']; ?> </td>
            <td><?php echo $row['Damage']; ?> </td>
            <td><?php echo $row['DamageType']; ?> </td>
            <td><?php echo $row['Cooldown']; ?> </td>
        </tr>
      <?php endwhile;?>
      </table>
    </form>

  </body>
</html>
