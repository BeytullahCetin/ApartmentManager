<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartment Manager</title>
    <link rel="stylesheet" href="http://localhost:80/css/styles.css?v=<?php echo time(); ?>">
</head>

<body>

    <?php
    
    include 'dbconn.php';
    include 'navbar.php';
    
    ?>

    <div class="center-container">
        <div class="login-form">
         <h2 class="login-header">Apartment Login</h2>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                <input type="tel" name="number" id="number" required pattern="[0-9]{10}" maxlength="10" placeholder="Number eg:(555-123-4567)">
                <br>
                <input type="password" name="pwd" id="pwd" required maxlength="11" placeholder="Password">
                <br>
                <input class="button1" type="submit" value="Login">

            </form>
        </div>
    </div>




    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $number = test_input($_POST['number']);
        $pwd = test_input($_POST['pwd']);
        $pwd = md5($pwd);

        $query = "SELECT * FROM `users` WHERE userNum='$number' AND userPwd='$pwd';";
        $result = mysqli_query($conn, $query);
        

        if (mysqli_num_rows($result) == 1) {
            $row=mysqli_fetch_array($result);

            $_SESSION['userID']=$row['userID'];
            $_SESSION['userName']=$row['userName'];
            $_SESSION['userPwd']=$row['userPwd'];
            $_SESSION['userNum']=$row['userNum'];
            $_SESSION['backupNum']=$row['backupNum'];
            $_SESSION['address']=$row['address'];
            $_SESSION['blockNo']=$row['blockNo'];
            $_SESSION['doorNo']=$row['doorNo'];
            $_SESSION['entryDate']=$row['entryDate'];
            $_SESSION['exitDate']=$row['exitDate'];
            $_SESSION['status']=$row['status'];
            $_SESSION['isAdmin']=$row['isAdmin'];
            $_SESSION['isLoggedIn']=true;
            
            
            
            header("Location: welcome.php");

        } else
            echo "<p style='color: red; text-align: center';><b>Wrong number or password</b></p>";
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

</body>

</html>