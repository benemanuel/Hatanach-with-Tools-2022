<?php
//show not be needed or called _ incorperated into chk_key
//gets  citation string, returns startkey, endkey

include "get_citated_verse.php";
include "show_verse.php";
include "hebrewize.php";
include "shorteng_bookcode.php";
include "convert_cit_key.php";

$startkey = "";
$endkey = "";

$raw = 1; //output html
$answer = 0;
$firsttime = 0;
$cit = "KUKU";

//echo 'PATH_INFO ';
if (isset($_SERVER["PATH_INFO"])) {
    $path = $_SERVER["PATH_INFO"];
    $cit = ltrim($path, "/");
}

if (isset($_GET["cit"])) {
    $cit = htmlspecialchars($_GET["cit"]);
    if (strlen($cit) <= 3) {
        echo "cit size to small";
    }
}

$highlight = 0;
if (isset($_GET["highlight"])) {
    $highlight = htmlspecialchars($_GET["highlight"]);
    if ((strlen($highlight) <= 0) & (strlen($highlight) > 4)) {
        echo "highlight size to small or large";
    }
 }

 $answer = convert_cit_key($cit);
 echo $answer[1][4].PHP_EOL;



