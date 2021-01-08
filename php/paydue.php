<?php 

include "dbconn.php";

$userId = $_GET['id'];
$period = $_GET['period'];
$date = date("Y-m-d");

$query = "UPDATE due SET paymentStatus = 'paid', paymentDate='$date' WHERE userID=$userId AND period = '$period'";

if (mysqli_query($conn, $query)) {
    header("Location: showdues.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

?>