<?php 
session_start();

    include('Blog.Class.php');    
    include('Manager.Class.php');
    include('Membre.Class.php');
   
        
        $bdd= new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', ''   );
        //$bdd= new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
        $id =$_POST['id'];
        $message = trim(htmlspecialchars($_POST['message']));
        $pseudo =$_SESSION['nom'];
        $blog= new Blog();
        $manager= new Manager($bdd); 
        $manager->setCommentaire($pseudo,$message); 
        
        header('location:Article_Affiche.php');
?>