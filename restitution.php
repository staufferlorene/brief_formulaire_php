<?php
//Démarrage de la session $_SESSION
session_start();
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restitution du formulaire</title>
</head>
<body>
    <?php
    // Affichage du message stocké en session
    if (isset($_SESSION['message'])) {
        echo "<p>" . htmlspecialchars($_SESSION['restit']) . "</p>";
        // suppression du message stocké en session
        unset($_SESSION['message']);
    }
    ?>
</body>
</html>