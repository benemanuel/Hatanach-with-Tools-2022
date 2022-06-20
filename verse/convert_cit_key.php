<?php
function convert_cit_key($verse){
echo "<p debug='function convert_cit_key:". $verse ."'></p>";
    include_once "get_citated_verse.php";
    include_once "shorteng_bookcode.php";

$command_line =
    "cd  /var/www/hatanach/verse/script/ && node citapp.js -c " .
    " '" .
    $verse .
    "'  2>&1";

$osis = exec($command_line, $out, $err);
//echo "<p debug='convert_cit_key osis". $osis ."'></p>";

$bcv = explode(".", $osis);
//echo " count=". count($bcv). PHP_EOL;
switch (count($bcv)) {
  case 1:
    //only book
    $verse_number=0;
    $chapter_number=0;
    list($book) = $bcv;
    break;
  case 2:
    //only chapter
    $verse_number=0;
    list($book, $chapter_number) = $bcv;
    break;
  case 3:
    // verse exist in osis
    list($book, $chapter_number, $verse_number) = $bcv;
    break;
  default:
    $verse_number=0;
    $chapter_number=0;
    $book="Kuku";
    echo "No citation given". PHP_EOL;
}

$book_code=shorteng_bookcode($book);
$value = get_citated_verse($book_code, $chapter_number, $verse_number);

return $value;
}



