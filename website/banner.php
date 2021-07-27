<div id="banner">
            <div id="hmenu">
                <div id="bannerMenu">
                <?php
                    if(isset($_SESSION['email'])){

                        $query="SELECT SUM(qt_cart) AS qtsum FROM `cart`WHERE userid_cart=$_SESSION[id_user]";
                        $result=mysqli_query($link,$query);
                        $info=mysqli_fetch_array($result);

                        $qtsum=$info['qtsum'];
                        
                        echo 'Hi ';
                        echo $_SESSION['first'];
                        echo " ";
                        if($qtsum<=0){
                            echo '<a href="cart.php"><input type="button" value="CART"></a>';
                        }
                        else{
                            echo '<a href="cart.php"><input type="button" value="CART: '.$qtsum.'"></a>';   
                        }
                        echo " ";
                        echo '<a href="account.php"><input type="button" value="ACCOUNT"></a>';
                        echo " ";
                        echo '<a href="logout.php"><input type="button" value="LOGOUT"></a>';
                    }
                    else{
                        echo '<form action="login.php" method="POST"><input type="text" name="user" placeholder="Email"><input type="password" name="pass" placeholder="Password"><input type="submit" name="login" value="LOGIN"></form>';
                        if(isset($_SESSION['wrong'])){
                            echo $_SESSION['wrong'];
                            $_SESSION['wrong']=null;
                        }
                        echo ' OR <a href="register.php">REGISTER</a>';
                    }
                ?>
                </div>
            </div>
            <a href="index.php" id="bannertext"><h1 style="margin:0">"STORE"</h1></a>
        </div>