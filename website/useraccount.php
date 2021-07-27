<div id="items">
    <?php
        if(!isset($_SESSION["id_user"])){
            $incartmessage = '<p class="errormessage">Please log in to access account page</p>';
            if(isset($incartmessage)){
                echo $incartmessage;
            }
            exit;
        }

        $id_user=$_SESSION['id_user'];
        $query="SELECT * FROM users WHERE id_user='$id_user'";

        $result=mysqli_query($link,$query);

        $rows=mysqli_num_rows($result);

        $info=mysqli_fetch_array($result);
        if($rows==1){
            //change details
            echo '<div class="hpprod">';
            echo '<form method="POST" action="account.php">';
            echo 'EMAIL:';
            echo '<br>';
            echo '<input type="text" name="email" value="'.$info['email_user'].'" required>';
            echo '<br><br>';
            echo 'FIRST NAME:';
            echo '<br>';
            echo '<input type="text" name="first" value="'.$info['first_user'].'" required>';
            echo '<br><br>';
            echo 'LAST NAME:';
            echo '<br>';
            echo '<input type="text" name="last" value="'.$info['last_user'].'" required>';
            echo '<br><br>';
            echo 'CURENNT PASSWORD:';
            echo '<br>';
            echo '<input type="password" name="pass" required>';
            echo '<br><br>';
            echo '<input type="submit" name="detailschange" value="CHANGE DETAILS">';
            echo '</form>';
            echo '</div>';
            //end change details

            //change password
            echo '<div class="hpprod">';
            echo '<form method="POST" action="account.php">';
            echo 'NEW PASSWORD:';
            echo '<br>';
            echo '<input type="password" name="newpass1" required>';
            echo '<br><br>';
            echo 'CONFIRM NEW PASSWORD:';
            echo '<br>';
            echo '<input type="password" name="newpass2" required>';
            echo '<br><br>';
            echo 'CURENNT PASSWORD:';
            echo '<br>';
            echo '<input type="password" name="pass" required>';
            echo '<br><br>';
            echo '<input type="submit" name="passchange" value="CHANGE PASSWORD">';
            echo '</form>';
            echo '</div>';
        }
    ?>
</div>