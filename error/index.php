<?php

if (file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/data/last_update") != date("Y-m-d-H")) {
    include_once $_SERVER['DOCUMENT_ROOT'] . "/tools/update.php";
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Document related error, HTTP error codes

    if ($_GET['id'] == "DOC_NOTFOUND") {
        $message = "Nous ne parvenons pas à trouver la page demandée";
    }

    if ($_GET['id'] == "DOC_DENIED") {
        $message = "Vous n'avez pas accez à ce document";
    }

    if ($_GET['id'] == "DOC_CREDENTIALS") {
        $message = "Les identifiants requis sont incorrects";
    }

    if ($_GET['id'] == "DOC_HEADERS") {
        $message = "Les en-tête de requêtes sont trop grands";
    }

    if ($_GET['id'] == "DOC_REQUEST") {
        $message = "La requête est trop longue pour le serveur";
    }

    if ($_GET['id'] == "DOC_URI") {
        $message = "L'URI passée au serveur est trop longue";
    }

    // Package related error, custom errors

    if ($_GET['id'] == "PACKAGE_NOTFOUND") {
        $message = "Nous ne parvenons pas à trouver l'extension demandée";
    }

    if ($_GET['id'] == "PACKAGE_MISSING") {
        $message = "Aucune extension n'a été spécifiée lors de la requête";
    }

    if ($_GET['id'] == "PACKAGE_BLOCKED") {
        $message = "Cette extension a été bloquée";
    }

    if ($_GET['id'] == "PACKAGE_EDITOR") {
        $message = "Cette extension provient d'un éditeur qui a été bloqué";
    }

    if ($_GET['id'] == "PACKAGE_PREFETCH") {
        $message = "Cette extension ne fournit pas suffisament d'informations sur son fonctionnement";
    }

    if ($_GET['id'] == "PACKAGE_PERMISSIONS") {
        $message = "Cette extension ne demande pas les permissions dont elle à besoin";
    }

    // Redirect related error, custom errors

    if ($_GET['id'] == "REDIRECT_MISSING") {
        $message = "Certains arguments pour la redirection sont manquants";
    }

    if ($_GET['id'] == "REDIRECT_NOTFOUND") {
        $message = "L'extension spécifiée n'existe pas";
    }

    if ($_GET['id'] == "REDIRECT_UNKNOWN") {
        $message = "L'action spécifiée n'est pas disponible";
    }

    // JavaScript errors

    if ($_GET['id'] == "JS_EVALERROR") {
        $message = "Erreur d'évaluation de code dans le code côté client";
    }

    if ($_GET['id'] == "JS_INTERNALERROR") {
        $message = "Erreur interne dans le code côté client";
    }

    if ($_GET['id'] == "JS_RANGEERROR") {
        $message = "Erreur de plage dans le code côté client";
    }

    if ($_GET['id'] == "JS_REFERENCEERROR") {
        $message = "Accès à une référence invalide dans le code côté client";
    }

    if ($_GET['id'] == "JS_SYNTAXERROR") {
        $message = "Erreur de syntaxe dans le code côté client";
    }

    if ($_GET['id'] == "JS_TYPEERROR") {
        $message = "Variable d'un type non accepté dans le code côté client";
    }

    if ($_GET['id'] == "JS_URIERROR") {
        $message = "Erreur de fonction d'URI dans le code côté client";
    }

    // Error message when nothing match

    if (!isset($message)) {
        $message = "Mais, que ce passe-t-il ?";
    }

} else {
    $id = "INTERNAL_EXCEPTION";
    $message = "Mais, que ce passe-t-il ?";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Erreur · CMS Store · Minteck Projects CMS</title>
    <link rel="stylesheet" href="/styles/loader.css">
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/tools/header.php"; ?>
    <div id="content-escape">
        <div class="centered"><center>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <img src="/icon/error.png" id="error_icon">
                        </td>
                        <td>
                            <h3>Oups...</h3>
                            <p>Quel dommage, une erreur s'est produite...<br><b><?= $message ?></b></p>
                            <p><small><span id="error_message">ERR_<?= $id ?></span></small></p>
                        </td>
                    </tr>
                </tbody>
            </table></center>
        </div>
    </div>
</body>
</html>