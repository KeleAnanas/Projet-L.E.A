<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

<form class="box" action="" method="post" name="login">
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="password" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="submit" class="box-button">
<p class="box-register">Vous êtes nouveau ici? <a href="inscription.php">S'inscrire</a></p>

<?php
require('config.php');
session_start();

if (isset($_POST['username'], $_POST['password'])){
    $pseudo = stripslashes($_POST['username']);
    $pseudo = mysqli_real_escape_string($conn, $pseudo);
    $mdp = stripslashes($_POST['password']);
    $mdp = mysqli_real_escape_string($conn, $mdp);
    $query = "SELECT * FROM `users` WHERE pseudo='$pseudo' and mdp='".hash('sha256', $mdp)."'";
    $result = mysqli_query($conn,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
    echo $rows;
    if($rows>=1){
        $_SESSION['pseudo'] = $pseudo;
        header("Location: index.php");
    }else{
        $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
    }
}
 if (! empty($message)) { ?>
    <p class="errorMessage"><?php echo $message; ?></p>
<?php } ?>
</form>
</body>
</html>