<div id="items">
    <?php 

        if(isset($addcartmessage)){
            echo $addcartmessage;
        }

        $query_cats="SELECT id_cat FROM categories";
        $result_cats=mysqli_query($link, $query_cats);
        $table_cats=array();
        while($cats_info=mysqli_fetch_array($result_cats)){
            array_push($table_cats,$cats_info['id_cat']);
        }

        if(isset($_GET['all'])){
            $query="SELECT * FROM products AS P LEFT JOIN  categories as C ON P.cat_prod=C.id_cat WHERE stock_prod>0";
        }
        elseif(isset($_GET['id_cat']) && in_array($_GET['id_cat'], $table_cats)){
            $query="SELECT * FROM products AS P LEFT JOIN  categories as C ON P.cat_prod=C.id_cat WHERE stock_prod>0 AND P.cat_prod=$_GET[id_cat]";
        }
        else{
            $query="SELECT * FROM products AS P LEFT JOIN  categories as C ON P.cat_prod=C.id_cat WHERE stock_prod>0 AND P.home_prod";
        }
         
        if(isset($_POST['s_string']) && !empty($_POST['s_string'])){
            $s_string=$_POST['s_string'];
            $temp_query="SELECT * FROM products AS P LEFT JOIN  categories as C ON P.cat_prod=C.id_cat  WHERE stock_prod>0 AND P.name_prod LIKE '%$s_string%' OR P.desc_prod LIKE '%$s_string%'";
            $temp_result=mysqli_query($link,$temp_query);
            $temp_rows=mysqli_num_rows($temp_result);
    
            if($temp_rows>0){
                $query=$temp_query;
            }
            else{
                echo '<p class="errormessage">There where none products found :( </p>';
                $query="SELECT * FROM products AS P LEFT JOIN  categories as C ON P.cat_prod=C.id_cat WHERE stock_prod>0";
            }
        }
        $result=mysqli_query($link,$query);
        $rows=mysqli_num_rows($result);

        if($rows>0){
            while ($prod=mysqli_fetch_array($result)) {
                echo '<div class="hpprod">';
                echo $prod['name_prod']."<br>";
                echo $prod['name_cat']."<br><br>";
                echo '<img height="150px" width="200px" src="images/'.$prod['img_prod'].'" >';
                echo '<br>';
                echo $prod['desc_prod']."<br>";
                echo $prod['color_prod']."<br>";
                echo ' Price: <b>'.$prod['price_prod'].' </b><i class="fa fa-eur"></i> <br>';
                echo '<form method="POST" action="index.php">';
                echo '<button type="submit" class="buy" name="buy" value="'.$prod['id_prod'].'"><i class="fas fa-cart-plus"></i> ADD TO CART</button>';
                echo '</form>';
                echo '</div>';
            }
            echo '</select>';
        }
        else{
            echo '<p class="errormessage">There where none products found :( </p>';
        }
                
    ?>
</div>