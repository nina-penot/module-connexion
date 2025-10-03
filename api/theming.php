<?php
//monsters
if (session_status() === PHP_SESSION_NONE) session_start();

$mizutsune = "mizu";
$almudron = "almudron";

if (isset($_SESSION["theme"])) {
    $monster = $_SESSION["theme"];
} else {
    $monster = $mizutsune;
}

//color vars
$color_back = $monster . "_back";
$color_main = $monster . "_dark";
$color_sec = $monster . "_secondary";
$color3 = $monster . "_body";
$hoverable = $monster . "_hover";
//---------