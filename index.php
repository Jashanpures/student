<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Student List</h1>
    </header>
    <div class="student-container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Math Marks</th>
                    <th>Science Marks</th>
                    <th>English Marks</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "student_db";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM students";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["name"] . "</td>
                                <td>" . $row["math_marks"] . "</td>
                                <td>" . $row["science_marks"] . "</td>
                                <td>" . $row["english_marks"] . "</td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>0 results</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
