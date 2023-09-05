<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF">
        <title>Search</title>
        <link rel="stylesheet" href="CSS/search.css">
    </head>
    <body>
        <div class="title" text-align="center">
            <h1 > RUAS LIBRARY MANAGEMENT SYSTEM <br><br><br><br><br></h1>
        </div>
        
        <?php
        if (isset($_POST['search'])) {
        $name = $_POST['searching'];     
        $con = mysqli_connect("localhost","root","","lms_system");
        if (mysqli_connect_errno())
                    {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
        $sql="select * from books where Book_Name LIKE '%$name%' and USN='0'  ";                    
        $result=mysqli_query($con,$sql);
                echo "<table style='width:50%' border='1'>
                        <caption>List of available books</caption>
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
                                }
                        }
                            else{
                                echo "Book not found";
                            }
                            
                            }
              
        ?>
        <div class="form">
        <form role="form" id="templatemo-preferences-form" name="Search" action="" method="post" >
            
                <input type="text" id="search" placeholder="Enter the title" 
                       class="submit-button" name="searching" required><br/>
           
            <button type="submit"  name="search" 
                    value="Search"  class="submit-button">Search</button>
             
        </form>
            <div>
    </body>
</html>
