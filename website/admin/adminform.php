<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['awrong'])){
    echo $_SESSION['awrong'];
    $_SESSION['awrong']=null;
    }
     
    ?>
    <form method="POST" action="adminlogin.php">
        <input type="text" placeholder="login" name="alogin">
        <input type="password" placeholder="password" name="apass">
        <input type="submit" value="LOGIN" name="aclick">
        
    </form>
</body>
</html>