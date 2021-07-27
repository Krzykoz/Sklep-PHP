<?php

if(isset($_POST['alogin'])){
    $alogin=mysql_real_escape_string($_POST['alogin']);
    $apass=mysql_real_escape_string($_POST['apass']);

    include('conn.php');

    $query="SELECT * FROM admins WHERE login_admin='$alogin' AND pass_admin='$apass'";

    $result=mysqli_query($link,$query);

    $rows=mysqli_num_rows($result);

    session_start();
    if($rows==1){
       $info=mysqli_fetch_array($result);
       $_SESSION['alogin']=$alogin;
       $_SESSION['admin']=1;
       header("Location:products.php");
        exit;

    }else{
        $info=mysqli_fetch_array($result);
        $_SESSION['awrong']="Login problem";
        header("Location:adminform.php");
        exit;
    }
    }

?>