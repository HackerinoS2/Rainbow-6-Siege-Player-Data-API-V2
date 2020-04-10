<?php

class Utils {
    function convertSecondsToPlaytime($seconds) {
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds / 60) % 60);
        $seconds = $seconds % 60;
        return $hours.' hours, '.$minutes.' minutes and '.$seconds.' seconds';
      }
}