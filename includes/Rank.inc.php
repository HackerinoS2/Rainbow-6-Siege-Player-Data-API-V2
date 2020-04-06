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

        //Gets the necessary data from the results
        $playerName = $result['players'][0]['profile']['p_name'];
        $playerRegion = $region;
        $playerRank = $result['players'][0]['profile'][$playerRegion . '_rank'];
        $playerMMR = $result['players'][0]['profile'][$playerRegion . '_mmr'];
        
        /**
         * To continue
         */

        //If the request finds no results, output warning
        if ($result['foundmatch'] == false) {
            die("This player's data could not be found");
        } else {
            echo ""; //Setup output
        }

        //Region: '.$region.' | '.'Rank: '.$playerRankName.' | '.'MMR: '.$playerMMR.' | '.'Platform: '.strtoupper($platform).', '.$playerDataLastUpdated.', more info in '.$playerUrl

    }
}