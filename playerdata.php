<?php

require_once('includes/PlayerData.inc.php');

$playerData = new PlayerData();
$playerId = null;
$playerName = null;
$platform = null;
$region = null;
$command = null;

//If set, Gets the player id value
if (isset($_GET['p_id'])) {
    $playerId = $_GET['p_id'];
}

//If name, Gets the player id value
if (isset($_GET['p_name'])) {
    $playerName = $_GET['p_name'];
}

//Checks if players id or name was inserted or if both are inserted
$playerData->processPlayerNameOrId($playerName, $playerId);

//Defines player id/name property value
$playerData->definePlayerNameOrId($playerName, $playerId);

//If set, gets the platform value
if (isset($_GET['platform'])) {
    $platform = $_GET['platform'];
}

//Checks if platform was inserted
$playerData->checkForPlatform($platform);

//If set, gets the region value
if (isset($_GET['region'])) {
    $region = $_GET['region'];
}

//Checks if region was inserted
$playerData->checkForRegion($region);

//If set, gets the command value
if (isset($_GET['command'])) {
    $command = $_GET['command'];
}

