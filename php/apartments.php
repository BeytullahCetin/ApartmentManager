<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost:80/css/styles.css?v=<?php echo time(); ?>">

</head>

<body>
    <?php include 'dbconn.php';
    include 'navbar.php'; 

    if(isset($_GET['succesfullyupdated']))
        echo "Succesfully Updated";

    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);

    ?>

    <div class="user-table">
        <table class="flow">
            <tr>
                <th></th>
                <th></th>
                <th>
                    No
                </th>
                <th>
                    Name-Surname
                </th>
                <th>
                    Number
                </th>
                <th>Backup Number</th>
                <th>Address</th>
                <th>Block No</th>
                <th>Door No</th>
                <th>Entry Date</th>
                <th>Exit Date</th>
                <th>Status</th>
                
            </tr>
            
            <?php

            while ($user = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                <td> <a class="buttona" href="updateresidentform.php?updateId=<?php echo $user["userID"] ?>"><button class="button1">Update</button></a></td>
                    <td> <a class="buttona" href="userdelete.php?id=<?php echo $user["userID"] ?>"><button class="button1">Delete</button></a></td>
                    <td> <?php echo $user["userID"]; ?> </td>
                    <td> <?php echo $user["userName"]; ?> </td>
                    <td> <?php echo $user["userNum"]; ?> </td>
                    <td> <?php echo $user["backupNum"]; ?> </td>
                    <td> <?php echo $user["address"]; ?> </td>
                    <td> <?php echo $user["blockNo"]; ?> </td>
                    <td> <?php echo $user["doorNo"]; ?> </td>
                    <td> <?php echo $user["entryDate"]; ?> </td>
                    <td> <?php echo $user["exitDate"]; ?> </td>
                    <td> <?php echo strtoupper($user["status"]);?> </td>

                </tr>

            <?php } ?>

        </table>
    </div>

</body>

</html>