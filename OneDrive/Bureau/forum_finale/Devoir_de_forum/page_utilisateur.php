<?php 
   SESSION_START();
    require('conex.php');
     $user = $_GET['user_name'];
   $_SESSION['user_name']=$user;

   
    $sql1 = "SELECT * FROM user WHERE user_name = '$user'";
    $result1 = mysqli_query($conex,$sql1);
    if($result1){
        $info_user = mysqli_fetch_array($result1,MYSQLI_ASSOC);    
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
        <a href="home.php?user_name=<?=$user?>">Home</a>
    </nav>
    <h1>Bienvenue sur ta page <?= $info_user['name']; ?></h1>
    <p>MES ARTICLES</p>
    <?php
   
   $sql = "SELECT * FROM user  inner  JOIN user_has_forum
   ON (User_id_user = idUser) inner JOIN forum ON
   (idforum = forum_id_forum) WHERE user_name = 
   '$user'";

    $result = mysqli_query($conex, $sql);

if($result){
   foreach($result as $row){
    $nouveau_titre = " ";
    if(str_contains($row['title'],"titre")){
        $nouveau_titre = str_replace("titre","",$row['title']);
    ?>
    <ul>
        <li><a href="article.php?title=<?= $row['title']?>&date_article=<?= $row['date_article']?>">titre : <?= $nouveau_titre; ?> / date : <?= $row['date_article'];?></a></li>
        <a href="cancel.php?title=<?=$row['title']?>">Supprimer</a>
    </ul>
    
<?php
}
        } 
    }
}
   ?>
    <a href="rediger.php?user_name=<?=$user?>">Ecrire une article</a>
</body>
</html>