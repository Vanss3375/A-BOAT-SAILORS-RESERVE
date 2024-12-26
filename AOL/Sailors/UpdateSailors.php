<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sailors Update Form</title>
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
            <h2>Sailors Update Form</h2>

            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "aol";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $_sid_search = $_POST['_sid_search'];
                $_sname_search = $_POST['_sname_search'];
                $_rating_search = $_POST['_rating_search'];
                $_age_search = $_POST['_age_search'];

                $_sid = $_POST['_sid'];
                $_sname = $_POST['_sname'];
                $_rating = $_POST['_rating'];
                $_age = $_POST['_age'];

                // Initialize an array to store the fields to be updated
                $fieldsToUpdate = array();

                // Check if each field is set and add it to the update array
                if (!empty($_sid)) {
                    $fieldsToUpdate[] = "sid = '$_sid'";
                }

                if (!empty($_sname)) {
                    $fieldsToUpdate[] = "sname = '$_sname'";
                }

                if (!empty($_rating)) {
                    $fieldsToUpdate[] = "rating = '$_rating'";
                }

                if (!empty($_age)) {
                    $fieldsToUpdate[] = "age = '$_age'";
                }

                // Build the SET part of the query
                $setClause = implode(', ', $fieldsToUpdate);

                // Build the WHERE part of the query for searching
                $searchConditions = array();

                if (!empty($_sid_search)) {
                    $searchConditions[] = "sid = '$_sid_search'";
                }

                if (!empty($_sname_search)) {
                    $searchConditions[] = "sname = '$_sname_search'";
                }

                if (!empty($_rating_search)) {
                    $searchConditions[] = "rating = '$_rating_search'";
                }

                if (!empty($_age_search)) {
                    $searchConditions[] = "age = '$_age_search'";
                }

                // Combine search conditions with AND
                $whereClause = implode(' AND ', $searchConditions);

                // Build the complete SQL query
                $sql = "UPDATE sailors SET $setClause WHERE $whereClause";

                if ($conn->query($sql) === TRUE) {
                    // Check if data being updated exists in the database
                    if ($conn->affected_rows > 0) {
                        echo "<p class='message'>The record has been updated successfully</p>";
                    } else {
                        // Data being updated was not found in the database
                        echo "<p class='message'>Data Not Found!</p>";
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            ?>

            <br><br>
            <a href="http://localhost/AOL/index_sailors.html">Back</a>
        </div>
    </section>
</body>
</html>