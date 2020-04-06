<?php 

class PlayerData {
    private $playerName;
    private $playerId;
    private $platform;
    private $region;
    private $command;

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
            //$this->platform = $platform;
            switch ($platform) {
                //Check for Uplay
                case 'uplay':
                $this->platform = 'uplay';
                break;

                case 'pc':
                $this->platform = 'uplay';
                break; 

                //Check for PSN
                case 'psn':
                $this->platform = 'psn';
                break;

                case 'ps4':
                $this->platform = 'psn';
                break; 

                //Check for XBL
                case 'xbl':
                $this->platform = 'xbl';
                break;

                case 'xbox':
                $this->platform = 'xbl';
                break;
            }
        }
    }

    function checkForRegion($region) {
        if (empty($region)) {
            die('Missing region');
        } else {
            switch (strtoupper($region)) {
                //Check for Europe
                case 'EU':
                $this->region = 'EU';
                break;

                case 'EUROPE':
                $this->region = 'EU';
                break;

                //Check for North America
                case 'NA':
                $this->region = 'NA';
                break;
    
                case 'NORTHAMERICA':
                $this->region = 'NA';
                break;

                //Check for Asia
                case 'AS':
                $this->region = 'AS';
                break;
        
                case 'ASIA':
                $this->region = 'AS';
                break;
            }
        }
    }
        }
    }
}
