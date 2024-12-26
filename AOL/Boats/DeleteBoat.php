<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boats Delete Form</title>
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
            color: #fff;
        }

        .form-box {
            width: 400px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            backdrop-filter: blur(10px);
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            font-size: 2em;
            margin-bottom: 20px;
            margin-top: 10px;
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

        .message {
            margin-top: 20px;
            color: #fff;
        }
    </style>
</head>
<body>
    <section>
        <div class="form-box">
            <h2>Boats Delete Form</h2>

            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "aol";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $_bid = $_POST['_bid'];
                $_bname = $_POST['_bname'];
                $_color = $_POST['_color'];

                // Initialize an array to store the conditions for deletion
                $deleteConditions = array();

                // Check if each field is set and add it to the delete conditions
                if (!empty($_bid)) {
                    $deleteConditions[] = "bid = '$_bid'";
                }

                if (!empty($_bname)) {
                    $deleteConditions[] = "bname = '$_bname'";
                }

                if (!empty($_color)) {
                    $deleteConditions[] = "color = '$_color'";
                }

                // Combine delete conditions with AND
                $whereClause = implode(' AND ', $deleteConditions);

                // Build the complete SQL query
                $sql = "DELETE FROM boats WHERE $whereClause";

                if ($conn->query($sql) === TRUE) {
                    // Check if data was found and deleted
                    if ($conn->affected_rows > 0) {
                        echo "<p class='message'>Data has been deleted successfully!</p>";
                    } else {
                        // Data not found
                        echo "<p class='message'>Data Not Found!</p>";
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            ?>

            <a href="http://localhost/AOL/index_boats.html">Back</a>
        </div>
    </section>
</body>
</html>
