<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<?php include('server.php') ?> <!-- to connect to database -->
<html>
    <head>
        <meta charset="UTF-8">
        <title> Login Page </title>
        <link rel="stylesheet"  href="CSS/login.css">
    </head>
    <body>
        <div class="title" >
            <h1> RUAS LIBRARY MANAGEMENT SYSTEM </h1>
        </div>
        <div class="center"> <!-- it is a section of html which is then used to style with css or used in JS -->
            <h1> Login </h1>
            <form method="post">
                <div class="txt_field">
                    <input type="text" required name='Username'> <!-- it is a boolean attribute specifies input must be present before submit -->
                    <label> Username </label>
                </div>

                <div class="txt_field">
                    <input type="password" required name='password'> <!-- it is a boolean attribute specifies input must be present before submit -->
                    <span></span>
                    <label> Password </label>
                </div>
                <input type="submit" value='Login' name='submit'> <!-- login button -->
                <div class='sign_up'>
                    <a href= 'signup.php'> Register </a>
                </div>
            </form>

        </div>

        <?php
        // put your code here
        if (isset($_POST['submit'])) {
            $Reg_Id = $_POST['Username'];
            $password = $_POST['password']; //get data from input and store it in local variable

            $con = mysqli_connect("localhost", "root", "", "lms_system");
            //where the application is running, now it is running in local server and 
            //its domain name is called localhost
            if (mysqli_connect_errno()) { //if connection failed
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }


            $query = "SELECT Reg_Id, Password FROM registration WHERE Reg_Id='$Reg_Id' and Password='$password'";
            $result = mysqli_query($con, $query);
            //if there is a row with matching query
            if ($result) {
                //if (mysqli_num_rows($result) > 0) {//make sure there is atleast one row in a database
                    //if atleast one entry present start session
                    session_start();
                    $_SESSION['Username'] = $Reg_Id;

                    header("Location: home.php");
                //} else {
                    //echo '<script>alert("Invalid Credentials");</script>';
                //}
            } else {
                echo'<script>alert("Invalid Credentials");</script>';
            }
        }
        ?>

    </body>
</html>
