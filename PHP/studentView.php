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
                <h3 class="welcome">Welcome !</h3>
                <?php
                    session_start();
                    $userData = $_SESSION['user'];
                ?>
                <h2>
                    <?php echo $userData['fullname']; ?>
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "123456";
                        $dbname = "AttendenceRecorder";
                
                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        if(!$conn){
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $email = $userData['email'];
                        $sql = "SELECT student_id FROM student JOIN user USING (email) WHERE email='$email';";
                        $sid = mysqli_query($conn,$sql);
                        $sidData = mysqli_fetch_assoc($sid);
                        $sid = $sidData['student_id'];
                    ?>
                </h2>
            </div>

            <h3>My Courses</h3>
            <div class="current-session">

                <div class="card">
                    <div class="card-header">
                        <span>Web Engineering</span>                    
                    </div>

                    <div class="card-body">
                        <div class="time">
                            <span>Teacher : </span>
                            <span>Mr. Fahad Satti</span>
                        </div>
                        <div class="Attendence">
                            <span>Attendence : </span>
                            <span></span>
                        </div>
                        <?php    
                            $sql = "SELECT attendance_status FROM attendance WHERE student_id = '$sid';";
                            $status = mysqli_query($conn,$sql);
                            $statusData = mysqli_fetch_assoc($status);
                            if($statusData['attendance_status'] == 'P'){
                                echo "
                                <div class='Attendence'>
                                    <span>No. of P's :  </span>
                                    <span>01</span>
                                </div>
                                <div class='Attendence'>
                                    <span>No. of A's :  </span>
                                    <span>00</span>
                                </div>
                                ";
                            }else{
                                echo "
                                <div class='Attendence'>
                                    <span>No. of P's :  </span>
                                    <span>00</span>
                                </div>
                                <div class='Attendence'>
                                    <span>No. of A's :  </span>
                                    <span>01</span>
                                </div>
                                ";
                            }

                            mysqli_close($conn);
                        ?>
                        
                        <div class="details">
                            <span>SE-315-Fall23-SEECS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        &copy; 2023 Attendance Management System
    </footer>
    <script src="script.js"></script>
</body>
</html>
