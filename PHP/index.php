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

        /*  -------------------------------------------------------------------------------------
            First Time Run this code with uncommenting following 4 rows and after that comment it
            -------------------------------------------------------------------------------------
        */  

        // include '../SQLScripts/authorizedUsers.php';
        // include '../SQLScripts/Schema.php';
        // include '../SQLScripts/populateTables.php';
        // include '../SQLScripts/attendencePopulate.php';

        include 'template.php';
        $servername = "localhost";
        $username = "root";
        $password = "123456";
        $dbname = "AttendenceRecorder";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if(!$conn){
            die("Connection failed: " . mysqli_connect_error());
        }
        else{
            // echo "Connected";
        }   
    ?>

    <?php
        // Authentication Code:
        if (isset($_GET['SignIn'])){
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $username = $_GET['email'];
                $password = $_GET['password'];
                
                // Authenticating user
                $sql = "SELECT fullname, email, password, role FROM user WHERE email='$username' AND password='$password'";
                $user = mysqli_query($conn, $sql);

                // For no responce returned as a result of query
                if(mysqli_num_rows($user) == 0){
                    echo "Invalid Credentials";
                } 
                // For some responce returned as a result of query
                else{
                    $userData = mysqli_fetch_assoc($user);
                    session_start();
                    $_SESSION['user'] = $userData;
                    if($userData['role'] == 'teacher'){
                        header("Location:teacherView.php");
                    } else{
                        header("Location:studentView.php");
                    }
                }
    
            }
        }
    ?>

    <div class="container">
        <h1>Attendance Recorder</h1>
        <form method="GET" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="email" placeholder="Enter your email or username">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password">

            <input type="submit" name="SignIn">
        </form>
    </div>
    
    <?php     
        mysqli_close($conn);
    ?>

    <footer>
        &copy; 2023 Attendance Management System
    </footer>
</body>
</html>
