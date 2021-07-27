<?php
    if(isset($_POST['chooseship'])){
        $id_user=$_SESSION['id_user'];
        $id_ship=$_POST['shipping'];
        $query="SELECT * FROM shipping WHERE user_ship='$id_user' AND id_ship=$id_ship";
        $result=mysqli_query($link,$query);
        $ship=mysqli_fetch_array($result);
    }

    if(isset($_POST['addship'])){
        $id_user=$_SESSION['id_user'];

        $id=mysqli_real_escape_string($link,$_POST['id']);
        $addressname=mysqli_real_escape_string($link,$_POST['addressname']);
        $fullname=mysqli_real_escape_string($link,$_POST['fullname']);
        $tel=mysqli_real_escape_string($link,$_POST['tel']);
        $address1=mysqli_real_escape_string($link,$_POST['address1']);
        $address2=mysqli_real_escape_string($link,$_POST['address2']);
        $zip=mysqli_real_escape_string($link,$_POST['zip']);
        $city=mysqli_real_escape_string($link,$_POST['city']);
        $country=mysqli_real_escape_string($link,$_POST['country']);
        $fav=mysqli_real_escape_string($link,$_POST['fav']);

        $query="UPDATE `shipping` SET `addressname_ship`='$addressname',`name_ship`='$fullname',`tel_ship`='$tel',`address1_ship`='$address1',`address2_ship`='$address2',`zip_ship`='$zip',`city_ship`='$city',`country_ship`='$country',`fav_ship`=$fav WHERE id_ship=$id";

        $result=mysqli_query($link,$query);

        $message = '<p class="goodmessage">Changed shipping details</p>';
    }
?>