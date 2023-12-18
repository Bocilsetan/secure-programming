<?php
require_once('./db_conn.php');
if (isset($_POST['message'])) {
    include 'db_conn.php';

    function validate($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $message = validate($_POST['message']);

    if (empty($message)||empty($name)){
        header("Location: home.php");
    }else{
        $sql = "INSERT INTO pesan(name, message) VALUES('$name', '$message')";
        $res = mysqli_query($conn, $sql);
        
        if($res){
            header("Location: home.php");
        }else{
            echo "NOT SENT";
        }
    }

    
}else {
    header("Location: home.php");
}