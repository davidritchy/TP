<?php

require('conex.php');
$nom = $_GET['user_name'];
    


echo $nom;

if(isset($_POST['title']) && isset($_POST['article']) ){

$tag = "titre";
$titre=$_POST['title'].$tag;
$article = $_POST['article'];


$sql = "INSERT INTO forum(title,article,date_article) VALUES ('$titre','$article',now())";
$result = mysqli_query($conex,$sql);
if($result){

  $sql2 = "SELECT idforum FROM forum WHERE title = '$titre'";
  $result2 = mysqli_query($conex,$sql2);
  $count2 = mysqli_num_rows($result2);
  if($result2){
      $info_user2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
      $forum = $info_user2['idforum'];
      
      $sql3 = "SELECT idUser FROM user WHERE user_name = '$nom'";
      $result3 = mysqli_query($conex,$sql3);
      $count3 = mysqli_num_rows($result3);
      if($result3){
          $info_user3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
          $id = $info_user3['idUser'];
         
          $sql4 = "INSERT INTO user_has_forum(User_id_user,forum_id_forum) VALUES ($id,$forum);";
          $result4 = mysqli_query($conex,$sql4);

          header('location:page_utilisateur.php?user_name='.$nom);
          
            
          }
      }
  }
}
?>