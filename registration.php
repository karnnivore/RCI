<?php
$db_name     = "lemaxmal_RCI";
$db_username = "lemaxmal_RCI";
$db_password = 'dealer1';

$connect = mysql_connect("localhost", $db_username, $db_password);

if (!$connect) {
    die("Could not connect! " . mysql_error());
} else {
    $db = mysql_select_db($db_name);
     
}
mysql_close($connect);
?>