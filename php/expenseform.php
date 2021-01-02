<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense</title>
    <?php include "css.php"; ?>
</head>

<body>

    <?php

    include "dbconn.php";
    include "navbar.php";

    ?>

    <div class="container">
        <div class="row my-3 justify-content-center">
            
        <form class="form" method="POST" action="expense.php">

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="expenseType">Expense Type: </label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" id="expenseType" name="expenseType" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="expenseDate">Expense Date: </label>
                    <div class="col-md-10">
                        <input class="form-control" type="date" id="expenseDate" name="expenseDate" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-2 col-form-label" for="expensePrice">Expense Price: </label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" id="expensePrice" name="expensePrice" required>
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