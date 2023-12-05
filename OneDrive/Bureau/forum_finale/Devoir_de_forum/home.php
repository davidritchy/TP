<?php
SESSION_START();
require('conex.php');

$sql = "SELECT title,article,date_article,name FROM user INNER JOIN user_has_forum ON (idUser = User_id_user) INNER JOIN forum ON
(idforum = forum_id_forum) ORDER BY date_article DESC;";

$result = mysqli_query($conex,$sql);

 $nom = $_GET["user_name"];
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
        <a href="page_utilisateur.php?user_name=<?=$nom?>">retour sur ma page</a>
        <a href="se_connecter.php">Connexion</a>
        <a href="creer.php">Devenir membre</a>
    </nav>
    <h1>Home</h1>
    <h2>Bienvenue sur le forum</h2>
    <p>Si c'est votre premiere fois,creer un compte pour ecrire des articles et les partager..</p>
    <h3>Articles</h3>
    <?php
    
    if($result){

            foreach($result as $row){
                
    if(str_contains($row['title'],"titre")){
         
        $nouveau_titre = str_replace("titre","",$row['title']);
    ?>
    <ul>
        <li><a href="article.php?title=<?= $row['title']?>&date_article=<?= $row['date_article']?>">Titre : <?= $nouveau_titre; ?>- date : <?= $row['date_article']; ?>- Name : <?= $row['name'];?></a></li>
    </ul>
    <?php
            }
        }
    }
    ?>
</body>
</html>