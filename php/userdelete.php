<?php

include 'dbconn.php';

$userId = $_GET['id'];

$query = "SELECT * FROM users WHERE userID = $userId";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$exitDate = date("Y-m-d");

$query = "SELECT * FROM due WHERE userID = $userId AND paymentStatus = 'not paid'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {

    header("Location: apartments.php?errordelete");
} else {
    $query = "UPDATE users SET exitDate='$exitDate' WHERE userID=$userId";
    
    if (mysqli_query($conn, $query)) {
        header("Location: apartments.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
