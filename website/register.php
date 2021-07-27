<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="register.css">
    <script src="main.js"></script>
</head>

<body>
    <div id="container">
        <div id="form">
            <form action="register.php" method="POST">
                <input type="text" name="user" placeholder="email"><br><br>
                <input type="password" name="pass" placeholder="password"><br><br>
                <input type="text" name="first" placeholder="First name"><br><br>
                <input type="text" name="last" placeholder="lastname"><br><br>
                <input type="submit" value="REGISTER" name="reg"><br>
                <a href="index.php">GO BACK</a>
            </form>
        </div>
    </div>

    <?php
        include('conn.php');

        if(isset($_POST['reg'])){

            $user=mysql_real_escape_string($_POST['user']);
            $pass=mysql_real_escape_string($_POST['pass']);
            $first=mysql_real_escape_string($_POST['first']);
            $last=mysql_real_escape_string($_POST['last']);

            $hash=password_hash($pass,PASSWORD_DEFAULT);

            $query="INSERT INTO users VALUES (NULL, '$user', '$hash', '$first', '$last')";

            $result=mysqli_query($link,$query);
            
                echo 'user added';
                echo '<br>';
                echo '<a href="index.php"><input type="button" value="GO BACK"></a>';
        }//close isset
    ?>

</body>

</html>