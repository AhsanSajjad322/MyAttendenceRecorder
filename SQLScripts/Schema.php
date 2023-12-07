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
    
    // Create the 'student' table
    $sql_student = "
        CREATE TABLE student (
            student_id int(11) NOT NULL AUTO_INCREMENT,
            first_name varchar(255) NOT NULL,
            last_name varchar(255) NOT NULL,
            email varchar(255) NOT NULL UNIQUE,
            registration_number varchar(255) NOT NULL UNIQUE,
            PRIMARY KEY (student_id)
        )";

    if (mysqli_query($conn, $sql_student)) {
        echo "Table student created successfully";
    } else {
        echo "Error creating table student: " . mysqli_error($conn);
    }

    // Create the 'teacher' table
    $sql_teacher = "
        CREATE TABLE teacher (
            teacher_id int(11) NOT NULL AUTO_INCREMENT,
            first_name varchar(255) NOT NULL,
            last_name varchar(255) NOT NULL,
            email varchar(255) NOT NULL UNIQUE,
            department varchar(255) NOT NULL,
            PRIMARY KEY (teacher_id)
        )";

    if (mysqli_query($conn, $sql_teacher)) {
        echo "Table teacher created successfully";
    } else {
        echo "Error creating table teacher: " . mysqli_error($conn);
    }

    // Create the 'course' table
    $sql_course = "
        CREATE TABLE course (
            course_id int(11) NOT NULL AUTO_INCREMENT,
            course_name varchar(255) NOT NULL,
            course_code varchar(255) NOT NULL UNIQUE,
            department varchar(255) NOT NULL,
            PRIMARY KEY (course_id)
        )";

    if (mysqli_query($conn, $sql_course)) {
        echo "Table course created successfully";
    } else {
        echo "Error creating table course: " . mysqli_error($conn);
    }

    // Create the 'attendance' table
    $sql_attendance = "
        CREATE TABLE attendance (
            attendance_id int(11) NOT NULL AUTO_INCREMENT,
            student_id int(11) NOT NULL,
            teacher_id int(11) NOT NULL,
            session_date date NOT NULL,
            attendance_status enum('A', 'P') NOT NULL,
            PRIMARY KEY (attendance_id),
            CONSTRAINT FK_attendance_student FOREIGN KEY (student_id) REFERENCES student(student_id),
            CONSTRAINT FK_attendance_teacher FOREIGN KEY (teacher_id) REFERENCES teacher(teacher_id)
        )";

    if (mysqli_query($conn,$sql_attendance)) {
        echo "Table attendance created successfully";
    } else {
        echo "Error creating table attendance: " . mysqli_error($conn);
    }

    // Create the 'session' table
    $sql_session = "
        CREATE TABLE session (
            session_id int(11) NOT NULL AUTO_INCREMENT,
            session_date date NOT NULL,
            teacher_id int(11) NOT NULL,
            course_id int(11) NOT NULL,
            start_time time NOT NULL,
            end_time time NOT NULL,
            type enum('current','previous','upcoming') NOT NULL,
            PRIMARY KEY (session_id),
            CONSTRAINT FK_session_teacher FOREIGN KEY (teacher_id) REFERENCES teacher(teacher_id),
            CONSTRAINT FK_session_course FOREIGN KEY (course_id) REFERENCES course(course_id)
        )";

    if (mysqli_query($conn, $sql_session)) {
        echo "Table session created successfully";
    } else {
        echo "Error creating table session: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn)

?>
