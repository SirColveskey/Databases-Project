<html>
<head>
<?php
class Fighter {
	public $attack=0;
	public $bas;
	public $attackSpeed=0;
	public $armor=0;
	public $flatAP=0;
	public $percentAP=0;
	public $armorpen;
	public $hp=0;
	public $dr;
	public $smn;
	public $champion;
	public $level;
	
	function calculateDR($otherFighter){
		if($this->armor - $otherFighter->armorpen > 0){
			$this->dr = 100/(100+$this->armor-$otherFighter->armorpen);
		} else {
			$this->dr = 2-100/(100+$this->armor-$otherFighter->armorpen);
		}
		return $this->dr;
	}
	
	function setSmn($smn){
		$this->smn = $smn;
		$this->setChampion();
	}
	
	function setChampion(){
		$con = mysql_connect("localhost", "root", "password") or
		  die("Cannot connect: " . mysql_error());
		mysql_select_db("database_project",$con);
		$this->level = mysql_fetch_row(mysql_query("SELECT * FROM summoner WHERE summoner.SummonerName='$this->smn'",$con))[1];
		$sql="SELECT * FROM champions JOIN summoner ON champions.Name = summoner.ChampionName WHERE summoner.SummonerName = '$this->smn'";
		$this->champion = mysql_fetch_row(mysql_query($sql,$con));
		$this->setStats();
		mysql_close();
	}
	
	function setStats(){
		$this->attack=$this->champion[6]+$this->champion[5]*$this->level;
		$this->bas=.625/(1+$this->champion[8]);
		$this->attackSpeed=$this->bas*(1+$this->champion[7]/100*$this->level);
		$this->armor=$this->champion[10]+$this->champion[9]*$this->level;
		$this->hp=$this->champion[2]+$this->champion[1]*$this->level;
		$this->addRunes();
		$this->addItems();
	}
	
	function addRunes(){
		//echo "Ping!";
		$con = mysql_connect("localhost", "root", "password") or
		  die("Cannot connect: " . mysql_error());
		mysql_select_db("database_project",$con);
		$sql="SELECT RunesName FROM summoner JOIN sumrunes ON summoner.SummonerName=sumrunes.SummonerName WHERE summoner.SummonerName = '$this->smn'";
		$db=mysql_query($sql,$con);
		if($db){
			//echo "Ding!";
			while($row = mysql_fetch_row($db)){
				$sql2="SELECT * FROM runes WHERE Name='$row[0]'";
				//echo "Bing!";
				$db2=mysql_query($sql2,$con);
				while($row2 = mysql_fetch_row($db2)){
					//echo "Dingaling!";
					$this->hp = $this->hp + $row2[2];
					$this->hp = $this->hp + $row2[3] * $this->level;
					$this->armor = $this->armor + $row2[14];
					$this->armor = $this->armor + $row2[15] * $this->level;
					$this->armor = ($this->armor)*(1+$row2[16]/100);
					$this->flatAP = $this->flatAP + $row2[17];
					$this->flatAP = $this->flatAP + $row2[18] * $this->level;
					$this->percentAP = $this->percentAP + $row2[19];
					$this->attack = $this->attack + $row2[20];
					$this->attack = $this->attack + $row2[21] * $this->level;
					$this->bas = $this->bas + $row2[30];
					$this->attackSpeed = ($this->attackSpeed) + $this->bas * $row2[31];
					$this->attackSpeed = ($this->attackSpeed) + $this->bas * $row2[32] * $this->level;
				}
			}
		}
	}
	
	function addItems(){
		//echo "Pong!";
		$con = mysql_connect("localhost", "root", "password") or
		  die("Cannot connect: " . mysql_error());
		mysql_select_db("database_project",$con);
		$sql="SELECT ItemsName FROM summoner JOIN sumitems ON summoner.SummonerName=sumitems.SummonerName WHERE summoner.SummonerName = '$this->smn'";
		//echo $sql."<br>";
		$db=mysql_query($sql,$con);
		if($db) {
			//echo "Dong!";
			while($row = mysql_fetch_row($db)){
				$sql2="SELECT * FROM items WHERE Name='$row[0]'";
				//echo '<br>'.$sql2.'<br>';
				$db2=mysql_query($sql2,$con);
				while($row2 = mysql_fetch_row($db2)){
					//echo "Dongalong!";
					$this->hp = $this->hp + $row2[2];
					$this->hp = $this->hp + $row2[3] * $this->level;
					$this->armor = $this->armor + $row2[14];
					$this->armor = $this->armor + $row2[15] * $this->level;
					$this->armor = ($this->armor)*(1+$row2[16]/100);
					$this->flatAP = $this->flatAP + $row2[17];
					$this->flatAP = $this->flatAP + $row2[18] * $this->level;
					$this->percentAP = $this->percentAP + $row2[19];
					//echo "<br>Before".$this->attack;
					$this->attack = $this->attack + $row2[20];
					//echo "<br>After".$this->attack;
					$this->attack = $this->attack + $row2[21] * $this->level;
					$this->bas = $this->bas + $row2[30];
					$this->attackSpeed = ($this->attackSpeed) + ($this->bas * $row2[31]);
					$this->attackSpeed = ($this->attackSpeed) + ($this->bas * $row2[32] * $this->level);
				}
			}
		}
	}
	
	function calculateArmorPen($oF){
		$this->armorpen = $this->flatAP + $this->percentAP * $oF->armor;
	}
	
	function calculateKillTime($oF){
		$time = $oF->hp / ($this->attack * $this->attackSpeed * $oF->dr);
		return $time;
	}
	
	function printData(){
		return "Attack: $this->attack, AS: $this->attackSpeed, Armor: $this->armor, ArmorPen: $this->armorpen, HP: $this->hp, DM: $this->dr";
	}
}
$sql = "no value";
if (!isset($_GET['summoners'])){
	echo "You have reached this page without submitting the form!<br>
	please return to the <a href='/predictor.php'> selection page</a> to continue.";
} else {
//Load selected summoners
$s1 = $_GET['s1'];
$s2 = $_GET['s2'];
//Connect to database
$con = mysql_connect("localhost", "root", "password") or
  die("Cannot connect: " . mysql_error());
mysql_select_db("database_project",$con);
//Pull champion statistical data
$sql = "";

mysql_query($sql,$con);
mysql_close($con);
//Get a time-to-kill for each champion -- these could be made into php objects
$f1 = new Fighter;
$f1->setSmn($s1);
$f2 = new Fighter;
$f2->setSmn($s2);
$f2->armor = $f2->armor + 100;
$f1->calculateArmorPen($f2);
$f2->calculateArmorPen($f1);
$f1->calculateDR($f2);
$f2->calculateDR($f1);
$ttk2 = $f1->calculateKillTime($f2);
$ttk1 = $f2->calculateKillTime($f1);
//Dissemate data
if($ttk1>$ttk2){
	$winner=$s1;
	$loser=$s2;
	$champion=$f1->champion[0];
	$time=$ttk1;
	$difference=$ttk1-$ttk2;
	$loadout="S1: ".$f1->printData()."<br>S2: ".$f2->printData();
} else {
	$winner=$s2;
	$loser=$s1;
	$champion=$f2->champion[0];
	$time=$ttk2;
	$difference=$ttk2-$ttk1;
	$loadout="$s1: ".$f1->printData()."<br>$s2: ".$f2->printData();
};
?>
</head>
<body>
<table align="center" style="width:100%">
	<tr><h1 align="center"><?php echo $winner?> has defeated <?php echo $loser?>!</h1></tr>
	<tr><h2 align="center">As <?php echo $champion?>!</h2></tr>
	<tr><h2 align="center">In <?php echo $time?> seconds,</h2></tr>
	<tr><h2 align="center">By a margin of <?php echo $difference?>.</h2></tr>
	<tr><h3 align="center">Using loadout:<br><?php echo $loadout?></h3></tr>
</table>
</body>
<?php
}
 ?>
</html>