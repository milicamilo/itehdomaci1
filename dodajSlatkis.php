<?php
 
    include 'config.php';
    include 'model/category.php';
    $categories = Category::getAllCategories($conn);


 


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj novi slatkis</title>
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
    <style>
        
        /* Modify the background color navbara */
         
        .navbar-custom {
            background-color:  #a18cd1;
        }
        /* Modify brand and text color navbara */
         
        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-text {
            color: Black;
        }

    </style>
</head>
<body>
    

<nav class="navbar navbar-custom"  >
        <a class="navbar-brand" href="#">
            <img src="images/bombona.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Poslasticarnica <strong> <i>
                Slatkisi
            </strong></i>
        </a> 
        <div>
            <a class="nav-link" href="home.php" style="color:black;text-decoration: none;float:left"><strong>Pocetna</strong> </a>
            <a   class="nav-link" href="logout.php" style="color:black;text-decoration: none;float:right">Odjava</a>
        </div>
    
    </nav> 
    
                    
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading" style="background: url('images/pozadina2.jpeg') top left/cover no-repeat; display: table-cell; width: 50%;"></div>
                <div class="card-body">
                    <h2 class="title">Add new product</h2>
                    <form method="POST" id="addNewProduct">
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Name" name="nameC" required>
                        </div>
                        
                         
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Description" name="description" required>
                        </div>
                        
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="category">
                                <option disabled="disabled" selected="selected">Categories</option>
                                <?php
                             
                                    while($red = $categories->fetch_array()): 
                                    ?>
                                    <option value=<?php echo $red["idCat"]?>><?php echo $red["nameCat"]?></option> 
        
                                    <?php   endwhile;   ?>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>


                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Price" name="price" required>
                        </div>
                        <div class="input-group">
                        <input class="input--style-3" type="text" placeholder="Image" name="image" required>

                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit"  >Submit</button>
                        </div>
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

        $('#addNewProduct').submit(function () {

        var form = $('#addNewProduct')[0];
        var formData = new FormData(form);
        event.preventDefault();  
        console.log(formData);


        request = $.ajax({  
            url: 'handler/add.php',  
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

            if (response === "Success") {
                alert("Uspesno dodato");
                
                
            }
            else {
        
                console.log("Neuspesno" + response);
            }
        });

        request.fail(function (jqXHR, textStatus, errorThrown) {
            console.error('Greska: ' + textStatus, errorThrown);
        });
        }); 
    </script>
</body>
</html>