<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <?php include "css.php"; ?>
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
        
        if(isset($_GET['nameErr'])){
            $nameErr=$_GET['nameErr'];
        }else{
            $nameErr="";
        }

        if(isset($_GET['pwdErr'])){
            $pwdErr=$_GET['pwdErr'];
        }else{
            $pwdErr="";
        }

        if(isset($_GET['numberErr'])){
            $numberErr=$_GET['numberErr'];
        }else{
            $numberErr="";
        }

        if(isset($_GET['blockNoErr'])){
            $blockNoErr=$_GET['blockNoErr'];
        }else{
            $blockNoErr="";
        }

        if(isset($_GET['doorNoErr'])){
            $doorNoErr=$_GET['doorNoErr'];
        }else{
            $doorNoErr="";
        }

        if(isset($_GET['statusErr'])){
            $statusErr=$_GET['statusErr'];
        }else{
            $statusErr="";
        }

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

        <div class="container my-3">
            <div class="row border">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="container">

                        <h2 class="text-center">Add Resident</h2>

                        <span class="err">* fields are required</span>

                        <form method="POST" action="<?php echo "updateresident.php?updateId=$updateId"; ?>">

                            <div class="form-group row">
                                <!-- Name -->
                                <label class="col-md-4 col-form-label" for="name">Name:<span class="err"> *<?php echo "$nameErr"; ?></span></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="name" id="name" placeholder="Name" value="<?php echo "$name"; ?>">
                                </div>
                            </div>


                            <div class="form-group row">
                                <!-- Password -->
                                <label class="col-md-4" for="pwd">Password:<span class="err"> *<?php echo "$pwdErr"; ?></span></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="password" name="pwd" id="pwd" maxlength="11" placeholder="Password" value="<?php echo "$pwd"; ?>">
                                </div>
                            </div>


                            <div class="form-group row">
                                <!-- Number - Backup Number-->

                                <label class="col-md-4" for="number">Number:<span class="err"> *<?php echo "$numberErr"; ?></span></label>
                                <div class="col-md-8">
                                    <input class="form-control" type="tel" name="number" id="number" pattern="[0-9]{10}" maxlength="10" placeholder="eg:(555-123-4567)" value="<?php echo "$number"; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4" for="backupNumber">Backup Number:</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="tel" name="backupNumber" id="backupNumber" pattern="[0-9]{10}" maxlength="10" placeholder="Backup Number" value="<?php echo "$backupNum"; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Address -->

                                <label class="col-md-4" for="address">Address:</label>
                                <div class="form-group col-md-8">
                                    <input class="form-control" type="text" name="address" id="address" placeholder="Address" value="<?php echo "$address"; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- Block No - Door No -->

                                <label class="col-md-4" for="blockNo">Block No:</label>
                                <div class="form-group col-md-2">
                                    <select class="form-control" name="blockNo" id="blockNo">
                                        <option value="A" selected>A</option>
                                    </select>
                                </div>

                                <label class="col-md-4" for="doorNo">Door No:</label>
                                <div class="form-group col-md-2">
                                    <select class="form-control" name="doorNo" id="doorNo">

                                        <option value="<?php echo $doorNo ?>"><?php echo $doorNo ?></option>
                                        <?php

                                        $query = "SELECT doorNo FROM users ORDER BY doorNo ASC";
                                        $result = mysqli_query($conn, $query);
                                        $doorNos = array();

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            array_push($doorNos, $row['doorNo']);
                                        }

                                        for ($i = 1; $i <= 12; $i++) {
                                            if (in_array($i, $doorNos)) {
                                            } else {
                                                echo "<option value='$i'>$i</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <!-- Dates -->

                                <label class="col-md-4" for="entryDate">Entry Date: </label>
                                <div class="form-group col-md-8">
                                    <input class="form-control" type="date" name="entryDate" id="entryDate" placeholder="Entry Date" value="<?php echo "$entryDate" ?>">
                                </div>
                            </div>


                            <div class="form-group row">
                                <!-- Status -->

                                <label class="col-md-4" for="status">Status:<span class="err">*<?php echo "$statusErr"; ?></span></label>

                                <div class="form-group col-md-4">
                                    <label for="owner">Owner</label>
                                    <input type="radio" id="owner" name="status" value="owner" <?php if (isset($status) && $status == "owner") echo "checked"; ?>>
                                </div>

                                <div class="form-group col-md-4 mb-0">
                                    <label for="tenant">Tenant</label>
                                    <input type="radio" id="tenant" name="status" value="tenant" <?php if (isset($status) && $status == "tenant") echo "checked"; ?>>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <input class="btn btn-primary btn-block mt-0 mb-2" type="submit" value="Add">
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    <?php
    }
    ?>

</body>

</html>