<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
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

        .report-box {
            width: 400px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            backdrop-filter: blur(10px);
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center; 
            text-align: center; 
            color: #fff;
        }

        h2 {
            font-size: 2em;
            margin-bottom: 20px;
            margin-top: 10px;
        }

        p {
            margin-bottom: 10px;
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
    </style>
</head>
<body>
    <section>
        <div class="report-box">
            <h2>Report</h2>

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

                $sql_sailor_sum = "SELECT COUNT(sid) AS sailor_count FROM sailors";
                $sql_boat_sum = "SELECT COUNT(bid) AS boat_count FROM boats";
                $sql_sailor_age_av = "SELECT AVG(age) AS avg_age FROM sailors";
                $sql_sailor_rating_av = "SELECT AVG(rating) AS avg_rating FROM sailors";

                $result_sailor_sum = $conn->query($sql_sailor_sum);
                $result_boat_sum = $conn->query($sql_boat_sum);
                $result_sailor_age = $conn->query($sql_sailor_age_av);
                $result_sailor_rating = $conn->query($sql_sailor_rating_av);

                if (!$result_sailor_sum || !$result_boat_sum || !$result_sailor_age || !$result_sailor_rating) {
                    die("Query failed: " . $conn->error);
                }

                // Fetch the results
                $row_sailor_sum = $result_sailor_sum->fetch_assoc();
                $row_boat_sum = $result_boat_sum->fetch_assoc();
                $row_sailor_age = $result_sailor_age->fetch_assoc();
                $row_sailor_rating = $result_sailor_rating->fetch_assoc();

                // Display the results
                echo "<p>Total Sailors: " . $row_sailor_sum['sailor_count'] . "</p>";
                echo "<p>Total Boats: " . $row_boat_sum['boat_count'] . "</p>";
                echo "<p>Average Sailor Age: " . $row_sailor_age['avg_age'] . "</p>";
                echo "<p>Average Sailor Rating: " . $row_sailor_rating['avg_rating'] . "</p>";

                // Close the connection
                $conn->close();
            ?>

            <a href="http://localhost/AOL/index.html">Back</a>
        </div>
    </section>
</body>
</html>
