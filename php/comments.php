<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" href="http://localhost:80/css/styles.css?v=<?php echo time(); ?>">

</head>
<body>

    <?php 
    
    include 'dbconn.php';
    include 'navbar.php';

$query = "SELECT * FROM comment";
$result = mysqli_query($conn, $query);

?>

<div>
    <table class="flow">
        <tr>
            
            <th colspan="2">
                Comments
            </th>
            
            
        </tr>
        
        <?php

        while ($comment = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td> <a class="buttona" href="commentdelete.php?id=<?php echo $comment["commentID"] ?>"><button class="button1">Delete</button></a></td>
                <td> <?php echo $comment["commentText"]; ?> </td>
                

            </tr>

        <?php } ?>

    </table>
</div>

    
</body>
</html>