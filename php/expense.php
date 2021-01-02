<?php

include "dbconn.php";

$expenseType = $_POST['expenseType'];
$expenseDetail = $_POST['expenseDetail'];
$expenseDate = $_POST['expenseDate'];
$expensePrice = $_POST['expensePrice'];

$query = "INSERT INTO expense (expenseType, expenseDetail, expenseDate, expensePrice) VALUES ('$expenseType', '$expenseDetail', '$expenseDate', $expensePrice)";

if (mysqli_query($conn, $query)) {
    header("Location: income-expense.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>