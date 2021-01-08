<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <?php include "css.php"; ?>

</head>

<body>

    <?php

    include 'dbconn.php';
    include 'navbar.php';

    $query = "SELECT * FROM comment";
    $result = mysqli_query($conn, $query);

    ?>


    <div class="container my-3">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="container">
                    <table class="table table-striped table-hover text-center">
                        <tr>

                            <th>Action</th>
                            <th>Comments</th>
                            <th>Comment Date</th>
                            <th>Number</th>


                        </tr>

                        <?php

                        while ($comment = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td class="text-center"> <a href="commentdelete.php?id=<?php echo $comment["commentID"] ?>" onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-danger">Delete</button></a></td>
                                <td> <?php echo $comment["commentText"]; ?> </td>
                                <td><?php $newDate = date('d-M-Y', strtotime($comment["commentDate"]));
                                    echo "$newDate"; ?></td>
                                <td><?php if (is_null($comment['number'])) {
                                        echo "-";
                                    } else {
                                        echo $comment['number'];
                                    } ?></td>
                            </tr>

                        <?php } ?>

                    </table>
                </div>

            </div>
            <div class="col-lg-2"></div>
        </div>

    </div>






</body>

</html>