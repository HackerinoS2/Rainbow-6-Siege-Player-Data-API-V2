<?php

class Rank {
    function getPlayerRankByName($name, $platform, $region) {
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

        //Gets the necessary data from the results
        $playerName = $players[0]['profile']['p_name'];
        $playerUser = $players[0]['profile']['p_user'];
        $playerRegion = $region;
        $playerPlatform = strtoupper($platform);
        $playerRank = $players[0]['ranked']['rank'];
        $playerMMR = $players[0]['ranked'][$playerRegion . '_mmr'];

        //Gets a JSON file that translates the ranks numbers to its name | Example: 1 = Copper V, 2 = Copper IV...
        $ranksJSON = file_get_contents('r6ranks.json', true);

        //Decodes the json file to a variable (array)
        $r6Ranks = json_decode($ranksJSON, true);

        //Saves the real rank name
        $playerRealRank = $r6Ranks[$playerRank];

        //Sets up the r6tab profile URL of the player using is "user" (player id)
        $playerURL = 'https://r6tab.com/player/' . $playerUser;

        //Output results in plain text
        echo "Region: $playerRegion | Rank: $playerRealRank | MMR: $playerMMR | Platform: $playerPlatform, more info in $playerURL";
    }

    function getPlayerRankById($id, $platform, $region) {
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
        $playerName = $result['player']['p_name'];
        $playerUser = $result['player']['p_user'];
        $playerRegion = $region;
        $playerPlatform = strtoupper($platform);
        $playerRank = $result['ranked'][$playerRegion.'_rankname'];
        $playerMMR = $result['ranked'][$playerRegion . '_mmr'];

        //Sets up the r6tab profile URL of the player using is "user" (player id)
        $playerURL = 'https://r6tab.com/player/' . $playerUser;

        //Output results in plain text
        echo "Region: $playerRegion | Rank: $playerRank | MMR: $playerMMR | Platform: $playerPlatform, more info in $playerURL";
    }
}