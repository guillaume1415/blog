<?php 
    include('Blog.Class.php');    
    include('Manager.Class.php');
    include('Membre.Class.php');
    try {
        
        $bdd= new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', ''   );
        //$bdd= new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
        $pass_hash = hash('sha512', $_POST['password']);
        $pseudo = trim(htmlspecialchars($_POST['nom']));
        $blog= new Blog();
        $manager= new Manager($bdd); 
        $stmt=$manager->verification_connexion($pseudo,$pass_hash);
        
        $stmt = $bdd->prepare ('SELECT pseudo, passwor FROM membre WHERE pseudo = :pseudo AND passwor = :condensa');
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->bindValue(':condensa', $pass_hash);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_BOTH);
        //var_dump($data);
        $nombre_ligne = $stmt->rowCount(); //méthode retournant le nombre de lignes
        //S’il y a une ligne, c’est que la personne existe en base de données
        
        if ($nombre_ligne != 0) {
            //echo "<h2>login correct !</h2>";
            
            session_start();
            $_SESSION['nom'] = $_POST['nom'];
            
           header('location:Article_Affiche.php?message=1');
        }
        else {
            //header ("location: connexion.php?message=1");
        }
        $stmt->closeCursor();
    }
    catch (Exception $e) {
        // message en cas d’erreur
        die('Erreur : ' . $e -> getMessage());
    }
?>