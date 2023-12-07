<?php
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";

    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "AttendenceRecorder";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }

    foreach($_GET as $key=>$value){
        $sql = "SELECT * FROM session WHERE session_date = '2023-12-01';";
        $sessionDate = mysqli_query($conn,$sql);
        $sessionDateData = mysqli_fetch_assoc($sessionDate);

        $sql2 = "UPDATE attendance SET attendance_status = '$value' WHERE student_id = '$key';";
        mysqli_query($conn,$sql2);
    }
    header("Location:teacherView.php");
?>