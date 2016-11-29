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
foreach($Champions as $Champion){
  $query = "INSERT INTO champions(Name, HPscaling, HP, MPscaling, MP, ADscaling, AD, AtkSscaling, AtkS, ARscaling, AR, MRscaling, MR)
               VALUES ('".$Champion->name."', ".$Champion->stats->hpperlevel.", ".$Champion->stats->hp.", ".$Champion->stats->mpperlevel.", ".$Champion->stats->mp
			   .", ".$Champion->stats->attackdamageperlevel.", ".$Champion->stats->attackdamage.", ".$Champion->stats->attackspeedperlevel.", ".$Champion->stats->attackspeedoffset.", ".$Champion->stats->armorperlevel
			   .", ".$Champion->stats->armor.", "."0".", "."0)";
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

// Loading Query TODO
foreach($Champions as $Champion){
  $query = "INSERT INTO champions(Name, HPscaling, HP, MPscaling, MP, ADscaling, AD, AtkSscaling, AtkS, ARscaling, AR, MRscaling, MR)
               VALUES ('".$Champion->name."', ".$Champion->stats->hpperlevel.", ".$Champion->stats->hp.", ".$Champion->stats->mpperlevel.", ".$Champion->stats->mp
			   .", ".$Champion->stats->attackdamageperlevel.", ".$Champion->stats->attackdamage.", ".$Champion->stats->attackspeedperlevel.", ".$Champion->stats->attackspeedoffset.", ".$Champion->stats->armorperlevel
			   .", ".$Champion->stats->armor.", "."0".", "."0)";
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

// Loading Query TODO
foreach($Champions as $Champion){
  $query = "INSERT INTO champions(Name, HPscaling, HP, MPscaling, MP, ADscaling, AD, AtkSscaling, AtkS, ARscaling, AR, MRscaling, MR)
               VALUES ('".$Champion->name."', ".$Champion->stats->hpperlevel.", ".$Champion->stats->hp.", ".$Champion->stats->mpperlevel.", ".$Champion->stats->mp
			   .", ".$Champion->stats->attackdamageperlevel.", ".$Champion->stats->attackdamage.", ".$Champion->stats->attackspeedperlevel.", ".$Champion->stats->attackspeedoffset.", ".$Champion->stats->armorperlevel
			   .", ".$Champion->stats->armor.", "."0".", "."0)";
  echo "<br>".$query."<br>";
  mysql_query($query,$conn);
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

// Loading Query TODO
foreach($Summoners as $Summoner){ //NEEDS COOLDOWN: See $Summoner->cooldown
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
  $query = "INSERT INTO abilities(Name, effect, mTrigger, Scaling, Damage, DamageType)
               VALUES ('".$Summoner->name."','".$Summoner->description."', 'Active',".$Scaling.",".$Damage.","."'Unknown'".")";
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
			   .", ".$Champion->stats->armor.", "."0".", "."0)";
  echo "<br>".$query."<br>";
  mysql_query($query,$conn);
}


?>
