<?php

require_once('Utils.inc.php');

class ProfileImage
{
    function getPlayerProfileImageByName($name, $platform)
    {
        //Temporary use of Utils
        $utils = new Utils();

        //Get the API key from the JSON file
        $json = file_get_contents('includes/apikey.json');
        $array = json_decode($json, true);
        $apikey = $array['API_KEY'];

        //Gets player data from r6Tab API
        $playerDataRequest = file_get_contents("https://r6.apitab.com/search/$platform/$name?cid=$apikey");

        //Outputs error when can't connect to r6Tab API
        if (!$playerDataRequest) {
            die("It was not possible to establish a connection with the r6Tab API");
        }

        //Decodes the received JSON data to a variable
        $result = json_decode($playerDataRequest, true);

        //If the request finds no results, output warning
        if ($result['foundmatch'] == false) {
            die("This player's data could not be found");
        }

        //Saves the players data arrays with integers indexes
        $players = array_values($result['players']);

        //Gets the necessary data from the results
        $playerUser = $players[0]['profile']['p_user'];

        echo 'https://ubisoft-avatars.akamaized.net/' . $playerUser . '/default_146_146.png';
    }

    function getPlayerProfileImageById($id) {
        echo 'https://ubisoft-avatars.akamaized.net/' . $id . '/default_146_146.png';
    }
}
