<?php
//requires
include 'utilities.php';
$db_name     = "lemaxmal_RCI";
$db_username = "lemaxmal_RCI";
$db_password = 'dealer1';

$db = new mysqli('localhost', $db_username, $db_password, $db_name);

if($db->connect_errno > 0){
	die("Connection failed! " . $db->connect_error);
} else {
    //fetch all $_POST vars
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $ip = get_client_ip();
    //Parse all vars
    $password = md5($password);
    //check if user exists
    $query = "SELECT username FROM users WHERE username = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $result = $stmt->num_rows;
    $stmt->close();
    //if exist redirect to existing page
        if($result > 0){
            //Redirect;
            header("./login.php");
        } else
    //if not save to database
        {
            $query = "INSERT INTO users (username, password, email, ip) VALUES (?,?,?,?)";
            $stmt = $db->prepare($query);
            $stmt->bind_param("ssss", $username, $password, $email, $ip); 
            //Redirect to login
            header("./login.php");
        }
    //Eliminate all connections
    $db->close();
}
?>