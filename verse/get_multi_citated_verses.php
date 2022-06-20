<?php
function get_multi_citated_verses($book_code,  $chapter_start, $chapter_end, $verse_start, $verse_end){
    include_once 'verses_lookup.php';
    //    include_once 'fix_peh_omach.php';
    $value=[];
     echo "<p debug='get_multi_citated_verses:";  print_r($book_code." ".  $chapter_start."-".$chapter_end." ". $verse_start."-".$verse_end);  echo "'></p>";
    for ($chapter=$chapter_start; $chapter<=$chapter_end; $chapter++){
       $v1=1;
       $v2=199;
       if ($chapter==$chapter_start){$v1=$verse_start;}
       if ($chapter==$chapter_end){$v2=$verse_end;}
       {
           $sqlstring = '(book = '. $book_code. ') and (ch = '. $chapter. ') and (vr between '. $v1. ' and '.  $v2. ')';
           $row= verses_lookup($sqlstring,'verse');
           //print_r($row);
           //$t=array($row['id'],fix_peh_omach($row['verse']),$row['book'], $row['ch'], $row['vr']);
           array_push($value,$row);
       }
    }
    return $value;
}



