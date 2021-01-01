<?php 

include "dbconn.php";

$userId = $_GET['id'];
$period = $_GET['period'];

$query = "UPDATE due SET paymentStatus = 'paid' WHERE userID=$userId AND period = '$period'";

if (mysqli_query($conn, $query)) {
    header("Location: showdues.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

?>