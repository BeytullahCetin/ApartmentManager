<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="http://localhost:80/css/styles.css?v=<?php echo time(); ?>">
</head>

<body>

    <?php
    
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


    if ($_SESSION['isAdmin'] == 1) {

        $nameErr = $pwdErr = $numberErr = $blockNoErr = $doorNoErr = $entryDateErr = $statusErr = "";
        $name = $pwd = $number = $backupNum = $address = $blockNo = $doorNo = $entryDate = $exitDate = $status = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            if (empty($_POST['name'])) {
                $nameErr = "Name is Required";
            } else {
                $name = test_input($_POST['name']);
                if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                    $nameErr = "Only letters and white space allowed";
                }
            }

            if (empty($_POST['pwd'])) {
                $pwdErr = "Password is Required";
            } else {
                $pwd = test_input($_POST['pwd']);
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

            $exitDate = test_input($_POST['exitDate']);


            if (empty($_POST['status'])) {
                $statusErr = "Status is Required";
            } else {
                $status = test_input($_POST['status']);
            }
        }
    ?>

        <div class="center-container">
            <div class="login-form">
                <h2 class="login-header">New Resident</h2>

                <?php
                if (isset($_GET['succesadd'])) {
                    echo "Added Succesfully<br>";
                }
                ?>

                <span style="color: red;">* fields are required</span>

                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

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
                        for ($i = 1; $i <= 12; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <label for="entryDate">Entry Date</label>
                    <input type="date" name="entryDate" id="entryDate" placeholder="Entry Date">
                    <span class="err">*<?php echo "$entryDateErr"; ?></span>
                    <br>
                    <label for="exitDate">Exit Date</label>
                    <input type="date" name="exitDate" id="exitDate" placeholder="Exit Date">
                    <br>

                    <label for="owner">Owner</label>
                    <input type="radio" id="owner" name="status" value="owner" <?php if (isset($status) && $status == "owner") echo "checked"; ?>>

                    <label for="tenant">Tenant</label>
                    <input type="radio" id="tenant" name="status" value="tenant" <?php if (isset($status) && $status == "tenant") echo "checked"; ?>>

                    <label for="old">Old</label>
                    <input type="radio" id="old" name="status" value="old" <?php if (isset($status) && $status == "old") echo "checked"; ?>>

                    <span class="err">*<?php echo "$statusErr"; ?></span>

                    <input class="button1" type="submit" value="Add">

                </form>
            </div>
        </div>

    <?php
    }

    if (empty($nameErr) && empty($pwdErr) && empty($numberErr) && empty($blockNoErr) && empty($doorNoErr) && empty($entryDateErr) && empty($statusErr)) {

        if (!empty($name) && !empty($pwd) && !empty($number) && !empty($blockNo) && !empty($doorNo) && !empty($entryDate) && !empty($status)) {

            $pwd = md5($pwd);
            $query = "INSERT INTO `users` (`userID`, `userName`, `userPwd`, `userNum`, `backupNum`, `address`, `blockNo`, `doorNo`, `entryDate`, `exitDate`, `status`, `isAdmin`) 
            VALUES (NULL, '$name', '$pwd', '$number', '$backupNum', '$address', '$blockNo', '$doorNo', '$entryDate', '$exitDate', '$status', '0')";

            if (mysqli_query($conn, $query)) {
                header("Location: welcome.php?succesadd");
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
    ?>

</body>

</html>