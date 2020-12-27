<?php session_start(); ?>
<nav class="nav">

        <ul class="links">

    
            <li class="link <?php if($_SERVER['REQUEST_URI'] == "/index.php") echo "active-link"; ?>"><a href="index.php">Home</a></li>
            <li class="link <?php if($_SERVER['REQUEST_URI'] == "/rules.php") echo "active-link"; ?>"><a href="rules.php">Rules</a></li>
            <li class="link <?php if($_SERVER['REQUEST_URI'] == "/apartments.php") echo "active-link"; ?>"><a href="apartments.php">Apartment</a></li>
            <li class="link <?php if($_SERVER['REQUEST_URI'] == "/dues.php") echo "active-link"; ?>"><a href="dues.php">Dues</a></li>
            <li class="link <?php if($_SERVER['REQUEST_URI'] == "/contact.php") echo "active-link"; ?>"><a href="contact.php">Contact</a></li>
            
            <?php if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"]==1){?>
            <li class="link <?php if($_SERVER['REQUEST_URI'] == "/comments.php") echo "active-link"; ?>"><a href="comments.php">Comments</a></li>
            <?php } ?>

        </ul>
        
        <?php if(!isset($_SESSION['isLoggedIn'])){ ?>
            <span class="link <?php if($_SERVER['REQUEST_URI'] == "/login.php") echo "active-link"; ?>"><a href="login.php"><b>Login</b></a></span>
        <?php }else{?>
            <span class="link"><a href="logout.php"><b>Logout</b></a></span>
        <?php } ?>
    </nav>