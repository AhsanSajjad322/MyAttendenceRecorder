
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Recorder</title>
    <link rel="stylesheet" href="../CSS/attendence.css">
</head>
<body>


    <?php
        include 'template.php';
        // Establish database connection
        $servername = "localhost";
        $username = "root";
        $password = "123456";
        $dbname = "AttendenceRecorder";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT student.student_id, student.first_name, student.last_name, student.registration_number FROM student";

        $result = $conn->query($sql);

        echo "<form action='processing.php'>";
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>
                    <th>Name</th>
                    <th>CMS</th>
                    <th>Presence</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {
                $sid = $row['student_id'];
                $sql = "SELECT attendance_status FROM attendance WHERE student_id='$sid';";
                $status = mysqli_query($conn, $sql);
                $presenceStatus = mysqli_fetch_assoc($status);
                $presenceStatusData = $presenceStatus['attendance_status'];
                if($presenceStatusData == 'P'){
                    $class = 'green';
                } else{
                    $class = 'red';
                }
                echo "<tr>
                        <td>" . $row['first_name'] . " " .$row['last_name'] ."</td>
                        <td>" . $row['registration_number'] . "</td>
                        <td>" . "<input class='$class' type='text' id='presence' readonly value='$presenceStatusData' name=$sid onclick='togglePresence(this)'>" . "</td>
                    </tr>";
            }
            echo "</table>";
            echo "<input id='submit' type='submit'>";
            echo "</form>";
        } else {
            echo "No students found in the selected class.";
        }

        $conn->close();

    ?>

    <footer>
        &copy; 2023 Attendance Management System
    </footer>
    <script>
        function togglePresence(obj){
            obj.value = (obj.value == 'P' ? 'A' : 'P')
            obj.classList.toggle("green");
            obj.classList.toggle("red");
        }
    </script>
</body>
</html>