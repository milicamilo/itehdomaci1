<?php
    include 'config.php';
    include 'model/Product.php';
   
   
    if (isset($_POST['cena'])) {
    
        $sortiraj = $_POST['cena'];
        if($sortiraj=='ASC'){
            $sviSlatkisi = Product::getAllProductsSortedByPriceASC($conn);
        }else if($sortiraj=='DESC'){
            $sviSlatkisi = Product::getAllProductsSortedByPriceDESC($conn);
        }
    }else{
        $sviSlatkisi = Product::getAllProducts($conn);
    }
    
 
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/styleProductCards.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="container">
        <?php
        
            while ($row = $sviSlatkisi->fetch_array()):
               
        ?>
            <div class="card">
                <div class="card-header" style="padding:0">
                     <img src="<?php echo  $row['image']?>" style="height:300px;width: auto;" >   
                </div>
                <div class="card-body">
                    <div class="tag tag-teal">   <?php echo $row['nameCat']?>   </div>  
                    <br>
                    <h4 name = "naslovKartice">  <?php echo $row['name']?>  </h4>
                    <p>  <?php echo $row['description']?>  </p>  
                    <?php $novaCena =  $row['price']  ?>
                    <?php $staraCena =  $novaCena*1.1;  ?>

                   <p style="font-size:20px;text-decoration:  line-through;margin:0">  <?php echo "   ".$staraCena."din" ?>  </p>   
                    <p style="font-size:20px;"> <strong>  Cena:      </strong><?php echo $novaCena."din" ?> </p>
                    
                    <form  method="post">
                        <button type="button" class="btn btn-custom" onclick="updateCandy(<?php echo   $row['id'];?>)" style="background-color:#47bcd4;"     >  <i class="fas fa-pencil-alt"></i></a> </button> 
                        <button type="button" class="btn btn-custom"  style="background-color:#a18cd1;"   ><i class="fas fa-trash" onclick="deleteProduct(<?php echo   $row['id'];?>)"></i></button>  
 
                    </form>
                </div> 
            </div>

        <?php endwhile;?>
    </div>



    <script>



        
        function deleteProduct(deleteid){


        request = $.ajax({  
            url: 'handler/delete.php',  
            type: 'post', 
            data: {deleteid:deleteid},


            success: function(data, status){
                location.reload(true);
                alert("Uspesno obrisano!");
            }


        });



    }
    </script>
 







</body>
</html>