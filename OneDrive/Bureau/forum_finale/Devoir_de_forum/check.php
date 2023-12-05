<?php
require('conex.php');
SESSION_START();
    
$nom = $_SESSION['user_name'];

    $title = $_SESSION['titre'];
  
    $article = $_GET['article'];

    $sql2 = "SELECT idforum FROM forum WHERE title = '$title'";
    $result2 = mysqli_query($conex,$sql2);
    if($result2){
            $info_user = mysqli_fetch_array($result2,MYSQLI_ASSOC);
            $forum = $info_user['idforum'];

            $sql3 = "SELECT idUser FROM user WHERE user_name = '$nom'";
            $result3 = mysqli_query($conex,$sql3);
            if( $result3){
                $info_user3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
                $id = $info_user3['idUser'];

                $nouveau_titre = str_replace("titre","",$title);                
                $sql = "INSERT INTO forum(title,article,date_article) VALUES ('$nouveau_titre','$article',now())";
                $result = mysqli_query($conex,$sql);
                if( $result){

                    $sql5 = "SELECT idforum FROM forum WHERE article = '$article'";
                    $result5 = mysqli_query($conex,$sql5);
                    if($result5){


                        $info_user5 = mysqli_fetch_array($result5,MYSQLI_ASSOC);
                        $forum5 = $info_user5['idforum'];
                        echo "c bon.<br>";
                        $sql4 = "INSERT INTO user_has_forum(User_id_user,forum_id_forum) VALUES ($id,$forum5);";
                        $result4 = mysqli_query($conex,$sql4);
                      
                        if( $result4){
                            echo 'c encore bon';
                            
                        }
                    }
                  
                }
            }
    }


      ?>