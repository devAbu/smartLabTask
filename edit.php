<?php
session_start();
$ID = $_REQUEST["ID"];
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
        <?php

        require 'connection/connect.php';

        $sql = "SELECT * FROM licenses where ID = $ID";
        $result = $dbc->query($sql);

        $count = $result->num_rows;

        if ($count > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<form action="dbSend/update.php">
                        <div class="addBtn elPad">
                        <input type="number" value="' . $row["ID"] . '" name="ID" hidden>
                            <label for="name">License name:</label>
                            <input type="text" name="name" id="name" placeholder="Name..." value="' . $row["name"] . '">
                        </div>

                        <div class="elPad">
                            <label for="type">License type:</label>
                            <input type="text" name="type" id="type" placeholder="Monthly / Yearly" value="' . $row["type"] . '">
                        </div>

                        <div class="elPad">
                            <label for="period">License period:</label>
                            <input type="number" name="period" id="period" placeholder="0" value="' . $row["period"] . '">
                        </div>

                        <button type="submit">Update</button>
                        <a href="home.php">
                            <button type="button">Cancel</button>
                        </a>
                    </form>';
            }
        } ?>

    </section>

</body>

</html>