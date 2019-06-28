<?php
    class Manager{
        protected $bdd;  
        //protected $new_blog = array();     
        public function  __construct($bb){
            try
           {
            $this->bdd =$bb;
           }
           catch(Exception $e)
           {
                   die('Erreur : '.$e->getMessage());
           }
        }
        public  function  setInscription($n,$p){
            
            $stmt = $this->bdd->prepare('INSERT INTO membre (pseudo, passwor) VALUES(:pseudo, :passwor)');
            $blog= new Blog();
            
            $blog->getNom();
            $blog->getPassword();
            $stmt->bindParam(':pseudo', $n);
            $stmt->bindParam(':passwor',$p);   
            $stmt->execute();
            //var_dump($p);
        }
        public  function  setArticle($b){
            //var_dump($b);
            $stmt = $this->bdd->prepare('INSERT INTO Article (titre, commentaire) VALUES(:titre, :commentaire)');
            $t=$b->getTitre();
            $c=$b->getCommentaire();
            $stmt->bindParam(':titre', $t);
            $stmt->bindParam(':commentaire',$c );   
            $stmt->execute();
        }
           // On récupère les 5 derniers billets
        public function getArticle(){
                $stmt = $this->bdd->query('SELECT id, titre, pseudo, commentaire  FROM Article ORDER BY id DESC LIMIT 0, 5');
                $new_blog = array();  
                $i=0;
                while($donnees = $stmt->fetch()){
                        
                        $c=$donnees['commentaire'];
                        $p=$donnees['pseudo'];
                        $id=$donnees['id'];
                        $b=new blog();
                        //$b->setTitre($t);
                        $b->setId($id);
                        $b->setNom($p);
                        $b->setCommentaire($c);               
                    //echo nl2br(htmlspecialchars($donnees['contenu']));  
                    $new_blog[$i]=$b;
                    $i=$i+1;
                   // var_dump($new_blog);
                    //var_dump($new_blog);
                } // Fin de la boucle des billets
                $stmt->closeCursor();
                return $new_blog;
        }

        public  function  setCommentaire($p,$t,$id_art){
            //var_dump($b);
            $stmt = $this->bdd->prepare('INSERT INTO commentaire (id_article, texte, pseudo, date) VALUES(:id_article, :texte,:pseudo,now())');
            $stmt->bindParam(':id_article', $id_art);
            $stmt->bindParam(':texte',$t );
            $stmt->bindParam(':pseudo', $p);  
            $stmt->execute();
        }
        
        public function getCommentaire(){
            $stmt = $this->bdd->query('SELECT id_commentaire, id_article, pseudo, texte  FROM commentaire ');
            $new_blog = array();  
            $i=0;
            while($donnees = $stmt->fetch()){
                    
                    $c=$donnees['texte'];
                    $p=$donnees['pseudo'];
                    $id_com=$donnees['id_commentaire'];
                    $id_art=$donnees['id_article'];
                    $b=new blog();
                    //$b->setTitre($t);
                    
                    $b->setNom($p);
                    $b->setCommentaire($id_com);     
                    $b->setCommentaire($id_art);           
                //echo nl2br(htmlspecialchars($donnees['contenu']));  
                $new_blog[$i]=$b;
                $i=$i+1;
               // var_dump($new_blog);
                //var_dump($new_blog);
            } // Fin de la boucle des billets
            $stmt->closeCursor();
            return $new_blog;
    }
        public function verification_nom($nom){
            $stmt = $this->bdd -> query ('SELECT pseudo FROM membre WHERE pseudo = "' . $nom . '" ');
            $login = $stmt -> fetch();
            return $login;
        }
        public function verification_connexion($pseudo,$pass_hash){
            $stmt = $this->bdd->prepare ('SELECT pseudo, pass FROM membres WHERE pseudo = :pseudo AND pass = :condensa');
            $stmt->bindValue(':pseudo', $pseudo);
            $stmt->bindValue(':condensa', $pass_hash);
            $stmt->execute();
            return $stmt;
        }
        public function setPoste($p,$t){
            $stmt = $this->bdd->prepare('INSERT INTO commentaire (id_article, pseudo, texte, date) VALUES(:id,:pseudo, :texte,now())');
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':pseudo', $p);
            $stmt->bindParam(':texte',$t);
            $stmt->execute();
          }  
        
    }
?>