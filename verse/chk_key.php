<?php
include_once 'random_key.php';
function chk_key($key = -2,$highlight = 0,$cit=""){
global $debug_flag;
  if ($debug_flag) {echo "<p debug='chk_key function:";  print_r(array($key,$highlight,$cit));  echo "'></p>";}
        GLOBAL $random_call;
        GLOBAL $verse_call;
        GLOBAL $key_call;
        GLOBAL $cit_call;
    $random_call=false;
    $verse_call=false;
    $key_call=false;
    $cit_call=false;

   if (isset($_GET["verse"])) {
	    $key = htmlspecialchars($_GET["verse"]);
        $verse_call=true;
        if ($debug_flag) {echo "<p debug='chk_key verse called:";  print_r($key);  echo "'></p>";}
    	if (($key > 232130) | ($key < 10)) {
	    	echo "number out of range";
            return 1;
	    }
        return array($key,$highlight,$cit);
    }

    if (isset($_GET["key"])) {
        $key = htmlspecialchars($_GET["key"]);
        $key_call=true;
        if ($debug_flag) {echo "<p debug='chk_key key called:";  print_r($key);  echo "'></p>";}
        if (($key > 232130) | ($key < 10)) {
            echo "number out of range";
            return 1;
        }
        return array($key,$highlight,$cit);
    }
    if (isset($_GET["random"])) {
        $key = random_key();
        $random_call=true;
        if ($debug_flag) {echo "<p debug='chk_key random called:";  print_r($key);  echo "'></p>";}
        return array($key,$highlight,$cit);
    }

    if (isset($_GET["cit"])) {
        $cit = htmlspecialchars($_GET["cit"]);
        if ($debug_flag) {echo "<p debug='chk_key cit called:";  print_r($cit);  echo "'></p>";}
        if ((strlen($cit) <= 3)) {
            echo "cit size to small";
            return array(-1,0,"");
            } else {    if (isset($_GET["highlight"])) {
            $highlight = htmlspecialchars($_GET["highlight"]);
            if ($debug_flag) {echo "<p debug='chk_key higlight called:";  print_r($highlight);  echo "'></p>";}
             if ((strlen($highlight) <= 0) & (strlen($highlight) > 4)) {
               echo "highlight size to small or large";
             }
            }
        }
        $cit_call=true;
        //$cit = convert_cit_key($cit)[1][4];
        return array($key,$highlight,$cit);
    }

    if (isset($_SERVER["PATH_INFO"])) {
        $path = $_SERVER["PATH_INFO"];
        $cit = ltrim($path, "/");
        $cit_call=true;
        if ($debug_flag) {echo "<p debug='chk_key cit default called:";  print_r($cit);  echo "'></p>";}
        if ((strlen($cit) <= 3)) {
           echo "cit size to small or large";
        }
    }
    if ($debug_flag) {echo "<p debug='chk_key not set:";  print_r(array($key,$highlight,$cit));  echo "'></p>";}
	echo "verse value not set, enter 'key?' number from 10-232130 or 'cit?' BookChap:Verse";
	return array(0,0,"");
}


