<div id="checkoutcontainer">
<?php
    if(!isset($_SESSION["id_user"])){
        $incartmessage = '<p class="errormessage">Please log in to access cart</p>';
        exit;
    }
    if(isset($incartmessage)){
        echo $incartmessage;
    }

    $shipping = 10;

	$id_user=$_SESSION['id_user'];
	
	$query="SELECT * FROM cart AS C LEFT JOIN  products as P ON C.prod_cart=P.id_prod WHERE C.userid_cart=$id_user AND qt_cart>0";
    $result=mysqli_query($link,$query);
    $rows=mysqli_num_rows($result);

    $sumprice=0;

    $itemnumber=0;

    if($rows>0){
        echo '<div class="checkoutprod">';
        while ($cart=mysqli_fetch_array($result)) {
            $itemnumber++;
            $price=$cart['price_prod']*$cart['qt_cart'];
            $sumprice=$sumprice+$price;
            echo '<div class="checkoutcontent">';
            echo $itemnumber.'. ';
            echo $cart['name_prod'].", ";
            echo 'Color: '.$cart['color_prod'].", ";
            echo 'Amount: '.$cart['qt_cart'].', ';
            echo ' Cost: <b>'.$price.' </b> <i class="fa fa-eur"></i> ';
            echo '</div>';
        }
        $totalprice=$sumprice+$shipping;
        echo '<div class="checkoutcontent">';
        echo 'SHIPPING: '.$shipping.' EUR';
        echo '</div>';
        echo '</div>';
    
    //shipping
    
        $query="SELECT * FROM shipping WHERE user_ship=$id_user ORDER BY `shipping`.`fav_ship` DESC";
        $result=mysqli_query($link,$query);
        $rows=mysqli_num_rows($result);

        if($rows>0 && !isset($_POST['ornew'])){
            echo '<div class="shipping">';
            echo '<form method="POST" action="checkout.php">';
            echo '<input type="submit" name="ornew" value="ADD NEW ADDRESS">';
            echo '</form>';
            echo '<form method="POST" action="ordered.php" required>';
            echo "CHOOSE SHIPPING ADDRESS: "; 
            echo '<select name="shipping">';

                while ($ship=mysqli_fetch_array($result)) {
                echo '<option value="'.$ship['id_ship'].'">'.$ship['addressname_ship'].'</option>';
                }
            echo '</select>';
            echo '</div>';
            echo '<form method="POST" action="ordered.php" required>';
            echo '<div id="checkoutfinal">';
            echo 'Total: '.$totalprice.' EUR';
            echo '<input type="hidden" name="totalcost" value="'.$totalprice.'">';
            echo '<input type="hidden" name="prodcost" value="'.$sumprice.'">';
            echo '<input type="hidden" name="shipcost" value="'.$shipping.'">';
            echo '<input type="submit" name="buy" value="BUY PRODUCTS">';
            echo '</form>';
            echo '</div>';
            }
        else{
            echo '<form method="POST" action="checkout.php" required>';
            echo '<div class="shipping">';
            echo '<input type="text" name="addressname" placeholder="Shipping adress name" required>';
            echo '<input type="text" name="fullname" placeholder="Full Name" required>';
            echo '<input type="text" name="tel" placeholder="Telephone number" required>';
            echo '<input type="text" name="address1" placeholder="Address 1" required>';
            echo '<input type="text" name="address2" placeholder="Address 2">';
            echo '<input type="text" name="zip" placeholder="Zip Code" required>';
            echo '<input type="text" name="city" placeholder="City" required>';
            echo '<input type="text" name="country" placeholder="Country" required>';
            echo '<input type="submit" name="addship" value="ADD SHIPPING ADDRESS">';
            echo '</div>';
            echo '</div>'; 
            echo '</form>';
        }
    }   
    else{
        echo '<p class="errormessage">You have no items in your cart</p>';
    }
    

?>
</div>