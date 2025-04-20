<?php

if (file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/data/last_update") != date("Y-m-d-H")) {
    include_once $_SERVER['DOCUMENT_ROOT'] . "/tools/update.php";
}

if (isset($_GET['idType']) && $_GET['idType'] == "old") {
    if (isset($_GET['id'])) {
        $extensions = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/data/packages.json"));
        $extensionsa = (array)$extensions;
        if (isset($extensionsa[$_GET['id']])) {
            $ext = $extensionsa[$_GET['id']];
            $oldmethod = true;
            $selected = true;
        } else {
            $_GET['id'] = "PACKAGE_NOTFOUND";
            include_once $_SERVER['DOCUMENT_ROOT'] . "/error/index.php";
            die();    
        }
    } else {
        $_GET['id'] = "PACKAGE_MISSING";
        include_once $_SERVER['DOCUMENT_ROOT'] . "/error/index.php";
        die();
    }
} else {
    if (isset($_GET['id'])) {
        $extensions = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/data/packages.json"));
        $selected = false;
        foreach ($extensions as $extension) {
            if ($extension->id == $_GET['id']) {
                $ext = $extension;
                $selected = true;
                $oldmethod = false;
            }
        }
        if (!$selected) {
            $_GET['id'] = "PACKAGE_NOTFOUND";
            include_once $_SERVER['DOCUMENT_ROOT'] . "/error/index.php";
            die();    
        }
    } else {
        $_GET['id'] = "PACKAGE_MISSING";
        include_once $_SERVER['DOCUMENT_ROOT'] . "/error/index.php";
        die();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $ext->name ?> · CMS Store · Minteck Projects CMS</title>
    <link rel="stylesheet" href="/styles/loader.css">
    <?= $oldmethod ? "<script>window.history.pushState({}, \"\", \"/view/?id=" . $ext->id . "\");</script>" : "" ?>
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/tools/header.php"; ?>
    <div id="content-escape">
        <div id="view_intro">
            <!-- <div id="view_intro_logo">
                <img src="/icon/default.png" alt="Icône de l'extension" id="view_icon">
            </div> -->
            <div id="view_intro_info">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <img src="/icon/default.png" alt="Icône de l'extension" id="view_icon">
                            </td>
                            <td>
                                <h2 id="view_title"><?= $ext->name ?></h2>
                                <div id="view_author"><?= $ext->author ?>
                                <?php
                                
                                if (strpos($ext->author, 'Minteck Projects') !== false || strpos($ext->author, 'Mozilla') !== false || strpos($ext->author, 'Google') !== false || strpos($ext->author, 'Microsoft') !== false || strpos($ext->author, 'Canonical') !== false || strpos($ext->author, 'Ubuntu') !== false || strpos($ext->author, 'Firefox') !== false || strpos($ext->author, 'Windows') !== false || strpos($ext->author, 'Red Numérique') !== false || strpos($ext->author, 'KDE') !== false) {
                                    echo("<a title=\"Éditeur vérifié par Secure CMS\"><img id=\"view_verified\" src=\"/icon/valided.png\"></a>");
                                }
                                
                                ?>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="view_intro_install">
                <a id="view_install" href="/redirect/?action=install&id=<?= $_GET['id'] ?>">Installer</a><br>
                <div id="view_install_misc"><a href="/redirect/?action=remove&id=<?= $_GET['id'] ?>" class="view_install_link">Désinstaller</a> • <a href="/redirect/?action=update&id=<?= $_GET['id'] ?>" class="view_install_link">Mettre à jour</a></div></div>
        </div>
        <div id="view_info">
            <h3><img class="view_info_title_img" src="/icon/info.png">Description de l'extension</h3>
            <div id="view_info_description"><?= $ext->description ?><br><br></div>
            <h3><img class="view_info_title_img" src="/icon/perms.png">Permissions demandées</h3>
            <div id="view_info_perms">
            <?php
            
            if (count($ext->permissions) == 0) {
                echo("<i>Cette extension ne requiert aucune permission</i>");
            }

            foreach ($ext->permissions as $permission) {
                $defined = false;

                if ($permission == "TEXT") {
                    // echo("<li>Afficher du texte dans la barre des widgets</li>");
                    echo("<h4 class=\"view_info_perms_title\"><img class=\"view_info_perms_img\" src=\"/icon/perm_text.png\">Afficher du texte dans la barre des widgets</h4><span class=\"view_info_perms_desc\">Autorise cette extension à afficher du contenu dans la barre des widgets (panneau Détails) à côté d'autres extensions qui affichent du contenu.</span>");
                    $defined = true;
                }

                if ($permission == "FILES") {
                    // echo("<li>Accéder librement aux fichiers du serveur</li>");
                    echo("<h4 class=\"view_info_perms_title\"><img class=\"view_info_perms_img\" src=\"/icon/perm_files.png\">Accéder librement aux fichiers du serveur</h4><span class=\"view_info_perms_desc\">Autorise cette extension à accéder aux fichiers permettant de faire fonctionner votre site, de les modifier ou de les supprimer.</span>");
                    $defined = true;
                }

                if ($permission == "INTERNET") {
                    // echo("<li>Accéder librement à Internet</li>");
                    echo("<h4 class=\"view_info_perms_title\"><img class=\"view_info_perms_img\" src=\"/icon/perm_internet.png\">Accéder librement à Internet</h4><span class=\"view_info_perms_desc\">Autorise cette extension à accéder à des informations provenants de sites externes depuis Internet sans demander d'avertissement.<br>Cette permission peut ralentir considérablement votre site.</span>");
                    $defined = true;
                }

                if ($permission == "EDITUI") {
                    // echo("<li>Modifier l'apparence et la position des éléments de votre site</li>");
                    echo("<h4 class=\"view_info_perms_title\"><img class=\"view_info_perms_img\" src=\"/icon/perm_editui.png\">Modifier l'apparence et la position des éléments de votre site</h4><span class=\"view_info_perms_desc\">Autorise cette extension à modifier le rendu final de votre site, pour par exemple ajouter, modifier ou retirer des éléments.</span>");
                    $defined = true;
                }

                if ($permission == "ONTOP") {
                    // echo("<li>S'afficher par dessus l'interface du site</li>");
                    echo("<h4 class=\"view_info_perms_title\"><img class=\"view_info_perms_img\" src=\"/icon/perm_ontop.png\">S'afficher par dessus l'interface du site</h4><span class=\"view_info_perms_desc\">Autorise cette extension à afficher du contenu par dessus le contenu déjà existant sur le site.</span>");
                    $defined = true;
                }

                if ($permission == "GETINFO") {
                    // echo("<li class=\"specialperm\">Obtenir des informations concernant les visiteurs de votre site</li>");
                    echo("<h4 class=\"view_info_perms_title specialperm\"><img class=\"view_info_perms_img\" src=\"/icon/perm_getinfo.png\">Obtenir des informations concernant les visiteurs de votre site</h4><span class=\"view_info_perms_desc\">Autorise cette extension à accéder aux informations concernant les visiteurs de votre site (informations du navigateur, adresse IP, configuration du navigateur, ...) sans demander la permission aux visiteurs.<br>Cette permission peut enfreindre le règlement général sur la protection des données dans certains cas ou nécessiter une déclaration à la CNIL.</span>");
                    $defined = true;
                }

                if ($permission == "IMAGES") {
                    // echo("<li class=\"specialperm\">Afficher des médias (images, vidéos, musiques, etc...) sur certaines pages de votre site</li>");
                    echo("<h4 class=\"view_info_perms_title specialperm\"><img class=\"view_info_perms_img\" src=\"/icon/perm_images.png\">Afficher des médias (images, vidéos, musiques, etc...) sur certaines pages de votre site</h4><span class=\"view_info_perms_desc\">Autorise cette extension à afficher des fichiers multimédia tels que des images, des vidéos, ou de la musique sur certaines des pages de votre site.</span>");
                    $defined = true;
                }

                if ($permission == "SETTINGS") {
                    // echo("<li class=\"specialperm\">Modifier les paramètres de votre site</li>");
                    echo("<h4 class=\"view_info_perms_title specialperm\"><img class=\"view_info_perms_img\" src=\"/icon/perm_settings.png\">Modifier les paramètres de votre site</h4><span class=\"view_info_perms_desc\">Autorise cette extension à modifier les paramètres et la configuration de votre site sans vous demander d'avertissement et sans détailler les modifications.</span>");
                    $defined = true;
                }

                if ($permission == "GETPAGES") {
                    // echo("<li>Obtenir le contenu des pages</li>");
                    echo("<h4 class=\"view_info_perms_title\"><img class=\"view_info_perms_img\" src=\"/icon/perm_getpages.png\">Obtenir le contenu des pages</h4><span class=\"view_info_perms_desc\">Autorise cette extension à accéder au contenu brut (sous forme de code) de toutes les pages du site sans avertissement.</span>");
                    $defined = true;
                }

                if ($permission == "CHANGEPAGES") {
                    // echo("<li>Modifier et publier le contenu des pages</li>");
                    echo("<h4 class=\"view_info_perms_title\"><img class=\"view_info_perms_img\" src=\"/icon/perm_changepages.png\">Modifier et publier le contenu des pages</h4><span class=\"view_info_perms_desc\">Autorise cette extension à modifier le contenu des pages et à publier les modifications sans avertissement.</span>");
                    $defined = true;
                }

                if ($permission == "UPDATES") {
                    // echo("<li>Se mettre à jour automatiquement en utilisant son propre système de mise à jour</li>");
                    echo("<h4 class=\"view_info_perms_title\"><img class=\"view_info_perms_img\" src=\"/icon/perm_updates.png\">Se mettre à jour automatiquement en utilisant son propre système de mise à jour</h4><span class=\"view_info_perms_desc\">Autorise cette extension à se mettre à jour automatiquement et silencieusement en utilisant son propre système de mise à jour hors du CMS Store.<br>Cette permission peut ralentir considérablement votre site.</span>");
                    $defined = true;
                }

                if ($permission == "CMSSTORE") {
                    // echo("<li>Accéder au CMS Store, modifier les informations, et/ou mettre à jour la base de données</li>");
                    echo("<h4 class=\"view_info_perms_title\"><img class=\"view_info_perms_img\" src=\"/icon/perm_cmsstore.png\">Accéder au CMS Store, modifier les informations, et/ou mettre à jour la base de données</h4><span class=\"view_info_perms_desc\">Autorise cette extension à accéder aux informations du CMS Store, modifier les informations sur les extensions, et regénérer la base de données.<br>Cette permission peut ralentir considérablement votre site.</span>");
                    $defined = true;
                }

                if ($permission == "PLUGINSMGMT") {
                    // echo("<li>Installer, mettre à jour, et/ou désinstaller d'autres extensions</li>");
                    echo("<h4 class=\"view_info_perms_title\"><img class=\"view_info_perms_img\" src=\"/icon/perm_pluginsmgmt.png\">Installer, mettre à jour, et/ou désinstaller d'autres extensions</h4><span class=\"view_info_perms_desc\">Autorise cette extension à installer, mettre à jour ou supprimer d'autres extensions sans avertissement et silencieusement.<br>Cette permission peut ralentir considérablement votre site.</span>");
                    $defined = true;
                }

                if ($permission == "ROOT") {
                    // echo("<li class=\"criticalperm\">Accéder à des fichiers hors de votre site sur votre serveur</li>");
                    echo("<h4 class=\"view_info_perms_title criticalperm\"><img class=\"view_info_perms_img\" src=\"/icon/perm_root.png\">Accéder à des fichiers hors de votre site sur votre serveur</h4><span class=\"view_info_perms_desc\">Autorise cette extension à accéder aux fichiers présents sur votre serveur qui ne sont pas dans le dossier racine de votre site.</span>");
                    $defined = true;
                }

                if ($permission == "SHELL") {
                    // echo("<li class=\"criticalperm\">Exécuter des commandes sur votre serveur</li>");
                    echo("<h4 class=\"view_info_perms_title criticalperm\"><img class=\"view_info_perms_img\" src=\"/icon/perm_shell.png\">Exécuter des commandes sur votre serveur</h4><span class=\"view_info_perms_desc\">Autorise cette extension à exécuter des commandes sur votre serveur en tant qu'administrateur et sans vous avertir.</span>");
                    $defined = true;
                }

                if ($permission == "RESET") {
                    // echo("<li class=\"criticalperm\">Réinitialiser votre site sans avertissement</li>");
                    echo("<h4 class=\"view_info_perms_title criticalperm\"><img class=\"view_info_perms_img\" src=\"/icon/perm_reset.png\">Réinitialiser votre site sans avertissement</h4><span class=\"view_info_perms_desc\">Autorise cette extension à réinitialiser votre site et à supprimer toutes les données sans vous demander de confirmation.</span>");
                    $defined = true;
                }

                if (!$defined) {
                    // echo("<li><code>" . $permission . "</code></li>");
                    echo("<h4 class=\"view_info_perms_title\"><img class=\"view_info_perms_img\" src=\"/icon/perm_other.png\"><code>" . $permission . "</code></h4><span class=\"view_info_perms_desc\">Permission autre et inconnue provenant d'une autre extension ou d'un autre service.</span>");
                }
            }
            
            ?>
            </div>
            <h3><img class="view_info_title_img" src="/icon/more.png">Informations complémentaires</h3>
            <div id="view_info_misc">
            <div id="view_info_more">
                <div id="view_info_more_item">
                    <a title="Langage de programmation utilisé en majorité"><img class="view_info_more_img" src="/icon/language.png"></a><?= $ext->language ?>
                </div>
                <div id="view_info_more_item">
                    <a title="Contrat de licence utilisé par l'extension"><img class="view_info_more_img" src="/icon/license.png"></a><?= $ext->license ?>
                </div>
                <div id="view_info_more_item">
                    <a title="Identifiant interne du paquet utilisé"><img class="view_info_more_img" src="/icon/package.png"></a><code><?= $ext->id ?></code>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>