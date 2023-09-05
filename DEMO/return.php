<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Return Book</title>
        <link rel="stylesheet"  href="CSS/return.css">
    </head>
    <body>
        <div class="title" text-align="center">
            <h1 > RUAS LIBRARY MANAGEMENT SYSTEM <br><br><br><br><br></h1>
        </div>
        <div class="form">
            <form role="form" id="templatemo-preferences-form" name="reservation" action="" method="post">
            <div class="center">
            <input type="text" id="reserve" placeholder="Enter Book ID" name="bookid" required align="center"><br/>
            <br/>
            <button type="submit"  name="Return" value="Return" align="center" >Return</button>
             </div>
        </form>
        </div>
        <?php
        
       
            
         
        $con = mysqli_connect("localhost","root","","lms_system");
        if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    session_start();
                    $user_id=$_SESSION['Username'];
                    $sql1="select USN_Id from registration where Reg_Id='$user_id'";
                    $result1=mysqli_query($con,$sql1);
                    if ($row = mysqli_fetch_assoc($result1)) {
                        $column_value = $row['USN_Id'];
                    }
                    $sql01="select  Book_Id from books where USN='$column_value'";
                    $result01=mysqli_query($con,$sql01);
                    echo "<table style='width:50%' border='1'>
                        <caption> Books you own are </caption>
                        <tr>
                        <th>book_id</th>
                        </tr>";
                        while($row1=mysqli_fetch_assoc($result01)){
                                echo "<tr>";
                                echo "<td><center>".$row1["Book_Id"]."</center></td>";
                                echo "</tr>";
                                continue;
                        }
if (isset($_POST['Return'])) {
    $bookid = $_POST['bookid'];
    $con = mysqli_connect("localhost", "root", "", "lms_system");
    
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
        $user_id = $_SESSION['Username'];
        
        // Check if the book is owned by the user
        $sqlCheckOwnership = "SELECT USN FROM books WHERE book_id = '$bookid'";
        $resultCheckOwnership = mysqli_query($con, $sqlCheckOwnership);
        
        if ($rowCheckOwnership = mysqli_fetch_assoc($resultCheckOwnership)) {
            $ownerUSN = $rowCheckOwnership['USN'];
            
            if ($ownerUSN === '0') {
                echo '<script>alert("You have not reserved this book to return");</script>';
            } else {
                $sqlDeleteBook = "DELETE FROM books WHERE book_id = '$bookid'";
                if (mysqli_query($con, $sqlDeleteBook)) {
                    echo '<script>alert("Book returned and record deleted successfully");</script>';
                } else {
                    echo '<script>alert("Error deleting record");</script>';
                }
            }
        } else {
            echo '<script>alert("Book not found or you do not own this book");</script>';
        }
    }
}

            ?>
        
    </body>
</html>
