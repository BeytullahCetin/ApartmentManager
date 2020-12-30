<?php session_start(); ?>

<header>
    <a class="logo" href="http://localhost:80/index.php">
        <h1>Apartment Manager</h1>
    </a>
</header>

<nav class="nav">

    <ul class="links">


        <li class="link <?php if ($_SERVER['REQUEST_URI'] == "/index.php") echo "active-link"; ?>"><a href="http://localhost:80/index.php">Home</a></li>
        <li class="link <?php if ($_SERVER['REQUEST_URI'] == "/php/rules.php") echo "active-link"; ?>"><a href="http://localhost:80/php/rules.php">Rules</a></li>
        <li class="link <?php if ($_SERVER['REQUEST_URI'] == "/php/contact.php") echo "active-link"; ?>"><a href="http://localhost:80/php/contact.php">Contact</a></li>

    </ul>


    <?php if (isset($_SESSION["authorization"])) { ?>

        <ul class="links">
            <li class="link <?php if ($_SERVER['REQUEST_URI'] == "/php/apartments.php") echo "active-link"; ?>"><a href="http://localhost:80/php/apartments.php">Apartments</a></li>
            <li class="link <?php if ($_SERVER['REQUEST_URI'] == "/php/dues.php") echo "active-link"; ?>"><a href="http://localhost:80/php/dues.php">Dues</a></li>
        </ul>

        <?php if ($_SESSION['authorization'] == 1) { ?>

            <ul class="links">
                <li class="link <?php if ($_SERVER['REQUEST_URI'] == "/php/comments.php") echo "active-link"; ?>"><a href="http://localhost:80/php/comments.php">Comments</a></li>
                <li class="link <?php if ($_SERVER['REQUEST_URI'] == "/php/adduser.php") echo "active-link"; ?>"><a href="http://localhost:80/php/adduser.php">Add User</a></li>
            </ul>
    <?php

        }
    } ?>


    <?php if (!isset($_SESSION['isLoggedIn'])) { ?>
        <span class="link <?php if ($_SERVER['REQUEST_URI'] == "/php/login.php") echo "active-link"; ?>"><a href="http://localhost:80/php/login.php"><b>Login</b></a></span>
    <?php } else { ?>
        <span class="link"><a href="logout.php"><b>Logout</b></a></span>
    <?php } ?>




</nav>