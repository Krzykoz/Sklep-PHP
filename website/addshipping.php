<?php
if(!isset($_SESSION["id_user"])){
    header("Location:index.php");
    exit;
}

if(isset($_POST['addship'])){

    $id_user=$_SESSION['id_user'];

    $addressname=mysqli_real_escape_string($link,$_POST['addressname']);
    $fullname=mysqli_real_escape_string($link,$_POST['fullname']);
    $tel=mysqli_real_escape_string($link,$_POST['tel']);
    $address1=mysqli_real_escape_string($link,$_POST['address1']);
    $address2=mysqli_real_escape_string($link,$_POST['address2']);
    $zip=mysqli_real_escape_string($link,$_POST['zip']);
    $city=mysqli_real_escape_string($link,$_POST['city']);
    $country=mysqli_real_escape_string($link,$_POST['country']);

    $query="INSERT INTO shipping VALUES (NULL, '$id_user', '$addressname', '$fullname', '$tel', '$address1', '$address2', '$zip', '$city', '$country', 0)";

    $result=mysqli_query($link,$query);
}
?>