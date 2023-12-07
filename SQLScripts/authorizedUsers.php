<?php
    $servername = "localhost";
    $username = "root";
    $password = "123456";

    $conn = mysqli_connect($servername, $username, $password);
    if(!$conn){
        die("Connection failed : " . mysqli_connect_error());
    }
    
    $sql = "CREATE DATABASE IF NOT EXISTS AttendenceRecorder";

    if( mysqli_query($conn, $sql) ){
        echo "Database Created Successfully";
        mysqli_query($conn, "USE AttendenceRecorder");

        // Create the 'user' table within the 'AttendenceRecorder' database
        $sql = "CREATE TABLE IF NOT EXISTS `user` (
            `id` int(50) NOT NULL AUTO_INCREMENT,
            `fullname` varchar(200) NOT NULL,
            `email` varchar(200) NOT NULL,
            `role` enum('teacher','student','admin') NOT NULL,
            `password` varchar(20) NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
        mysqli_query($conn, $sql);
        echo "User Table Created";

        // Inserting Values in User Table
        $sql1 = "INSERT INTO `user` (`fullname`, `email`, `role`, `password`)
        VALUES ('Fahad Satti', 'fahad@gmail.com', 'teacher', 'fahad');";
        
        $sql2 = "INSERT INTO `user` (`fullname`, `email`, `role`, `password`)
        VALUES ('Ahsan Sajjad', 'ahsan@gmail.com', 'student', 'ahsan');";

        $sql3 = "INSERT INTO `user` (`fullname`, `email`, `role`, `password`)
        VALUES ('ALi Ahmed', 'ali@gmail.com', 'student', 'ali');";

        $sql4 = "INSERT INTO `user` (`fullname`, `email`, `role`, `password`)
        VALUES ('Ahmar Sajjad', 'ahmar@gmail.com', 'student', 'ahmar');";

        $sql5 = "INSERT INTO `user` (`fullname`, `email`, `role`, `password`)
        VALUES ('Ahmed Raza', 'raza@gmail.com', 'student', 'raza');";

        mysqli_query($conn, $sql1);
        mysqli_query($conn, $sql2);
        mysqli_query($conn, $sql3);
        mysqli_query($conn, $sql4);
        mysqli_query($conn, $sql5);
        echo "Values Inserted Successfully";

    } else{
        echo "Error Creating Database : ". mysqli_error($conn); 
    }
    
    mysqli_close($conn);
?>