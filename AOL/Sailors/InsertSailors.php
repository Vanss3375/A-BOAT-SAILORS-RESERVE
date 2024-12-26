<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sailors Input Form</title>
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
            <h2>Sailors Input Form</h2>

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

                $_sid = $_POST['_sid'];
                $_sname = $_POST['_sname'];
                $_rating = $_POST['_rating'];
                $_age = $_POST['_age'];

                $sql = "INSERT INTO Sailors SET sid='$_sid', sname='$_sname', rating='$_rating', age ='$_age'";

                if ($conn->query($sql) === TRUE) {
                    echo "<p class='message'>New record created successfully</p>";
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
