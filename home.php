<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Licenses manager - Home</title>

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>
    <section>
        <div class="elPad addBtn">
            <a href="add.php">
                <button>Add new licence <i class="far fa-plus-square"></i></button>
            </a>
        </div>


        <div class="elPad">
            <form action="">
                <span>Search:</span>
                <input type="search" name="search" id="search" placeholder="Search...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <div class="elPad">
            <form action="">
                <span>Filter by:</span>
                <select name="filter" id="filter">
                    <option value="-1">Select type</option>
                    <option value="0">Monthly</option>
                    <option value="1">Yearly</option>
                </select>
            </form>
        </div>

        <dialog>
            <h2>You want to delete the license?</h2>
            <button onclick="deleteLicense()">YES</button>
            <button onclick="closeDialog()">NO</button>
        </dialog>

        <table>
            <thead>
                <tr>
                    <th>Licenses Name</th>
                    <th>Creator Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php

                require 'connection/connect.php';

                $sql = "SELECT * FROM licenses";
                $result = $dbc->query($sql);

                $count = $result->num_rows;

                if ($count > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>
                                <td>' . $row["name"] . '</td>
                                <td>' . $row["creator"] . '</td>
                                <td>
                                    <form>
                                        <input type="number" value="' . $row["ID"] . '" name="ID" hidden>
                                        <a href="edit.php?ID=' . $row["ID"] . '">
                                            <button type="button">Edit <i class="far fa-edit"></i></button>
                                        </a>
                                        <button type="button" id="' . $row["ID"] . '" onclick="deleteDialog(this.id)">Delete <i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>';
                    }
                } ?>

            </tbody>
        </table>
    </section>

    <script>
        function deleteDialog(ID) {
            document.getElementsByTagName("dialog")[0].setAttribute("open", "")
            document.getElementsByTagName("dialog")[0].setAttribute("id", ID)
        }

        function closeDialog() {
            document.getElementsByTagName("dialog")[0].removeAttribute("open")
            document.getElementsByTagName("dialog")[0].removeAttribute("id")
        }

        function deleteLicense() {
            var ID = document.getElementsByTagName("dialog")[0].id
            location.href = "delete.php?ID=" + ID;
        }
    </script>


</body>

</html>