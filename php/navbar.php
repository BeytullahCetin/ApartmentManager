<?php session_start(); ?>

<header>
    <div class="container-fluid my-1 text-center">
        <a href="http://localhost:80/index.php">
            <img src="../images/apartment-manager-2.png" alt="logo">
        </a>
    </div>


</header>

<nav class="navbar navbar-default navbar-expand-sm bg-dark navbar-dark sticky-top p-1">

    <div class="container-fluid">

        <ul class="nav navbar-nav justify-content-left">

            <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/index.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/index.php">Home</a></li>

            <?php if (isset($_SESSION["authorization"])) { ?>

                <ul class="nav navbar-nav justify-content-center">
                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/apartments.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/apartments.php">Residents</a></li>

                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/showdues.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/showdues.php">Dues</a></li>

                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/income-expense.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/income-expense.php">Report</a></li>
                </ul>


                <?php if ($_SESSION['authorization'] == 1) { ?>

                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/adduser.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/adduser.php">Add Resident</a></li>

                    <li class="nav-item dropdown <?php if ($_SERVER['REQUEST_URI'] == "/php/senddues.php" || $_SERVER['REQUEST_URI'] == "/php/expenseform.php") echo "active"; ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            Expense & Due
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/php/expenseform.php">Expense</a>
                            <a class="dropdown-item" href="/php/sendduesform.php">Due</a>
                        </div>
                    </li>

                    <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/comments.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/comments.php">Comments</a></li>
            <?php
                }
            } ?>
        </ul>

        <ul class="nav navbar-nav justify-content-right">

            <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/rules.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/rules.php">Rules</a></li>
            <li class="nav-item <?php if ($_SERVER['REQUEST_URI'] == "/php/contact.php") echo "active"; ?>"><a class="nav-link" href="http://localhost:80/php/contact.php">Contact</a></li>

                <?php if (!isset($_SESSION['isLoggedIn'])) { ?>

                    <li>
                    <span class="nav-item"><a href="http://localhost:80/php/login.php"><button class="btn btn-success ml-5">Login</button></a></span>
                    </li>

                <?php } else { ?>

                    <li class="nav-item dropdown <?php if ($_SERVER['REQUEST_URI'] == "/php/profile.php") echo "active"; ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="logoutdrop" data-toggle="dropdown">
                        <?php echo $_SESSION['userName']; ?>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/php/profile.php">Profile</a>
                            <a class="dropdown-item" href="/php/logout.php"><b>Logout</b></a>
                        </div>
                    </li>
                <?php } ?>


        </ul>

    </div>
</nav>