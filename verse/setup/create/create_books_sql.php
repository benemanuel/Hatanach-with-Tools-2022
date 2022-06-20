<?php
//zero table before insert
//mysql -u root < dbcreate.sql
include_once 'booknames.php';
$servername = "localhost";
$username = "tanach_user";
$password = "GoFigureThisOutOnYourOwn";
$dbname = "verses";
//$tanachfile = 'letteris_utf8.txt';
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

/* book INT NOT NULL PRIMARY KEY,
 fullbook VARCHAR (12) NOT NULL DEFAULT "",
 shortbook VARCHAR (6) NOT NULL DEFAULT "",
 hebbook VARCHAR (13) NOT NULL DEFAULT "",
 sederbook VARCHAR (13) NOT NULL DEFAULT "",
 tnk  TINYINT NOT NULL ; 1-Torah 2-Nivim(2-NivimRishonom 3-NivimAchronim 4-Treasar) 5-Ktubim(6-Migilit 7-Tehilim 8-EzraNechmiaDaniel)
*/

for ($book = 1; $book <= 39; $book++) {
    list($fullbook,$shortbook,$hebbook,$sederbook,$tnk) = booknames($book);
     $sql = "INSERT INTO booklookup (book,fullbook,shortbook,hebbook,sederbook,tnk) VALUES ($book,'$fullbook','$shortbook','$hebbook','$sederbook', $tnk)";

           if (mysqli_query($conn, $sql)) {
               //echo $value. " \n";
           } else {
               echo "Error: " . $sql . " " . mysqli_error($conn). "\n";
               //               echo "Error: " . $value;
           }
           
    }
mysqli_close($conn);




