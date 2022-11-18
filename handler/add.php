<?php
    include '../config.php';
    include '../model/product.php';
   

    if ( isset($_POST['nameC']) && isset($_POST['description']) && isset($_POST['price'])) {
           
           
            $p = new Product(null,$_POST['nameC'],$_POST['description'],$_POST['category'],$_POST['price'], $_POST['image']);
  
       
            $status=Product::addProduct($p,$conn);
        
        
            
            if($status){
                
                echo 'Success';
                
            }else{
                echo 'Failed';
            }



      }
 




?>