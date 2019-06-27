<?php
    class Blog{
        protected $titre;
        protected $photo;
        protected $commentaire;
        protected $id;
        
        public function setTitre($n){
             $this->titre=$n;
           }
        public function getTitre(){
            return $this->titre;
           }
        public function setPhoto($n){
            $this->photo=$n;
          }
        public function getPhoto(){
           return $this->photo;
          }
        public function setCommentaire($n){
            $this->commentaire=$n;
          }
        public function getCommentaire(){
           return $this->commentaire;
          }
          public function setId($n){
            $this->id=$n;
          }
        public function getId(){
           return $this->id;
          }
        public function setNom($n){
            $this->nom=$n;
          }
       public function getNom(){
           return $this->nom;
          }
         
    }
?>