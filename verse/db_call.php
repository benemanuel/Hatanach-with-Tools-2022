<?php
function db_call($sqlwhereqwery, $table = 'verse', $dbname = 'verses', $hostname = 'localhost', $username = 'tanach_user', $password = 'GoFigureThisOutOnYourOwn')
{
    global $debug_flag;
    if ($debug_flag) {echo "<p debug='function db_call'></p>";}
    include_once 'fix_peh_samach.php';
    $conn = mysqli_connect($hostname, $username, $password, $dbname);
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
    $answer = array (0); $i=0;
    $sqlstring = 'select * from ' . $table . ' WHERE ' . $sqlwhereqwery;
    $result = mysqli_query($conn, $sqlstring);
    while ($row = mysqli_fetch_assoc($result)) {

        $t=array($row['book'], $row['ch'], $row['vr'], fix_peh_samach($row['verse']), $row['id']);
        array_push($answer, $t);
        $i++;
       }
        $answer[0] = $i;
        return $answer;
        mysqli_close($conn);
}


