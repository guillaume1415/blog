<?php
class Manager
{
    protected $bdd;
    //protected $new_blog = array();     
    public function  __construct($bb)
    {
        try {
            $this->bdd = $bb;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
   
    public function setInscription($membre, $blog)  // requete inser new personne dans bdd
    {
        $stmt = $this->bdd->prepare('INSERT INTO membre (pseudo, passwor) VALUES(:pseudo, :passwor)');
        
        $n=$blog->getNom();
        $p=$membre->getPassword();
        $stmt->bindParam(':pseudo', $n);
        $stmt->bindParam(':passwor', $p);
        $stmt->execute();
        //var_dump($p);
    }
    
    public function setArticle($message) // requete inser new article dans bdd
    {
        //var_dump($b);
        $stmt = $this->bdd->prepare('INSERT INTO Article (pseudo, commentaire) VALUES(:pseudo, :commentaire)');
        $blog = new Blog();
        $p =$_SESSION['pseudo'];
        //$c=$blog->getPoste();
        $stmt->bindParam(':pseudo', $p);
        $stmt->bindParam(':commentaire', $message);
        $stmt->execute();
    }
    // On récupère les 5 derniers billets
    public function getArticle()
    {
        $stmt = $this->bdd->query('SELECT id, titre, pseudo, commentaire  FROM Article ORDER BY id DESC LIMIT 0, 5');
        $new_blog = array();
        $i = 0;
        while ($donnees = $stmt->fetch()) {
            $c = $donnees['commentaire'];
            $p = $donnees['pseudo'];
            $id_article = $donnees['id'];
            $b = new blog();
            //$b->setTitre($t);
            $b->setId_article($id_article);
            $b->setNom($p);
            $b->setPoste($c);
            //echo nl2br(htmlspecialchars($donnees['contenu']));  
            $new_blog[$i] = $b;
            $i = $i + 1;
            // var_dump($new_blog);
            //var_dump($new_blog);
        } // Fin de la boucle des billets
        $stmt->closeCursor();
        return $new_blog;
    }
    public function verification_nom($nom)
    {
        $stmt = $this->bdd->query('SELECT pseudo FROM membre WHERE pseudo = "' . $nom . '" ');
        $login = $stmt->fetch();
        return $login;
    }
    public function verification_connexion($pseudo, $pass_hash)
    {
        $stmt = $this->bdd->prepare('SELECT pseudo, pass FROM membres WHERE pseudo = :pseudo AND pass = :condensa');
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->bindValue(':condensa', $pass_hash);
        $stmt->execute();
        return $stmt;
    }
    //inser commentter bdd
    public function setCommentaire($p, $t,$id)
    {
        $stmt = $this->bdd->prepare('INSERT INTO commentaire (id_article, pseudo, texte, date) VALUES(:id,:pseudo, :texte,now())');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':pseudo', $p);
        $stmt->bindParam(':texte', $t);
        $stmt->execute();
    }

    public function getCommentaire($id_article)
    {
        $stmt = $this->bdd->query('SELECT `id_commentaire`,`id_article`, `pseudo`,`texte` FROM commentaire WHERE id_article = "' . $id_article . '" ');
        $new_blog = array();
        $i = 0;
        while ($donnees = $stmt->fetch()) {
            $message = $donnees['texte'];
            $pseudo = $donnees['pseudo'];
            $id_article = $donnees['id_article'];
            $id_commentaire = $donnees['id_commentaire'];
            $b = new blog();
            //$b->setTitre($t);
            $b->setId_article($id_article);
            $b->setId_commentaire($id_commentaire);
            $b->setNom($pseudo);
            $b->setPoste_commentaire($message);
            //echo nl2br(htmlspecialchars($donnees['contenu']));  
            $new_blog[$i] = $b;
            $i = $i + 1;
            // var_dump($new_blog);
            //var_dump($new_blog);
        } // Fin de la boucle des billets
        $stmt->closeCursor();
        return $new_blog;
    }
    public function setSuppressCommentaire($blog)
    {
        $stmt = $this->bdd->prepare('DELETE FROM `commentaire` WHERE `id_commentaire` = :id ');
        $id=$blog->getId_commentaire();
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}