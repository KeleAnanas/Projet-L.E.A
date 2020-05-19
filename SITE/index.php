<?php
  session_start();
  if(!isset($_SESSION["pseudo"])){
    header("Location: connexion.php");
    exit();
  }
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['pseudo']; ?>!</h1>
    <p>C'est votre tableau de bord.</p>
    <a href="deconnexion.php">Déconnexion</a>
    </div>
  </body>
</html>