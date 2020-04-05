<?php

require_once('includes/PlayerData.inc.php');

$playerData = new PlayerData();
$playerId = null;
$playerName = null;
$platform = null;
$region = null;

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

/**
 * Dar refactory a partir daqui
 */

//Defines player id/name property value
if (!empty($playerId)) {
    $playerData->playerId = $playerId;
} elseif (!empty($playerName)) {
    $playerData->playerName = $playerName;
}

//If set, gets the platform value
if (isset($_GET['platform'])) {
    $platform = $_GET['platform'];
}

//Checks if platform was inserted
if (empty($platform)) {
    die('Missing platform');
}

//Defines platform property value
$playerData->platform = $platform;

//If set, gets the region value
if (isset($_GET['region'])) {
    $region = $_GET['region'];
}

//Checks if region was inserted
if (empty($region)) {
    die('Missing region');
}

//Defines region property value
$playerData->region = $region;
