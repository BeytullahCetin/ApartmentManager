<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report</title>
  <?php include "css.php"; ?>
</head>

<body>

  <?php

  include "dbconn.php";
  include "navbar.php";

  if (isset($_GET['startingDate'])) {
    $startingDate = $_GET['startingDate'];
  } else {
    $startingDate = date("Y-m-d", mktime(0, 0, 0, date("m") - 1, 1));

  }

  if (isset($_GET['endingDate'])) {
    $endingDate = $_GET['endingDate'];
  } else {
    $endingDate = date("Y-m-d", mktime(0, 0, 0, date("m"), 0));
  }


  $query = "SELECT SUM(duePrice) FROM due WHERE paymentStatus = 'paid' AND period BETWEEN '$startingDate' AND '$endingDate'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  if($row['SUM(duePrice)'] > 0){
    $income = $row['SUM(duePrice)'];
  }else{
    $income=0;
  }
  

  $query = "SELECT SUM(duePrice) FROM due WHERE paymentStatus = 'not paid' AND period BETWEEN '$startingDate' AND '$endingDate'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  if($row['SUM(duePrice)'] > 0){
    $unpaiddues = $row['SUM(duePrice)'];
  }else{
    $unpaiddues=0;
  }
  


  $query = "SELECT SUM(expensePrice) FROM expense WHERE expenseDate BETWEEN '$startingDate' AND '$endingDate'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  if($row['SUM(expensePrice)'] > 0){
    $expense = $row['SUM(expensePrice)'];
  }else{
    $expense=0;
  }
  

  echo "<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    
    <script type='text/javascript'>
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    // Draw the chart and set the chart values
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Due Incomes'," . $income . "],
      ['Expense'," . $expense . "],
      ['Unpaid Dues'," . $unpaiddues . "]

    ]);
    
      // Optional; add a title and set the width and height of the chart
      var options = {'title':'Income Expense', 'width':600, 'height':350};
    
      // Display the chart inside the <div> element with id='piechart'
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }
    </script>";

  ?>

  <div class="container col-md-10">
    <div class="row justify-content-center">

        <div id='piechart'></div>

    </div>

    <div class="row justify-content-center">
      <form class="form-inline py-3" method="GET" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

        <div class="form-group mx-5">
          <label for="startingDate">Starting Date: </label>
          <input class="form-control mx-2" type="date" name="startingDate" id="startingDate" value="<?php echo $startingDate; ?>">
        </div>

        <div class="form-group mx-5">
          <label for="endingDate">Ending Date: </label>
          <input class="form-control mx-2" type="date" name="endingDate" id="endingDate" value="<?php echo $endingDate ?>">
        </div>

        <div class="form-group mx-5">
          <input class="btn btn-primary" type="submit" value=Show>
        </div>

      </form>

    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="accordion mb-5">

          <div class="card">
            <div class="card-header">
              <a id="card-link" data-toggle="collapse" href="#expenseReport">
                Selected Expense Report
              </a>
            </div>

            <div class="collapse show" id="expenseReport">
              <div class="card-body">

                <table class="table table-hover table-striped">
                  <thead class="thead-light">
                    <tr>

                      <th>Expense Type</th>
                      <th>Expense Detail</th>
                      <th>Expense Date</th>
                      <th>Expense Price</th>

                  </thead>

                  <?php

                  $query = "SELECT * FROM expense WHERE expenseDate BETWEEN '$startingDate' AND '$endingDate'";
                  $result = mysqli_query($conn, $query);
                  while ($expense = mysqli_fetch_assoc($result)) { ?>
                    <tr>

                      <td> <?php echo $expense["expenseType"]; ?> </td>
                      <td> <?php echo $expense["expenseDetail"]; ?> </td>
                      <td> <?php echo $expense["expenseDate"]; ?> </td>
                      <td> <?php echo $expense["expensePrice"]; ?> </td>

                    </tr>

                  <?php } ?>

                </table>

              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <a id="card-link" data-toggle="collapse" href="#lifetime">
                Lifetime Expense Report
              </a>
            </div>

            <div class="collapse" id="lifetime">
              <div class="card-body">

                <table class="table table-hover table-striped">
                  <thead class="thead-light">
                    <tr>

                      <th>Expense Type</th>
                      <th>Expense Detail</th>
                      <th>Expense Date</th>
                      <th>Expense Price</th>

                  </thead>

                  <?php

                  $query = "SELECT * FROM expense ORDER BY expenseDate DESC";
                  $result = mysqli_query($conn, $query);
                  while ($expense = mysqli_fetch_assoc($result)) { ?>
                    <tr>

                      <td> <?php echo $expense["expenseType"]; ?> </td>
                      <td> <?php echo $expense["expenseDetail"]; ?></td>
                      <td> <?php echo $expense["expenseDate"]; ?> </td>
                      <td> <?php echo $expense["expensePrice"]; ?> </td>

                    </tr>

                  <?php } ?>

                </table>

              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
</body>

</html>