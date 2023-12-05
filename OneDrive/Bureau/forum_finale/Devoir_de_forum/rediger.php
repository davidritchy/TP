<?php
    SESSION_START(); 
    require('conex.php');
   
    $nom = $_GET['user_name'];
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
        <a href="home.php?user_name=<?=$nom?>">home</a>
        <h1>Rediger une article</h1>
    </nav>
    
    <form action="check2.php?user_name=<?=$nom?>" method="POST">
        <label for="">titre de l'article 
            <input type="text" name="title" required>
        </label>
        <textarea name="article" id="" cols="30" rows="10" required></textarea>
        <input type="submit">
    </form>
    
    <div>
        <p><?=$_GET['user_name'];?></p>
    </div>
</body>
</html>