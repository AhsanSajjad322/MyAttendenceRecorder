<?php

    include 'template.php';
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "AttendenceRecorder";

    $conn = mysqli_connect($servername, $username, $password,$dbname);
    if(!$conn){
        die("Connection failed : " . mysqli_connect_error());
    }

    // Insert data into the 'student' table
    $sql_student = "INSERT INTO student (first_name, last_name, email, registration_number) VALUES ('Ali', 'Ahmed', 'ali.ahmed@seecs.edu.pk', '123451')";

    if (mysqli_query($conn , $sql_student)) {
        $sql_student2 = "INSERT INTO student (first_name, last_name, email, registration_number) VALUES ('Ahsan', 'Sajjad', 'ahsan@gmail,com', '123456')";
        $sql_student3 = "INSERT INTO student (first_name, last_name, email, registration_number) VALUES ('Ahmar', 'Sajjad', 'ahmar@seecs.edu.pk', '123457')";
        $sql_student4 = "INSERT INTO student (first_name, last_name, email, registration_number) VALUES ('Ahmed', 'Raza', 'ahmed@seecs.edu.pk', '123455')";
        mysqli_query($conn , $sql_student2);
        mysqli_query($conn , $sql_student3);
        mysqli_query($conn , $sql_student4);

        echo "Student record inserted successfully";
    } else {
        echo "Error inserting student record: " . mysqli_error($conn);
    }

    // Insert data into the 'teacher' table
    $sql_teacher = "INSERT INTO teacher (first_name, last_name, email, department) VALUES ('Fahad', 'Satti', 'fahad@gmail.com', 'Computer Science')";

    if (mysqli_query($conn , $sql_teacher)) {
        echo "Teacher record inserted successfully";
    } else {
        echo "Error inserting teacher record: " . mysqli_error($conn);
    }

    // Insert data into the 'course' table
    $sql_course = "INSERT INTO course (course_name, course_code, department) VALUES ('Web Engineering', 'CSC101', 'SEECS')";

    if (mysqli_query($conn , $sql_course)) {
        echo "Course record inserted successfully";
    } else {
        echo "Error inserting course record: " . mysqli_error($conn);
    }

    // Insert data into the 'session' table
    $sql_session = "INSERT INTO session (session_date, teacher_id, course_id, start_time, end_time, type) VALUES ('2023-12-01', 1, 1, '09:00:00', '10:00:00', 'current')";

    if (mysqli_query($conn, $sql_session)) {
        echo "Session record inserted successfully";
    } else {
        echo "Error inserting session record: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn)

?>
