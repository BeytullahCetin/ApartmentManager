<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Dues</title>
    <?php include "css.php"; ?>
</head>

<body>

    <?php
    include "dbconn.php";
    include "navbar.php";
    ?>

    <div class="container col-md-4 ">

        <h2 class="text-center">Profile</h2>

        <form method="POST" action="">

            <div class="form-group row">
                <!-- Name -->
                <label class="col-md-6 col-form-label" for="name">Name: </label>
                <div class="col-md-6">
                    <input class="form-control text-center" type="text" disabled name="name" id="name" placeholder="Name" value="<?php echo $_SESSION['userName']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <!-- Number - Backup Number-->

                <label class="col-md-6" for="number">Number: </label>
                <div class="col-md-6">
                    <input class="form-control text-center" type="tel" disabled name="number" id="number" pattern="[0-9]{10}" maxlength="10" placeholder="eg:(555-123-4567)" value="<?php echo $_SESSION['userNum']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-6" for="backupNumber">Backup Number:</label>
                <div class="col-md-6">
                    <input class="form-control text-center" type="tel" disabled name="backupNumber" id="backupNumber" pattern="[0-9]{10}" maxlength="10" placeholder="Backup Number" value="<?php echo $_SESSION['backupNum']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <!-- Address -->

                <label class="col-md-6" for="address">Address:</label>
                <div class="form-group col-md-6">
                    <input class="form-control text-center" type="text" disabled name="address" id="address" placeholder="Address" value="<?php echo $_SESSION['address']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <!-- Block No -->

                <label class="col-md-6" for="blockNo">Block No:</label>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control text-center" disabled value="<?php echo $_SESSION['blockNo']; ?>">
                </div>

            </div>

            <div class="form-group row">
                <!-- Door No -->
                <label class="col-md-6" for="doorNo">Door No:</label>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control text-center" disabled value="<?php echo $_SESSION['doorNo']; ?>">
                </div>
            </div>


            <div class="form-group row">
                <!-- Dates -->

                <label class="col-md-6" for="entryDate">Entry Date: </label>
                <div class="form-group col-md-6">
                    <input class="form-control text-center" type="date" disabled name="entryDate" id="entryDate" placeholder="Entry Date" value="<?php echo $_SESSION['entryDate'] ?>">
                </div>
            </div>


            <div class="form-group row">
                <!-- Status -->

                <label class="col-md-6" for="status">Status: </label>
                <div class="col-md-6">
                <input type="text" class="form-control text-center" disabled value="<?php echo strtoupper($_SESSION['status']); ?>">
                </div>
            </div>
        </form>

    </div>
</body>

</html>