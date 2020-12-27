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

    <div>
        <table class="flow">
            <tr>
                <th>
                    Address
                </th>
                <th>
                    Number
                </th>
            </tr>
            <tr>
                <td>
                    Lorem ipsum dolor sit amet consectetur adipisicing.
                </td>
                <td>
                    555-123-4567
                </td>
            </tr>

            <tr>
            </tr>
            <tr>
            </tr>

            <tr>
                <th colspan="2">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <label for="comment">
                            Leave Comment:
                        </label>
                        <textarea name="comment" id="comment" cols="30" rows="8"></textarea>
                        <input class="button1" type="submit" name="sumbitCommnet" id="sumbitCommnet" value="Send">
                    </form>
                </th>

            </tr>
        </table>
    </div>

    <?php
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $comment = test_input($_POST['comment']);
        $query = "INSERT INTO `comment` (`commentID`, `commentText`) VALUES (NULL, '$comment')";
        $result = mysqli_query($conn, $query);
    }

    ?>



</body>

</html>