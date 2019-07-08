<?php

include('Blog.Class.php');
include('Manager.Class.php');
include('Membre.Class.php');
try {
    //if (test_isset_empty($_POST['nom']) /*&& test_isset_empty($_POST['pass']) && test_isset_empty($_POST['email']) test_isset_empty($_POST['password_verification'])*/) {
        $bdd= new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        $blog= new Blog();
        $membre=new Membre();
        $manager= new Manager($bdd); 
        $login=$manager->verification_nom($_POST['nom']);
        if (strtolower ($_POST['nom']) != strtolower ($login['pseudo'])) {
            
           // if (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $_POST['email'])) {
               
                //if ($_POST['password'] == $_POST['password_verification']) {
                    
                    // Hachage du mot de passe
                      $pass_hash = hash('sha512', $_POST['password']);
                      $membre->setPassword($pass_hash);
                      $blog->setNom($login);
                    // Insertion
                    $manager->setInscription($membre,$blog);    
                    header('location:Connexion.php');   
        }   
        else {
            header('location: Formulaire.php?message=erreur1');
        }   
   /*}
    else {
        header('page_inscription.php');
    }*/


//------------------
