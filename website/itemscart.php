<div id="items">
<?php
    if(isset($incartmessage)){
        echo $incartmessage;
    }

	$id_user=$_SESSION['id_user'];
	
	$query="SELECT * FROM cart AS C LEFT JOIN  products as P ON C.prod_cart=P.id_prod WHERE C.userid_cart=$id_user AND qt_cart>0";
    $result=mysqli_query($link,$query);
    $rows=mysqli_num_rows($result);

    $sumprice=0;

    if($rows>0){
        while ($cart=mysqli_fetch_array($result)) {
            $cost=$cart['price_prod']*$cart['qt_cart'];
            
            $sumprice=$sumprice+$cost;
			echo '<div class="cartprod">';
			echo '<img class="cartimg" height="150px" width="200px" src="images/'.$cart['img_prod'].'" >';
            echo '<br>';
            echo '<div class="cartcontent">';
            echo $cart['name_prod']."<br>";
            echo $cart['desc_prod']."<br>";
            echo $cart['color_prod']."<br>";
            echo ' Price: <b>'.$cart['price_prod'].' </b> <i class="fa fa-eur"></i> <br>';
            if($cart['qt_cart']>1){
            echo ' Total: <b>'.$cost.' </b> <i class="fa fa-eur"></i> <br>';
            }
            echo '<form method="POST" action="cart.php">';
            echo '<input type="number" min="0" max="'.$cart['stock_prod'].'" value="'.$cart['qt_cart'].'" name="qt_cart">';
            echo '<button type="submit" name="qtchange" value="'.$cart['id_cart'].'"><i class="fa fa-refresh"></i></button><br><br>';
            echo '<button type="submit" class="delete" name="delete" value="'.$cart['id_cart'].'"><i class="fa fa-times-circle"></i> DELETE ITEM</button><br>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }
    echo '<div id="checkout">';
    echo 'Total: '.$sumprice.' EUR';
    echo '<form method="POST" action="checkout.php">';
    echo '<input type="hidden" name="cost" value="'.$sumprice.'">';
    echo '<input type="submit" name="checkout" value="Checkout">';
    echo '</form>';
    echo '</div>';
    }   
    else{
        echo '<p class="errormessage">You have no items in your cart</p>';
    }
    

?>
</div>