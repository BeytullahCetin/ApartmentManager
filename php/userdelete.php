<?php 

include 'dbconn.php';

$query="DELETE FROM users WHERE userID =" . $_GET["id"];

if(mysqli_query($conn, $query)){
    header("Location: apartments.php");
}else{
    echo "Delete Error!";
}

?>