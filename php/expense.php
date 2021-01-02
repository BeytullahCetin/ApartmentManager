<?php

include "dbconn.php";

$expenseType = $_POST['expenseType'];
$expenseDate = $_POST['expenseDate'];
$expensePrice = $_POST['expensePrice'];

$query = "INSERT INTO expense (expenseType, expenseDate, expensePrice) VALUES ('$expenseType', '$expenseDate', $expensePrice)";

if (mysqli_query($conn, $query)) {
    header("Location: income-expense.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>