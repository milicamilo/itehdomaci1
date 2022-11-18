<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slatkisi</title>
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
<body  >
        <nav class="navbar navbar-custom"  >
            <a class="navbar-brand" href="home.php">
                <img src="images/bombona.png" width="30" height="30" class="d-inline-block align-top" alt="">
                Poslasticarnica <strong> <i>
                    Slatkisi
                </strong></i>
            </a> 
            <div>
            <a class="nav-link" href="home.php" style="color:black;text-decoration: none;float:left"><strong>Pocetna</strong> </a>
                <a class="nav-link" href="dodajSlatkis.php" style="color:black;text-decoration: none;float:left"><strong>Dodaj novi slatkis</strong> </a>
                
                <a   class="nav-link" href="logout.php" style="color:black;text-decoration: none;float:right">Odjava</a>
            </div>
        
        </nav>


        

        <div id="products" name="products">
        <div style="margin-top:5%"> 
            <label for="cena" style="margin-left:20%;font-size:16px">Sortiranje: </label>
            <select name="cena" id="cena" onchange="sortirajPoCeni()" style="background-color:#fbc2eb;color:black;font-size:16px">
                    <option  >Price  </option>
                    <option value="ASC">Price ascending  </option>
                    <option value="DESC">Price  descending </option>
            </select>

            <div class="input-group" style="float:right;padding-left:65%;padding-right:15%;"> 
            
            <input type="search" id="form1" class="form-control"  style="float:right" onkeyup="pretraga()" placeholder="Search by name..."/>
             
        
            <button type="button" class="btn btn-custom" style="background-color:#fbc2eb; color:black" ;><i class="fas fa-search"></i> </button>
        </div>
        </div>
                <?php include "productCards.php"; ?>

        </div>




        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
     
   
     <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>


            function sortirajPoCeni() {
                var sortiraj = $("#cena").val();
                console.log(sortiraj);
            //   var kategorijesel = $("#kategorija").val();

                $("#products").html("");
                $.post("productCards.php", { cena: sortiraj }, function (data) {
                    $("#products").html(data);
                });
                $('html, body').animate({
                    scrollTop: $("#products").offset().top
                }, 2000);

            


            }



            function updateCandy(updateid) {
               
                $("#products").html("");
                $.post("updateProduct.php", { updateid: updateid }, function (data) {
                    $("#products").html(data);
                });
              

            }

            function pretraga(){
                var input, radios, radio_filter, text_filter, td0, i, divList;

                input = document.getElementById("form1");
                text_filter = input.value.toUpperCase();
                divList = $(".card");
                console.log(divList);

                for (i = 0; i < divList.length; i++) {
                    console.log(divList[i]);
                    td0 = divList[i].getElementsByTagName("h4")[0].innerHTML;
                    console.log(td0);
                    if (td0) {
                    if (td0.toUpperCase().indexOf(text_filter) > -1) {
                        divList[i].style.display = "";
                    } else {
                        divList[i].style.display = "none";
                    }
                    } 
                }
            }
 

    </script>
</body>
</html>