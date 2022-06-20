<?php
//zero table before insert
//mysql -u root < dbcreate.sql
//include_once 'booknames.php';
$servername = "localhost";
$username = "tanach_user";
$password = "GoFigureThisOutOnYourOwn";
$dbname = "verses";
$file = 'bcv_short.txt';
$key = 0;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
/*
+-------+---------+------+-----+---------+-------+
| Field | Type    | Null | Key | Default | Extra |
+-------+---------+------+-----+---------+-------+
| id    | int(11) | NO   | PRI | NULL    |       |
| book  | int(11) | NO   |     | 0       |       |
| ch    | int(11) | NO   |     | 0       |       |
| vr    | int(11) | NO   |     | 0       |       |
+-------+---------+------+-----+---------+-------+
 */

$handle = fopen($file, "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $key = $key + 1;
      list($book,$ch,$vr) = explode(" ",$line);
      //echo $book. " ". $ch. " ". $vr. "/n";
      $sql = "INSERT INTO chapter (id,book,ch,vr) VALUES ($key,$book,$ch,$vr)";

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




