<?php
	// seed with microseconds
function make_seed(){
		list($usec, $sec) = explode(' ', microtime());
		return (float) $sec + ((float) $usec * 100000);
}

function random_key(){
	srand(make_seed());
	$randval = rand();
	$random = ($randval%23212)+1;
return  $random*10;
}


