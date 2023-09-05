<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> Displaying Available books </title>
        <link rel="stylesheet"  href="CSS/display.css">
    </head>
    
    <body>
        <div class="title">
            <h1> RUAS LIBRARY MANAGEMENT SYSTEM </h1>
        </div>
        <br>
        <br>
        
        
        
        <div class="display">
        <?php
        session_start();
        if($_SESSION["Username"]){
        ?> 
        Welcome <?php echo $_SESSION["Username"];
        }
        $con = mysqli_connect("localhost","root","","lms_system");
        if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
        $sql="select * from books where USN = 0 ";                    
        $result=mysqli_query($con,$sql);
                echo "<table style='width:50%' border='1'>
                        <caption> List of Books in library </caption>
                        <tr>
                        <th>book_id</th>
                        <th>title</th>
                        <th>author</th>                        
                        </tr>";
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td><center>".$row["Book_Id"]."</center></td>";
                                echo "<td><center>".$row["Book_Name"]."</center></td>";
                                echo "<td><center>".$row["Author_Name"]."</center></td>";
                                echo "</tr>";
                                continue;
                                }
                            }
                        else{
                                echo '<script>alert("error");</script>';
                            }
                      
        ?>
        
        
    </body>
</html>
