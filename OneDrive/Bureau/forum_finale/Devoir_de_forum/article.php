<?php
 
require('conex.php');
SESSION_START();

$nom = $_SESSION['user_name'];

//echo $nom;


$date = $_GET['date_article'];


$titre = $_GET['title'];
$nouveau_titre = str_replace("titre","",$titre);
$_SESSION['titre'] = $titre;


$sql2 = "SELECT idforum,article FROM forum WHERE title ='$titre' AND date_article= '$date' ";
$result2 = mysqli_query($conex,$sql2);

if($result2){
    $info_user2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
    $forum = $info_user2['idforum'];
    $com = $info_user2['article'];
  
 
    $sql1 = "SELECT date_article FROM forum WHERE title = '$titre' 
    AND idforum = $forum ";
    $result1 = mysqli_query($conex,$sql1);
    if($result1){
        $info_user1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);
        $date_info = $info_user1['date_article'];
     

    $sql = "SELECT * FROM user RIGHT OUTER JOIN user_has_forum
    on (idUser = User_id_user) RIGHT OUTER JOIN forum ON
    (idforum = forum_id_forum) WHERE title = '$nouveau_titre';";
    $result = mysqli_query($conex,$sql);

    if($result){
            $info_user = mysqli_fetch_array($result,MYSQLI_ASSOC);

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
   
<div>
    <nav>
    
    <a href="page_utilisateur.php?user_name=<?=$nom?>">Retour sur ma page</a>
    </nav>
        <h1><?= $nouveau_titre;?></h1>
       
        <p><?= $com;?></p>
        
        <form action="check.php?title = '<?= $titre?>'>" method = GET>
            <label for=>Laissez un commentaire:
            <textarea name="article" id="" cols="30" rows="10" required></textarea>
            <input type="submit" value="envoyer">
            </label>
        </form>
        <?php
            foreach($result as $row){
           
        ?>
            <h4><?= $row['name']?></h4>
            <p>  <?= $row['article'];?></p>
    </div>

    <?php
        }


       }
    
    }
}
    ?>
   
</body>
</html>