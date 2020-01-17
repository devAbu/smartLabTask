<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Licenses manager - Add new license</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <section>
        <form action="dbSend/addNew.php">
            <?php

            echo '<input type="text" value="' . $_SESSION["email"] . '" name="creator" hidden>';

            ?>
            <div class="addBtn elPad">
                <label for="name">License name:</label>
                <input type="text" name="name" id="name" placeholder="Name...">
            </div>

            <div class="elPad">
                <label for="type">License type:</label>
                <input type="text" name="type" id="type" placeholder="Monthly / Yearly">
            </div>

            <div class="elPad">
                <label for="period">License period:</label>
                <input type="number" name="period" id="period" placeholder="Days">
            </div>
            <button type="submit">Save</button>
            <button type="reset">Cancel</button>
        </form>
    </section>

</body>

</html>