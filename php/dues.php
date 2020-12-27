<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../css/styles.css?v=<?php echo time(); ?>">

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
                    No
                </th>
                <th>
                    Due Date
                </th>
                <th>
                    Due Price
                </th>
                <th>
                    Status
                </th>
                <th>

                </th>
            </tr>
            <tr>
                <td>
                    1
                </td>
                <td>
                    1.11.2020
                </td>
                <td id="up">
                    Unpaid
                </td>
                <td>
                    50$
                </td>
                <td>
                    <Button class="mybut" onclick=pay()>Pay</Button>
                </td>
            </tr>
            <tr>
                <td>
                    2
                </td>
                <td>
                    1.11.2020
                </td>
                <td>
                    Unpaid
                </td>
                <td>
                    50$
                </td>
                <td>
                    <Button class="mybut">Pay</Button>
                </td>
            </tr>
            <tr>
                <td>
                    3
                </td>
                <td>
                    1.11.2020
                </td>
                <td>
                    Paid
                </td>
                <td>
                    50$
                </td>
                <td>
                    <Button class="mybut">Pay</Button>
                </td>
            </tr>
            <tr>
                <td>
                    4
                </td>
                <td>
                    1.11.2020
                </td>
                <td>
                    Unpaid
                </td>
                <td>
                    50$
                </td>
                <td>
                    <Button class="mybut">Pay</Button>
                </td>
            </tr>
        </table>
    </div>



</body>

</html>