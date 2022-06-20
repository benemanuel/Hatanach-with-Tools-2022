<?php
include_once 'eng_verse.php';
global $url_only,$full_text,$both_url_text;
$url_only=0;
$full_text=1;
$both_url_text=2;

function show_transilation($key, $cit, $lang, $version, $display=0, $url="https://www.biblegateway.com/passage/?search="){
    $engcit = eng_verse($key);
    if ($engcit == "Same"){
        $engcit = $cit;
    }
    if ($lang == "he") {
      $text_style = 'dir="rtl" lang="' . $lang . '" class="' . $lang . '-text-area"';
    } else {
      $text_style = 'dir="ltr" lang="' . $lang . '" class="' . $lang . '-text-area"';
    }
    $curl = curl_init();

    $output_1='<a target = ' . "'_blank'" . ' href="';
    $output_2='"/>';
    $output_3="</a>";
    list($shortbook_ch,$vr) = explode(":", $cit);
    $full_url=$output_1 . $url . $shortbook_ch . ':' . $vr . '-' . $vr . '&version=' . $version . $output_2;
    $xurl=$url. $engcit . "&version=". $version;
    curl_setopt ($curl, CURLOPT_URL,$xurl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec ($curl);
    curl_close ($curl);
    $str_start = '<meta property="og:description" content="';
    $str_end = '"';
    $start = strpos($result, $str_start)+strlen($str_start);
    if ($start !== false)
    {
        $end = strpos($result, $str_end, $start);
	if ($end !== false)
	{
	  $len = $end - $start;
	  $translation = trim( substr($result, $start, $len));
      if ($display >= 1){
       	  echo '<p '. $text_style. '>The '. ucfirst($lang). ' version '. $version. ' Translation is:</p>';
          echo '<p '. $text_style. '>'. $translation . PHP_EOL . '</p>';
      }
        } else {
	echo 'end not found'. PHP_EOL;
	}
     } else {
     echo 'begining not found'. PHP_EOL;
    }
    if (fmod($display,2) == 0){
            return $full_url;
        }
}


//echo show_transilation(2500,"Gen". "10". ":". "15", "en", "NET", $both_url_text);
//echo show_transilation(9290,"Gen". "32". ":". "1", "en", "NET", $both_url_text);
//echo show_transilation(19600,"Exo". "16". ":". "12", "fr", "BDS", $both_url_text);



