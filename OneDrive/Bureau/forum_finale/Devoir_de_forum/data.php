<?php
require('conex.php');

$nom = $_POST['name'];
$user = $_POST['user_name'];
$password = $_POST['password'];
$date_naissance = $_POST['birthday'];


 $sql = "INSERT INTO user (name, user_name, password,birthday) VALUES ('$nom', '$user', '$password','$date_naissance')";

if(mysqli_query($conex, $sql)){
    echo "Success";
    header("location:page_utilisateur.php?user_name=".$user);
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conex);
}

?>