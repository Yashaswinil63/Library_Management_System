<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> Reserve Book </title>
        <link rel="stylesheet"  href="CSS/reserve.css">
    </head>
    <body>
        <div class="title" text-align="center">
            <h1 > RUAS LIBRARY MANAGEMENT SYSTEM <br><br><br><br><br> </h1>
        </div>
        <div class="form">
            <form role="form" id="templatemo-preferences-form" name="reservation" 
                  action="" method="post">
                <div class="center_container">

                    <input type="text" id="reserve" placeholder="Enter Book ID" 
                           name="bookid" required class="center" align="center" >
                    <br/><br/>
                    <button type="submit"  name="Reserve" value="Reserve" 
                            class="center" align="center" >Reserve</button>
                </div>
            </form>
        </div>
    </body>
    <?php
    if (isset($_POST['Reserve'])) {
        $bookid = $_POST['bookid'];
        $con = mysqli_connect("localhost", "root", "", "lms_system");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        session_start();
        $user_id = $_SESSION['Username'];
        $sql1 = "select USN_Id from registration where Reg_Id='$user_id'";
        $result1 = mysqli_query($con, $sql1);
        if ($row = mysqli_fetch_assoc($result1)) {
            $column_value = $row['USN_Id'];
        }
        $sql2 = "select USN from books where book_id='$bookid'";
        $result2 = mysqli_query($con, $sql2);
        if ($row = mysqli_fetch_assoc($result2)) {
            $USN_Value = $row['USN'];
        }
        if ($USN_Value == '0') {
            $sql = "UPDATE books SET USN='$column_value' Where book_id = '$bookid'  ";
            if (mysqli_query($con, $sql)) {
                // Record was updated successfully
                echo '<script>alert("Your book is reserved");</script>';
            } else {
                // Error updating the record
                echo '<script>alert("Error Updating Record");</script>';
            }
        } else {
            echo '<script>alert("This book is already reserved");</script>';
        }
    }
    ?>

</html>
