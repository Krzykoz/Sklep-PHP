<div id="items">
    <?php
        if(!isset($_SESSION["id_user"])){
            $incartmessage = '<p class="errormessage">Please log in to access shipping page</p>';
            if(isset($incartmessage)){
                echo $incartmessage;
            }
            exit;
        }

        $id_user=$_SESSION['id_user'];

        $query="SELECT * FROM shipping WHERE user_ship='$id_user'";
        $result=mysqli_query($link,$query);
        $rows=mysqli_num_rows($result);
        if($rows>0){
            echo '<div class="hpprod">';
            echo '<form method="POST" action="shipping.php">';
            echo '<select name="shipping">';
            echo '<option value="0">CHOOSE ADDRESS</option>';
            while ($info=mysqli_fetch_array($result)) {
                echo '<option value="'.$info['id_ship'].'">'.$info['addressname_ship'].'</option>';
            }
            echo '</select>';
            echo '<input type="submit" name="chooseship" value="CHOOSE SHIPPING">';
            echo '</form>';
            //
            if(isset($ship)){
            echo '<form method="POST" action="shipping.php" required>';
            echo '<div class="shipping">';
            echo '<p>'.$ship['addressname_ship'].'</p>';
            echo '<input type="text" name="addressname" value="'.$ship['addressname_ship'].'" required>';
            echo '<input type="text" name="fullname" value="'.$ship['name_ship'].'" required>';
            echo '<input type="text" name="tel" value="'.$ship['tel_ship'].'" required>';
            echo '<input type="text" name="address1" value="'.$ship['address1_ship'].'" required>';
            echo '<input type="text" name="address2" value="'.$ship['address2_ship'].'">';
            echo '<input type="text" name="zip" value="'.$ship['zip_ship'].'" required>';
            echo '<input type="text" name="city" value="'.$ship['city_ship'].'" required>';
            echo '<input type="text" name="country" value="'.$ship['country_ship'].'" required>';
            if($ship['fav_ship']==1){
                echo 'FAVORITE <input type=checkbox value="1" name="fav" checked>';
            }
            else{
            echo 'FAVORITE <input type=checkbox value="1" name="fav">';
            }
            echo '<input type="hidden" name="id" value="'.$ship['id_ship'].'" required>';
            echo '<input type="submit" name="addship" value="CHANGE SHIPPING ADDRESS"';
            echo '</div>';
            echo '</div>'; 
            echo '</form>';
            }
            //
            echo '</div>';
            //
            
        }
    ?>
</div>