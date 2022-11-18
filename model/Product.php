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


        public static function deleteProduct($id, $conn){
            $upit = " delete from  product where id=$id";
           
            return $conn->query($upit); 
        }

        public static function addProduct($p, $conn){
            $upit = "insert into product (name,description,image,price,category) values ('$p->name','$p->description','$p->image',$p->price,$p->category)";
             
            return $conn->query($upit); 
    
        }
        public static function updateProduct($p,$conn){
    
            $upit = "update product set price=$p->price,name='$p->name',description='$p->description',image='$p->image',category=$p->category where id=$p->id ";
           
            return $conn->query($upit); 
    
        }
        public static function getProduct($id,$conn){
            $upit = "select * from product p inner join category c on p.category=c.idCat where id=$id";
           
            return $conn->query($upit); 
        }
    }



?>