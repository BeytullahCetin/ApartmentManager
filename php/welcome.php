<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <?php include "css.php";?>
</head>

<body>
    
    <?php 
    
    include 'dbconn.php';
    include 'navbar.php';

    ?>

    <h1 class="login-header">Welcome <?php echo $_SESSION['userName']; ?></h1>
    
    <?php if($_SESSION['authorization']==1){ ?>
        <h1 class="login-header">Admin</h1>
    <?php }else{ ?>
        <h1 class="login-header">Resident</h1>
    <?php } ?>


</body>

</html>