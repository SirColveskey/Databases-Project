<?php
if(isset($_POST['search'])){
  $valueToSearch = $_POST['valueToSearch'];
  $sql = "SELECT * FROM Champions WHERE CONCAT(Name, HPscaling, HP, MPscaling, MP, ADscaling, AD, AtkSscaling, AtkS, ARscaling, AR, MRscaling, MR)LIKE'%".$valueToSearch."%'";
  $search_result = filterTable($sql);
  //echo "Result object: ".$search_result."<br>";
}
else{
  $sql = "SELECT * FROM Champions";
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
    $filter_Result = mysql_query("SELECT * FROM Champions",$connect);
  }
  return $filter_Result;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>PHP HTML TABLE DATA SEARCH </title>
	<h2>Champion Data Search!</h2>
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
          <th>HPscaling</th>
          <th>HP</th>
          <th>MPscaling</th>
          <th>MP</th>
          <th>ADscaling</th>
          <th>AD</th>
          <th>AtkSscaling</th>
          <th>AtkS</th>
          <th>ARscaling</th>
          <th>AR</th>
          <th>MRscaling</th>
          <th>MR</th>
        </tr>
        <?php while($row = mysql_fetch_array($search_result)): ?>
          <tr>
            <td><?php echo $row['Name']; ?> </td>
            <td><?php echo $row['HPscaling']; ?> </td>
            <td><?php echo $row['HP']; ?> </td>
            <td><?php echo $row['MPscaling']; ?> </td>
            <td><?php echo $row['MP']; ?> </td>
            <td><?php echo $row['ADscaling']; ?> </td>
            <td><?php echo $row['AD']; ?> </td>
            <td><?php echo $row['AtkSscaling']; ?> </td>
            <td><?php echo $row['AtkS']; ?> </td>
            <td><?php echo $row['ARscaling']; ?> </td>
            <td><?php echo $row['AR']; ?> </td>
            <td><?php echo $row['MRscaling']; ?> </td>
            <td><?php echo $row['MR']; ?> </td>
        </tr>
      <?php endwhile;?>
      </table>
    </form>

  </body>
</html>
