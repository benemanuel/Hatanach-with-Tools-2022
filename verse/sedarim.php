<?php
//doesn't work right - missing citations
include_once 'random_key.php';

global     $high_pasuk,$high_url,$high_hebcit,$high_engcit, $sed_cit;
global $keyvalue_index, $hebchap_index, $hebverse_index, $book_index, $bookname_index, $ch_index, $vr_index;

function sedarim($k,$r=false){


include_once 'show_book.php';
include_once 'show_verse.php';
include_once 'show_sedarim.php';
include_once 'gematria.php';
include_once 'hebrewize.php';
include_once 'show_key.php';
include_once 'all_sedarim_verse.php';

$ss=show_sedarim($k);
include_once "button_wrap.php";
all_sedarim_verse($ss, $k, true, true, false,false,
                  false, false, false, false, false,
         true, false, $r, false, false, false);
button_wrap($high_hebcit,$high_pasuk,$high_url,$high_engcit);
$ss=show_fullsedarim($k);
//include_once "button_wrap.php";
all_sedarim_verse($ss, $k, true, true, false,false,
                  false, false, false, false, false,
         true, false, $r, false, false, false);
}


sedarim(random_key(),true);








