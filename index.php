<?php
//Démarrage de la session $_SESSION
session_start();

// Vérification de la soumission du formulaire via la méthode POST. C'est une super globale
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Récupération des données du formulaire
    // $name = $_POST['name'];
    // var_dump($name);
    // $name = isset($_POST['name']);

    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $msg = isset($_POST['msg']) ? trim($_POST['msg']) : '';

    // Vérification que le champ n'est pas vide
    if ($name && $email && $msg !== '') {
        // Stockage du message dans la session
        echo file_put_contents("messages.txt","$name, $email, $msg", FILE_APPEND);
        $_SESSION['message'] = "Le formulaire a été envoyé";
        $_SESSION['restit'] = "Nom : $name, Mail : $email, Message : $msg";

        header("Location: restitution.php");
        exit();
    } else {
        $_SESSION['message'] = "Veuillez renseigner tous les champs !";
    }
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Brief formulaire</title>
</head>
<body>
<?php
// Affichage du message stocké en session
if (isset($_SESSION['message'])) {
    echo "<p>" . htmlspecialchars($_SESSION['message']) . "</p>";
    // suppression du message stocké en session
    unset($_SESSION['message']);
}
?>

    <form action="index.php" method="post">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name">

        <label for="email">Mail :</label>
        <input type="email" id="email" name="email">

        <label for="msg">Message :</label>
        <input type="text" id="msg" name="msg">

        <button type="submit">Envoyer</button>
    </form>
</body>
</html>