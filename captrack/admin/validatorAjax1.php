<?php
session_start();
require_once('conn.php');

if(isset($_POST['email'])){

    $email = $_POST['email'];
    $query = $conn->prepare("SELECT email FROM adminlogin WHERE email = '".$email."'");
    $query->execute();
    $rows = $query->fetchAll();
    $total_rows = count($rows);
    if( $total_rows > 0 ){
    echo 'false';
    } else{
        echo 'true';
    }
}

?>
