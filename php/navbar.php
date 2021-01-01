<?php session_start(); ?>

<header>
    <div class="container-fluid my-2 text-center">
        <a href="http://localhost:80/index.php">
            <img src="../images/apartment-manager-logo.png" alt="logo">
        </a>
    </div>


</header>

<nav class="navbar navbar-default navbar-expand-sm bg-dark navbar-dark sticky-top">

    <div class="container-fluid">

        <ul class="nav navbar-nav justify-content-left">

            <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/index.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/index.php">Home</a></li>
            <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/rules.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/rules.php">Rules</a></li>
            <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/contact.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/contact.php">Contact</a></li>
        </ul>

        <?php if (isset($_SESSION["authorization"])) { ?>

            <ul class="nav navbar-nav justify-content-center">
                <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/apartments.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/apartments.php">Residents</a></li>

                <?php if ($_SESSION['authorization'] == 1) { ?>
                    <li class="nav-item dropdown <?php if ($_SERVER['REQUEST_URI'] == "/php/showdues.php" || $_SERVER['REQUEST_URI'] == "/php/senddues.php") echo "active"; ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Dues
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/php/showdues.php">Show Dues</a>
                            <a class="dropdown-item" href="/php/sendduesform.php">Send Dues</a>
                        </div>
                    </li>
                <?php } else { ?>
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/showdues.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/showdues.php">Dues</a></li>
                <?php } ?>
            </ul>


            <?php if ($_SESSION['authorization'] == 1) { ?>

                <ul class="nav navbar-nav justify-content-center">
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/adduser.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/adduser.php">Add Resident</a></li>

                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/income-expand.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/income-expand.php">Income Expand</a></li>

                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/comments.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/comments.php">Comments</a></li>
            <?php
            }
        } ?>
                </ul>


                <ul class="nav navbar-nav justify-content-right">

                    <li>
                        <?php if (!isset($_SESSION['isLoggedIn'])) { ?>
                            <span class="nav-item"><a class="<?php if ($_SERVER['REQUEST_URI'] == "/php/login.php") echo "active"; ?> nav-link" href="http://localhost:80/php/login.php"><b>Login</b></a></span>
                        <?php } else { ?>
                            <span class="nav-item"><a class="nav-link" href="logout.php"><b>Logout</b></a></span>
                        <?php } ?>

                    </li>

                </ul>

    </div>
</nav>