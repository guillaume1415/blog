<?php

include('Blog.Class.php');
include('Manager.Class.php');
include('Membre.Class.php');
//if (test_isset_empty($_POST['nom']) /*&& test_isset_empty($_POST['pass']) && test_isset_empty($_POST['email']) test_isset_empty($_POST['password_verification'])*/) {
$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

$blog = new Blog();
$manager = new Manager($bdd);
$login = $manager->verification_nom($_POST['nom']);

if (strtolower($_POST['nom']) != strtolower($login['pseudo'])) {
    if ($_POST['password'] == $_POST['password_verification']) {
        // Hachage du mot de passe
        $pass_hash = hash('sha512', $_POST['password']);
        $pass_hash;
        // Insertion
        $manager->setInscription($_POST['nom'], $pass_hash);
        header('location:Connexion.php');
    }
} else {
    header('location: Formulaire.php?message=erreur1');
}   
   /*}
    else {
        header('page_inscription.php');
    }*/
