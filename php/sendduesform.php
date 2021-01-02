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

    <div class="container">
        <div class="row my-3 justify-content-center">
            <form class="form" method="POST" action="senddues.php">

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="duePeriod">Due Date: </label>
                    <div class="col-md-10">
                        <input class="form-control" type="date" id="duePeriod" name="duePeriod" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="duePrice">Due Price: </label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" id="duePrice" name="duePrice" required>
                    </div>
                    <div class="col-md-2">
                        <p class="text-left">TL</p>
                    </div>

                </div>

                <div class="row">
                    <input class="btn btn-primary btn-block" type="submit" name="dueSubmit" id="dueSubmit" onclick="return confirm('Are you sure?')">
                </div>
            </form>
        </div>
    </div>


</body>

</html>