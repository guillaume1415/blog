<?php
setcookie("pseudo", " ", time() + 365 * 24 * 3600, null, null, false, true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style_page_connection.css">
    <link rel="shortcut icon" type="image/ico" href="logo/favicon.ico" />
    <title>Le Blog</title>
</head>

<body>
    <?php
    if (isset($_GET['message']) && ($_GET['message'] == '1')) {
        echo "<script>alert(\"le mot de passe ou l'identifient ne correspond pas\")</script>";
    } elseif (isset($_GET['message']) && ($_GET['message'] == 'erreur1')) {
        echo "<script>alert(\"ce nom est déjà pris\")</script>";
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">Le Blog</a>
        </div>
    </nav>
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-header">inscription</div>

                        <div class="card-body">
                            <form action="inscription_verification.php" method="POST">
                                <!-- pseudo -->
                                <div class="form-group row">
                                    <label for="pseudo" class="col-md-4 col-form-label text-md-right">pseudo</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="nom" required autofocus value="<?php echo $_COOKIE["pseudo"]; ?>">
                                    </div>
                                </div>
                                <!-- mot de passe -->
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">mot de passe</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password" required placeholder="mot de passe">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <!-- checkbox-->
                                    <div class="col-md-6 offset-md-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="remember"> Se souvenir de moi </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- bouton -->
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary bouton">
                                        envoyer
                                    </button>
                                    <a href="#" class="btn btn-link">
                                        mot de passe oublié?
                                    </a>
                                    <a href="Connexion.php">connexion</a>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>
    <script>
        var email = document.querySelector('input.email');

        email.oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                if (e.target.value.length == 0) {
                    e.target.setCustomValidity("Ce champ est obligatoire");
                } else {
                    e.target.setCustomValidity("Entrez une adresse valide. Exemple : contact@nom.com");
                }
            }
        };
    </script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        jquery(document).ready(function() {
            jquery('input,textarea').focus(function() {
                jquery(this).removeAttr('placeholder');
            });
        });
    </script>


</body>
</html>