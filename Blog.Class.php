<?php
    class Blog{
        protected $titre;
        protected $photo;
        protected $commentaire;
        protected $id_article;
        protected $id_commentaire;
        protected $nom;
        protected $poste;
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
        public function setPoste_commentaire($n){
            $this->commentaire=$n;
          }
        public function getPoste_commentaire(){
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
        public function setId_commentaire($n){
            $this->id_commentaire=$n;
          }
        public function getId_commentaire(){
           return $this->id_commentaire;
          }
        public function setId_article($n){
            $this->id_article=$n;
          }
        public function getId_article(){
           return $this->id_article;
          }
        public function setPoste($n){
            $this->poste=$n;
          }
        public function getPoste(){
            return $this->poste;
          }
          
         
    }
?>