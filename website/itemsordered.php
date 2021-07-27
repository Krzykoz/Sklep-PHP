<div id="checkoutcontainer">
<?php
if(isset($incartmessage)){
    echo $incartmessage;
}

$shipping = 10;


	$id_user=$_SESSION['id_user'];
	
	$query="SELECT * FROM item_ordered AS I LEFT JOIN  products as P ON I.prod_itmord=P.id_prod WHERE i.user_itmord=$id_user AND ord_itmord=$id_ord";
    $result=mysqli_query($link,$query);
    $rows=mysqli_num_rows($result);

    $sumprice=0;

    $itemnumber=0;

    if($rows>0){
        echo '<div class="checkoutprod">';
        while ($ord=mysqli_fetch_array($result)) {
            $itemnumber++;
            $price=$ord['prodprice_itmord']*$ord['qt_itmord'];
            $sumprice=$sumprice+$price;
            echo '<div class="checkoutcontent">';
            echo $itemnumber.'. ';
            echo $ord['name_prod'].", ";
            echo 'Color: '.$ord['color_prod'].", ";
            echo 'Amount: '.$ord['qt_itmord'].', ';
            echo ' Cost: <b>'.$price.' </b> <i class="fa fa-eur"></i> ';
            echo '</div>';
        }
        $totalprice=$sumprice+$shipping;
        echo '<div class="checkoutcontent">';
        echo 'SHIPPING: '.$shipping.' EUR';
        echo '</div>';
        echo '<div class="checkoutcontent">';
        echo 'TOTAL: '.$totalprice.' EUR';
        echo '</div>';
        echo '</div>';
    }

?>
</div>