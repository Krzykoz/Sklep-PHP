<?php
if(isset($_POST["detailschange"])){
        $id_user=$_SESSION['id_user'];

            $email=mysql_real_escape_string($_POST['email']);
            $pass=mysql_real_escape_string($_POST['pass']);
            $first=mysql_real_escape_string($_POST['first']);
            $last=mysql_real_escape_string($_POST['last']);
    
    
            $query="SELECT * FROM users WHERE id_user='$id_user'";

            $result=mysqli_query($link,$query);
            $rows=mysqli_num_rows($result);
            $info=mysqli_fetch_array($result);
            if($rows==1){
                if(password_verify($pass,$info['pass_user'])){
                    $query="UPDATE users SET email_user= '$email', first_user= '$first', last_user='$last' WHERE id_user=$id_user";
                    $result=mysqli_query($link,$query);
                    $message = '<p class="goodmessage">Changed user details</p>';
                }
                else{
                    $message = '<p class="errormessage">Wrong password</p>';
                }
        }
}

if(isset($_POST["passchange"])){
    $id_user=$_SESSION['id_user'];

    $pass=mysql_real_escape_string($_POST['pass']);
    $newpass1=mysql_real_escape_string($_POST['newpass1']);
    $newpass2=mysql_real_escape_string($_POST['newpass2']);

    $query="SELECT * FROM users WHERE id_user='$id_user'";

    $result=mysqli_query($link,$query);
    $rows=mysqli_num_rows($result);
    $info=mysqli_fetch_array($result);

    if($rows==1){
        if(password_verify($pass,$info['pass_user'])){
            if($newpass1==$newpass2){
                $hash=password_hash($newpass1,PASSWORD_DEFAULT);
                $query="UPDATE users SET pass_user='$hash' WHERE id_user=$id_user";
                $result=mysqli_query($link,$query);
                $message = '<p class="goodmessage">Changed password</p>';
            }
            else{
                $message = '<p class="errormessage">Passwords are not the same</p>';
            }
        }
        else{
            $message = '<p class="errormessage">Wrong password</p>';
        }
    }
}
?>