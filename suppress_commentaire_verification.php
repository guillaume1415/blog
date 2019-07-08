<?php
session_start();
?>
<?php 


    include('Blog.Class.php');    
    include('Manager.Class.php');
    include('Membre.Class.php');
        $utilisateur =$_SESSION['pseudo'];
       
        $pseudo=$_GET['pseudo'];
        if($utilisateur == $pseudo){
        $bdd= new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', ''   );
        //$bdd= new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
        $id =$_GET['id'];
        //$message = trim(htmlspecialchars($_POST['message']));
        //$pseudo =$_SESSION['nom'];
        $blog= new Blog();
        $blog->setId_commentaire($id);
        $manager= new Manager($bdd); 
        $manager->setSuppressCommentaire($blog); 
        
        header('location:Article_Affiche.php');
    }else{
        header('location:Article_Affiche.php');
        
    }
    
?>