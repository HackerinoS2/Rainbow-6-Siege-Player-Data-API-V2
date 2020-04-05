<?php 

class PlayerData {
    public $playerName;
    public $playerId;
    public $platform;
    public $region;

    function processPlayerNameOrId($name, $id) {
        //Checks if players id or name was inserted or if both are inserted
        if (empty($name) && empty($id)) {
            die('Missing player id/name');
        } elseif (!empty($name) && !empty($id) ) {
            die("You can't have a player's ID and Name introduzed at the same time");
        }
    }
}

