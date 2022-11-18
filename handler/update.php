<?php
include '../config.php';
include '../model/product.php';

if (isset($_POST['nameCE'])) {  
 
    $idP = $_POST['hiddenID'];
    $name = $_POST['nameCE'];
    $description = $_POST['descriptionE'];
    $price = $_POST['priceE'];
    $cat = $_POST['categoryE'];

    $filename = $_POST['image'];

   $product = new Product($idP,$name,$description,$cat,$price,$filename);
   $status = Product::updateProduct($product,$conn);

    if($status){
                    
        echo 'Success';
    
        }else{
            echo 'Failed';
        }


   
}
?>