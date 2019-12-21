<?php
$changes_json = <<<JSON
{
}
JSON;
$changes = json_decode($changes_json, true);
$new_civs_json = <<<JSON
[
  {
		"name": "Bulgarians",
		"ver": "d", 
		"ct": "Infantry and Cavalry",
		"uu": "Konnik",
		"ut": "Stirrups(Castle),<br /> Bagains(Imperial)",
		"tb": "Blacksmiths work 50% faster",
		"bs": "<ul> <li>Militia-line upgrades are free.</li> <li>Town Centers cost -50% stone.</li> <li>Can build Krepost.</li>",
		"tt": "bulgarians"
	},
  {
		"name": "Cumans",
		"ver": "d", 
		"ct": "Cavalry",
		"uu": "Kipchak",
		"ut": "Steppe Husbandry(Castle),<br /> Cuman Mercenaries(Imperial)",
		"tb": "Palisade Walls +50% HP",
		"bs": "<ul> <li>Additional Town Center can be built in the Feudal Age.</li> <li>Siege Workshop and Battering Ram available in the Feudal Age.</li> <li>Cavalry move 10% faster starting in Feudal Age.</li>",
		"tt": "cumans"
  },  
  {
		"name": "Lithuanians",
		"ver": "d", 
		"ct": "Cavalry and Monk",
		"uu": "Leitis",
		"ut": "Hill Forts(Castle),<br /> Tower Shields(Imperial)",
		"tb": "Monasteries work 20% faster",
		"bs": "<ul> <li>Start with +150 food.</li> <li>Spearman-line and Skirmishers move 10% faster.</li> <li>Each garrisoned relic gives +1 attack to cavalry units (maximum +5).</li>",
		"tt": "lithuanians"
	},
  {
		"name": "Tatars",
		"ver": "d", 
		"ct": "Cavalry Archer",
		"uu": "Keshik",
		"ut": "Silk Armor(Castle),<br /> Timurid Siegecraft(Imperial)",
		"tb": "Cavalry Archers +2 LOS",
		"bs": "<ul> <li>Herdables contain +50% food.</li> <li>Units deal +25% damage when fighting from higher elevation.</li> <li>Parthian Tactics is free.</li>",
		"tt": "bulgarians"
	}
]
JSON;
$new_civs = json_decode($new_civs_json);
$string = file_get_contents("build/dlc_civilizations.json");
$json_a = json_decode($string, true);
foreach($json_a['data'] as &$civ) {
	if(array_key_exists($civ['name'], $changes)) {
		$civ = array_replace_recursive($civ, $changes[$civ['name']]);
	}
}
$json_a['data'] = array_merge($json_a['data'], $new_civs);	
echo json_encode($json_a);
?>
