<?php 
include "dbconn.php";

$duePeriod = $_POST['duePeriod'];
$duePrice = $_POST['duePrice'];

$userList=array();

$query = "SELECT userID FROM users";
$result = mysqli_query($conn, $query);

while($row=mysqli_fetch_assoc($result)){
    array_push($userList, $row['userID']);
}

for($x=0; $x < count($userList); $x++){

    $query = "INSERT INTO `due` (period, duePrice, paymentStatus, userID) VALUES ('$duePeriod', $duePrice, 'not paid', $userList[$x])";

    if (mysqli_query($conn, $query)) {
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

}

header("Location: showdues.php");


?>