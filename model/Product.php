<?php

    class Product{
        private $id;
        private $name;
        private $description;
        private $price;
        private $image;
        private $category;

        public function __construct($id=null, $name=null, $description=null,   $category=null,$price=null,$image=null)
        {
            $this->id=$id;
            $this->name=$name;
            $this->description=$description; 
            $this->category=$category;
            $this->price=$price;
            $this->image=$image;
    
        }
     
        public static function getAllProducts($conn){
            $upit = " select * from product p inner join category c on p.category=c.idCat";
           
            return $conn->query($upit); 
        }

        public static function getAllProductsSortedByPriceDESC($conn){
            $upit = " select * from product p inner join category c on p.category=c.idCat order by p.price desc";
           
            return $conn->query($upit); 
        }
        public static function getAllProductsSortedByPriceASC($conn){
            $upit = " select * from product p inner join category c on p.category=c.idCat order by p.price asc";
           
            return $conn->query($upit); 
        }
    }



?>