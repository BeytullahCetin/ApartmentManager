<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <?php include "css.php";?>
</head>

<body>

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

        $updateId = $_GET["updateId"];

        $query = "SELECT * FROM users WHERE userID = $updateId";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        $name = $row['userName'];
        $pwd = $row['userPwd'];
        $number = $row['userNum'];
        $backupNum = $row['backupNum'];
        $address = $row['address'];
        $blockNo = $row['blockNo'];
        $doorNo = $row['doorNo'];
        $entryDate = $row['entryDate'];
        $exitDate = $row['exitDate'];
        $status = $row['status'];

    ?>

        <div class="center-container">
            <div class="login-form">
                <h2 class="login-header">New Resident</h2>

                <span style="color: red;">* fields are required</span>

                <form method="POST" action="updateresident.php? <?php echo "updateId=" . $updateId; ?>">

                    <input type="text" name="name" id="name" placeholder="Name" value="<?php echo "$name"; ?>">
                    <span class="err">*<?php echo "$nameErr"; ?></span>
                    <br>
                    <input type="password" name="pwd" id="pwd" maxlength="11" placeholder="Password" value="<?php echo "$pwd"; ?>">
                    <span class="err">*<?php echo "$pwdErr"; ?></span>
                    <br>
                    <input type="tel" name="number" id="number" pattern="[0-9]{10}" maxlength="10" placeholder="Number eg:(555-123-4567)" value="<?php echo "$number"; ?>">
                    <span class="err">*<?php echo "$numberErr"; ?></span>
                    <br>
                    <input type="tel" name="backupNumber" id="backupNumber" pattern="[0-9]{10}" maxlength="10" placeholder="Backup Number" value="<?php echo "$backupNum"; ?>">
                    <br>
                    <input type="text" name="address" id="address" placeholder="Address" value="<?php echo "$address"; ?>">
                    <br>
                    <label for="blockNo">Block No</label>
                    <select name="blockNo" id="blockNo">
                        <option value="A" selected>A</option>
                    </select>
                    <br>
                    <label for="doorNo">Door No</label>
                    <select name="doorNo" id="doorNo">
                        <?php

                        $query = "SELECT doorNo FROM users ORDER BY doorNo ASC";
                        $result = mysqli_query($conn, $query);
                        $doorNos = array();

                        while ($row = mysqli_fetch_assoc($result)) {
                            array_push($doorNos, $row['doorNo']);
                        }

                        echo "<option value='$doorNo'>$doorNo</option>";

                        for ($i = 1; $i <= 12; $i++) {
                            if (in_array($i, $doorNos)) {
                            } else {
                                echo "<option value='$i'>$i</option>";
                            }
                        }
                        ?>
                    </select>
                    <br>
                    <label for="entryDate">Entry Date</label>
                    <input type="date" name="entryDate" id="entryDate" placeholder="Entry Date" value="<?php echo "$entryDate"; ?>">
                    <span class="err">*<?php echo "$entryDateErr"; ?></span>
                    <br>
                    <label for="exitDate">Exit Date</label>
                    <input type="date" name="exitDate" id="exitDate" placeholder="Exit Date">
                    <br>

                    <label for="owner">Owner</label>
                    <input type="radio" id="owner" name="status" value="owner" <?php if (isset($status) && $status == "owner") echo "checked"; ?>>

                    <label for="tenant">Tenant</label>
                    <input type="radio" id="tenant" name="status" value="tenant" <?php if (isset($status) && $status == "tenant") echo "checked"; ?>>

                    <span class="err">*<?php echo "$statusErr"; ?></span>

                    <input class="button1" type="submit" value="Update">

                </form>
            </div>
        </div>

    <?php
    }
    /* 
    if (empty($nameErr) && empty($pwdErr) && empty($numberErr) && empty($blockNoErr) && empty($doorNoErr) && empty($entryDateErr) && empty($statusErr)) {

        if (!empty($name) && !empty($pwd) && !empty($number) && !empty($blockNo) && !empty($doorNo) && !empty($entryDate) && !empty($status)) {

            $query = "UPDATE users SET userName = '$name', userPwd = '$pwd', userNum = '$number', backupNum = '$backupNum', 
            address = '$address', blockNo = '$blockNo', doorNo = '$doorNo', entryDate = $entryDate, exitDate = $exitDate, status = '$status'
            WHERE userID = $updateId ";

            if (mysqli_query($conn, $query)) {
                header("Location: apartments.php?succesfullyupdated=1");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    } */
    ?>

</body>

</html>