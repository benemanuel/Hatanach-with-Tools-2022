<?php
include_once 'show_book.php';
include_once 'show_verse.php';
include_once 'show_sedarim.php';
include_once 'gematria.php';
include_once 'hebrewize.php';
include_once 'show_extra.php';

include_once "get_citated_verse.php";
include_once "shorteng_bookcode.php";
include_once "db_chapter.php";


global   $keyvalue_index, $hebchap_index, $hebverse_index, $book_index, $bookname_index, $ch_index, $vr_index;
    
function all_sedarim_verse($verse_stream, $highlight_key=0, $heb_citation=false,  $sedarim_citation=false,$hebcitation_url=false, $key_url=false,
                  $citation_url=false, $comment_display=false, $editor_display=false, $hebrew_display=false, $trans_display=false,
                           $verse_call=false,$key_call=false,$random_call=false,$eng_trans=false,$french_trans=false,$russian_trans=false){

    global $debug_flag;
    if ($debug_flag) {echo "<p debug='function all_sedarim_verse:"."'></p>";}

    global $high_pasuk,$high_url,$high_hebcit,$high_engcit, $sed_cit;

    $sed_cit="";
    $keyvalue_index=0;
    $hebchap_index=1;
    $hebverse_index=2;
    $book_index=3;
    $bookname_index=4;
    $ch_index=5;
    $vr_index=6;
    $show_entire_sedar=$verse_stream[0]>1;
    if (($sedarim_citation) & ($show_entire_sedar)) {
      $sedar=show_sedarim($highlight_key)[1];
      $b1=show_book($sedar[3],2);
      $b2=show_book($sedar[3],4);
      //if ($debug_flag) {echo "<p debug='all_sedarim_verse sedarim_citation:";  print_r(array($b1,$b2));  echo "'></p>";}
      echo '<h2><p dir="rtl" lang="he" class="source-text-area-title">';
      if ($b1 == $b2) { $sed_cit="[??????:".$b2;}
      else
        {  $sed_cit="[??????:(".$b1.") ".$b2;}
      $sed_cit=$sed_cit. " ???? ??????:".number2hebrew($sedar[1]);
      echo $sed_cit. "]</br></p>".PHP_EOL;
    }
    // if ($debug_flag) {echo "<p debug='all_sedarim_verse count verses:";  print_r($verse_stream[0]);  echo "'></p>";}
 for ($i = 1; $i <= $verse_stream[0]; $i++)
   {
    $bookcode=$verse_stream[$i][$book_index];
    $shortbook=show_book($bookcode,1);
    $ch=$verse_stream[$i][$ch_index];
    $vr=$verse_stream[$i][$vr_index];
    $cit=$shortbook."".$ch.":".$vr;
    $hebcitation= '('. hebrewize($bookcode,$ch , $vr) . ')';
    $key=$verse_stream[$i][$keyvalue_index];
        
    $citurl="<a target = '_blank' href='https://hatanach.geulah.org.il/verse/citation.php?verse=".$cit."'/>(".$cit.")</a>";
    $hebciturl="<a target = '_blank' href='https://hatanach.geulah.org.il/verse/citation.php?verse=".$cit."'/>".$hebcitation."</a>";
    $keyurl="<a target = '_blank' href='https://hatanach.geulah.org.il/verse/?key=".$key."'/>VerseKey:".$key."</a>";

    $sedar=show_sedarim($key)[1];
    $verse=show_verse($key)[3];

    //if ($debug_flag) {echo "<p debug='all_sedarim_verse:";  print_r(array($sedar,$cit,$key));  echo "'></p>";}
     if ($highlight_key == $key) {
         echo '<h2><p dir="rtl" lang="he" class="source-text-highlighted-area">';
         $high_engcit="(". $cit .")";
         $high_hebcit= $hebcitation;
         $high_pasuk=$verse;
         $high_url="https://hatanach.geulah.org.il/verse/citation.php?verse=" . $cit;
        } else {
         echo '<h2><p dir="rtl" lang="he" class="source-text-area">';
        }


     if ($heb_citation) {
         echo $hebcitation;
     }
     echo $verse."</br>".PHP_EOL;

     if ($sedarim_citation) {
         $b1=show_book($sedar[3],2);
         $b2=show_book($sedar[3],4);
         //if ($debug_flag) {echo "<p debug='all_sedarim_verse sedarim_citation:";  print_r(array($b1,$b2));  echo "'></p>";}
         if (!($show_entire_sedar))
         { if ($b1 == $b2) { $sed_cit="[??????:".$b2;}
          else
            {$sed_cit="[??????:(".$b1.") ".$b2;}
            $sed_cit=$sed_cit. " ??????:".number2hebrew($sedar[1]);
            echo $sed_cit. " ??????????:".number2hebrew($sedar[2])."]</br>".PHP_EOL;}
         else {echo "[??????????:".number2hebrew($sedar[2])."]</br>";}

     }
     if ($citation_url) {echo $citurl."</br>".PHP_EOL;}
     if ($hebcitation_url) {echo $hebciturl."</br>".PHP_EOL;}
     if ($key_url) {echo $keyurl."</br>".PHP_EOL;}
     echo  "</p></h2>". PHP_EOL;

     if ($comment_display) {$result=show_extra($key,'comment',1,'<p dir="ltr" lang="en">The Letteris\'s Comments are:</p>','keyvalue');  echo $result;}
     if ($editor_display) {$result=show_extra($key,'editornotes',1,'<p dir="ltr" lang="eng">The Editor\'s Comments are:</p>','keyvalue');  echo $result;}
     if ($hebrew_display) {$result=show_extra($key,'hebrew',1,'<p dir="ltr" lang="en">The Hebrew Translation is:</p>','id');  echo $result;}

     if ($trans_display) {
         include_once 'show_trans.php';
         $result=show_trans($verse);
         $loop = $result[0];
         for ($x = 1; $x <= $loop; $x++) {
            echo $result[$x];
         }
     }

     $home_eng_url="https://www.biblegateway.com/passage/?search=";
     include_once 'show_transilation.php';
     $both_url_text=2;
     if ($eng_trans){
         $en_flag='<img title="English" src="files/en.png" alt="English" width="16" height="11" />';
         $version="NET"; $lang="en"; $flag=$en_flag;
         $en_url=show_transilation($key,$shortbook. $ch. ":". $vr, $lang, $version, $both_url_text);
     }
     if ($french_trans){
         $fr_flag='<img title="fran??ais" src="files/fr.png" alt="French" width="16" height="11" />';
         $version="BDS"; $lang="fr"; $flag=$fr_flag;
         $fr_url=show_transilation($key,$shortbook. $ch. ":". $vr, $lang, $version, $both_url_text);
     }
     if ($russian_trans){
         $ru_flag='<img title="????????????" src="files/ru.png" alt="Russian" width="16" height="11" />';
         $version="RUSV"; $lang="ru"; $flag=$ru_flag;
         $ru_url=show_transilation($key,$shortbook. $ch. ":". $vr, $lang, $version, $both_url_text);
     }

     if (($highlight_key == $key) && (($verse_call) || ($key_call) || ($random_call))){
       echo '<details>';
       if ($verse_call) echo "verse called"."</br>". PHP_EOL;
       if ($key_call) echo "key called"."</br>". PHP_EOL;
       if (($random_call) && ($highlight_key>0))
         {
           echo "random:".$highlight_key."</br>". PHP_EOL;
           echo "<date>" . date("d-m-Y H:i:s") . "</date>";
         }
       echo "</br>".PHP_EOL;
       echo '</details>';
      }
     
   }
}
?>


