
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">

</head>
<body>

<?php include 'dbconn.php'; ?>
    
    <header>
        <a class="logo" href="index.php">
            <h1>Apartment Manager</h1>
        </a>
    </header>

    <?php include 'navbar.php';

$query = "SELECT * FROM comment";
$result = mysqli_query($conn, $query);

?>

<div class="user-table">
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
                <td> <a href="userdelete.php?id=<?php echo $user["commentID"] ?>"><button>Delete</button></a></td>
                <td> <?php echo $comment["commentText"]; ?> </td>
                

            </tr>

        <?php } ?>

    </table>
</div>

    
</body>
</html>