<?php
    require('conex.php');
    
    $password = $_POST['password'];
    $user = $_POST['user_name'];

    SESSION_START();
    $_SESSION['user_name']=$user;

    foreach($_POST as $key=>$value){
        $$key = mysqli_real_escape_string($conex, $value);
    }

    $sql = "SELECT * FROM user WHERE user_name = '$user'";

    $result = mysqli_query($conex, $sql);

   
    $count = mysqli_num_rows($result);
    if($count == 1){
  
    $info_user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $info_user['password'];
   
    if($password == $info_user['password']){
         //echo "ok";
         header('location:page_utilisateur.php?user_name='.$user);
    }else{
        header('location:login.php?msg=2');
    }

    }else{
    header('location:login.php?msg=1');
    }
?>