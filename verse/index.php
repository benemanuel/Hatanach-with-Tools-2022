<html dir="rtl" lang="he">
<head>
  <link rel="stylesheet" href="../css/debug.css" type="text/css">
  <link rel="stylesheet" href="../css/SBLHebrew-webfont.css" type="text/css">
  <link rel="stylesheet" href="../css/EzraSIL-webfont.css" type="text/css">
  <link rel="stylesheet" href="../css/CharisSIL-webfont.css" type="text/css">
  <link rel="stylesheet" href="../css/FHACondensedFrench-webfont.css" type="text/css">
  <link rel="stylesheet" href="../css/Garamond-webfont.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
</head>
<body>

<?php
global $debug_flag; $debug_flag==false;
include_once 'db_call.php';
include_once 'chk_key.php';
include_once 'show_verse.php';
include_once 'show_extra.php';
include_once 'show_book.php';
include "convert_cit_key.php";

$b = " ??????:";
$c = " ??????:";
$v = " ????????:";



$a = chk_key();
// echo "<p debug='index after chk_key";  print_r($a);  echo "'></p>";
$key = $a[0];
$highlight = $a[1];
$cit = $a[2];

if ($cit_call)
   {
     $key=convert_cit_key($cit)[1][4];
   }

if (($key <= 232130) & ($key >= 10)) {
    $data = show_verse($key);
    $bk = $data[0];
    $ch = $data[1];
    $vr = $data[2];
    $pasuk = $data[3]; 
    /* field can be 0,1,2,3
 DESCRIBE booklookup;
+---+-----------+-------------+
| # | Field     | Type        |
+---+-----------+-------------+
| 0 | fullbook  | varchar(12) |
| 1 | shortbook | varchar(6)  |
| 2 | hebbook   | varchar(13) |
| 3 | tnk       | tinyint(4)  |
+---+-----------+-------------+
    */
    $fullbook = show_book($bk,0);
    $shortbook = show_book($bk,1);
    $hebbook = show_book($bk,2);
   if (! $verse_call){
   echo '</br><h2><p dir="rtl" lang="he" class="source-text-area">' . $pasuk . '</p></h2></br>';
   $home_url="https://hatanach.geulah.org.il/verse/citation.php";	       
   $url_output=$home_url . '?verse=' . $shortbook . $ch . ':' . $vr;;
   $output_1='<a target = ' . "'_blank'" . ' href="';
   $output_2='"/>';
   $output_3="</a>";
   $text_output=  "\n" . $b . $hebbook  . " " . $c . $ch . " " . $v . $vr . "<br>\n";
   echo($output_1 . $url_output . $output_2 . $text_output . $output_3);

   $url_output=$home_url . '?verse=' . $shortbook . $ch .  '&highlight='.  $vr;
   $text_output=  "\n" . $b . $hebbook  . " " . $c . $ch . "<br>\n";

   echo($output_1 . $url_output . $output_2 . $text_output . $output_3);
   echo "<br>";

   $target="https://hatanach.geulah.org.il/verse/?key=";
   echo "<a target = '_blank' href='$target" . ($key+20) . "'/> ???</a>";
   echo "<a target = '_blank' href='$target" . ($key+10) . "'/> ??????</a>";
   echo "<a target = '_blank' href='$target" . ($key-10) .  "'/> ??????</a>";
   echo "<a target = '_blank' href='$target" . ($key-20) .  "'/> ???</a>";

   $verse = show_verse($key)[3];

   $result=show_extra($key,'comment',1,'<p dir="ltr" lang="en">The Letteris\'s Comments are:</p>','keyvalue');
   echo $result;
   $result=show_extra($key,'editornotes',1,'<p dir="ltr" lang="eng">The Editor\'s Comments are:</p>','keyvalue');
   echo $result;
   $result=show_extra($key,'hebrew',1,'<p dir="ltr" lang="en">The Hebrew Translation is:</p>','id');
   echo $result;

   include_once 'show_trans.php';
   $result=show_trans($verse);
   $loop = $result[0];
   for ($x = 1; $x <= $loop; $x++) {
      echo $result[$x];
   }


   $home_eng_url="https://www.biblegateway.com/passage/?search=";
   $en_flag='<img title="English" src="files/en.png" alt="English" width="16" height="11" />';

   $version="NET"; $lang="en"; $flag=$en_flag;
   include_once 'show_transilation.php';
   $en_url=show_transilation($key,$shortbook. $ch. ":". $vr, $lang, $version, $both_url_text);
    
   $fr_flag='<img title="fran??ais" src="files/fr.png" alt="French" width="16" height="11" />';
   $version="BDS"; $lang="fr"; $flag=$fr_flag;
   $fr_url=show_transilation($key,$shortbook. $ch. ":". $vr, $lang, $version, $both_url_text);

   $ru_flag='<img title="????????????" src="files/ru.png" alt="Russian" width="16" height="11" />';
   $version="RUSV"; $lang="ru"; $flag=$ru_flag;
   $ru_url=show_transilation($key,$shortbook. $ch. ":". $vr, $lang, $version, $both_url_text);


   echo "<details>";

   if ($verse_call) echo "verse called"."</br>". PHP_EOL;
   if ($key_call) echo "key called"."</br>". PHP_EOL;
   if ($random_call)
   {echo "random:".$key."</br>". PHP_EOL;
     echo "<date>" . date("d-m-Y H:i:s") . "</date>";
   }

   include_once 'show_sedarim.php';
   include_once 'gematria.php';
   include_once 'hebrewize.php';
   include_once 'all_sedarim_verse.php';

   $sedar=show_sedarim($key);
   all_sedarim_verse($sedar, 0, false, true, false, false,
         false, false, false, false, false,
                  false, false, false,false,false,false);

  //echo "??????:".show_book($sedar[3],2)." ".show_book($sedar[3],4)." ??????:".number2hebrew($sedar[1])." ??????????:".number2hebrew($sedar[2]);echo "'></p>";
   echo "</details>";} else echo $pasuk;
}
echo "</body></html>";
?>





