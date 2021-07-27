<?php

if(isset($_POST['login'])){
    $user=mysql_real_escape_string($_POST['user']);

    include('conn.php');

    $query="SELECT * FROM users WHERE email_user='$user'";

    $result=mysqli_query($link,$query);

    $rows=mysqli_num_rows($result);

    $info=mysqli_fetch_array($result);
    
    
    if($rows==1){
        $pass=mysql_real_escape_string($_POST['pass']); 
        if(password_verify($pass,$info['pass_user'])){
            $_SESSION['email']=$info['email_user'];
            $_SESSION['first']=$info['first_user'];
            $_SESSION['id_user']=$info['id_user'];
            header("Location:index.php");
             exit;
        }
        else{
            $_SESSION['wrong']="Wrong Password";
            header("Location:index.php");
            exit;
        }

    }else{
        $info=mysqli_fetch_array($result);
        $_SESSION['wrong']="Wrong Email";
        header("Location:index.php");
        exit;
    }
    }

?>