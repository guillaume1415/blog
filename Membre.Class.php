<?php
    class Blog{
        
        
        protected $nom;
        protected $password;

       
          public function setNom($n){
            $this->nom=$n;
          }
       public function getNom(){
           return $this->nom;
          }
        public function setPassword($n){
            $this->password=$n;
          }
       public function getPassword(){
           return $this->password;
          }
          
    }
?>