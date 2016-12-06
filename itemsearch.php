<?php
if(isset($_POST['search'])){
  $valueToSearch = $_POST['valueToSearch'];
  $sql = "SELECT * FROM items WHERE CONCAT(Name , Description , FlatHPPoolMod ,  rFlatHPModPerLevel ,  FlatMPPoolMod ,  rFlatMPModPerLevel ,  PercentHPPoolMod ,  PercentMPPoolMod ,  FlatHPRegenMod ,  rFlatHPRegenModPerLevel ,  PercentHPRegenMod ,  FlatMPRegenMod ,  rFlatMPRegenModPerLevel ,  PercentMPRegenMod ,  FlatArmorMod ,  rFlatArmorModPerLevel ,  PercentArmorMod ,  rFlatArmorPenetrationMod ,  rFlatArmorPenetrationModPerLevel ,  rPercentArmorPenetrationModPerLevel ,  FlatPhysicalDamageMod ,  rFlatPhysicalDamageModPerLevel ,  PercentPhysicalDamageMod ,  FlatMagicDamageMod ,  rFlatMagicDamageModPerLevel ,  PercentMagicDamageMod ,  FlatMovementSpeedMod ,  rFlatMovementSpeedModPerLevel ,  PercentMovementSpeedMod ,  rPercentMovementSpeedModPerLevel ,  FlatAttackSpeedMod ,  PercentAttackSpeedMod ,  rPercentAttackSpeedModPerLevel ,  rFlatDodgeMod ,  rFlatDodgeModPerLevel ,  PercentDodgeMod ,  FlatCritChanceMod ,  rFlatCritChanceModPerLevel ,  PercentCritChanceMod ,  FlatCritDamageMod ,  rFlatCritDamageModPerLevel ,  PercentCritDamageMod ,  FlatBlockMod ,  PercentBlockMod ,  FlatSpellBlockMod ,  rFlatSpellBlockModPerLevel ,  PercentSpellBlockMod ,  FlatEXPBonus ,  PercentEXPBonus ,  rPercentCooldownMod ,  rPercentCooldownModPerLevel ,  rFlatTimeDeadMod ,  rFlatTimeDeadModPerLevel ,  rPercentTimeDeadMod ,  rPercentTimeDeadModPerLevel ,  rFlatGoldPer10Mod ,  rFlatMagicPenetrationMod ,  rFlatMagicPenetrationModPerLevel ,  rPercentMagicPenetrationMod ,  rPercentMagicPenetrationModPerLevel ,  FlatEnergyRegenMod ,  rFlatEnergyRegenModPerLevel ,  FlatEnergyPoolMod ,  rFlatEnergyModPerLevel ,  PercentLifeStealMod ,  PercentSpellVampMod)LIKE'%".$valueToSearch."%'";
  $search_result = filterTable($sql);
  //echo "Result object: ".$search_result."<br>";
}
else{
  $sql = "SELECT * FROM items";
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
    $filter_Result = mysql_query("SELECT * FROM items",$connect);
  }
  return $filter_Result;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>PHP HTML TABLE DATA SEARCH </title>
	<h2>Item Data Search!</h2>
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
          <th>LongItemDescription</th>
          <th>FlatHPPoolMod</th>
          <th>rFlatHPModPerLevel</th>
          <th>FlatMPPoolMod</th>
          <th>rFlatMPModPerLevel</th>
          <th>PercentHPPoolMod</th>
          <th>PercentMPPoolMod</th>
          <th>FlatHPRegenMod</th>
          <th>rFlatHPRegenModPerLevel</th>
          <th>PercentHPRegenMod</th>
          <th>FlatMPRegenMod</th>
          <th>rFlatMPRegenModPerLevel</th>
          <th>PercentMPRegenMod</th>
          <th>FlatArmorMod</th>
          <th>rFlatArmorModPerLevel</th>
          <th>PercentArmorMod</th>
          <th>rFlatArmorPenetrationMod</th>
          <th>rFlatArmorPenetrationModPerLevel</th>
          <th>rPercentArmorPenetrationModPerLevel</th>
          <th>FlatPhysicalDamageMod</th>
          <th>rFlatPhysicalDamageModPerLevel</th>
          <th>PercentPhysicalDamageMod</th>
          <th>FlatMagicDamageMod</th>
          <th>rFlatMagicDamageModPerLevel</th>
          <th>PercentMagicDamageMod</th>
          <th>FlatMovementSpeedMod</th>
          <th>rFlatMovementSpeedModPerLevel</th>
          <th>PercentMovementSpeedMod</th>
          <th>rPercentMovementSpeedModPerLevel</th>
          <th>FlatAttackSpeedMod</th>
          <th>PercentAttackSpeedMod</th>
          <th>rPercentAttackSpeedModPerLevel</th>
          <th>rFlatDodgeMod</th>
          <th>rFlatDodgeModPerLevel</th>
          <th>PercentDodgeMod</th>
          <th>FlatCritChanceMod</th>
          <th>rFlatCritChanceModPerLevel</th>
          <th>PercentCritChanceMod</th>
          <th>FlatCritDamageMod</th>
          <th>rFlatCritDamageModPerLevel</th>
          <th>PercentCritDamageMod</th>
          <th>FlatBlockMod</th>
          <th>PercentBlockMod</th>
          <th>FlatSpellBlockMod</th>
          <th>rFlatSpellBlockModPerLevel</th>
          <th>PercentSpellBlockMod</th>
          <th>FlatEXPBonus</th>
          <th>PercentEXPBonus</th>
          <th>rPercentCooldownMod</th>
          <th>rPercentCooldownModPerLevel</th>
          <th>rFlatTimeDeadMod</th>
          <th>rFlatTimeDeadModPerLevel</th>
          <th>rPercentTimeDeadMod</th>
          <th>rPercentTimeDeadModPerLevel</th>
          <th>rFlatGoldPer10Mod</th>
          <th>rFlatMagicPenetrationMod</th>
          <th>rFlatMagicPenetrationModPerLevel</th>
          <th>rPercentMagicPenetrationMod</th>
          <th>rPercentMagicPenetrationModPerLevel</th>
          <th>FlatEnergyRegenMod</th>
          <th>rFlatEnergyRegenModPerLevel</th>
          <th>FlatEnergyPoolMod</th>
          <th>rFlatEnergyModPerLevel</th>
          <th>PercentLifeStealMod</th>
          <th>PercentSpellVampMod)</th>
        </tr>
        <?php while($row = mysql_fetch_array($search_result)): ?>
          <tr>
            <td><?php echo $row['Name']; ?> </td>
            <td><?php echo $row['Description']; ?> </td>
            <td><?php echo $row['FlatHPPoolMod']; ?> </td>
            <td><?php echo $row['rFlatHPModPerLevel']; ?> </td>
            <td><?php echo $row['FlatMPPoolMod']; ?> </td>
            <td><?php echo $row['rFlatMPModPerLevel']; ?> </td>
            <td><?php echo $row['PercentHPPoolMod']; ?> </td>
            <td><?php echo $row['PercentMPPoolMod']; ?> </td>
            <td><?php echo $row['FlatHPRegenMod']; ?> </td>
            <td><?php echo $row['rFlatHPRegenModPerLevel']; ?> </td>
            <td><?php echo $row['PercentHPRegenMod']; ?> </td>
            <td><?php echo $row['FlatMPRegenMod']; ?> </td>
            <td><?php echo $row['rFlatMPRegenModPerLevel']; ?> </td>
            <td><?php echo $row['PercentMPRegenMod']; ?> </td>
            <td><?php echo $row['FlatArmorMod']; ?> </td>
            <td><?php echo $row['rFlatArmorModPerLevel']; ?> </td>
            <td><?php echo $row['PercentArmorMod']; ?> </td>
            <td><?php echo $row['rFlatArmorPenetrationMod']; ?> </td>
            <td><?php echo $row['rFlatArmorPenetrationModPerLevel']; ?> </td>
            <td><?php echo $row['rPercentArmorPenetrationModPerLevel']; ?> </td>
            <td><?php echo $row['FlatPhysicalDamageMod']; ?> </td>
            <td><?php echo $row['rFlatPhysicalDamageModPerLevel']; ?> </td>
            <td><?php echo $row['PercentPhysicalDamageMod']; ?> </td>
            <td><?php echo $row['FlatMagicDamageMod']; ?> </td>
            <td><?php echo $row['rFlatMagicDamageModPerLevel']; ?> </td>
            <td><?php echo $row['PercentMagicDamageMod']; ?> </td>
            <td><?php echo $row['FlatMovementSpeedMod']; ?> </td>
            <td><?php echo $row['rFlatMovementSpeedModPerLevel']; ?> </td>
            <td><?php echo $row['PercentMovementSpeedMod']; ?> </td>
            <td><?php echo $row['rPercentMovementSpeedModPerLevel']; ?> </td>
            <td><?php echo $row['FlatAttackSpeedMod']; ?> </td>
            <td><?php echo $row['PercentAttackSpeedMod']; ?> </td>
            <td><?php echo $row['rPercentAttackSpeedModPerLevel']; ?> </td>
            <td><?php echo $row['rFlatDodgeMod']; ?> </td>
            <td><?php echo $row['rFlatDodgeModPerLevel']; ?> </td>
            <td><?php echo $row['PercentDodgeMod']; ?> </td>
            <td><?php echo $row['FlatCritChanceMod']; ?> </td>
            <td><?php echo $row['rFlatCritChanceModPerLevel']; ?> </td>
            <td><?php echo $row['PercentCritChanceMod']; ?> </td>
            <td><?php echo $row['FlatCritDamageMod']; ?> </td>
            <td><?php echo $row['rFlatCritDamageModPerLevel']; ?> </td>
            <td><?php echo $row['PercentCritDamageMod']; ?> </td>
            <td><?php echo $row['FlatBlockMod']; ?> </td>
            <td><?php echo $row['PercentBlockMod']; ?> </td>
            <td><?php echo $row['FlatSpellBlockMod']; ?> </td>
            <td><?php echo $row['rFlatSpellBlockModPerLevel']; ?> </td>
            <td><?php echo $row['PercentSpellBlockMod']; ?> </td>
            <td><?php echo $row['FlatEXPBonus']; ?> </td>
            <td><?php echo $row['PercentEXPBonus']; ?> </td>
            <td><?php echo $row['rPercentCooldownMod']; ?> </td>
            <td><?php echo $row['rPercentCooldownModPerLevel']; ?> </td>
            <td><?php echo $row['rFlatTimeDeadMod']; ?> </td>
            <td><?php echo $row['rFlatTimeDeadModPerLevel']; ?> </td>
            <td><?php echo $row['rPercentTimeDeadMod']; ?> </td>
            <td><?php echo $row['rPercentTimeDeadModPerLevel']; ?> </td>
            <td><?php echo $row['rFlatGoldPer10Mod']; ?> </td>
            <td><?php echo $row['rFlatMagicPenetrationMod']; ?> </td>
            <td><?php echo $row['rFlatMagicPenetrationModPerLevel']; ?> </td>
            <td><?php echo $row['rPercentMagicPenetrationMod']; ?> </td>
            <td><?php echo $row['rPercentMagicPenetrationModPerLevel']; ?> </td>
            <td><?php echo $row['FlatEnergyRegenMod']; ?> </td>
            <td><?php echo $row['rFlatEnergyRegenModPerLevel']; ?> </td>
            <td><?php echo $row['FlatEnergyPoolMod']; ?> </td>
            <td><?php echo $row['rFlatEnergyModPerLevel']; ?> </td>
            <td><?php echo $row['PercentLifeStealMod']; ?> </td>
            <td><?php echo $row['PercentSpellVampMod']; ?> </td>
        </tr>
      <?php endwhile;?>
      </table>
    </form>

  </body>
</html>
