<?php
//rm *.html
//create html files
//mv *.html ../.
//error unknown
//Writting Deuteronomy.....
//PHP Notice:  A non well formed numeric value encountered in /var/www/transliteration/gematria.php on line 88
include_once '../show_book.php';
include_once '../hebrewize.php';


$tanachfile = '../predb/letteris_utf8.txt';
$url_a="<a target = '_blank' href='https://transliteration.geulah.org.il/citation.php?verse=";
$lastbook="";
$header = '
<html dir="rtl" lang="he">
<head>
  <link rel="stylesheet" href="EzraSIL-webfont.css" type="text/css">
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
</head>
<body>
<h2>
';

foreach (new SplFileObject($tanachfile) as $line){
    // Echo one line from the file.
    $pieces = explode("\t", $line);
    if (count($pieces) == 6) {
           list($book,$ch,$vr,$ax,$value,$verse) = $pieces;
           if ($book != $lastbook){
               //new book
               if ($lastbook != ""){
                   fwrite($myfile,"</html>");
                   fclose($myfile);
               }
               $lastbook = $book;
               $html_book_name = show_book(rtrim($book,"O"),0);
               echo "Writting ".$html_book_name.".....". PHP_EOL;
               $myfile = fopen($html_book_name.  ".html", "w");
               fwrite($myfile, $header);
               fwrite($myfile,show_book(rtrim($book,"O"),2)." ".$html_book_name."</br></H2>".PHP_EOL);
           }

           //  sed -i 's/??/????/g' l.txt
           //  sed -i 's/??/??/g' l.txt
           
           $pattern = '??';    $replace = '??';
           $t1 = preg_replace("/".$pattern."/", $replace, $verse);
           $pattern = '??';     $replace = '??';
           $pasuk = preg_replace("/".$pattern."/", $replace, $t1);
           echo $ch. ":". $vr. PHP_EOL;
           $txt= $url_a . show_book(rtrim($book,"O"),1) . $ch. ":". $vr. "'/> (" .   hebrewize(0,  $ch, $vr) . ")</a>". $pasuk. PHP_EOL;
           fwrite($myfile, $txt);
    }
}
fwrite($myfile,"</html>");
fclose($myfile);



