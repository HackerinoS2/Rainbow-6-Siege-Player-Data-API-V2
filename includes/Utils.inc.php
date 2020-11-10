<?php

class Utils {
    function convertSecondsToPlaytime($seconds) {
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds / 60) % 60);
        $seconds = $seconds % 60;
        return $hours.' hours, '.$minutes.' minutes and '.$seconds.' seconds';
      }

      function mmrToRank($mmr) {
          $rank;

          if ($mmr == 0) {
              $rank = 'Unranked';
          } elseif ($mmr >= 1 && $mmr <= 1199) {
              $rank = 'Copper V';
          } elseif ($mmr >= 1200 && $mmr <= 1299) {
              $rank = 'Copper IV';
          } elseif ($mmr >= 1300 && $mmr <= 1399) {
              $rank = 'Copper III';
          } elseif ($mmr >= 1400 && $mmr <= 1499) {
              $rank = 'Copper II';
          } elseif ($mmr >= 1500 && $mmr <= 1599) {
              $rank = 'Copper I';
          } elseif ($mmr >= 1600 && $mmr <= 1699) {
              $rank = 'Bronze V';
          } elseif ($mmr >= 1700 && $mmr <= 1799) {
              $rank = 'Bronze IV';
          } elseif ($mmr >= 1800 && $mmr <= 1899) {
              $rank = 'Bronze III';
          } elseif ($mmr >= 1900 && $mmr <= 1999) {
              $rank = 'Bronze II';
          } elseif ($mmr >= 2000 && $mmr <= 2099) {
              $rank = 'Bronze I';
          } elseif ($mmr >= 2100 && $mmr <= 2199) {
              $rank = 'Silver V';
          } elseif ($mmr >= 2200 && $mmr <= 2299) {
              $rank = 'Silver IV';
          } elseif ($mmr >= 2300 && $mmr <= 2399) {
              $rank = 'Silver III';
          } elseif ($mmr >= 2400 && $mmr <= 2499) {
              $rank = 'Silver II';
          } elseif ($mmr >= 2500 && $mmr <= 2599) {
              $rank = 'Silver I';
          } elseif ($mmr >= 2600 && $mmr <= 2799) {
              $rank = 'Gold III';
          } elseif ($mmr >= 2800 && $mmr <= 2999) {
              $rank = 'Gold II';
          } elseif ($mmr >= 3000 && $mmr <= 3199) {
              $rank = 'Gold I';
          } elseif ($mmr >= 3200 && $mmr <= 3599) {
              $rank = 'Platinum III';
          } elseif ($mmr >= 3600 && $mmr <= 3999) {
              $rank = 'Platinum II';
          } elseif ($mmr >= 4000 && $mmr <= 4399) {
              $rank = 'Platinum I';
          } elseif ($mmr >= 4400 && $mmr <= 4999) {
              $rank = 'Diamond';
          } elseif ($mmr >= 5000) {
              $rank = 'Champion';
          }

          return $rank;
      }

}