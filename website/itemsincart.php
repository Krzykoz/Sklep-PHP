<?php

    if(!isset($_SESSION["id_user"])){
        $incartmessage = '<p class="errormessage">Please log in to access cart</p>';
        exit;
    }

    if(isset($_POST["qtchange"])){
        $id_cart=$_POST['qtchange'];
        $qt_cart=$_POST['qt_cart'];
        if($qt_cart>0){
        $query="UPDATE cart SET qt_cart=$qt_cart WHERE id_cart=$id_cart";
        $result=mysqli_query($link,$query);

        $incartmessage = '<p class="goodmessage">Changed quantity of item in cart</p>';
        }
        else{
            $_POST['delete']=$id_cart;
        }
    }

    if(isset($_POST["delete"])){
        $id_cart=$_POST['delete'];
        $delquery="DELETE FROM cart WHERE id_cart=$id_cart";
        $delresult=mysqli_query($link,$delquery);

        $incartmessage = '<p class="errormessage">Product was removed form cart</p>';
    }
?>