<?php 

include 'dbconn.php';

$query="DELETE FROM comment WHERE commentID =" . $_GET["id"];

if(mysqli_query($conn, $query)){
    header("Location: http://localhost:80/php/comments.php");
}else{
    echo "Delete Error!";
}

?>