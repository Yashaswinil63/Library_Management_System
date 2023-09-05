<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php include('server.php') ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Sign Up </title>
        <link rel="stylesheet"  href="CSS/signup.css">
    </head>
    <body>
        <div class="title">
            <h1> RUAS LIBRARY MANAGEMENT SYSTEM </h1>
        </div>
        <div class="center"> <!-- it is a section of html which is then used to style with css or used in JS -->
            <h1> Sign Up </h1>
            <form method="post">

                <div class="txt_field">
                    <input type="text" required name='USN'> <!-- it is a boolean attribute specifies input must be present before submit -->
                    <label> USN </label>
                </div> 
                <div class="txt_field">
                    <input type="text" required name='Username'> <!-- it is a boolean attribute specifies input must be present before submit -->
                    <label> Username </label>
                </div>

                <div class="txt_field">
                    <input type="password" required name='password'> <!-- it is a boolean attribute specifies input must be present before submit -->
                    <span></span>
                    <label> Password </label>
                </div>

                <input type="submit" value='Register'> <!-- login button -->

            </form>
        </div>

        <?php
        $Reg_Id = $Password = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Reg_Id = $_POST['Username'];
            $Password = $_POST['password'];
            $USN = $_POST['USN'];

            $con = mysqli_connect("localhost", "root", "", "lms_system");
            //username: root, password: Yashaswini
            $query1 = "SELECT Stu_Id FROM `student` WHERE Stu_Id='USN'";
            $result1 = mysqli_query($con, $query1);
            if ($result1) {
                echo $USN;
                $query = "INSERT INTO `registration` (Reg_Id, Password, USN_Id) VALUES ('$Reg_Id','$Password','$USN')";
                $result = mysqli_query($con, $query);
                if ($result) {
                    echo '<script>alert("Registration successful");</script>';
                } else {
                    echo '<script>alert("Registration failed");</script>';
                }
            }
        }
        ?>
    </body>
</html>
