<?php
session_start();
?>
<?php
echo $_SESSION['pseudo'];
echo'<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="styleArticle.css">';

 include('Blog.Class.php');    
 include('Manager.Class.php'); 
 $bdd= new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
 echo '<a href="deconnexion.php">deconnexion</a>';
echo include('pageAddArticle.php');

$manager= new Manager($bdd); 
$tab=$manager->getArticle();
//$tab2=$manager->getCommentaire();
foreach($tab as $aff){
    //var_dump($aff);
    //echo 'titre : '.$aff->getTitre().'<br>'; 
    echo '
    
    <div class="[ panel panel-default ] panel-google-plus">           
    <div class="panel-heading">
                      <img class="[ img-circle pull-left ]" src="https://lh3.googleusercontent.com/-CxXg7_7ylq4/AAAAAAAAAAI/AAAAAAAAAQ8/LhCIKQC5Aq4/s46-c-k-no/photo.jpg" alt="Mouse0270">
                      <h3>'.$aff->getNom().'</h3>
                      <h5><span>Shared publicly</span> - <span>Jun 27, 2014</span> </h5>
                  </div>
                  <div class="panel-body">
                      <p> commantaire  : '.$aff->getPoste() .'<br></p>
                      
                  </div>

                  <div class="panel-footer">
                      <button type="button" class="[ btn btn-default ]">+1</button>
                      <button type="button" class="[ btn btn-default ]">
                          <span class="[ glyphicon glyphicon-share-alt ]"></span>
                      </button>
                      <div class="input-placeholder">Add a comment...</div>';
                      //$id_article=$tab2->getId_article();
                      //$id_article
                      $tab2=$manager->getCommentaire($aff->getId_article());
                       foreach($tab2 as $aff2){ 
                           
                           echo'
                      <div class="input-placeholder">'.$aff2->getNom().' : '.$aff2->getPoste_commentaire().' et '.$aff->getId_article(). ' 
                      <a href="suppress_commentaire_verification.php?id='.$aff2->getId_commentaire().'&pseudo='.$aff2->getNom().'">x</a> </div>';}
                      echo'
                  </div>
                  <div class="panel-google-plus-comment">
                      <img class="img-circle" src="https://lh3.googleusercontent.com/uFp_tsTJboUY7kue5XAsGA=s46" alt="User Image">
                      <div class="panel-google-plus-textarea">
                          <textarea rows="4"></textarea>
                          <button type="submit" class="[ btn btn-success disabled ]">Post comment</button>
                          <button type="reset" class="[ btn btn-default ]">Cancel</button>
                      </div>
                      <div class="clearfix"></div>
                  </div>
              </div>
              <div>
              
         </div>
              <form action="commentaire_verification.php" method="POST">
                  <!-- mot de passe -->
                  <textarea name="message" rows="5" cols="30">  </textarea>
                  <div class="form-group row"></div>
                  <input type="hidden" name="id" value="'.$aff->getId_article() .'">
                  <!-- bouton -->
                  <button type="submit" class="btn btn-primary bouton">
                    envoyer
                  </button>
                </form>
';
    } 
?>
   

         