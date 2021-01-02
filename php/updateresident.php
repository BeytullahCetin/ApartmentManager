<?php
ob_start();
include 'dbconn.php';
include 'navbar.php';

//User information shortcut
/*  echo 
    $_SESSION['userID']
    .$_SESSION['userName']
    .$_SESSION['userNum']
    .$_SESSION['userPwd']
    .$_SESSION['backupNum']
    .$_SESSION['address']
    .$_SESSION['blockNo']
    .$_SESSION['doorNo']
    .$_SESSION['entryDate']
    .$_SESSION['exitDate']
    .$_SESSION['status']
    .$_SESSION['isAdmin']; 
     */

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if ($_SESSION['authorization'] == 1) {
    $nameErr = $pwdErr = $numberErr = $blockNoErr = $doorNoErr = $entryDateErr = $statusErr = "";

    $updateId = $_GET['updateId'];

    $query = "SELECT * FROM users WHERE userID = $updateId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    /*
        $name = $row['userName'];
        $pwd = $row['userPwd'];
        $number = $row['userNum'];
        $backupNum = $row['backupNum'];
        $address = $row['address'];
        $blockNo = $row['blockNo'];
        $doorNo = $row['doorNo'];
        $entryDate = $row['entryDate'];
        $exitDate = $row['exitDate'];
        $status = $row['status']; */

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST['name'])) {
            $nameErr = "Name is Required";
        } else {
            array_push($errors, "");
            $name = test_input($_POST['name']);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                $nameErr = "Only letters and white space allowed";
            }
        }

        if (empty($_POST['pwd'])) {
            $pwdErr = "Password is Required";
        } else {
            $pwd = test_input($_POST['pwd']);

            if ($pwd == $row['userPwd']) {
            } else {
                $pwd = md5(test_input($_POST['pwd']));
            }
        }

        if (empty($_POST['number'])) {
            $numberErr = "Number is Required";
        } else {
            $number = test_input($_POST['number']);
        }

        $backupNum = test_input($_POST['backupNumber']);
        $address = test_input($_POST['address']);


        if (empty($_POST['blockNo'])) {
            $blockNoErr = "Block Number is Required";
        } else {
            $blockNo = test_input($_POST['blockNo']);
        }

        if (empty($_POST['doorNo'])) {
            $doorNoErr = "Door Number is Required";
        } else {
            $doorNo = test_input($_POST['doorNo']);
        }

        if (empty($_POST['entryDate'])) {
            $entryDateErr = "Entry Date is Required";
        } else {
            $entryDate = test_input($_POST['entryDate']);
        }

        if (empty($_POST['status'])) {
            $statusErr = "Status is Required";
        } else {
            $status = test_input($_POST['status']);
            if (isset($exitDate)) {
                $status = "old";
            }
        }
    }
}

if (empty($nameErr) && empty($pwdErr) && empty($numberErr) && empty($blockNoErr) && empty($doorNoErr)  && empty($statusErr)) {

    if (!empty($name) && !empty($pwd) && !empty($number) && !empty($blockNo) && !empty($doorNo) && !empty($status)) {

        $query = "UPDATE `users` SET userName = \"$name\", userPwd = \"$pwd\", userNum = \"$number\", backupNum = \"$backupNum\", address = \"$address\", blockNo = \"$blockNo\", doorNo = \"$doorNo\", status = \"$status\", entryDate = \"$entryDate\" WHERE userID = $updateId";

        if (mysqli_query($conn, $query)) {
            header("Location: apartments.php?succesfullyupdated=1");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}else{
    header("Location: updateresidentform.php?nameErr=".$nameErr."&pwdErr=".$pwdErr."&numberErr=".$numberErr."&blockNoErr=".$blockNoErr."&doorNoErr=".$doorNoErr."&statusErr=".$statusErr."&updateId=".$updateId);
}
