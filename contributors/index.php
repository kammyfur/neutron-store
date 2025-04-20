<?php

if (file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/data/last_update") != date("Y-m-d-H")) {
    include_once $_SERVER['DOCUMENT_ROOT'] . "/tools/update.php";
}

$contributors_dev = json_decode(file_get_contents("https://gitlab.com/api/v4/projects/14618666/users"));
$contributors_exts = json_decode(file_get_contents("https://gitlab.com/api/v4/projects/14678923/users"));
$globmb = json_decode(file_get_contents("https://gitlab.com/api/v4/groups/4653596/members?access_token=blablabla"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contributeurs · CMS Store · Minteck Projects CMS</title>
    <link rel="stylesheet" href="/styles/loader.css">
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/tools/header.php"; ?>
    <div id="content-escape">
        <h2>Ces personnes contribuent à Minteck Projects CMS et à la maintenance du CMS Store :</h2>

        <h3>Équipe de développement Minteck Projects CMS</h3>
        <ul>
            <?php
            
            foreach ($contributors_dev as $dev) {
                echo("<li><a class=\"link\" target=\"_blank\" href=\"" . $dev->web_url . "\">" . $dev->name . "</a> <i>(@" . $dev->username . ")</i>");
                if (strpos($dev->name, "Minteck Projects Bot") !== false) {
                    echo(", robot");
                }
                $me = false;
                foreach ($globmb as $member) {
                    if ($member->username == $dev->username) {
                        if (!$me) {
                            if ($member->access_level >= 50 && !$me) {
                                echo(", propriétaire du groupe global");
                                $me = true;
                            } else {
                                if (!$me) {
                                    echo(", membre du groupe global");
                                    $me = true;
                                }
                            }
                        }
                    }
                }
                if (!$me) {
                    echo(", membre uniquement du projet");
                    $me = true;
                }
                echo("</li>");
            }
            
            ?>
        </ul>

        <h3>Mainteneurs des extensions du CMS Store</h3>
        <ul>
            <?php
            
            foreach ($contributors_exts as $dev) {
                echo("<li><a class=\"link\" target=\"_blank\" href=\"" . $dev->web_url . "\">" . $dev->name . "</a> <i>(@" . $dev->username . ")</i>");
                if (strpos($dev->name, "Minteck Projects Bot") !== false) {
                    echo(", robot");
                }
                $me = false;
                foreach ($globmb as $member) {
                    if ($member->username == $dev->username) {
                        if (!$me) {
                            if ($member->access_level >= 50 && !$me) {
                                echo(", propriétaire du groupe global");
                                $me = true;
                            } else {
                                if (!$me) {
                                    echo(", membre du groupe global");
                                    $me = true;
                                }
                            }
                        }
                    }
                }
                if (!$me) {
                    echo(", membre uniquement du projet");
                    $me = true;
                }
                echo("</li>");
            }
            
            ?>
        </ul>
    </div>
</body>
</html>
