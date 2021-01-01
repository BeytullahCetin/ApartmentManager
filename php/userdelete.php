<?php 

include 'dbconn.php';

$userId=$_GET['id'];

$query = "SELECT * FROM users WHERE userID = $userId";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        $name = $row['userName'];
        $number = $row['userNum'];
        $backupNum = $row['backupNum'];
        $blockNo = $row['blockNo'];
        $doorNo = $row['doorNo'];
        $entryDate = $row['entryDate'];
        $exitDate = date("Y-m-d");
        $status = $row['status'];

$query= "INSERT INTO `oldresident` VALUES ('NULL', '$name', '$number', '$backupNum', '$blockNo', '$doorNo', '$entryDate', '$exitDate', '$status')";

if(mysqli_query($conn, $query)){
    header("Location: apartments.php");
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$query="DELETE FROM users WHERE userID =". $userId;

if(mysqli_query($conn, $query)){
    header("Location: apartments.php");
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
