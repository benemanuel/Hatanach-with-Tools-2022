<?php
//convert hebrew key verse to transilation versifications cit
//get key give cit

function eng_verse($key, $table = 'engcit', $dbname = 'verses', $hostname = 'localhost', $username = 'tanach_user', $password = 'GoFigureThisOutOnYourOwn')
{
    global $debug_flag;
    if ($debug_flag) {echo "<p debug='function eng_verse:". $key ."'></p>";}
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $answer = array (0); $i=0;
    $sqlstring = 'select * from ' . $table . ' WHERE id = ' . $key;
    $result = mysqli_query($conn, $sqlstring);
    $rowcount=mysqli_num_rows($result);
  	if($rowcount > 0){
		echo 'Not Empty';
        $row = mysqli_fetch_assoc($result);
        return $row['engcit'];
	}else{
        return "Same";
    }
     mysqli_close($conn);
}


