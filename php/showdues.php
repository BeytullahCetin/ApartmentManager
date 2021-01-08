<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dues</title>
    <?php include "css.php"; ?>

</head>

<body>
    <?php
    include 'dbconn.php';
    include 'navbar.php';
    ?>


    <div class="container col-md-10 my-3">

        <?php if (isset($_SESSION['authorization']) && $_SESSION['authorization'] == 1) { ?>
            <div class="accordion">

                <div class="card">

                    <?php
                    $query = "SELECT * FROM users u, due d WHERE u.userID=d.userID AND d.paymentStatus = 'not paid' ORDER BY doorNo, period";
                    $result = mysqli_query($conn, $query);
                    ?>

                    <div class="card-header">
                        <a id="card-link" data-toggle="collapse" href="#unpaid-dues">
                            Unpaid Dues
                        </a>
                    </div>

                    <div class="collapse show" id="unpaid-dues">
                        <div class="card-body">

                            <table class="table table-hover table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <?php if ($_SESSION['authorization'] == 1) { ?>
                                            <th class="text-center">Action</th>
                                        <?php } ?>
                                        <th>Status</th>
                                        <th>Name-Surname</th>
                                        <th>Block No</th>
                                        <th>Door No</th>
                                        <th>Period</th>
                                        <th>Price</th>

                                    </tr>
                                </thead>

                                <?php
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <?php if ($_SESSION['authorization'] == 1) {

                                            if ($row['paymentStatus'] == "not paid") { ?>

                                                <td><a href="paydue.php?id=<?php echo $row['userID']; ?>&period=<?php echo $row['period'] ?>" onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-success">Pay</button></a></td>

                                        <?php
                                            } else {

                                                echo "<td></td>";
                                            }
                                        }
                                        ?>

                                        <td> <?php echo strtoupper($row["paymentStatus"]); ?> </td>
                                        <td> <?php echo $row["userName"]; ?> </td>
                                        <td> <?php echo $row["blockNo"]; ?> </td>
                                        <td> <?php echo $row["doorNo"]; ?> </td>
                                        <td> <?php $newDate = date('d-M-Y', strtotime($row["period"]));
                                                echo "$newDate"; ?> </td>
                                        <td> <?php echo $row["duePrice"]; ?> </td>

                                    </tr>
                                <?php } ?>

                            </table>


                        </div>
                    </div>
                </div>

                <div class="card">

                    <?php
                    $query = "SELECT * FROM users u, due d WHERE u.userID=d.userID AND d.paymentStatus = 'paid' ORDER BY d.period, u.doorNo";
                    $result = mysqli_query($conn, $query);
                    ?>

                    <div class="card-header">
                        <a id="card-link" data-toggle="collapse" href="#paid-dues">
                            Paid Dues
                        </a>
                    </div>

                    <div class="collapse" id="paid-dues">
                        <div class="card-body">

                            <table class="table table-hover table-striped">
                                <thead class="thead-light">
                                    <tr>

                                        <th>Status</th>
                                        <th>Name-Surname</th>
                                        <th>Block No</th>
                                        <th>Door No</th>
                                        <th>Period</th>
                                        <th>Payment Date</th>
                                        <th>Price</th>

                                    </tr>
                                </thead>

                                <?php
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>

                                        <td> <?php echo strtoupper($row["paymentStatus"]); ?> </td>
                                        <td> <?php echo $row["userName"]; ?> </td>
                                        <td> <?php echo $row["blockNo"]; ?> </td>
                                        <td> <?php echo $row["doorNo"]; ?> </td>
                                        <td> <?php $newDate = date('d-M-Y', strtotime($row["period"]));
                                                echo "$newDate"; ?> </td>
                                        <td><?php $newDate = date('d-M-Y', strtotime($row["paymentDate"]));
                                            echo "$newDate"; ?></td>
                                        <td> <?php echo $row["duePrice"]; ?> </td>

                                    </tr>
                                <?php } ?>

                            </table>


                        </div>
                    </div>
                </div>

                <div class="card">

                    <?php
                    $query = "SELECT * FROM users u, due d WHERE u.userID=d.userID AND d.paymentStatus = 'paid' AND exitDate IS NOT NULL ORDER BY period";
                    $result = mysqli_query($conn, $query);
                    ?>

                    <div class="card-header">
                        <a id="card-link" data-toggle="collapse" href="#old-unpaid-dues">
                            Old Resident Dues
                        </a>
                    </div>

                    <div class="collapse" id="old-unpaid-dues">
                        <div class="card-body">

                            <table class="table table-hover table-striped">
                                <thead class="thead-light">
                                    <tr>

                                        <th>Status</th>
                                        <th>Name-Surname</th>
                                        <th>Number</th>
                                        <th>Block No</th>
                                        <th>Door No</th>
                                        <th>Period</th>
                                        <th>Payment Date</th>
                                        <th>Price</th>

                                    </tr>
                                </thead>

                                <?php
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>

                                        <td> <?php echo strtoupper($row["paymentStatus"]); ?> </td>
                                        <td> <?php echo $row["userName"]; ?> </td>
                                        <td> <?php echo $row["userNum"] ?></td>
                                        <td> <?php echo $row["blockNo"]; ?> </td>
                                        <td> <?php echo $row["doorNo"]; ?> </td>
                                        <td> <?php $newDate = date('d-M-Y', strtotime($row["period"]));
                                                echo "$newDate"; ?> </td>
                                        <td><?php $newDate = date('d-M-Y', strtotime($row["paymentDate"]));
                                            echo "$newDate"; ?></td>
                                        <td> <?php echo $row["duePrice"]; ?> </td>

                                    </tr>
                                <?php } ?>

                            </table>


                        </div>
                    </div>
                </div>



            </div>

        <?php } else { ?>

            <div class="accordion">

                <div class="card">

                    <?php

                    $id = $_SESSION['userID'];

                    $query = "SELECT * FROM users u, due d WHERE u.userID = $id AND u.userID=d.userID AND d.paymentStatus = 'not paid' ORDER BY period";
                    $result = mysqli_query($conn, $query);
                    ?>

                    <div class="card-header">
                        <a id="card-link" data-toggle="collapse" href="#unpaid-dues">
                            Unpaid Dues
                        </a>
                    </div>

                    <div class="collapse show" id="unpaid-dues">
                        <div class="card-body">

                            <table class="table table-hover table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <?php if ($_SESSION['authorization'] == 1) { ?>
                                            <th class="text-center">Action</th>
                                        <?php } ?>
                                        <th>Status</th>
                                        <th>Name-Surname</th>
                                        <th>Block No</th>
                                        <th>Door No</th>
                                        <th>Period</th>
                                        <th>Price</th>

                                    </tr>
                                </thead>

                                <?php
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <?php if ($_SESSION['authorization'] == 1) {

                                            if ($row['paymentStatus'] == "not paid") { ?>

                                                <td><a href="paydue.php?id=<?php echo $row['userID']; ?>&period=<?php echo $row['period'] ?>" onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-success">Pay</button></a></td>

                                        <?php
                                            } else {

                                                echo "<td></td>";
                                            }
                                        }
                                        ?>

                                        <td> <?php echo strtoupper($row["paymentStatus"]); ?> </td>
                                        <td> <?php echo $row["userName"]; ?> </td>
                                        <td> <?php echo $row["blockNo"]; ?> </td>
                                        <td> <?php echo $row["doorNo"]; ?> </td>
                                        <td> <?php $newDate = date('d-M-Y', strtotime($row["period"]));
                                                echo "$newDate"; ?> </td>
                                        <td> <?php echo $row["duePrice"]; ?> </td>

                                    </tr>
                                <?php } ?>

                            </table>


                        </div>
                    </div>
                </div>

                <div class="card">

                    <?php
                    $query = "SELECT * FROM users u, due d WHERE u.userID=$id AND u.userID=d.userID AND d.paymentStatus = 'paid' ORDER BY period";
                    $result = mysqli_query($conn, $query);
                    ?>

                    <div class="card-header">
                        <a id="card-link" data-toggle="collapse" href="#paid-dues">
                            Paid Dues
                        </a>
                    </div>

                    <div class="collapse" id="paid-dues">
                        <div class="card-body">

                            <table class="table table-hover table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <?php if ($_SESSION['authorization'] == 1) { ?>
                                            <th class="text-center">Action</th>
                                        <?php } ?>
                                        <th>Status</th>
                                        <th>Name-Surname</th>
                                        <th>Block No</th>
                                        <th>Door No</th>
                                        <th>Period</th>
                                        <th>Payment Date</th>
                                        <th>Price</th>

                                    </tr>
                                </thead>

                                <?php
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <?php if ($_SESSION['authorization'] == 1) {

                                            if ($row['paymentStatus'] == "not paid") { ?>

                                                <td><a href="paydue.php?id=<?php echo $row['userID']; ?>&period=<?php echo $row['period'] ?>" onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-success">Pay</button></a></td>

                                        <?php
                                            } else {

                                                echo "<td></td>";
                                            }
                                        }
                                        ?>

                                        <td> <?php echo strtoupper($row["paymentStatus"]); ?> </td>
                                        <td> <?php echo $row["userName"]; ?> </td>
                                        <td> <?php echo $row["blockNo"]; ?> </td>
                                        <td> <?php echo $row["doorNo"]; ?> </td>
                                        <td> <?php $newDate = date('d-M-Y', strtotime($row["period"]));
                                                echo "$newDate"; ?> </td>
                                        <td><?php $newDate = date('d-M-Y', strtotime($row["paymentDate"]));
                                            echo "$newDate"; ?></td>
                                        <td> <?php echo $row["duePrice"]; ?> </td>

                                    </tr>
                                <?php } ?>

                            </table>


                        </div>
                    </div>
                </div>


            </div>

        <?php } ?>
    </div>
</body>

</html>