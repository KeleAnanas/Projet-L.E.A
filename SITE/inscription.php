<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>

<form class="box" action="" method="post">
  <h1 class="box-title">S'inscrire</h1>
  <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required />
    <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
    <input type="submit" name="submit" value="S'inscrire" class="box-button" />
    <p class="box-register">Déjà inscrit? <a href="connexion.php">Connectez-vous ici</a></p>
</form>

<?php
require('config.php');
if (isset($_POST['username'], $_POST['password'])){
    $pseudo = stripslashes($_POST['username']);
    $pseudo = mysqli_real_escape_string($conn, $pseudo);
    $mdp = stripslashes($_POST['password']);
    $mdp = mysqli_real_escape_string($conn, $mdp);
    //requête SQL + mot de passe crypté
    $query = "INSERT into `users` (pseudo, mdp)
              VALUES ('$pseudo', '".hash('sha256', $mdp)."')";
    $res = mysqli_query($conn, $query);
    if($res){
        echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='connexion.php'>connecter</a></p>
       </div>";
    }
    ?>
<?php } ?>
</body>
</html>