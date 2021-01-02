<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Summary</title>
  <?php include "css.php"; ?>
</head>

<body>

  <?php

  include "dbconn.php";
  include "navbar.php";




  ?>

  <div class="container">
    <div class="row my-3 justify-content-center">
      <div class="" id='piechart'></div>
    </div>
  </div>

<?php

  $query = "SELECT SUM(duePrice) FROM due WHERE paymentStatus = 'paid'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $income = $row['SUM(duePrice)'];

  $query = "SELECT SUM(duePrice) FROM due WHERE paymentStatus = 'not paid'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $unpaiddues = $row['SUM(duePrice)'];

  $query = "SELECT SUM(expensePrice) FROM expense";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $expense = $row['SUM(expensePrice)'];

  echo "<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    
    <script type='text/javascript'>
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    // Draw the chart and set the chart values
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Income'," . $income . "],
      ['Expense'," . $expense . "],
      ['Not Paid Dues'," . $expense . "]

    ]);
    
      // Optional; add a title and set the width and height of the chart
      var options = {'title':'Income Expense', 'width':600, 'height':400};
    
      // Display the chart inside the <div> element with id='piechart'
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
      chart.draw(data, options);
    }
    </script>";

  ?>
  
</body>
</html>