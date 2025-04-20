<?php

if (file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/data/last_update") != date("Y-m-d-H")) {
    include_once $_SERVER['DOCUMENT_ROOT'] . "/tools/update.php";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS Store · Minteck Projects CMS</title>
    <link rel="stylesheet" href="/styles/loader.css">
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/tools/header.php"; ?>
    <div id="content-escape">
        <center>
            <h1>Découvrez le CMS Store, un moyen d'étendre les possibilités de votre site !</h1>
            <object type="image/svg+xml" data="/icon/oobe.svg" id="home_oobe">
                Hum, l'image ne parvient pas à s'afficher correctement, avez-vous activé les images ?
            </object>
            <hr id="home_separator">
        </center>
        <div id="home_grid">
            <div class="home_grid_ph">
                <center class="home_grid_el">
                    <h2>Un portail entre votre site, et l'infini</h2>
                    <p>Si votre site exécute déjà Minteck Projects CMS, vous pouvez bénéficier de toutes les fonctionnalités du CMS Store dés maintenant. Il vous suffit simplement de chercher une extension sur ce site, puis de cliquer sur "Installer", et le tour est joué !</p>
                    <p>Nous ne sommes pas tous des développeurs, améliorer les logiciels que l'on utilise au quotidien devrait être le plus simple possible. Avec le CMS Store, vous ajoutez de nouvelles fonctionnalités à Minteck Projects CMS en quelques clics.</p>
                    <p>Et le meilleur dans tout ça, c'est que les extensions du CMS Store sont sécurisés et vérifiées minucieusement par les mainteneurs du réseau.</p>
                </center>
            </div>
            <div class="home_grid_ph">
                <center class="home_grid_el">
                    <img class="home_picture" src="/home/001.png">
                </center>
            </div>
            <div class="home_grid_ph">
                <center class="home_grid_el">
                    <img class="home_picture" src="/home/002.png">
                </center>
            </div>
            <div class="home_grid_ph">
                <center class="home_grid_el">
                    <h2>Une infrastructure puissante, pour vos besoins</h2>
                    <p>Les extensions proposées au travers du CMS Store sont hébergées par des serveurs de <a href="https://gitlab.com" class="link">GitLab</a>, ce qui vous assure d'avoir toujours accès aux fichiers le plus rapidement possible.</p>
                    <p>Les serveurs de GitLab sont parmi les plus rapides de tout l'Internet, et les plus rapides de tout le réseau des services de Minteck Projects...</p>
                    <p>De plus, grâce à Git, la mise à jour des extensions par les mainteneurs est plus facile et sécurisée que jamais, même vous pouvez proposer un changement en envoyant une requête de fusion Git.</p>
                </center>
            </div>
            <div class="home_grid_ph">
                <center class="home_grid_el">
                    <h2>Personnalisez votre site selon vos envies, et en toute sécurité</h2>
                    <p>Les extensions du CMS Store fonctionnent sur un système de permissions. Sur la page de l'extension, on vous indique les permissions demandées par celle-ci, et on met en évidence les permissions pouvant s'avérer dangeureuses et qui requièrent plus d'attention.</p>
                    <p>Depuis le site officiel du CMS Store, les extensions sont constament controllées, pour s'assurer qu'elles utilisent leurs permissions à bon escient. Toute extension abusant de ces permissions se verra bien entendu retirée du CMS Store.</p>
                    <p>De plus, si l'extension à besoin d'effectuer d'autres actions particulières, elle disposera de ses propres permissions, qui sont généralement reconnaissables au fait qu'elles n'aient pas un nom cohérent.</p>
                </center>
            </div>
            <div class="home_grid_ph">
                <center class="home_grid_el">
                    <img class="home_picture" src="/home/003.png">
                </center>
            </div>
            <div class="home_grid_ph">
                <center class="home_grid_el">
                    <img class="home_picture" src="/home/004.png">
                </center>
            </div>
            <div class="home_grid_ph">
                <center class="home_grid_el">
                    <h2>Aucune configuration requise, cliquez et c'est parti !</h2>
                    <p>Le CMS Store est intégré dans le logiciel Minteck Projects CMS depuis sa version 1.1. Depuis la sortie de cette version, l'intégration du CMS Store ne cesse d'évoluer pour corriger de multiples bogues et améliorer un peu plus votre expérience.</p>
                    <p>Pour accéder au CMS Store, il vous suffit d'accéder à ce site, ou d'accéder à l'option "CMS Store" dans l'administration de votre site. Le logiciel se chargera de générer automatiquement la base de données et de vous proposer toutes les extensions à installer.</p>
                    <p>Certaines extensions sont de tièrce partie et peuvent provenir d'éditeurs aux quatres coins de la planète, et c'est ce qui rend le CMS Store si unique et incroyable.</p>
                </center>
            </div>
        </div>
    </div>
</body>
</html>