<?php 

class Stats {
    function getPlayerStatsByName($name, $platform, $region) {
        /**
         * Quick note: We cannot get the players stats with only
         * the player's name, we need to get the id so we can get
         * all the player's data
         */

        //Gets player data from r6Tab API
        $playerDataRequest = file_get_contents("https://r6.apitab.com/search/$platform/$name");

        //Outputs error when can't connect to r6Tab API
        if (!$playerDataRequest) {
            die("It was not possible to establish a connection with the r6Tab API");
        }

        //Decodes the received JSON data to a variable
        $result = json_decode($playerDataRequest, true);

        /*
         * Decoding the following (example)
         * {
            "status": 200,
            "foundmatch": true,
            "requested": "hacklason",
            "players": {
                "fbd7856f-2210-46a8-ae49-286aff3f2849": {
                "profile": {
                    "p_name": "Hacklason",
                    "p_user": "fbd7856f-2210-46a8-ae49-286aff3f2849",
                    "p_platform": "uplay",
                    "verified": false
                },
                "refresh": {
                    "x": 0,
                    "s": 0
                },
                "stats": {
                    "level": 58
                },
                "ranked": {
                    "kd": 0.88,
                    "mmr": 0,
                    "rank": 0,
                    "champ": 0,
                    "NA_mmr": 0,
                    "NA_rank": 0,
                    "NA_champ": 0,
                    "EU_mmr": 0,
                    "EU_rank": 0,
                    "EU_champ": 0,
                    "AS_mmr": 0,
                    "AS_rank": 0,
                    "AS_champ": 0
                }
                }
            }
            }
         * 
         */

        //If the request finds no results, output warning
        if ($result['foundmatch'] == false) {
            die("This player's data could not be found");
        } 
        
        //Saves the players data arrays with integers indexes
        $players = array_values($result['players']);

        //Gets the player id to use in the other method
        $playerId = $players[0]['profile']['p_user'];

        //Gives the ID to the method that will actually process the information 
        $this->getPlayerStatsById($playerId, $platform, $region);
    }

    function getPlayerStatsById($id, $platform, $region) {
        //Gets player data from r6Tab API
        $playerDataRequest = file_get_contents("https://r6.apitab.com/player/$id");

        //Outputs error when can't connect to r6Tab API
        if (!$playerDataRequest) {
            die("It was not possible to establish a connection with the r6Tab API");
        }

        //Decodes the received JSON data to a variable
        $result = json_decode($playerDataRequest, true);

        //If the request finds no results, output warning
        if ($result['found'] == false) {
            die("Couldn't find any player with the inserted ID");
        }

        //Gets the necessary data from the results
        $playerRegion = $region;
        $playerLevel = $result['stats']['level'];
        $playerWinRate = $result['ranked'][$playerRegion . '_wl'];
        $playerKD = $result['ranked'][$playerRegion .'_kd'];

        //Output results in plain text
        echo " Lv. $playerLevel | $playerWinRate Win Rate | $playerKD K/D";
    }
}