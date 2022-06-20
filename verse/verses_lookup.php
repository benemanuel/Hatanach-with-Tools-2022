<?php
function verses_lookup($sqlwhereqwery, $table = 'verse', $dbname = 'verses', $hostname = 'localhost', $username = 'tanach_user', $password = 'GoFigureThisOutOnYourOwn')
{
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $answer = array (0); $i=0;
    $sqlstring = 'select * from ' . $table . ' WHERE ' . $sqlwhereqwery;
    //echo "Sql:".$sqlstring. PHP_EOL;
    $result = mysqli_query($conn, $sqlstring);
    while ($row = mysqli_fetch_assoc($result)) {
        //print_r($row);
        array_push($answer, $row);
        $i++;
       }
        $answer[0] = $i;
        return $answer;
        mysqli_close($conn);
}


