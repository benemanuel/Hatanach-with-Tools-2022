<?php
//zero table before insert
//mysql -u root < dbcreate.sql
//include_once 'booknames.php';
$servername = "localhost";
$username = "tanach_user";
$password = "GoFigureThisOutOnYourOwn";
$dbname = "verses";
$tanachfile = 'letteris_utf8.txt';
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
    $key = $key + 10;
    // Echo one line from the file.
    $pieces = explode("\t", $line);
    //    echo count($pieces) . "\n";
    if (count($pieces) == 6) {
           list($book,$ch,$vr,$ax,$value,$verse) = $pieces;
           //           list($fullbook,$shortbook,$hebbook) = booknames($book);
           $bk = rtrim($book,"O");
           //$sql = "INSERT INTO verse (id,verse,book,fullbook,shortbook,hebbook,ch,vr) VALUES ($value, '$verse', $bk,'$fullbook','$shortbook','$hebbook', $ch, $vr)";
           $sql = "INSERT INTO verse (id,verse,book,ch,vr) VALUES ($value, '$verse', $bk, $ch, $vr)";

           if (mysqli_query($conn, $sql)) {
               //echo $value. " \n";
           } else {
               echo "Error: " . $sql . " " . mysqli_error($conn). "\n";
               //               echo "Error: " . $value;
           }
           if ($key != $value) {
               if ( ($key  == 124930) && ($value == 124925) )  $key=124920;

               echo "key ,". $key. " neq ". $value. "\n";
           }
           
    }
}
$line = null;
mysqli_close($conn);




