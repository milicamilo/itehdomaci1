<?php
    include 'config.php';
    include 'model/category.php';
   
    include 'model/product.php'; 
    $categories = Category::getAllCategories($conn);
   
    //popunjavanje forme podacima
    if (isset($_POST['updateid'])) {
        
        $id = $_POST['updateid'];

        
        $result =  Product::getProduct($id,$conn);
        $row = $result->fetch_array();
    }
    

?> 


 
 
 
 
     <!-- Icons font CSS-->
     <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
 <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
 <!-- Font special for pages-->
 <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

 <!-- Vendor CSS-->
 <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
 <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
 integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <link rel="stylesheet" href="css/main.css">
 
 
 
            
 <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins" style="margin-top:0px">
     <div class="wrapper wrapper--w780">
         <div class="card card-3">
             <div class="card-heading" style="background: url('images/pozadina2.jpeg') top left/cover no-repeat; display: table-cell; width: 50%;"></div>
             <div class="card-body">
                 <h2 class="title">Azuriraj proizvod</h2>
                 <form action="updateProduct.php" method="POST" id="EditProduct">
                     <div class="input-group">
                         <input class="input--style-3" type="text" value="<?php echo $row['name'] ?>" placeholder="Name" name="nameCE"   required>
                     </div>
                     
                      
                     <div class="input-group">
                         <textarea class="input--style-3" style="width: 100%;"   placeholder="Description" name="descriptionE" required> <?php echo $row['description'] ?></textarea>
                     </div>
                     
                     <div class="input-group">
                         <div class="rs-select2 js-select-simple select--no-search">
                             <select name="categoryE" id="categoryE">
                             <option disabled="disabled" selected="selected">Categories</option>
                             <?php
                          
                                 while($red = $categories->fetch_array()): 
                                 ?>
                                 <option value=<?php echo $red["idCat"]?>><?php echo $red["nameCat"]?></option> 
     
                                 <?php   endwhile;   ?>
                             </select>
                             <script>
                                 
                                $('#categoryE').val('<?php echo $row['idCat']?>');
                             </script>
                             <div class="select-dropdown"></div>
                         </div>
                     </div>


                     <div class="input-group">
                         <input class="input--style-3" type="text" value="<?php echo $row['price'] ?>" placeholder="Price" name="priceE" required>
                     </div>
                     <div class="input-group">
                     <input class="input--style-3" type="text" placeholder="Image" name="image"  value="<?php echo $row['image'] ?>" required>
                     </div>
                     
                     <input class="input--style-3" type="hidden"  name="hiddenID"  value="<?php echo $row['id'] ?>">
                      
                         <button class="btn btn--pill btn--green" type="submit" id="azuriraj"    >Submit</button>
                           
                                    
                         
                     
                          
                    
                 </form>
             </div>
         </div>
     </div>
 </div>

     
 <!-- Jquery JS-->
 <script src="vendor/jquery/jquery.min.js"></script>
 <!-- Vendor JS-->
 <script src="vendor/select2/select2.min.js"></script>
 <script src="vendor/datepicker/moment.min.js"></script>
 <script src="vendor/datepicker/daterangepicker.js"></script>

 <!-- Main JS-->
 <script src="js/global.js"></script>






 <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  

 <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>


        $('#EditProduct').submit(function () {

        var form = $('#EditProduct')[0];
        console.log(form);
        var formData = new FormData(form);
        event.preventDefault();  
        console.log(formData);


        request = $.ajax({  
            url: 'handler/update.php',  
            type: 'post', 
            processData: false,
            contentType: false,
            data: formData
        });
        console.log(request);
        request.done(function (response, textStatus, jqXHR) {
            console.log(textStatus);
            console.log(jqXHR);
        console.log(response);
            alert("Uspesno")
            
        });

        request.fail(function (jqXHR, textStatus, errorThrown) {
            console.error('Greska: ' + textStatus, errorThrown);
        });
        }); 
    </script>