


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!--Lien qui relie les fichiers UserIHM.php à Test.css -->
        <link rel="stylesheet" type="text/css" href="../View/Test.css">
    </head>

    <body>
        <!--Section identification -->
        <div class='Loginpart'>
            <form action="../Controllers/UserAuthentificationCTRL.php" method="POST">
                <label class="adress">Adresse e-mail ou mobile</label>

                <input type="text" name="login" value="Votre login" />
                <label class="mtdepasse">Mot de passe </label>
                <input type="password" name="pwd" value="Votre mot de passe" />

                <input class="btAuthen"type="submit" value="Connexion" name="btAuthentification" />
                <a  class="forgotten" href='#'>Informations de compte oubliées?</a>

            </form>
        </div>
<!--Section inscription -->
        <div class="Inscriptionpart">

            <form action="../Controllers/UserInscriptionCTRL.php" method="POST">
                <h1>Inscription</h1>
                <h6>C'est gratuit(et ça le restera toujours)

                    <p>
                        <input type="text" name="firstname" value="Prénom" />

                        <input type="text" name="lastname" value="Nom de famille">
                    </p>
                    <p>
                        <input type="text" name="email" value="E-mail" />
                    </p>

                    <p>
                        <input type="text" name="email" value="Confirmer email" />
                    </p>

                    <p>
                        <input type="password" name="pwd" value="Nouveau mot de passe" />
                    </p>

                    <label>Date de naissance</label>

                    <div>
                        <select name="birthday">
                            <option>Jour</option>
                            <option>1</option>
                        </select>
                        <select>
                            <option>Mois</option>
                            <option>1</option>
                        </select>
                        <select>
                            <option>Année</option>
                            <option>1</option>
                        </select>
                        <a href="#">Pourquoi indiquer ma date de naissance?</a>

                        <br>
                        <br>
                        </form>
                    </div>

                    <div class="radio">
                        <input type="radio" id="1" name="sexe" value="femme">
                        <label for="1">Femme</label>
                        <input type="radio" id="2" name="sexe" value="homme">
                        <label for="2">Homme</label>
                    </div>
                    <p>            
                        En appuyant sur Inscription, vous acceptez nos Conditions générales, notre Politique
                        d’utilisation des données et notre Politique d’utilisation
                        des cookies. Vous recevrez peut-être des notifications par texto de notre part et vous 
                        pouvez vous désabonner à tout moment à tout moment.
                    </p>

                    <input class="btInscr" type="submit" value="Inscription" name="btInscription" />
            </form>


        </div>
        <?php
        
        if (isSet($message)) {
                echo $message;
            }
        ?>
    </body>
</html>

