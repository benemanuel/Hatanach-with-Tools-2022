<?php
include_once 'gematria.php';
include_once 'show_book.php';
function hebrewize($book_code,  $chapter_number, $verse_number, $seder=false){
    $perekname = "??????";
    $sedername = "??????";
    
    if ($book_code > 0){

    if ($seder) {
        $hebrewbookname = 3;
        $chaptername = $sedername;
    } else {
        $hebrewbookname = 2;
        $chaptername = $perekname;
    }
        $hebname = show_book($book_code,$hebrewbookname);
        if ($verse_number > 0) {
            $value = $hebname." ".$chaptername  ." ". number2hebrew($chapter_number). " ???????? ". number2hebrew($verse_number);
        } else {
            $value = $hebname." ".  "???? ". $chaptername." ". number2hebrew($chapter_number);
        }
    } else {$hebname="";
        if ($verse_number > 0) {
            $value = $hebname.  $chaptername." ". number2hebrew($chapter_number). " ???????? ". number2hebrew($verse_number);
        } else {
            $value = $hebname.  "???? ".$chaptername." ". number2hebrew($chapter_number);
       }
    }
return $value;
}



