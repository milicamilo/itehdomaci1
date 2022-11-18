<?php


    class Category{
        private $idCat;
        private $nameCat;

        public static function getAllCategories($conn){
            return $conn->query("select * from category");
        }

      
    }


?>