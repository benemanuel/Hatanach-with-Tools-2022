<?php
//zero table before insert
//mysql -u root < dbcreate.sql
// madsure not to have ' or " in text
//first line gave error so did this manually
// insert comment set keyvalue=10, book=10, ch=1, vr=1, verse='???? ????????', id=1;

$servername = "localhost";
$username = "tanach_user";
$password = "GoFigureThisOutOnYourOwn";
$dbname = "verses";
$table = "editornotes";
$tanachfile = '../Editornotes_utf8.txt';
$key = 0;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

   $b = " ??????:";
   $c = " ??????:";
   $v = " ????????:";
   $white = array("\t","\n","\r","\0","\x0B");
   $numbers = " O0123456789";

foreach (new SplFileObject($tanachfile) as $line){
    $key = $key + 1;
    // Echo one line from the file.
    $pieces = explode(",", $line);
    //echo $key. " ".count($pieces) . "\n";
    if (count($pieces) == 5) {
           list($book,$ch,$vr,$value,$verse) = $pieces;
           $bk = rtrim($book,"O");
           /*
           CREATE TABLE comment (
           id INT NOT NULL PRIMARY KEY,
           keyvalue INT NOT NULL DEFAULT 0,
           verse TEXT NOT NULL DEFAULT "",
           book INT NOT NULL DEFAULT 0,
           ch INT NOT NULL DEFAULT 0,
           vr INT NOT NULL DEFAULT 0,
           last_updated DATETIME NOT NULL DEFAULT NOW() ON UPDATE NOW()
           );*/

           $sql = "INSERT INTO ".$table." (id,keyvalue,verse,book,ch,vr) VALUES ($key, $value, '$verse', $bk, $ch, $vr)";

           if (mysqli_query($conn, $sql)) {
               //echo $value. " \n";
           } else {
               echo "Error: " . $sql . " " . mysqli_error($conn). "\n";
               //               echo "Error: " . $value;
           }
      }
}
$line = null;
mysqli_close($conn);




