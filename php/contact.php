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
                if (isset($_GET['commentSucces'])) {
                    echo "<p class='success'>Comment Succesfully</p>";
                }
                if (isset($_GET['commentError'])) {
                    echo "<p class='errCenter'>Comment Error!</p>";
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

                        <?php

                        if (!isset($_SESSION['userNum'])) { ?>

                            <div class="row form-group">

                                <div class="col-md-6">
                                    <label for="comment">
                                        Number:
                                    </label>
                                </div>

                                <div class="col-md-6 text-center">
                                    <input class="form-control" type="tel" name="number" id="number" pattern="[0-9]{10}" maxlength="10" required placeholder="eg:(555-123-4567)">
                                </div>
                            </div>

                        <?php
                        }
                        ?>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <input class="btn btn-success btn-block" type="submit" name="sumbitCommnet" id="sumbitCommnet" value="Send">
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

                    if (isset($_POST['comment'])) {
                        $comment = test_input($_POST['comment']);
                    }

                    if (isset($_POST['comment'])) {
                        $date = date("Y-m-d");
                    }

                    if (isset($_POST['number'])) {
                        $number = test_input($_POST['number']);
                    } else if (isset($_SESSION['userNum'])) {
                        $number = $_SESSION['userNum'];
                    } else {
                        $number;
                    }

                    if (!empty($comment)) {

                        $query = "INSERT INTO comment (commentText, commentDate, number) VALUES ('$comment', '$date', '$number')";

                        if (mysqli_query($conn, $query)) {
                            header("Location: contact.php?commentSucces");
                        } else {
                        }
                    } else {
                        header("Location: contact.php?commentError");
                    }
                }

                ?>



</body>

</html>