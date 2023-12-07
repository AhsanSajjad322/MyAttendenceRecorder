<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Recorder</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <?php
        
        $servername = "localhost";
        $username = "root";
        $password = "123456";
        $dbname = "AttendenceRecorder";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if(!$conn){
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql1 = "INSERT INTO attendance (student_id, teacher_id, session_date, attendance_status)
        VALUES (6, 1, '2023-12-01', 'P');";
        $sql2 = "INSERT INTO attendance (student_id, teacher_id, session_date, attendance_status)
        VALUES (7, 1, '2023-12-01', 'P');"; 
        $sql3 = "INSERT INTO attendance (student_id, teacher_id, session_date, attendance_status)
        VALUES (8, 1, '2023-12-01', 'P');"; 
        $sql4 = "INSERT INTO attendance (student_id, teacher_id, session_date, attendance_status)
        VALUES (9, 1, '2023-12-01', 'P');";

        mysqli_query($conn,$sql1);
        mysqli_query($conn,$sql2);
        mysqli_query($conn,$sql3);
        mysqli_query($conn,$sql4);
        
        mysqli_close($conn);
    ?>
</body>
</html>
