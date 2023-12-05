<?php

require ('conex.php');

$titre = $_GET['title'];

$sql = "SELECT idforum FROM forum where title = '$titre' ";
$result = mysqli_query($conex,$sql);

if($result){
    $info_user = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $idforum = $info_user['idforum'];
    $sql1 = "DELETE FROM user_has_forum WHERE forum_id_forum
    = $idforum";
    $result1 = mysqli_query($conex,$sql1);
    if($result1){
        $sql3 = "DELETE FROM forum WHERE title = '$titre' ";
        $result3 = mysqli_query($conex,$sql3);
        if($result3){
            echo "c bon.";
        } 
    }
}

?>