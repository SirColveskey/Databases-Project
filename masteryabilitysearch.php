<?php
if(isset($_POST['search'])){
  $valueToSearch = $_POST['valueToSearch'];
  $sql = "SELECT * FROM masteryabilities WHERE CONCAT(Mid, AName, Rank)LIKE'%".$valueToSearch."%'";
  $search_result = filterTable($sql);
  //echo "Result object: ".$search_result."<br>";
}
else{
  $sql = "SELECT * FROM masteryabilities";
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
    $filter_Result = mysql_query("SELECT * FROM masteryabilities",$connect);
  }
  return $filter_Result;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>PHP HTML TABLE DATA SEARCH </title>
	<h2>Mastery Ability Data Search!</h2>
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
          <th>Mid</th>
          <th>AName</th>
          <th>Rank</th>
        </tr>
        <?php while($row = mysql_fetch_array($search_result)): ?>
          <tr>
            <td><?php echo $row['Mid']; ?> </td>
            <td><?php echo $row['AName']; ?> </td>
            <td><?php echo $row['Rank']; ?> </td>
        </tr>
      <?php endwhile;?>
      </table>
    </form>

  </body>
</html>
