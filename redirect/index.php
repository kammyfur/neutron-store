<?php

if (file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/data/last_update") != date("Y-m-d-H")) {
    include_once $_SERVER['DOCUMENT_ROOT'] . "/tools/update.php";
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action != "install" && $action != "remove" && $action != "update") {
        $_GET['id'] = "REDIRECT_UNKNOWN";
        include_once $_SERVER['DOCUMENT_ROOT'] . "/error/index.php";
        die();    
    }
} else {
    $_GET['id'] = "REDIRECT_MISSING";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/error/index.php";
    die();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $extensions = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/data/packages.json"));
    $selected = false;
    foreach ($extensions as $extension) {
        if ($extension->id == $_GET['id']) {
            $ext = $extension;
            $selected = true;
        }
    }
    if (!$selected) {
        $_GET['id'] = "REDIRECT_NOTFOUND";
        include_once $_SERVER['DOCUMENT_ROOT'] . "/error/index.php";
        die();    
    }
} else {
    $_GET['id'] = "REDIRECT_MISSING";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/error/index.php";
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php
    
    if ($action == "install") {
        echo("Installer");
    }
    
    if ($action == "remove") {
        echo("Désinstaller");
    }
    
    if ($action == "update") {
        echo("Mettre à jour");
    }
    
    ?> · <?= $ext->name ?> · CMS Store · Minteck Projects CMS</title>
    <link rel="stylesheet" href="/styles/loader.css">
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/tools/header.php"; ?>
    <div id="content-escape">
        <?php
        
        if ($action == "install") {
            echo("<h2>Installation de l'extension</h2>");
        }
        
        if ($action == "remove") {
            echo("<h2>Désinstallation de l'extension</h2>");
        }
        
        if ($action == "update") {
            echo("<h2>Mise à jour de l'extension</h2>");
        }
        
        ?>
        <p>Vous allez <?= $action == "install" ? "installer" : "" ?><?= $action == "remove" ? "désinstaller" : "" ?><?= $action == "update" ? "mettre à jour" : "" ?> l'extension <?= $action == "remove" ? "de" : "sur" ?> votre site. Pour cela, vous aurez besoin du mot de passe de l'administration, et du CMS Store activé...</p>
        <h3>Informations demandées</h3>
        <input type="text" id="name" placeholder="Nom de domaine de votre site"><br>
        <input type="checkbox" id="newsite" name="newsite"><label for="newsite">Ce site exécute Minteck Projects CMS 2.0 ou suivant (CMS Store 1.1 ou suivant)</label><br>
        <input type="text" id="port" placeholder="Port (optionnel) — 80 par défaut"><br>
        <p>N'entrez que le nom de domaine de votre site, et pas l'adresse complète. Si il n'exécute pas Minteck Projects CMS ou une version qui n'inclus pas le CMS Store, vous aurez une erreur.</p>
        <h3>Liens</h3>
        <ul>
            <li><a class="link jslink" onclick="initCmsStore(document.getElementById('name').value, document.getElementById('port').value, document.getElementById('newsite').checked)">Initialiser le CMS Store</a></li>
            <li><a class="link jslink" onclick="refreshCmsStore(document.getElementById('name').value, document.getElementById('port').value, document.getElementById('newsite').checked)">Regénérer la base de données du CMS Store</a></li>
            <li><a class="link jslink" onclick="actionCmsStore(document.getElementById('name').value, document.getElementById('port').value, document.getElementById('newsite').checked)"><b><?= $action == "install" ? "Installer" : "" ?><?= $action == "remove" ? "Désinstaller" : "" ?><?= $action == "update" ? "Mettre à jour" : "" ?> l'extension</b></a></li>
        </ul>
    </div>
</body>
<script>

function validPath(domain) {
    var re = new RegExp(/(([a-z0-9]|[a-z0-9][a-z0-9\-]*[a-z0-9])\.)*([a-z0-9]|[a-z0-9][a-z0-9\-]*[a-z0-9])(:[0-9]+)?$/igm); 
    return domain.match(re);
}

function initCmsStore(website, port, newws) {
    if (validPath(website)) {
        if (newws) {
            if (port.trim() == "") {
                window.open("http://" + website + "/cms-special/admin/store/ext-init");
            } else {
                if (port - 1 + 1 == NaN) {
                    alert("Le port est invalide");
                } else {
                    window.open("http://" + website + ":" + port + "/cms-special/admin/store/ext-init");
                }
            }
        } else {
            if (port.trim() == "") {
                window.open("http://" + website + "/cms-special/admin/store", "_blank");
            } else {
                if (port - 1 + 1 == NaN) {
                    alert("Le port est invalide");
                } else {
                    window.open("http://" + website + ":" + port + "/cms-special/admin/store", "_blank");
                }
            }
        }
    } else {
        alert("Nom de domaine du site invalide");
    }
}

function refreshCmsStore(website, port, newws) {
    if (validPath(website)) {
        if (newws) {
            if (port.trim() == "") {
                window.open("http://" + website + "/cms-special/admin/store/ext-dbupdate");
            } else {
                if (port - 1 + 1 == NaN) {
                    alert("Le port est invalide");
                } else {
                    window.open("http://" + website + ":" + port + "/cms-special/admin/store/ext-dbupdate");
                }
            }
        } else {
            if (port.trim() == "") {
                window.open("http://" + website + "/cms-special/admin/store/dbupdate", "_blank");
            } else {
                if (port - 1 + 1 == NaN) {
                    alert("Le port est invalide");
                } else {
                    window.open("http://" + website + ":" + port + "/cms-special/admin/store/dbupdate", "_blank");
                }
            }
        }
    } else {
        alert("Nom de domaine du site invalide");
    }
}

function actionCmsStore(website,port, newws) {
    if (validPath(website)) {
        if (newws) {
            if (port.trim() == "") {
                window.open("http://" + website + "/cms-special/admin/store/ext-<?= $action ?>/?id=<?= array_search($ext, (array)$extensions) ?>");
            } else {
                if (port - 1 + 1 == NaN) {
                    alert("Le port est invalide");
                } else {
                    window.open("http://" + website + ":" + port + "/cms-special/admin/store/ext-<?= $action ?>/?id=<?= array_search($ext, (array)$extensions) ?>");
                }
            }
        } else {
            if (port.trim() == "") {
                window.open("http://" + website + "/cms-special/admin/store/<?= $action ?>/?id=<?= array_search($ext, (array)$extensions) ?>", "_blank");
            } else {
                if (port - 1 + 1 == NaN) {
                    alert("Le port est invalide");
                } else {
                    window.open("http://" + website + ":" + port + "/cms-special/admin/store/<?= $action ?>/?id=<?= array_search($ext, (array)$extensions) ?>", "_blank");
                }
            }
        }
    } else {
        alert("Nom de domaine du site invalide");
    }
}

</script>
</html>