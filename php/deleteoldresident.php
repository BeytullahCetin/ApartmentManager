<?php

include 'dbconn.php';

$userId = $_GET['id'];

$query = "SELECT * FROM due WHERE userID = $userId AND paymentStatus = 'not paid'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    
    header("Location: apartments.php?errordelete");

} else {
    $query = "DELETE FROM oldresident WHERE id =$userId";

    if (mysqli_query($conn, $query)) {
        header("Location: apartments.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
