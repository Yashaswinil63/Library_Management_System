<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="CSS/home.css">
    <style>
        /* Add any additional CSS styles here */
        body {
            text-align: center;
        }
        .title {
            margin-top: 20px;
        }
        .submit-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .submit-button {
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="title">
        <h1>RUAS LIBRARY MANAGEMENT SYSTEM</h1>
        <br><br>
    </div>

    <div class="logout">
        <form align="right" name="form1" method="post" action="log_out.php">
            <label>
                <input name="submit2" type="submit" id="submit2" value="Log Out">
            </label>
        </form>
    </div>

    <div class="submit-container">
        <form action="reserve.php">
            <input type="submit" value="Reserve Book" class="submit-button">
        </form>
        <form action="return.php">
            <input type="submit" value="Return Book" class="submit-button">
        </form>
        <form action="display.php">
            <input type="submit" value="Display Book" class="submit-button">
        </form>
        <form action="search.php">
            <input type="submit" name="searching" value="Search" class="submit-button">
        </form>
    </div>
</body>
</html>
