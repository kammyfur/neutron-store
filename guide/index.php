<?php

if (file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/data/last_update") != date("Y-m-d-H")) {
    include_once $_SERVER['DOCUMENT_ROOT'] . "/tools/update.php";
}

$contributors_dev = json_decode(file_get_contents("https://gitlab.com/api/v4/projects/14618666/users"));
$contributors_exts = json_decode(file_get_contents("https://gitlab.com/api/v4/projects/14678923/users"));
$globmb = json_decode(file_get_contents("https://gitlab.com/api/v4/groups/4653596/members?access_token=KHewJzgWfnfqPzAWb9Q8"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aide · CMS Store · Minteck Projects CMS</title>
    <link rel="stylesheet" href="/styles/loader.css">
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/tools/header.php"; ?>
    <div id="content-escape">
        <h2>Rubriques d'aide du CMS Store</h2>
        <p>L'aide du CMS Store est sous forme de cours, chaque cours se termine par un TP qui met en pratique tout ce qui a été appris durant ce cours.</p>
        <ul>
            <li>
                <a class="link" href="/guide/create">Cours 1 : Créer une extension</a>
                <ul>
                    <li>
                        <a class="link" href="/guide/create/code">Partie 1 : Écrire le code source</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/create/meta">Partie 2 : Définir les métadonnées</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/create/publish">Partie 3 : Publier l'extension sur le CMS Store</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/create/publish">Partie 4 : Maintenir et mettre à jour l'extension</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/create/exercise"><b>TP : Créez votre première extension</b></a>
                    </li>
                </ul>
            </li>
            <br>
            <li>
                <a class="link" href="/guide/use">Cours 2 : Gérer les extensions sur votre site</a>
                <ul>
                    <li>
                        <a class="link" href="/guide/use/install">Partie 1 : Installer une extension</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/use/remove">Partie 2 : Désinstaller une extension</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/use/update">Partie 3 : Mettre à jour une extension</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/use/perms">Partie 4 : Les permissions</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/use/tips">Partie 5 : Astuces à connaître</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/use/exercise"><b>TP : Améliorez votre site à l'aide d'extensions</b></a>
                    </li>
                </ul>
            </li>
            <br>
            <li>
                <a class="link" href="/guide/website">Cours 3 : Le site officiel du CMS Store</a>
                <ul>
                    <li>
                        <a class="link" href="/guide/website/contrib">Partie 1 : La liste des contributeurs</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/website/list">Partie 2 : La liste des extensions</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/website/viewer">Partie 3 : Page d'une extension</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/website/help">Partie 4 : Les rubriques d'aide</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/website/redirect">Partie 5 : Les pages de redirection</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/website/qna">Partie 6 : Questions-réponses</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/website/exercise"><b>TP : Installez une extension en passant par le site officiel du CMS Store</b></a>
                    </li>
                </ul>
            </li>
            <br>
            <li>
                <a class="link" href="/guide/repository">Cours 4 : Les dépôts officiels du CMS Store</a>
                <ul>
                    <li>
                        <a class="link" href="/guide/repository/work">Partie 1 : Le principe de dépôts</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/repository/maintain">Partie 2 : Maintenir un dépôt</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/repository/api">Partie 3 : L'interface de programmation des dépôts</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/repository/storefile">Partie 4 : Le fichier store.json</a>
                    </li>
                    <li>
                        <a class="link" href="/guide/website/exercise"><b>TP : Mettez à jour les métadonnées d'une autre extension que la votre</b></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</body>
</html>