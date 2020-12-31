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
                    <table class="table table-striped">
                        <tr>

                            <th colspan="2">
                                Comments
                            </th>


                        </tr>

                        <?php

                        while ($comment = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td> <a href="commentdelete.php?id=<?php echo $comment["commentID"]?>" onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-outline-danger">Delete</button></a></td>
                                <td> <?php echo $comment["commentText"]; ?> </td>


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