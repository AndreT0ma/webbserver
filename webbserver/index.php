<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <title>Document</title>
</head>
<body>
    <table class="center">
        <tr>
            <th>Bild</th>
            <th>Namn</th>
            <th>Banknummer</th>
            <th>Saldo</th>
        </tr>

        <?php
        // Connection 
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new mysqli($servername, $username, $password);

        if (!$conn){
            die("connection failed: " . mysqli_connection_error());
        }

        $select_base = mysqli_select_db($conn, 'user_bank');

        if(!$select_base ) {
            die("Could not select database: " . mysqli_error($conn));
        }

        $sql = "SELECT Bild, Namn, Bankkonto, Saldo FROM user_info";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td><img src='" . $row["Bild"] . "' alt='Bild' style='width:100px;height:100px;'></td>";
                echo "<td>" . $row["Namn"] . "</td>";
                echo "<td>" . $row["Bankkonto"] . "</td>";
                echo "<td>" . $row["Saldo"] . "</td>";
                echo "</tr>";
            }
        }
        ?>

    </table>
</body>
</html>