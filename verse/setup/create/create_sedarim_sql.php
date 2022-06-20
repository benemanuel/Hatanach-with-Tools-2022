<?php
//zero table before insert
//mysql -u root < dbcreate.sql
$servername = "localhost";
$username = "tanach_user";
$password = "GoFigureThisOutOnYourOwn";
$dbname = "verses";
$file = 'sedarim.csv';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
/*
CREATE TABLE sedarim (
 keyvalue INT NOT NULL PRIMARY KEY,
 hebchap INT NOT NULL DEFAULT 0,
 hebverse INT NOT NULL DEFAULT 0,
 book INT NOT NULL DEFAULT 0,
 bookname VARCHAR (16) NOT NULL DEFAULT "",
 ch INT NOT NULL DEFAULT 0,
 vr INT NOT NULL DEFAULT 0
);
 */

$handle = fopen($file, "r");
if ($handle) {
    $hebverse = 0;
    $lastchap = 1;
    while (($line = fgets($handle)) !== false) {
        list($book,$b,$bookname,$keyvalue,$ch,$vr,$hebchap) = explode(",",$line);
        if ( ! (is_int($hebchap))){$hebchap=intval($hebchap);}
        if ($lastchap != $hebchap)
        {
            // echo $bk. " ".$bookname. " [".$keyvalue. "] (".$ch. ":".$vr. ")=>(".$lastchap. ":". $hebverse.")\n";
            $hebverse = 0;
            $lastchap=$hebchap;
        }
      $hebverse = $hebverse + 1;
      //Book Eng EngSingle Value Chap Verse HebChap
      //38O,Zechariah,Treiasar,229740,2,10,16
        $bk = rtrim($book,"O");
        //if ($hebverse == 1){echo $bk. " ".$bookname. " [".$keyvalue. "] (".$ch. ":".$vr. ")=>(".$hebchap. ":". $hebverse.")\n";}

         $sql = "INSERT INTO sedarim (keyvalue,hebchap,hebverse,book,bookname,ch,vr) VALUES ($keyvalue,$hebchap,$hebverse,$bk,'$bookname',$ch,$vr)";

           if (mysqli_query($conn, $sql)) {
               //echo $value. " \n";
           } else {
               echo "Error: " . $sql . " " . mysqli_error($conn). "\n";
               //               echo "Error: " . $value;
           }
        
    }

    fclose($handle);
}
mysqli_close($conn);




