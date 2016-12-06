<?php
echo "This page contains api requests to retrieve various<br>static data informations from the Riot Games API.<br>
<br>These models can be used to access the various static data attributess.<br><br>";
// Contains the data dragon information
$DDragonUrl = "https://global.api.pvp.net/api/lol/static-data/na/v1.2/realm?api_key=098a5a65-8754-4ea4-bb25-caa2fd830849";
$DDinfo = json_decode(file_get_contents($DDragonUrl));


// This configures the variables for database access
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'password';
$dbname = 'database_project';

// This will connect to the server and then the correct database
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);

echo "<br><br>====================================================<br>Item Requests :: Item Name : Base Cost<br>====================================================<br>";
$URL = $DDinfo->cdn."/".$DDinfo->dd."/data/".$DDinfo->l."/item.json";
echo "Making JSON Request: ".$URL."<br><br>";
$itemJson = json_decode(file_get_contents($URL));
$Items = $itemJson->data;
foreach($Items as $Item){
	echo $Item->name." : ".$Item->gold->base."<br>";
}

echo "<br>Loading Items to Database!<br>";

// Loading Query TODO
foreach($Items as $Item){	
	$FlatHPPoolMod=0.0; $rFlatHPModPerLevel=0.0; $FlatMPPoolMod=0.0; 
	$rFlatMPModPerLevel=0.0; $PercentHPPoolMod=0.0; $PercentMPPoolMod=0.0; $FlatHPRegenMod=0.0; $rFlatHPRegenModPerLevel=0.0; 
	$PercentHPRegenMod=0.0; $FlatMPRegenMod=0.0; $rFlatMPRegenModPerLevel=0.0; $PercentMPRegenMod=0.0; $FlatArmorMod=0.0; $rFlatArmorModPerLevel=0.0; 
	$PercentArmorMod=0.0; $rFlatArmorPenetrationMod=0.0; $rFlatArmorPenetrationModPerLevel=0.0; $rPercentArmorPenetrationModPerLevel=0.0; $FlatPhysicalDamageMod=0.0; 
	$rFlatPhysicalDamageModPerLevel=0.0; $PercentPhysicalDamageMod=0.0; $FlatMagicDamageMod=0.0; $rFlatMagicDamageModPerLevel=0.0; $PercentMagicDamageMod=0.0; 
	$FlatMovementSpeedMod=0.0; $rFlatMovementSpeedModPerLevel=0.0; $PercentMovementSpeedMod=0.0; $rPercentMovementSpeedModPerLevel=0.0; $FlatAttackSpeedMod=0.0; 
	$PercentAttackSpeedMod=0.0; $rPercentAttackSpeedModPerLevel=0.0; $rFlatDodgeMod=0.0; $rFlatDodgeModPerLevel=0.0; $PercentDodgeMod=0.0; $FlatCritChanceMod=0.0; 
	$rFlatCritChanceModPerLevel=0.0; $PercentCritChanceMod=0.0; $FlatCritDamageMod=0.0; $rFlatCritDamageModPerLevel=0.0; $PercentCritDamageMod=0.0; $FlatBlockMod=0.0; 
	$PercentBlockMod=0.0; $FlatSpellBlockMod=0.0; $rFlatSpellBlockModPerLevel=0.0; $PercentSpellBlockMod=0.0; $FlatEXPBonus=0.0; $PercentEXPBonus=0.0; $rPercentCooldownMod=0.0; 
	$rPercentCooldownModPerLevel=0.0; $rFlatTimeDeadMod=0.0; $rFlatTimeDeadModPerLevel=0.0; $rPercentTimeDeadMod=0.0; $rPercentTimeDeadModPerLevel=0.0; $rFlatGoldPer10Mod=0.0; 
	$rFlatMagicPenetrationMod=0.0; $rFlatMagicPenetrationModPerLevel=0.0; $rPercentMagicPenetrationMod=0.0; $rPercentMagicPenetrationModPerLevel=0.0; $FlatEnergyRegenMod=0.0; 
	$rFlatEnergyRegenModPerLevel=0.0; $FlatEnergyPoolMod=0.0; $rFlatEnergyModPerLevel=0.0; $PercentLifeStealMod=0.0; $PercentSpellVampMod=0.0; 
	if(array_key_exists("FlatHPPoolMod",$Item->stats)){$FlatHPPoolMod=$Item->stats->FlatHPPoolMod;};
	if(array_key_exists("rFlatHPModPerLevel",$Item->stats)){$rFlatHPModPerLevel=$Item->stats->rFlatHPModPerLevel;};
	if(array_key_exists("FlatMPPoolMod",$Item->stats)){$FlatMPPoolMod=$Item->stats->FlatMPPoolMod;};
	if(array_key_exists("rFlatMPModPerLevel",$Item->stats)){$rFlatMPModPerLevel=$Item->stats->rFlatMPModPerLevel;};
	if(array_key_exists("PercentHPPoolMod",$Item->stats)){$PercentHPPoolMod=$Item->stats->PercentHPPoolMod;};
	if(array_key_exists("PercentMPPoolMod",$Item->stats)){$PercentMPPoolMod=$Item->stats->PercentMPPoolMod;};
	if(array_key_exists("FlatHPRegenMod",$Item->stats)){$FlatHPRegenMod=$Item->stats->FlatHPRegenMod;};
	if(array_key_exists("rFlatHPRegenModPerLevel",$Item->stats)){$rFlatHPRegenModPerLevel=$Item->stats->rFlatHPRegenModPerLevel;};
	if(array_key_exists("PercentHPRegenMod",$Item->stats)){$PercentHPRegenMod=$Item->stats->PercentHPRegenMod;};
	if(array_key_exists("FlatMPRegenMod",$Item->stats)){$FlatMPRegenMod=$Item->stats->FlatMPRegenMod;};
	if(array_key_exists("rFlatMPRegenModPerLevel",$Item->stats)){$rFlatMPRegenModPerLevel=$Item->stats->rFlatMPRegenModPerLevel;};
	if(array_key_exists("PercentMPRegenMod",$Item->stats)){$PercentMPRegenMod=$Item->stats->PercentMPRegenMod;};
	if(array_key_exists("FlatArmorMod",$Item->stats)){$FlatArmorMod=$Item->stats->FlatArmorMod;};
	if(array_key_exists("rFlatArmorModPerLevel",$Item->stats)){$rFlatArmorModPerLevel=$Item->stats->rFlatArmorModPerLevel;};
	if(array_key_exists("PercentArmorMod",$Item->stats)){$PercentArmorMod=$Item->stats->PercentArmorMod;};
	if(array_key_exists("rFlatArmorPenetrationMod",$Item->stats)){$rFlatArmorPenetrationMod=$Item->stats->rFlatArmorPenetrationMod;};
	if(array_key_exists("rFlatArmorPenetrationModPerLevel",$Item->stats)){$rFlatArmorPenetrationModPerLevel=$Item->stats->rFlatArmorPenetrationModPerLevel;};
	if(array_key_exists("rPercentArmorPenetrationModPerLevel",$Item->stats)){$rPercentArmorPenetrationModPerLevel=$Item->stats->rPercentArmorPenetrationModPerLevel;};
	if(array_key_exists("FlatPhysicalDamageMod",$Item->stats)){$FlatPhysicalDamageMod=$Item->stats->FlatPhysicalDamageMod;};
	if(array_key_exists("rFlatPhysicalDamageModPerLevel",$Item->stats)){$rFlatPhysicalDamageModPerLevel=$Item->stats->rFlatPhysicalDamageModPerLevel;};
	if(array_key_exists("PercentPhysicalDamageMod",$Item->stats)){$PercentPhysicalDamageMod=$Item->stats->PercentPhysicalDamageMod;};
	if(array_key_exists("FlatMagicDamageMod",$Item->stats)){$FlatMagicDamageMod=$Item->stats->FlatMagicDamageMod;};
	if(array_key_exists("rFlatMagicDamageModPerLevel",$Item->stats)){$rFlatMagicDamageModPerLevel=$Item->stats->rFlatMagicDamageModPerLevel;};
	if(array_key_exists("PercentMagicDamageMod",$Item->stats)){$PercentMagicDamageMod=$Item->stats->PercentMagicDamageMod;};
	if(array_key_exists("FlatMovementSpeedMod",$Item->stats)){$FlatMovementSpeedMod=$Item->stats->FlatMovementSpeedMod;};
	if(array_key_exists("rFlatMovementSpeedModPerLevel",$Item->stats)){$rFlatMovementSpeedModPerLevel=$Item->stats->rFlatMovementSpeedModPerLevel;};
	if(array_key_exists("PercentMovementSpeedMod",$Item->stats)){$PercentMovementSpeedMod=$Item->stats->PercentMovementSpeedMod;};
	if(array_key_exists("rPercentMovementSpeedModPerLevel",$Item->stats)){$rPercentMovementSpeedModPerLevel=$Item->stats->rPercentMovementSpeedModPerLevel;};
	if(array_key_exists("FlatAttackSpeedMod",$Item->stats)){$FlatAttackSpeedMod=$Item->stats->FlatAttackSpeedMod;};
	if(array_key_exists("PercentAttackSpeedMod",$Item->stats)){$PercentAttackSpeedMod=$Item->stats->PercentAttackSpeedMod;};
	if(array_key_exists("rPercentAttackSpeedModPerLevel",$Item->stats)){$rPercentAttackSpeedModPerLevel=$Item->stats->rPercentAttackSpeedModPerLevel;};
	if(array_key_exists("rFlatDodgeMod",$Item->stats)){$rFlatDodgeMod=$Item->stats->rFlatDodgeMod;};
	if(array_key_exists("rFlatDodgeModPerLevel",$Item->stats)){$rFlatDodgeModPerLevel=$Item->stats->rFlatDodgeModPerLevel;};
	if(array_key_exists("PercentDodgeMod",$Item->stats)){$PercentDodgeMod=$Item->stats->PercentDodgeMod;};
	if(array_key_exists("FlatCritChanceMod",$Item->stats)){$FlatCritChanceMod=$Item->stats->FlatCritChanceMod;};
	if(array_key_exists("rFlatCritChanceModPerLevel",$Item->stats)){$rFlatCritChanceModPerLevel=$Item->stats->rFlatCritChanceModPerLevel;};
	if(array_key_exists("PercentCritChanceMod",$Item->stats)){$PercentCritChanceMod=$Item->stats->PercentCritChanceMod;};
	if(array_key_exists("FlatCritDamageMod",$Item->stats)){$FlatCritDamageMod=$Item->stats->FlatCritDamageMod;};
	if(array_key_exists("rFlatCritDamageModPerLevel",$Item->stats)){$rFlatCritDamageModPerLevel=$Item->stats->rFlatCritDamageModPerLevel;};
	if(array_key_exists("PercentCritDamageMod",$Item->stats)){$PercentCritDamageMod=$Item->stats->PercentCritDamageMod;};
	if(array_key_exists("FlatBlockMod",$Item->stats)){$FlatBlockMod=$Item->stats->FlatBlockMod;};
	if(array_key_exists("PercentBlockMod",$Item->stats)){$PercentBlockMod=$Item->stats->PercentBlockMod;};
	if(array_key_exists("FlatSpellBlockMod",$Item->stats)){$FlatSpellBlockMod=$Item->stats->FlatSpellBlockMod;};
	if(array_key_exists("rFlatSpellBlockModPerLevel",$Item->stats)){$rFlatSpellBlockModPerLevel=$Item->stats->rFlatSpellBlockModPerLevel;};
	if(array_key_exists("PercentSpellBlockMod",$Item->stats)){$PercentSpellBlockMod=$Item->stats->PercentSpellBlockMod;};
	if(array_key_exists("FlatEXPBonus",$Item->stats)){$FlatEXPBonus=$Item->stats->FlatEXPBonus;};
	if(array_key_exists("PercentEXPBonus",$Item->stats)){$PercentEXPBonus=$Item->stats->PercentEXPBonus;};
	if(array_key_exists("rPercentCooldownMod",$Item->stats)){$rPercentCooldownMod=$Item->stats->rPercentCooldownMod;};
	if(array_key_exists("rPercentCooldownModPerLevel",$Item->stats)){$rPercentCooldownModPerLevel=$Item->stats->rPercentCooldownModPerLevel;};
	if(array_key_exists("rFlatTimeDeadMod",$Item->stats)){$rFlatTimeDeadMod=$Item->stats->rFlatTimeDeadMod;};
	if(array_key_exists("rFlatTimeDeadModPerLevel",$Item->stats)){$rFlatTimeDeadModPerLevel=$Item->stats->rFlatTimeDeadModPerLevel;};
	if(array_key_exists("rPercentTimeDeadMod",$Item->stats)){$rPercentTimeDeadMod=$Item->stats->rPercentTimeDeadMod;};
	if(array_key_exists("rPercentTimeDeadModPerLevel",$Item->stats)){$rPercentTimeDeadModPerLevel=$Item->stats->rPercentTimeDeadModPerLevel;};
	if(array_key_exists("rFlatGoldPer10Mod",$Item->stats)){$rFlatGoldPer10Mod=$Item->stats->rFlatGoldPer10Mod;};
	if(array_key_exists("rFlatMagicPenetrationMod",$Item->stats)){$rFlatMagicPenetrationMod=$Item->stats->rFlatMagicPenetrationMod;};
	if(array_key_exists("rFlatMagicPenetrationModPerLevel",$Item->stats)){$rFlatMagicPenetrationModPerLevel=$Item->stats->rFlatMagicPenetrationModPerLevel;};
	if(array_key_exists("rPercentMagicPenetrationMod",$Item->stats)){$rPercentMagicPenetrationMod=$Item->stats->rPercentMagicPenetrationMod;};
	if(array_key_exists("rPercentMagicPenetrationModPerLevel",$Item->stats)){$rPercentMagicPenetrationModPerLevel=$Item->stats->rPercentMagicPenetrationModPerLevel;};
	if(array_key_exists("rFlatEnergyRegenModPerLevel",$Item->stats)){$FlatEnergyRegenMod=$Item->stats->rFlatEnergyRegenModPerLevel;};
	if(array_key_exists("rFlatEnergyRegenModPerLevel",$Item->stats)){$rFlatEnergyRegenModPerLevel=$Item->stats->rFlatEnergyRegenModPerLevel;};
	if(array_key_exists("FlatEnergyPoolMod",$Item->stats)){$FlatEnergyPoolMod=$Item->stats->FlatEnergyPoolMod;};
	if(array_key_exists("rFlatEnergyModPerLevel",$Item->stats)){$rFlatEnergyModPerLevel=$Item->stats->rFlatEnergyModPerLevel;};
	if(array_key_exists("PercentLifeStealMod",$Item->stats)){$PercentLifeStealMod=$Item->stats->PercentLifeStealMod;};
	if(array_key_exists("PercentSpellVampMod",$Item->stats)){$PercentSpellVampMod=$Item->stats->PercentSpellVampMod;};

  $query = "INSERT INTO Items(
	Name,
	Description,
	FlatHPPoolMod,
	rFlatHPModPerLevel,
	FlatMPPoolMod,
	rFlatMPModPerLevel,
	PercentHPPoolMod,
	PercentMPPoolMod,
	FlatHPRegenMod,
	rFlatHPRegenModPerLevel,
	PercentHPRegenMod,
	FlatMPRegenMod,
	rFlatMPRegenModPerLevel,
	PercentMPRegenMod,
	FlatArmorMod,
	rFlatArmorModPerLevel,
	PercentArmorMod,
	rFlatArmorPenetrationMod,
	rFlatArmorPenetrationModPerLevel,
	rPercentArmorPenetrationModPerLevel,
	FlatPhysicalDamageMod,
	rFlatPhysicalDamageModPerLevel,
	PercentPhysicalDamageMod,
	FlatMagicDamageMod,
	rFlatMagicDamageModPerLevel,
	PercentMagicDamageMod,
	FlatMovementSpeedMod,
	rFlatMovementSpeedModPerLevel,
	PercentMovementSpeedMod,
	rPercentMovementSpeedModPerLevel,
	FlatAttackSpeedMod,
	PercentAttackSpeedMod,
	rPercentAttackSpeedModPerLevel,
	rFlatDodgeMod,
	rFlatDodgeModPerLevel,
	PercentDodgeMod,
	FlatCritChanceMod,
	rFlatCritChanceModPerLevel,
	PercentCritChanceMod,
	FlatCritDamageMod,
	rFlatCritDamageModPerLevel,
	PercentCritDamageMod,
	FlatBlockMod,
	PercentBlockMod,
	FlatSpellBlockMod,
	rFlatSpellBlockModPerLevel,
	PercentSpellBlockMod,
	FlatEXPBonus,
	PercentEXPBonus,
	rPercentCooldownMod,
	rPercentCooldownModPerLevel,
	rFlatTimeDeadMod,
	rFlatTimeDeadModPerLevel,
	rPercentTimeDeadMod,
	rPercentTimeDeadModPerLevel,
	rFlatGoldPer10Mod,
	rFlatMagicPenetrationMod,
	rFlatMagicPenetrationModPerLevel,
	rPercentMagicPenetrationMod,
	rPercentMagicPenetrationModPerLevel,
	FlatEnergyRegenMod,
	rFlatEnergyRegenModPerLevel,
	FlatEnergyPoolMod,
	rFlatEnergyModPerLevel,
	PercentLifeStealMod,
	PercentSpellVampMod
) VALUES ('".$Item->name."','".$Item->description."',".$FlatHPPoolMod.",".$rFlatHPModPerLevel.",".$FlatMPPoolMod.",".
	$rFlatMPModPerLevel.",".$PercentHPPoolMod.",".$PercentMPPoolMod.",".$FlatHPRegenMod.",".$rFlatHPRegenModPerLevel.",".
	$PercentHPRegenMod.",".$FlatMPRegenMod.",".$rFlatMPRegenModPerLevel.",".$PercentMPRegenMod.",".$FlatArmorMod.",".$rFlatArmorModPerLevel.",".
	$PercentArmorMod.",".$rFlatArmorPenetrationMod.",".$rFlatArmorPenetrationModPerLevel.",".$rPercentArmorPenetrationModPerLevel.",".$FlatPhysicalDamageMod.",".
	$rFlatPhysicalDamageModPerLevel.",".$PercentPhysicalDamageMod.",".$FlatMagicDamageMod.",".$rFlatMagicDamageModPerLevel.",".$PercentMagicDamageMod.",".
	$FlatMovementSpeedMod.",".$rFlatMovementSpeedModPerLevel.",".$PercentMovementSpeedMod.",".$rPercentMovementSpeedModPerLevel.",".$FlatAttackSpeedMod.",".
	$PercentAttackSpeedMod.",".$rPercentAttackSpeedModPerLevel.",".$rFlatDodgeMod.",".$rFlatDodgeModPerLevel.",".$PercentDodgeMod.",".$FlatCritChanceMod.",".
	$rFlatCritChanceModPerLevel.",".$PercentCritChanceMod.",".$FlatCritDamageMod.",".$rFlatCritDamageModPerLevel.",".$PercentCritDamageMod.",".$FlatBlockMod.",".
	$PercentBlockMod.",".$FlatSpellBlockMod.",".$rFlatSpellBlockModPerLevel.",".$PercentSpellBlockMod.",".$FlatEXPBonus.",".$PercentEXPBonus.",".$rPercentCooldownMod.",".
	$rPercentCooldownModPerLevel.",".$rFlatTimeDeadMod.",".$rFlatTimeDeadModPerLevel.",".$rPercentTimeDeadMod.",".$rPercentTimeDeadModPerLevel.",".$rFlatGoldPer10Mod.",".
	$rFlatMagicPenetrationMod.",".$rFlatMagicPenetrationModPerLevel.",".$rPercentMagicPenetrationMod.",".$rPercentMagicPenetrationModPerLevel.",".$FlatEnergyRegenMod.",".
	$rFlatEnergyRegenModPerLevel.",".$FlatEnergyPoolMod.",".$rFlatEnergyModPerLevel.",".$PercentLifeStealMod.",".$PercentSpellVampMod.") ON DUPLICATE KEY UPDATE "."FlatHPPoolMod=".$FlatHPPoolMod.", "."rFlatHPModPerLevel=".$rFlatHPModPerLevel.", "."FlatMPPoolMod=".$FlatMPPoolMod.", ".
	"rFlatMPModPerLevel=".$rFlatMPModPerLevel.", "."PercentHPPoolMod=".$PercentHPPoolMod.", "."PercentMPPoolMod=".$PercentMPPoolMod.", "."FlatHPRegenMod=". $FlatHPRegenMod.", "."rFlatHPRegenModPerLevel=".$rFlatHPRegenModPerLevel.", ".
	"PercentHPRegenMod=".$PercentHPRegenMod.", "."FlatMPRegenMod=".$FlatMPRegenMod.", "."rFlatMPRegenModPerLevel=".$rFlatMPRegenModPerLevel.", "."PercentMPRegenMod=".$PercentMPRegenMod.", "."FlatArmorMod=".$FlatArmorMod.", "."rFlatArmorModPerLevel=".$rFlatArmorModPerLevel.", ".
	"PercentArmorMod=".$PercentArmorMod.", "."rFlatArmorPenetrationMod=".$rFlatArmorPenetrationMod.", "."rFlatArmorPenetrationModPerLevel=".$rFlatArmorPenetrationModPerLevel.", "."rPercentArmorPenetrationModPerLevel=".$rPercentArmorPenetrationModPerLevel.", "."FlatPhysicalDamageMod=".$FlatPhysicalDamageMod.", ".
	"rFlatPhysicalDamageModPerLevel=".$rFlatPhysicalDamageModPerLevel.", "."PercentPhysicalDamageMod=".$PercentPhysicalDamageMod.", "."FlatMagicDamageMod=".$FlatMagicDamageMod.", "."rFlatMagicDamageModPerLevel=".$rFlatMagicDamageModPerLevel.", "."PercentMagicDamageMod=".$PercentMagicDamageMod.", ".
	"FlatMovementSpeedMod=".$FlatMovementSpeedMod.", "."rFlatMovementSpeedModPerLevel=".$rFlatMovementSpeedModPerLevel.", "."PercentMovementSpeedMod=".$PercentMovementSpeedMod.", "."rPercentMovementSpeedModPerLevel=".$rPercentMovementSpeedModPerLevel.", "."FlatAttackSpeedMod=".$FlatAttackSpeedMod.", ".
	"PercentAttackSpeedMod=".$PercentAttackSpeedMod.", "."rPercentAttackSpeedModPerLevel=".$rPercentAttackSpeedModPerLevel.", "."rFlatDodgeMod=".$rFlatDodgeMod.", "."rFlatDodgeModPerLevel=".$rFlatDodgeModPerLevel.", "."PercentDodgeMod=".$PercentDodgeMod.", "."FlatCritChanceMod=".$FlatCritChanceMod.", ".
	"rFlatCritChanceModPerLevel=".$rFlatCritChanceModPerLevel.", "."PercentCritChanceMod=".$PercentCritChanceMod.", "."FlatCritDamageMod=".$FlatCritDamageMod.", "."rFlatCritDamageModPerLevel=".$rFlatCritDamageModPerLevel.", "."PercentCritDamageMod=".$PercentCritDamageMod.", "."FlatBlockMod=".$FlatBlockMod.", ".
	"PercentBlockMod=".$PercentBlockMod.", "."FlatSpellBlockMod=".$FlatSpellBlockMod.", "."rFlatSpellBlockModPerLevel=".$rFlatSpellBlockModPerLevel.", "."PercentSpellBlockMod=".$PercentSpellBlockMod.", "."FlatEXPBonus=".$FlatEXPBonus.", "."PercentEXPBonus=".$PercentEXPBonus.", "."rPercentCooldownMod=".$rPercentCooldownMod.", ".
	"rPercentCooldownModPerLevel=".$rPercentCooldownModPerLevel.", "."rFlatTimeDeadMod=".$rFlatTimeDeadMod.", "."rFlatTimeDeadModPerLevel=".$rFlatTimeDeadModPerLevel.", "."rPercentTimeDeadMod=".$rPercentTimeDeadMod.", "."rPercentTimeDeadModPerLevel=".$rPercentTimeDeadModPerLevel.", "."rFlatGoldPer10Mod=".$rFlatGoldPer10Mod.", ".
	"rFlatMagicPenetrationMod=".$rFlatMagicPenetrationMod.", "."rFlatMagicPenetrationModPerLevel=".$rFlatMagicPenetrationModPerLevel.", "."rPercentMagicPenetrationMod=".$rPercentMagicPenetrationMod.", "."rPercentMagicPenetrationModPerLevel=".$rPercentMagicPenetrationModPerLevel.", "."FlatEnergyRegenMod=".$FlatEnergyRegenMod.", ".
	"rFlatEnergyRegenModPerLevel=".$rFlatEnergyRegenModPerLevel.", "."FlatEnergyPoolMod=".$FlatEnergyPoolMod.", "."rFlatEnergyModPerLevel=".$rFlatEnergyModPerLevel.", "."PercentLifeStealMod=".$PercentLifeStealMod.", "."PercentSpellVampMod=".$PercentSpellVampMod;
  echo "<br>".$query."<br>";
  mysql_query($query,$conn);
  echo "<br>".$query."<br>";
  mysql_query($query,$conn);
}

echo "<br><br>====================================================<br>Rune Requests :: Rune Name : Description<br>====================================================<br>";
$URL = $DDinfo->cdn."/".$DDinfo->dd."/data/".$DDinfo->l."/rune.json";
echo "Making JSON Request: ".$URL."<br><br>";
$runeJson = json_decode(file_get_contents($URL));
$Runes = $runeJson->data;
foreach($Runes as $Rune){
	echo $Rune->name." : ".$Rune->description."<br>";
}

echo "<br>Loading Runes to Database!<br>";

// Loading Query
foreach($Runes as $Rune){
	$FlatHPPoolMod=0.0; $rFlatHPModPerLevel=0.0; $FlatMPPoolMod=0.0; 
	$rFlatMPModPerLevel=0.0; $PercentHPPoolMod=0.0; $PercentMPPoolMod=0.0; $FlatHPRegenMod=0.0; $rFlatHPRegenModPerLevel=0.0; 
	$PercentHPRegenMod=0.0; $FlatMPRegenMod=0.0; $rFlatMPRegenModPerLevel=0.0; $PercentMPRegenMod=0.0; $FlatArmorMod=0.0; $rFlatArmorModPerLevel=0.0; 
	$PercentArmorMod=0.0; $rFlatArmorPenetrationMod=0.0; $rFlatArmorPenetrationModPerLevel=0.0; $rPercentArmorPenetrationModPerLevel=0.0; $FlatPhysicalDamageMod=0.0; 
	$rFlatPhysicalDamageModPerLevel=0.0; $PercentPhysicalDamageMod=0.0; $FlatMagicDamageMod=0.0; $rFlatMagicDamageModPerLevel=0.0; $PercentMagicDamageMod=0.0; 
	$FlatMovementSpeedMod=0.0; $rFlatMovementSpeedModPerLevel=0.0; $PercentMovementSpeedMod=0.0; $rPercentMovementSpeedModPerLevel=0.0; $FlatAttackSpeedMod=0.0; 
	$PercentAttackSpeedMod=0.0; $rPercentAttackSpeedModPerLevel=0.0; $rFlatDodgeMod=0.0; $rFlatDodgeModPerLevel=0.0; $PercentDodgeMod=0.0; $FlatCritChanceMod=0.0; 
	$rFlatCritChanceModPerLevel=0.0; $PercentCritChanceMod=0.0; $FlatCritDamageMod=0.0; $rFlatCritDamageModPerLevel=0.0; $PercentCritDamageMod=0.0; $FlatBlockMod=0.0; 
	$PercentBlockMod=0.0; $FlatSpellBlockMod=0.0; $rFlatSpellBlockModPerLevel=0.0; $PercentSpellBlockMod=0.0; $FlatEXPBonus=0.0; $PercentEXPBonus=0.0; $rPercentCooldownMod=0.0; 
	$rPercentCooldownModPerLevel=0.0; $rFlatTimeDeadMod=0.0; $rFlatTimeDeadModPerLevel=0.0; $rPercentTimeDeadMod=0.0; $rPercentTimeDeadModPerLevel=0.0; $rFlatGoldPer10Mod=0.0; 
	$rFlatMagicPenetrationMod=0.0; $rFlatMagicPenetrationModPerLevel=0.0; $rPercentMagicPenetrationMod=0.0; $rPercentMagicPenetrationModPerLevel=0.0; $FlatEnergyRegenMod=0.0; 
	$rFlatEnergyRegenModPerLevel=0.0; $FlatEnergyPoolMod=0.0; $rFlatEnergyModPerLevel=0.0; $PercentLifeStealMod=0.0; $PercentSpellVampMod=0.0; 
	if(array_key_exists("FlatHPPoolMod",$Rune->stats)){$FlatHPPoolMod=$Rune->stats->FlatHPPoolMod;};
	if(array_key_exists("rFlatHPModPerLevel",$Rune->stats)){$rFlatHPModPerLevel=$Rune->stats->rFlatHPModPerLevel;};
	if(array_key_exists("FlatMPPoolMod",$Rune->stats)){$FlatMPPoolMod=$Rune->stats->FlatMPPoolMod;};
	if(array_key_exists("rFlatMPModPerLevel",$Rune->stats)){$rFlatMPModPerLevel=$Rune->stats->rFlatMPModPerLevel;};
	if(array_key_exists("PercentHPPoolMod",$Rune->stats)){$PercentHPPoolMod=$Rune->stats->PercentHPPoolMod;};
	if(array_key_exists("PercentMPPoolMod",$Rune->stats)){$PercentMPPoolMod=$Rune->stats->PercentMPPoolMod;};
	if(array_key_exists("FlatHPRegenMod",$Rune->stats)){$FlatHPRegenMod=$Rune->stats->FlatHPRegenMod;};
	if(array_key_exists("rFlatHPRegenModPerLevel",$Rune->stats)){$rFlatHPRegenModPerLevel=$Rune->stats->rFlatHPRegenModPerLevel;};
	if(array_key_exists("PercentHPRegenMod",$Rune->stats)){$PercentHPRegenMod=$Rune->stats->PercentHPRegenMod;};
	if(array_key_exists("FlatMPRegenMod",$Rune->stats)){$FlatMPRegenMod=$Rune->stats->FlatMPRegenMod;};
	if(array_key_exists("rFlatMPRegenModPerLevel",$Rune->stats)){$rFlatMPRegenModPerLevel=$Rune->stats->rFlatMPRegenModPerLevel;};
	if(array_key_exists("PercentMPRegenMod",$Rune->stats)){$PercentMPRegenMod=$Rune->stats->PercentMPRegenMod;};
	if(array_key_exists("FlatArmorMod",$Rune->stats)){$FlatArmorMod=$Rune->stats->FlatArmorMod;};
	if(array_key_exists("rFlatArmorModPerLevel",$Rune->stats)){$rFlatArmorModPerLevel=$Rune->stats->rFlatArmorModPerLevel;};
	if(array_key_exists("PercentArmorMod",$Rune->stats)){$PercentArmorMod=$Rune->stats->PercentArmorMod;};
	if(array_key_exists("rFlatArmorPenetrationMod",$Rune->stats)){$rFlatArmorPenetrationMod=$Rune->stats->rFlatArmorPenetrationMod;};
	if(array_key_exists("rFlatArmorPenetrationModPerLevel",$Rune->stats)){$rFlatArmorPenetrationModPerLevel=$Rune->stats->rFlatArmorPenetrationModPerLevel;};
	if(array_key_exists("rPercentArmorPenetrationModPerLevel",$Rune->stats)){$rPercentArmorPenetrationModPerLevel=$Rune->stats->rPercentArmorPenetrationModPerLevel;};
	if(array_key_exists("FlatPhysicalDamageMod",$Rune->stats)){$FlatPhysicalDamageMod=$Rune->stats->FlatPhysicalDamageMod;};
	if(array_key_exists("rFlatPhysicalDamageModPerLevel",$Rune->stats)){$rFlatPhysicalDamageModPerLevel=$Rune->stats->rFlatPhysicalDamageModPerLevel;};
	if(array_key_exists("PercentPhysicalDamageMod",$Rune->stats)){$PercentPhysicalDamageMod=$Rune->stats->PercentPhysicalDamageMod;};
	if(array_key_exists("FlatMagicDamageMod",$Rune->stats)){$FlatMagicDamageMod=$Rune->stats->FlatMagicDamageMod;};
	if(array_key_exists("rFlatMagicDamageModPerLevel",$Rune->stats)){$rFlatMagicDamageModPerLevel=$Rune->stats->rFlatMagicDamageModPerLevel;};
	if(array_key_exists("PercentMagicDamageMod",$Rune->stats)){$PercentMagicDamageMod=$Rune->stats->PercentMagicDamageMod;};
	if(array_key_exists("FlatMovementSpeedMod",$Rune->stats)){$FlatMovementSpeedMod=$Rune->stats->FlatMovementSpeedMod;};
	if(array_key_exists("rFlatMovementSpeedModPerLevel",$Rune->stats)){$rFlatMovementSpeedModPerLevel=$Rune->stats->rFlatMovementSpeedModPerLevel;};
	if(array_key_exists("PercentMovementSpeedMod",$Rune->stats)){$PercentMovementSpeedMod=$Rune->stats->PercentMovementSpeedMod;};
	if(array_key_exists("rPercentMovementSpeedModPerLevel",$Rune->stats)){$rPercentMovementSpeedModPerLevel=$Rune->stats->rPercentMovementSpeedModPerLevel;};
	if(array_key_exists("FlatAttackSpeedMod",$Rune->stats)){$FlatAttackSpeedMod=$Rune->stats->FlatAttackSpeedMod;};
	if(array_key_exists("PercentAttackSpeedMod",$Rune->stats)){$PercentAttackSpeedMod=$Rune->stats->PercentAttackSpeedMod;};
	if(array_key_exists("rPercentAttackSpeedModPerLevel",$Rune->stats)){$rPercentAttackSpeedModPerLevel=$Rune->stats->rPercentAttackSpeedModPerLevel;};
	if(array_key_exists("rFlatDodgeMod",$Rune->stats)){$rFlatDodgeMod=$Rune->stats->rFlatDodgeMod;};
	if(array_key_exists("rFlatDodgeModPerLevel",$Rune->stats)){$rFlatDodgeModPerLevel=$Rune->stats->rFlatDodgeModPerLevel;};
	if(array_key_exists("PercentDodgeMod",$Rune->stats)){$PercentDodgeMod=$Rune->stats->PercentDodgeMod;};
	if(array_key_exists("FlatCritChanceMod",$Rune->stats)){$FlatCritChanceMod=$Rune->stats->FlatCritChanceMod;};
	if(array_key_exists("rFlatCritChanceModPerLevel",$Rune->stats)){$rFlatCritChanceModPerLevel=$Rune->stats->rFlatCritChanceModPerLevel;};
	if(array_key_exists("PercentCritChanceMod",$Rune->stats)){$PercentCritChanceMod=$Rune->stats->PercentCritChanceMod;};
	if(array_key_exists("FlatCritDamageMod",$Rune->stats)){$FlatCritDamageMod=$Rune->stats->FlatCritDamageMod;};
	if(array_key_exists("rFlatCritDamageModPerLevel",$Rune->stats)){$rFlatCritDamageModPerLevel=$Rune->stats->rFlatCritDamageModPerLevel;};
	if(array_key_exists("PercentCritDamageMod",$Rune->stats)){$PercentCritDamageMod=$Rune->stats->PercentCritDamageMod;};
	if(array_key_exists("FlatBlockMod",$Rune->stats)){$FlatBlockMod=$Rune->stats->FlatBlockMod;};
	if(array_key_exists("PercentBlockMod",$Rune->stats)){$PercentBlockMod=$Rune->stats->PercentBlockMod;};
	if(array_key_exists("FlatSpellBlockMod",$Rune->stats)){$FlatSpellBlockMod=$Rune->stats->FlatSpellBlockMod;};
	if(array_key_exists("rFlatSpellBlockModPerLevel",$Rune->stats)){$rFlatSpellBlockModPerLevel=$Rune->stats->rFlatSpellBlockModPerLevel;};
	if(array_key_exists("PercentSpellBlockMod",$Rune->stats)){$PercentSpellBlockMod=$Rune->stats->PercentSpellBlockMod;};
	if(array_key_exists("FlatEXPBonus",$Rune->stats)){$FlatEXPBonus=$Rune->stats->FlatEXPBonus;};
	if(array_key_exists("PercentEXPBonus",$Rune->stats)){$PercentEXPBonus=$Rune->stats->PercentEXPBonus;};
	if(array_key_exists("rPercentCooldownMod",$Rune->stats)){$rPercentCooldownMod=$Rune->stats->rPercentCooldownMod;};
	if(array_key_exists("rPercentCooldownModPerLevel",$Rune->stats)){$rPercentCooldownModPerLevel=$Rune->stats->rPercentCooldownModPerLevel;};
	if(array_key_exists("rFlatTimeDeadMod",$Rune->stats)){$rFlatTimeDeadMod=$Rune->stats->rFlatTimeDeadMod;};
	if(array_key_exists("rFlatTimeDeadModPerLevel",$Rune->stats)){$rFlatTimeDeadModPerLevel=$Rune->stats->rFlatTimeDeadModPerLevel;};
	if(array_key_exists("rPercentTimeDeadMod",$Rune->stats)){$rPercentTimeDeadMod=$Rune->stats->rPercentTimeDeadMod;};
	if(array_key_exists("rPercentTimeDeadModPerLevel",$Rune->stats)){$rPercentTimeDeadModPerLevel=$Rune->stats->rPercentTimeDeadModPerLevel;};
	if(array_key_exists("rFlatGoldPer10Mod",$Rune->stats)){$rFlatGoldPer10Mod=$Rune->stats->rFlatGoldPer10Mod;};
	if(array_key_exists("rFlatMagicPenetrationMod",$Rune->stats)){$rFlatMagicPenetrationMod=$Rune->stats->rFlatMagicPenetrationMod;};
	if(array_key_exists("rFlatMagicPenetrationModPerLevel",$Rune->stats)){$rFlatMagicPenetrationModPerLevel=$Rune->stats->rFlatMagicPenetrationModPerLevel;};
	if(array_key_exists("rPercentMagicPenetrationMod",$Rune->stats)){$rPercentMagicPenetrationMod=$Rune->stats->rPercentMagicPenetrationMod;};
	if(array_key_exists("rPercentMagicPenetrationModPerLevel",$Rune->stats)){$rPercentMagicPenetrationModPerLevel=$Rune->stats->rPercentMagicPenetrationModPerLevel;};
	if(array_key_exists("rFlatEnergyRegenModPerLevel",$Rune->stats)){$FlatEnergyRegenMod=$Rune->stats->rFlatEnergyRegenModPerLevel;};
	if(array_key_exists("rFlatEnergyRegenModPerLevel",$Rune->stats)){$rFlatEnergyRegenModPerLevel=$Rune->stats->rFlatEnergyRegenModPerLevel;};
	if(array_key_exists("FlatEnergyPoolMod",$Rune->stats)){$FlatEnergyPoolMod=$Rune->stats->FlatEnergyPoolMod;};
	if(array_key_exists("rFlatEnergyModPerLevel",$Rune->stats)){$rFlatEnergyModPerLevel=$Rune->stats->rFlatEnergyModPerLevel;};
	if(array_key_exists("PercentLifeStealMod",$Rune->stats)){$PercentLifeStealMod=$Rune->stats->PercentLifeStealMod;};
	if(array_key_exists("PercentSpellVampMod",$Rune->stats)){$PercentSpellVampMod=$Rune->stats->PercentSpellVampMod;};

  $query = "INSERT INTO runes(
	Name,
	Tier,
	FlatHPPoolMod,
	rFlatHPModPerLevel,
	FlatMPPoolMod,
	rFlatMPModPerLevel,
	PercentHPPoolMod,
	PercentMPPoolMod,
	FlatHPRegenMod,
	rFlatHPRegenModPerLevel,
	PercentHPRegenMod,
	FlatMPRegenMod,
	rFlatMPRegenModPerLevel,
	PercentMPRegenMod,
	FlatArmorMod,
	rFlatArmorModPerLevel,
	PercentArmorMod,
	rFlatArmorPenetrationMod,
	rFlatArmorPenetrationModPerLevel,
	rPercentArmorPenetrationModPerLevel,
	FlatPhysicalDamageMod,
	rFlatPhysicalDamageModPerLevel,
	PercentPhysicalDamageMod,
	FlatMagicDamageMod,
	rFlatMagicDamageModPerLevel,
	PercentMagicDamageMod,
	FlatMovementSpeedMod,
	rFlatMovementSpeedModPerLevel,
	PercentMovementSpeedMod,
	rPercentMovementSpeedModPerLevel,
	FlatAttackSpeedMod,
	PercentAttackSpeedMod,
	rPercentAttackSpeedModPerLevel,
	rFlatDodgeMod,
	rFlatDodgeModPerLevel,
	PercentDodgeMod,
	FlatCritChanceMod,
	rFlatCritChanceModPerLevel,
	PercentCritChanceMod,
	FlatCritDamageMod,
	rFlatCritDamageModPerLevel,
	PercentCritDamageMod,
	FlatBlockMod,
	PercentBlockMod,
	FlatSpellBlockMod,
	rFlatSpellBlockModPerLevel,
	PercentSpellBlockMod,
	FlatEXPBonus,
	PercentEXPBonus,
	rPercentCooldownMod,
	rPercentCooldownModPerLevel,
	rFlatTimeDeadMod,
	rFlatTimeDeadModPerLevel,
	rPercentTimeDeadMod,
	rPercentTimeDeadModPerLevel,
	rFlatGoldPer10Mod,
	rFlatMagicPenetrationMod,
	rFlatMagicPenetrationModPerLevel,
	rPercentMagicPenetrationMod,
	rPercentMagicPenetrationModPerLevel,
	FlatEnergyRegenMod,
	rFlatEnergyRegenModPerLevel,
	FlatEnergyPoolMod,
	rFlatEnergyModPerLevel,
	PercentLifeStealMod,
	PercentSpellVampMod
) VALUES ('".$Rune->name."',".$Rune->rune->tier.",".$FlatHPPoolMod.",".$rFlatHPModPerLevel.",".$FlatMPPoolMod.",".
	$rFlatMPModPerLevel.",".$PercentHPPoolMod.",".$PercentMPPoolMod.",".$FlatHPRegenMod.",".$rFlatHPRegenModPerLevel.",".
	$PercentHPRegenMod.",".$FlatMPRegenMod.",".$rFlatMPRegenModPerLevel.",".$PercentMPRegenMod.",".$FlatArmorMod.",".$rFlatArmorModPerLevel.",".
	$PercentArmorMod.",".$rFlatArmorPenetrationMod.",".$rFlatArmorPenetrationModPerLevel.",".$rPercentArmorPenetrationModPerLevel.",".$FlatPhysicalDamageMod.",".
	$rFlatPhysicalDamageModPerLevel.",".$PercentPhysicalDamageMod.",".$FlatMagicDamageMod.",".$rFlatMagicDamageModPerLevel.",".$PercentMagicDamageMod.",".
	$FlatMovementSpeedMod.",".$rFlatMovementSpeedModPerLevel.",".$PercentMovementSpeedMod.",".$rPercentMovementSpeedModPerLevel.",".$FlatAttackSpeedMod.",".
	$PercentAttackSpeedMod.",".$rPercentAttackSpeedModPerLevel.",".$rFlatDodgeMod.",".$rFlatDodgeModPerLevel.",".$PercentDodgeMod.",".$FlatCritChanceMod.",".
	$rFlatCritChanceModPerLevel.",".$PercentCritChanceMod.",".$FlatCritDamageMod.",".$rFlatCritDamageModPerLevel.",".$PercentCritDamageMod.",".$FlatBlockMod.",".
	$PercentBlockMod.",".$FlatSpellBlockMod.",".$rFlatSpellBlockModPerLevel.",".$PercentSpellBlockMod.",".$FlatEXPBonus.",".$PercentEXPBonus.",".$rPercentCooldownMod.",".
	$rPercentCooldownModPerLevel.",".$rFlatTimeDeadMod.",".$rFlatTimeDeadModPerLevel.",".$rPercentTimeDeadMod.",".$rPercentTimeDeadModPerLevel.",".$rFlatGoldPer10Mod.",".
	$rFlatMagicPenetrationMod.",".$rFlatMagicPenetrationModPerLevel.",".$rPercentMagicPenetrationMod.",".$rPercentMagicPenetrationModPerLevel.",".$FlatEnergyRegenMod.",".
	$rFlatEnergyRegenModPerLevel.",".$FlatEnergyPoolMod.",".$rFlatEnergyModPerLevel.",".$PercentLifeStealMod.",".$PercentSpellVampMod.") ON DUPLICATE KEY UPDATE "."FlatHPPoolMod=".$FlatHPPoolMod.", "."rFlatHPModPerLevel=".$rFlatHPModPerLevel.", "."FlatMPPoolMod=".$FlatMPPoolMod.", ".
	"rFlatMPModPerLevel=".$rFlatMPModPerLevel.", "."PercentHPPoolMod=".$PercentHPPoolMod.", "."PercentMPPoolMod=".$PercentMPPoolMod.", "."FlatHPRegenMod=". $FlatHPRegenMod.", "."rFlatHPRegenModPerLevel=".$rFlatHPRegenModPerLevel.", ".
	"PercentHPRegenMod=".$PercentHPRegenMod.", "."FlatMPRegenMod=".$FlatMPRegenMod.", "."rFlatMPRegenModPerLevel=".$rFlatMPRegenModPerLevel.", "."PercentMPRegenMod=".$PercentMPRegenMod.", "."FlatArmorMod=".$FlatArmorMod.", "."rFlatArmorModPerLevel=".$rFlatArmorModPerLevel.", ".
	"PercentArmorMod=".$PercentArmorMod.", "."rFlatArmorPenetrationMod=".$rFlatArmorPenetrationMod.", "."rFlatArmorPenetrationModPerLevel=".$rFlatArmorPenetrationModPerLevel.", "."rPercentArmorPenetrationModPerLevel=".$rPercentArmorPenetrationModPerLevel.", "."FlatPhysicalDamageMod=".$FlatPhysicalDamageMod.", ".
	"rFlatPhysicalDamageModPerLevel=".$rFlatPhysicalDamageModPerLevel.", "."PercentPhysicalDamageMod=".$PercentPhysicalDamageMod.", "."FlatMagicDamageMod=".$FlatMagicDamageMod.", "."rFlatMagicDamageModPerLevel=".$rFlatMagicDamageModPerLevel.", "."PercentMagicDamageMod=".$PercentMagicDamageMod.", ".
	"FlatMovementSpeedMod=".$FlatMovementSpeedMod.", "."rFlatMovementSpeedModPerLevel=".$rFlatMovementSpeedModPerLevel.", "."PercentMovementSpeedMod=".$PercentMovementSpeedMod.", "."rPercentMovementSpeedModPerLevel=".$rPercentMovementSpeedModPerLevel.", "."FlatAttackSpeedMod=".$FlatAttackSpeedMod.", ".
	"PercentAttackSpeedMod=".$PercentAttackSpeedMod.", "."rPercentAttackSpeedModPerLevel=".$rPercentAttackSpeedModPerLevel.", "."rFlatDodgeMod=".$rFlatDodgeMod.", "."rFlatDodgeModPerLevel=".$rFlatDodgeModPerLevel.", "."PercentDodgeMod=".$PercentDodgeMod.", "."FlatCritChanceMod=".$FlatCritChanceMod.", ".
	"rFlatCritChanceModPerLevel=".$rFlatCritChanceModPerLevel.", "."PercentCritChanceMod=".$PercentCritChanceMod.", "."FlatCritDamageMod=".$FlatCritDamageMod.", "."rFlatCritDamageModPerLevel=".$rFlatCritDamageModPerLevel.", "."PercentCritDamageMod=".$PercentCritDamageMod.", "."FlatBlockMod=".$FlatBlockMod.", ".
	"PercentBlockMod=".$PercentBlockMod.", "."FlatSpellBlockMod=".$FlatSpellBlockMod.", "."rFlatSpellBlockModPerLevel=".$rFlatSpellBlockModPerLevel.", "."PercentSpellBlockMod=".$PercentSpellBlockMod.", "."FlatEXPBonus=".$FlatEXPBonus.", "."PercentEXPBonus=".$PercentEXPBonus.", "."rPercentCooldownMod=".$rPercentCooldownMod.", ".
	"rPercentCooldownModPerLevel=".$rPercentCooldownModPerLevel.", "."rFlatTimeDeadMod=".$rFlatTimeDeadMod.", "."rFlatTimeDeadModPerLevel=".$rFlatTimeDeadModPerLevel.", "."rPercentTimeDeadMod=".$rPercentTimeDeadMod.", "."rPercentTimeDeadModPerLevel=".$rPercentTimeDeadModPerLevel.", "."rFlatGoldPer10Mod=".$rFlatGoldPer10Mod.", ".
	"rFlatMagicPenetrationMod=".$rFlatMagicPenetrationMod.", "."rFlatMagicPenetrationModPerLevel=".$rFlatMagicPenetrationModPerLevel.", "."rPercentMagicPenetrationMod=".$rPercentMagicPenetrationMod.", "."rPercentMagicPenetrationModPerLevel=".$rPercentMagicPenetrationModPerLevel.", "."FlatEnergyRegenMod=".$FlatEnergyRegenMod.", ".
	"rFlatEnergyRegenModPerLevel=".$rFlatEnergyRegenModPerLevel.", "."FlatEnergyPoolMod=".$FlatEnergyPoolMod.", "."rFlatEnergyModPerLevel=".$rFlatEnergyModPerLevel.", "."PercentLifeStealMod=".$PercentLifeStealMod.", "."PercentSpellVampMod=".$PercentSpellVampMod
;
  echo "<br>".$query."<br>";
  mysql_query($query,$conn);
}

echo "<br><br>====================================================<br>Mastery Requests :: Mastery Name : Description<br>====================================================<br>";
$URL = $DDinfo->cdn."/".$DDinfo->dd."/data/".$DDinfo->l."/mastery.json";
echo "Making JSON Request: ".$URL."<br><br>";
$masteryJson = json_decode(file_get_contents($URL));
$Masteries = $masteryJson->data;
foreach($Masteries as $Mastery){
	echo $Mastery->name." : ";
	foreach($Mastery->description AS $Effect){
		echo $Effect.", ";
	}
	echo "<br>";
}

echo "<br>Loading Masteries to Database!<br>";

// Loading Query
foreach($Masteries as $Mastery){
  $query = "INSERT INTO masteries(Name,MasteryID,MaxRank,Prereq)
               VALUES ('".$Mastery->name."',".$Mastery->id.",".$Mastery->ranks.",".$Mastery->prereq.")";
  echo "<br>".$query."<br>";
  mysql_query($query,$conn);
  $Counter = 1;
  foreach($Mastery->description as $Effect){
	$query = "INSERT INTO abilities(Name, effect, mTrigger, Scaling, Damage, DamageType, Cooldown)
		   VALUES ('".$Mastery->id.$Counter."','".$Effect."', 'Mastery',0,0,"."'Mastery'".",0) ON DUPLICATE KEY UPDATE effect='".$Effect."'";
	echo "<br>".$query."<br>";
	mysql_query($query,$conn);
	$query = "INSERT INTO masteryabilities(Mid, AName, Rank) VALUES ($Mastery->id,$Mastery->id$Counter,$Counter)";
	echo "<br>".$query."<br>";
	mysql_query($query,$conn);
	$Counter++;
  };
}

echo "<br><br>====================================================<br>Summoner Requests :: Summoner Name : Description<br>====================================================<br>";
$URL = $DDinfo->cdn."/".$DDinfo->dd."/data/".$DDinfo->l."/summoner.json";
echo "Making JSON Request: ".$URL."<br><br>";
$summonerJson = json_decode(file_get_contents($URL));
$Summoners = $summonerJson->data;
foreach($Summoners as $Summoner){
	echo $Summoner->name." : ".$Summoner->description."<br>";
}

echo "<br>Loading Summoners to Database!<br>";

// Loading Query
foreach($Summoners as $Summoner){
  $EffectArray = $Summoner->effect;
  $Scaling = 0;
  $Damage = 0;
  if(sizeof($EffectArray) >= 3)
  {
	  $Scaling = $EffectArray[2][0];
  };
  if(sizeof($EffectArray) >= 2)
  {
	  $Damage = $EffectArray[1][0];
  };
  $query = "INSERT INTO abilities(Name, effect, mTrigger, Scaling, Damage, DamageType, Cooldown)
               VALUES ('".$Summoner->name."','".$Summoner->description."', 'Active',".$Scaling.",".$Damage.","."'Unknown'".",".$Summoner->cooldown[0].") ON DUPLICATE KEY UPDATE effect='".$Summoner->description."', Scaling='".$Scaling."', Damage='".$Damage."', Cooldown='".$Summoner->cooldown[0]."'";
  echo "<br>".$query."<br>";
  mysql_query($query,$conn);
}

echo "<br><br>====================================================<br>Champion Requests :: Champion Name : Champion Key<br>====================================================<br>";
$URL = $DDinfo->cdn."/".$DDinfo->dd."/data/".$DDinfo->l."/championFull.json";
echo "Making JSON Request: ".$URL."<br><br>";
$championFullJson = json_decode(file_get_contents($URL));
$Champions = $championFullJson->data;
foreach($Champions as $Champion){
	echo $Champion->name." : ".$Champion->key."<br>";
}

echo "<br>Loading Champions to Database!<br>";

// Loading Query
foreach($Champions as $Champion){
  $query = "INSERT INTO champions(Name, HPscaling, HP, MPscaling, MP, ADscaling, AD, AtkSscaling, AtkS, ARscaling, AR, MRscaling, MR)
               VALUES ('".$Champion->name."', ".$Champion->stats->hpperlevel.", ".$Champion->stats->hp.", ".$Champion->stats->mpperlevel.", ".$Champion->stats->mp
			   .", ".$Champion->stats->attackdamageperlevel.", ".$Champion->stats->attackdamage.", ".$Champion->stats->attackspeedperlevel.", ".$Champion->stats->attackspeedoffset.", ".$Champion->stats->armorperlevel
			   .", ".$Champion->stats->armor.", ".$Champion->stats->spellblock.", ".$Champion->stats->spellblockperlevel.") ON DUPLICATE KEY UPDATE HPscaling =".$Champion->stats->hpperlevel.", HP=".$Champion->stats->hp.", MPscaling=".$Champion->stats->mpperlevel.", MP=".$Champion->stats->mp
			   .", ADscaling=".$Champion->stats->attackdamageperlevel.", AD=".$Champion->stats->attackdamage.", AtkSscaling=".$Champion->stats->attackspeedperlevel.", AtkS=".$Champion->stats->attackspeedoffset.", ARscaling=".$Champion->stats->armorperlevel
			   .", AR=".$Champion->stats->armor.", MR=".$Champion->stats->spellblock.", MRscaling=".$Champion->stats->spellblockperlevel;
  echo "<br>".$query."<br>";
  mysql_query($query,$conn);
}

// Loading Abilities
// Loading Query 
foreach($Champions as $Champion){ 
  $Spells = $Champion->spells;
  foreach($Spells as $Spell){
	  $EffectArray = $Spell->effect;
	  $Scaling = 0;
	  $Damage = 0;
	  if(sizeof($EffectArray) >= 3)
	  {
		  $Scaling = $EffectArray[2][0];
	  };
	  if(sizeof($EffectArray) >= 2)
	  {
		  $Damage = $EffectArray[1][0];
	  };
	  $query = "INSERT INTO abilities(Name, effect, mTrigger, Scaling, Damage, DamageType, Cooldown)
				   VALUES ('".$Spell->name."','".$Spell->description."', 'Active',".$Scaling.",".$Damage.","."'Unknown'".",".$Spell->cooldown[0].") ON DUPLICATE KEY UPDATE effect='".$Spell->description."', Scaling='".$Scaling."', Damage='".$Damage."', Cooldown='".$Spell->cooldown[0]."'";
	  echo "<br>".$query."<br>";
	  mysql_query($query,$conn);
	  
	  $query = "INSERT INTO championabilities(ID,CName,AName) VALUES ('".$Champion->name.$Spell->name."','".$Champion->name."','".$Spell->name."')";
	  echo "<br>".$query."<br>";
	  mysql_query($query,$conn);
  }
}
/*
CREATE TABLE items(
	Name VARCHAR(64),
	Description VARCHAR(600),
	FlatHPPoolMod FLOAT DEFAULT 0,
	rFlatHPModPerLevel FLOAT DEFAULT 0,
	FlatMPPoolMod FLOAT DEFAULT 0,
	rFlatMPModPerLevel FLOAT DEFAULT 0,
	PercentHPPoolMod FLOAT DEFAULT 0,
	PercentMPPoolMod FLOAT DEFAULT 0,
	FlatHPRegenMod FLOAT DEFAULT 0,
	rFlatHPRegenModPerLevel FLOAT DEFAULT 0,
	PercentHPRegenMod FLOAT DEFAULT 0,
	FlatMPRegenMod FLOAT DEFAULT 0,
	rFlatMPRegenModPerLevel FLOAT DEFAULT 0,
	PercentMPRegenMod FLOAT DEFAULT 0,
	FlatArmorMod FLOAT DEFAULT 0,
	rFlatArmorModPerLevel FLOAT DEFAULT 0,
	PercentArmorMod FLOAT DEFAULT 0,
	rFlatArmorPenetrationMod FLOAT DEFAULT 0,
	rFlatArmorPenetrationModPerLevel FLOAT DEFAULT 0,
	rPercentArmorPenetrationModPerLevel FLOAT DEFAULT 0,
	FlatPhysicalDamageMod FLOAT DEFAULT 0,
	rFlatPhysicalDamageModPerLevel FLOAT DEFAULT 0,
	PercentPhysicalDamageMod FLOAT DEFAULT 0,
	FlatMagicDamageMod FLOAT DEFAULT 0,
	rFlatMagicDamageModPerLevel FLOAT DEFAULT 0,
	PercentMagicDamageMod FLOAT DEFAULT 0,
	FlatMovementSpeedMod FLOAT DEFAULT 0,
	rFlatMovementSpeedModPerLevel FLOAT DEFAULT 0,
	PercentMovementSpeedMod FLOAT DEFAULT 0,
	rPercentMovementSpeedModPerLevel FLOAT DEFAULT 0,
	FlatAttackSpeedMod FLOAT DEFAULT 0,
	PercentAttackSpeedMod FLOAT DEFAULT 0,
	rPercentAttackSpeedModPerLevel FLOAT DEFAULT 0,
	rFlatDodgeMod FLOAT DEFAULT 0,
	rFlatDodgeModPerLevel FLOAT DEFAULT 0,
	PercentDodgeMod FLOAT DEFAULT 0,
	FlatCritChanceMod FLOAT DEFAULT 0,
	rFlatCritChanceModPerLevel FLOAT DEFAULT 0,
	PercentCritChanceMod FLOAT DEFAULT 0,
	FlatCritDamageMod FLOAT DEFAULT 0,
	rFlatCritDamageModPerLevel FLOAT DEFAULT 0,
	PercentCritDamageMod FLOAT DEFAULT 0,
	FlatBlockMod FLOAT DEFAULT 0,
	PercentBlockMod FLOAT DEFAULT 0,
	FlatSpellBlockMod FLOAT DEFAULT 0,
	rFlatSpellBlockModPerLevel FLOAT DEFAULT 0,
	PercentSpellBlockMod FLOAT DEFAULT 0,
	FlatEXPBonus FLOAT DEFAULT 0,
	PercentEXPBonus FLOAT DEFAULT 0,
	rPercentCooldownMod FLOAT DEFAULT 0,
	rPercentCooldownModPerLevel FLOAT DEFAULT 0,
	rFlatTimeDeadMod FLOAT DEFAULT 0,
	rFlatTimeDeadModPerLevel FLOAT DEFAULT 0,
	rPercentTimeDeadMod FLOAT DEFAULT 0,
	rPercentTimeDeadModPerLevel FLOAT DEFAULT 0,
	rFlatGoldPer10Mod FLOAT DEFAULT 0,
	rFlatMagicPenetrationMod FLOAT DEFAULT 0,
	rFlatMagicPenetrationModPerLevel FLOAT DEFAULT 0,
	rPercentMagicPenetrationMod FLOAT DEFAULT 0,
	rPercentMagicPenetrationModPerLevel FLOAT DEFAULT 0,
	FlatEnergyRegenMod FLOAT DEFAULT 0,
	rFlatEnergyRegenModPerLevel FLOAT DEFAULT 0,
	FlatEnergyPoolMod FLOAT DEFAULT 0,
	rFlatEnergyModPerLevel FLOAT DEFAULT 0,
	PercentLifeStealMod FLOAT DEFAULT 0,
	PercentSpellVampMod FLOAT DEFAULT 0
) 

"INSERT INTO runes(
	Name,
	Tier,
	FlatHPPoolMod,
	rFlatHPModPerLevel,
	FlatMPPoolMod,
	rFlatMPModPerLevel,
	PercentHPPoolMod,
	PercentMPPoolMod,
	FlatHPRegenMod,
	rFlatHPRegenModPerLevel,
	PercentHPRegenMod,
	FlatMPRegenMod,
	rFlatMPRegenModPerLevel,
	PercentMPRegenMod,
	FlatArmorMod,
	rFlatArmorModPerLevel,
	PercentArmorMod,
	rFlatArmorPenetrationMod,
	rFlatArmorPenetrationModPerLevel,
	rPercentArmorPenetrationModPerLevel,
	FlatPhysicalDamageMod,
	rFlatPhysicalDamageModPerLevel,
	PercentPhysicalDamageMod,
	FlatMagicDamageMod,
	rFlatMagicDamageModPerLevel,
	PercentMagicDamageMod,
	FlatMovementSpeedMod,
	rFlatMovementSpeedModPerLevel,
	PercentMovementSpeedMod,
	rPercentMovementSpeedModPerLevel,
	FlatAttackSpeedMod,
	PercentAttackSpeedMod,
	rPercentAttackSpeedModPerLevel,
	rFlatDodgeMod,
	rFlatDodgeModPerLevel,
	PercentDodgeMod,
	FlatCritChanceMod,
	rFlatCritChanceModPerLevel,
	PercentCritChanceMod,
	FlatCritDamageMod,
	rFlatCritDamageModPerLevel,
	PercentCritDamageMod,
	FlatBlockMod,
	PercentBlockMod,
	FlatSpellBlockMod,
	rFlatSpellBlockModPerLevel,
	PercentSpellBlockMod,
	FlatEXPBonus,
	PercentEXPBonus,
	rPercentCooldownMod,
	rPercentCooldownModPerLevel,
	rFlatTimeDeadMod,
	rFlatTimeDeadModPerLevel,
	rPercentTimeDeadMod,
	rPercentTimeDeadModPerLevel,
	rFlatGoldPer10Mod,
	rFlatMagicPenetrationMod,
	rFlatMagicPenetrationModPerLevel,
	rPercentMagicPenetrationMod,
	rPercentMagicPenetrationModPerLevel,
	FlatEnergyRegenMod,
	rFlatEnergyRegenModPerLevel,
	FlatEnergyPoolMod,
	rFlatEnergyModPerLevel,
	PercentLifeStealMod,
	PercentSpellVampMod
) VALUES (".$Rune->Name.",".$Rune->Tier.",".$Rune->FlatHPPoolMod.",".$Rune->rFlatHPModPerLevel.",".$Rune->FlatMPPoolMod.",".
	$Rune->rFlatMPModPerLevel.",".$Rune->PercentHPPoolMod.",".$Rune->PercentMPPoolMod.",".$Rune->FlatHPRegenMod.",".$Rune->rFlatHPRegenModPerLevel.",".
	$Rune->PercentHPRegenMod.",".$Rune->FlatMPRegenMod.",".Rune->rFlatMPRegenModPerLevel.",".$Rune->PercentMPRegenMod.",".$Rune->FlatArmorMod.",".$Rune->rFlatArmorModPerLevel.",".
	$Rune->PercentArmorMod.",".$Rune->rFlatArmorPenetrationMod.",".Rune->rFlatArmorPenetrationModPerLevel.",".$Rune->rPercentArmorPenetrationModPerLevel.",".Rune->FlatPhysicalDamageMod.",".
	$Rune->rFlatPhysicalDamageModPerLevel.",".$Rune->PercentPhysicalDamageMod.",".$Rune->FlatMagicDamageMod.",".$Rune->rFlatMagicDamageModPerLevel.",".$Rune->PercentMagicDamageMod.",".
	$Rune->FlatMovementSpeedMod.",".$Rune->rFlatMovementSpeedModPerLevel.",".$Rune->PercentMovementSpeedMod.",".$Rune->rPercentMovementSpeedModPerLevel.",".$Rune->FlatAttackSpeedMod.",".
	$Rune->PercentAttackSpeedMod.",".$Rune->rPercentAttackSpeedModPerLevel.",".$Rune->rFlatDodgeMod.",".$Rune->rFlatDodgeModPerLevel.",".$Rune->PercentDodgeMod.",".$Rune->FlatCritChanceMod.",".
	$Rune->rFlatCritChanceModPerLevel.",".$Rune->PercentCritChanceMod.",".$Rune->FlatCritDamageMod.",".$Rune->rFlatCritDamageModPerLevel.",".$Rune->PercentCritDamageMod.",".$Rune->FlatBlockMod.",".
	$Rune->PercentBlockMod.",".$Rune->FlatSpellBlockMod.",".$Rune->rFlatSpellBlockModPerLevel.",".$Rune->PercentSpellBlockMod.",".$Rune->FlatEXPBonus.",".$Rune->PercentEXPBonus.",".$Rune->rPercentCooldownMod.",".
	$Rune->rPercentCooldownModPerLevel.",".$Rune->rFlatTimeDeadMod.",".$Rune->rFlatTimeDeadModPerLevel.",".$Rune->rPercentTimeDeadMod.",".$Rune->rPercentTimeDeadModPerLevel.",".$Rune->rFlatGoldPer10Mod.",".
	$Rune->rFlatMagicPenetrationMod.",".$Rune->rFlatMagicPenetrationModPerLevel.",".$Rune->rPercentMagicPenetrationMod.",".$Rune->rPercentMagicPenetrationModPerLevel.",".$Rune->FlatEnergyRegenMod.",".
	$Rune->rFlatEnergyRegenModPerLevel.",".$Rune->FlatEnergyPoolMod.",".$Rune->rFlatEnergyModPerLevel.",".$Rune->PercentLifeStealMod.",".$Rune->PercentSpellVampMod.")"

*/
?>


