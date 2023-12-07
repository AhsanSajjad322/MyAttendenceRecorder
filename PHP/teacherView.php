<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" href="../CSS/teacherStyle.css">
</head>
<body>
    <?php
        include 'template.php';
    ?>
    <div class="container">

        <div class="teacher-dashboard">
            <div class="teacher-info">
                <h3>Welcome !</h3>
                <?php
                    session_start();
                    $userData = $_SESSION['user'];
                ?>
                <h2>
                    <?php echo $userData['fullname']; ?>
                </h2>
            </div>

            <h3>Current Session</h3>
            <?php
                // Database connection parameters
                $servername = "localhost";
                $username = "root";
                $password = "123456";
                $dbname = "AttendenceRecorder";

                $conn = mysqli_connect($servername, $username, $password,$dbname);
                if(!$conn){
                    die("Connection failed : " . mysqli_connect_error());
                }
                $sql = "SELECT * FROM Session WHERE type='current'";
                $session =  mysqli_query($conn,$sql);
                $sessionData = mysqli_fetch_assoc($session);
            ?>
            <div class="current-session">
                <div class="card">
                    <div class="card-header" onclick='render()'>
                        <span>Date :</span>&nbsp;
                        <span><?php echo $sessionData['session_date']; ?></span>
                    </div>

                    <div class="card-body">
                        <div class="time">
                            <span>Class Timings:</span>
                            <span><?php echo $sessionData['start_time'] ." - " . $sessionData['end_time']; ?></span>
                        </div>
                        <div class="subject">
                            <?php
                                $sql = "SELECT course_name FROM session JOIN course USING (course_id)";
                                $course = mysqli_query($conn, $sql);
                                $courseData = mysqli_fetch_assoc($course);
                            ?>
                            <span>Subject:</span>
                            <span><?php echo $courseData['course_name']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        &copy; 2023 Attendance Management System
    </footer>
    <script src="../JS/script.js"></script>
</body>
</html>
