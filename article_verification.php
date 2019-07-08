<?php
session_start();

include('Blog.Class.php');
include('Manager.Class.php');
include('Membre.Class.php');


$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
//$bdd= new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));

$message = trim(htmlspecialchars($_POST['message']));
$pseudo = $_SESSION['pseudo'];

$blog = new Blog();
$manager = new Manager($bdd);

$blog->setNom($pseudo);
$manager->setArticle($message);

header('location:Article_Affiche.php');
