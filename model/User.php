<?php

class User{
    private $idU;
    private $firstname;
    private $lastname;
    private $email;
    private $password;



    public function __construct($idU=null, $firstname=null, $lastname=null, $email=null, $password=null){
        $this->idU=$idU;
        $this->firstname=$firstname;
        $this->lastname=$lastname;
        $this->email=$email;
        $this->password=$password;

    }
    

}



?>