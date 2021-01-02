<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <?php include "css.php"; ?>

</head>

<body>

    <?php
    ob_start();
    include 'dbconn.php';
    include 'navbar.php';
    ?>

    <div class="container my-3">

        <div class="row">

            <div class="col-lg-2"></div>
            <div class="col-lg-8">

                <?php
                if (isset($_GET['commentsucces'])) {
                    echo "<p class='success'>Comment Succesfully</p>";
                }
                ?>

                <div class="container">

                    <div class="row form-group">
                        <div class="col-md-12">
                            <h2 class="text-center">Contact</h2>
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-6">
                            Address:
                        </div>
                        <div class="col-md-6 text-center">
                            Lorem ipsum dolor sit amet.
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">Number:
                        </div>
                        <div class="col-md-6 text-center">
                            555-123-4567
                        </div>
                    </div>

                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                        <div class="row form-group">

                            <div class="col-md-6">
                                <label for="comment">
                                    Leave Comment:
                                </label>
                            </div>

                            <div class="col-md-6 text-center">
                                <textarea class="form-control" name="comment" id="comment" cols="30" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="commentDate">
                                    Comment Date:
                                </label>
                            </div>

                            <div class="col-md-6 text-center">
                                <input class="form-control" type="date" name="commentDate" id="commentDate">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input class="btn btn-primary btn-block" type="submit" name="sumbitCommnet" id="sumbitCommnet" value="Send">
                            </div>


                        </div>
                    </form>

                </div>

                <?php
                function test_input($data)
                {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $comment = test_input($_POST['comment']);
                    $query = "INSERT INTO `comment` (`commentID`, `commentText`) VALUES (NULL, '$comment')";
                    $result = mysqli_query($conn, $query);
                    header("Location: contact.php?commentsucces");
                }

                ?>



</body>

</html>