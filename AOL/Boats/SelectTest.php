<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boats Report</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif;
            box-sizing: border-box;
        }

        body {
            background: url('../bg.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-box {
            width: 400px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            backdrop-filter: blur(10px);
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            font-size: 2em;
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            margin-top: 10px;
        }

        label {
            color: #fff;
            margin-top: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #fff;
            padding: 10px;
            text-align: left;
            color: #fff;
        }

        a {
            display: inline-block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 1em;
            color: #333;
            background-color: #fff;
            margin-top: 10px;
        }

        a:hover {
            background-color: #ddd;
        }

        .back-button {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <section>
        <div class="form-box">
            <h2>Boats Report</h2>

            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "aol";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM boats";
                $result = $conn->query($sql);
            ?>

            <table>
                <tr>
                    <th>Bid</th>
                    <th>Boat Name</th>
                    <th>Color</th>
                </tr>

                <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                            <tr>
                                <td><?php echo $row['bid']; ?> </td>
                                <td><?php echo $row['bname']; ?> </td>
                                <td><?php echo $row['color']; ?> </td>
                            </tr>
                <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                ?>
            </table>

            <a href="http://localhost/AOL/index_boats.html" class="back-button">Back</a>
        </div>
    </section>
</body>
</html>
