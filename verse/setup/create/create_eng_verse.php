<?php
//convert hebrew key verse to transilation versifications cit
//get key give cit

/*
id hebcit engcit
9290 Gen32:1 Gen31:55
CREATE TABLE engcit (
 id INT NOT NULL PRIMARY KEY,
 hebcit VARCHAR (16) NOT NULL DEFAULT "",
 engcit VARCHAR (16) NOT NULL DEFAULT "",
);
*/


//zero table before insert
//mysql -u root < dbcreate.sql

$servername = "localhost";
$username = "tanach_user";
$password = "GoFigureThisOutOnYourOwn";
$dbname = "verses";
$table = "engcit";
$tanachfile = 'Key_to_Transilations.txt';
$key = 0;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

foreach (new SplFileObject($tanachfile) as $line){
    $key = $key + 1;
    // Echo one line from the file.
    $pieces = explode(" ", $line);
    //echo $key. " ".count($pieces) . "\n";
    if (count($pieces) == 3) {
           list($value,$heb,$eng) = $pieces;
           $sql = "INSERT INTO ".$table." (id,heb,eng) VALUES ($value,'$heb','$eng')";

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




