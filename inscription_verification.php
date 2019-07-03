<?php

include('Blog.Class.php');
include('Manager.Class.php');
include('Membre.Class.php');
try {
    //if (test_isset_empty($_POST['nom']) /*&& test_isset_empty($_POST['pass']) && test_isset_empty($_POST['email']) test_isset_empty($_POST['password_verification'])*/) {
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');


    $manager = new Manager($bdd);
    $menbre = new menbre();
    $blog = new Blog();

    $login = $manager->verification_nom($_POST['nom']);
    
    if (strtolower($_POST['nom']) != strtolower($login['pseudo'])) {
        if ($_POST['password'] == $_POST['password_checking']) {
            echo "ok";
            $blog->setNom($_POST["nom"]);

            $menbre->setPassword($_POST["password"]);

           // var_dump($blog);
            //var_dump($menbre);
            echo $_POST['password'];
            echo $_POST['password_checking'];
   
            $manager->setInscription($menbre, $blog);
            echo "ok3";
            // j'ouvre la session pour stocker le nom de l'utilisateur
            //session_start();
            // $_SESSION['pseudo'] = $blog->getNom();

            //header('location:formAdd.php');
        } else {
            //  header('location: page_inscription.php?message=erreur3');
            echo "error";
        }
    } else {
        //header('location: page_inscription.php?message=erreur2');
        echo "error name";
    }
} catch (Exception $e) {
    // message en cas d'erreur
    die('Erreur : ' . $e->getMessage());
}



/*$blog = new Blog();
$manager = new Manager($bdd);*/


/*if (strtolower($_POST['nom']) != strtolower($login['pseudo'])) {
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
*/
/*}
    else {
        header('page_inscription.php');
    }*/


//------------------
