<?php 
include 'php/dbconn.php';

$query="DELETE FROM comment WHERE commentID =" . $_GET["id"];

if(mysqli_query($conn, $query)){
    header("Location: php/comments.php");
}else{
    echo "Delete Error!";
}

?>