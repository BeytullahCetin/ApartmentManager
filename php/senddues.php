<?php

include "dbconn.php";

$duePeriod = $_POST['duePeriod'];
$duePrice = $_POST['duePrice'];

$userList = array();

$query = "SELECT userID FROM users WHERE exitDate IS NULL";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
  array_push($userList, $row['userID']);
}

$query = "SELECT period from dues WHERE period=$duePeriod";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {
  header("Location: sendduesform.php?duealreadyexist");
} else {

  for ($x = 0; $x < count($userList); $x++) {

    $query = "INSERT INTO `due` (period, duePrice, paymentStatus, userID) VALUES ('$duePeriod', $duePrice, 'not paid', $userList[$x])";

    if (mysqli_query($conn, $query)) {
      header("Location: showdues.php");
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}
