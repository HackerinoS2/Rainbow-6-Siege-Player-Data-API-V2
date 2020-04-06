<?php 

class PlayerData {
    public $playerName = null;
    public $playerId = null;
    public $platform = null;
    public $region = null;

    function processPlayerNameOrId($name, $id) {
        //Checks if players id or name was inserted or if both are inserted
        if (empty($name) && empty($id)) {
            die('Missing player id/name');
        } elseif (!empty($name) && !empty($id) ) {
            die("You can't have a player's ID and Name introduzed at the same time");
        }
    }

    function definePlayerNameOrId($name, $id) {
        if (!empty($id)) {
            $this->playerId = $id;
        } elseif (!empty($name)) {
            $this->playerName = $name;
        }
    }

    function checkForPlatform($platform) {
        if (empty($platform)) {
            die('Missing platform');
        } else {
            $this->platform = $platform;
        }
    }

    function checkForRegion($region) {
        if (empty($region)) {
            die('Missing region');
        } else {
            $this->region = $region;
        }
    }
}
