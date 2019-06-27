<?php 
include('Blog.Class.php');    
include('Manager.Class.php'); 
include('Membre.Class.php'); 
$blog= new Blog();
$bdd= new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
$manager= new Manager($bdd); 
/*$blog->setNom($_POST['nom']);
$blog->setPassword($_POST['password']);*/

//header('Location: Article_Affiche.php');
/*if(!isset($_POST['titre'])){
    $blog->setTitre($_POST['titre']);
    $blog->setCommentaire($_POST['commentaire']);          
    $manager->setArticle($blog);
    $manager->getArticle();
    }
    */
?>
