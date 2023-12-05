<?php
require('conex.php');

SESSION_START();
$_SESSION['user_name'] = "$user";
$sql  = "SELECT * FROM user ORDER BY idUser";
$result =  mysqli_query($conex, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="home.php">Home</a>
        <h1>Devenir membre</h1>
    </nav>
    
    <form action="data.php" method="post">
        <label> Nom :
            <input name="name" type="text">
        </label>
        <label> User Name :
            <input name="user_name" type="email">
        </label>
        <label> Password :
            <input name="password" type="password">
        </label>
        <label> Naissance :
            <input name="birthday" type="date">
        </label>
        <input type="submit" value="Save">
    </form>
</body>
</html>