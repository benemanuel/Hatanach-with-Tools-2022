<?php
function show_trans($verse,$title_string = '<p dir="ltr" lang="en">The Transliteration is:</p>', $raw = 1){
    //gets  verse, returns transverse
$transverse = "";

$returned_answer[0] = -1;
$returned_answer_index = 1;

$command_line = 'cd  /var/www/hatanach/verse/script/ && node hebapp.js -t ' . " '" . $verse . "'  2>&1";

$transverse = exec($command_line, $out, $err);


if ($raw == 0)
 {
    $returned_answer[1] =   $transverse . PHP_EOL;
    $returned_answer[0] = 1;
 } else {
    $returned_answer[1] = $title_string;
    $returned_answer[2] = '<p dir="ltr" lang="en" class="transliteration-text-area">' . $transverse . PHP_EOL . '</p>';
    $returned_answer[0] = 2;
 }
return  $returned_answer;
}



