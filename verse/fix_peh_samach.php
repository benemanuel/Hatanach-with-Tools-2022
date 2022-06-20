<?php
function fix_peh_samach($data){
    global $debug_flag;
    if ($debug_flag) {echo "<p debug='function fix_peh_samach'></p>";}
       //  sed -i 's/??/????/g' l.txt
        //  sed -i 's/??/??/g' l.txt
        $pattern = '??';    $replace = '??';
        $t1 = preg_replace("/".$pattern."/", $replace, $data);
        $pattern = '??';     $replace = '??';
        return preg_replace("/".$pattern."/", $replace, $t1);
}


