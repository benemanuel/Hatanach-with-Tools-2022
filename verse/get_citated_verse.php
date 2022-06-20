<?php
include_once 'db_call.php';
function get_citated_verse($book_code,  $chapter_number, $verse_number){
    echo "<p debug='function get_citated_verse:'></p>";
    $sqlstring = '(book = '. $book_code. ') and (ch = '. $chapter_number. ') and (vr = '. $verse_number. ')';
    $value = db_call($sqlstring,'verse');
   return $value;
}


