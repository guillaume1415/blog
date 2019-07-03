<form action="article_verification.php" method="POST">
                  <!-- mot de passe -->
                  <textarea name="message" rows="5" cols="30">  </textarea>
                  <div class="form-group row"></div>
                  <input type="hidden" name="id" value="'.$aff->getId_article() .'">
                  <!-- bouton -->
                  <button type="submit" class="btn btn-primary bouton">
                    envoyer
                  </button>
                </form>