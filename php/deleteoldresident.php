<?php

include 'dbconn.php';

$userId = $_GET['id'];

$query = "DELETE FROM oldresident WHERE id =$userId";

if (mysqli_query($conn, $query)) {
    header("Location: apartments.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
