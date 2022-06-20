<!DOCTYPE html>
<html dir="rtl" lang="he">
<head>
     <link rel="stylesheet"
        href="../css/SBLHebrew-webfont.css"
        type="text/css">
     <meta content="text/html; charset=UTF-8" http-equiv="content-type">
</head>
<body>
<?php
//gets  citation string, returns startkey, endkey
include_once "get_citated_verse.php";
include_once "show_verse.php";
include_once "hebrewize.php";
include_once "shorteng_bookcode.php";
include_once "db_chapter.php";
include_once "all_citation_verse.php";
//global  $url_output, $hebcit, $engcit, $fulltext, $highlight,  $high_pasuk,$high_url,$high_hebcit,$high_engcit;
//global $quotedverse;
//y$quotedverse = "";
$verse = "";

if (isset($_SERVER["PATH_INFO"])) {
    $path = $_SERVER["PATH_INFO"];
    $verse = ltrim($path, "/");
}

if (isset($_GET["verse"])) {
    $verse = htmlspecialchars($_GET["verse"]);
    if ((strlen($verse) <= 0) & (strlen($verse) > 50)) {
        echo "verse size to small or large";
    }
}

$highlight = 0;
if (isset($_GET["highlight"])) {
    $highlight = htmlspecialchars($_GET["highlight"]);
    if ((strlen($highlight) <= 0) & (strlen($highlight) > 4)) {
        echo "highlight size to small or large";
    }
}

$command_line =
    "cd  /var/www/hatanach/verse/script/ && node citapp.js -c " .
    " '" .
    $verse .
    "'  2>&1";

$osis = exec($command_line, $out, $err);

//echo "<p debug='cit pre verse:";  print_r($quotedverse);  echo "'></p>";
list($hebcit,$verse,$url_output,$engcit)=all_citation_verse($osis);
//echo "<p debug='cit post verse:";  print_r($verse);  echo "'></p>".PHP_EOL;
//echo "<p debug='cit post quotedverse:";  print_r($quotedverse);  echo "'></p>".PHP_EOL;


include_once "button_wrap.php";
button_wrap($hebcit,$verse,"https://hatanach.geulah.org.il/verse/citation.php?verse=".$osis,$engcit);
?>

  </body>
</html>






