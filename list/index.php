<?php

function showExtension($name, $package, $editor, $icon) {
    return '<div id="list_ph">
    <div class="list_item">
        <a href="/view/?id=' . $package . '" class="list_item_link"><table>
            <tbody>
                <tr>
                    <td><img src="' . $icon . '" alt="Icône de l\'extension" class="list_item_icon"></td>
                    <td>
                        <span class="list_item_name">' . $name . '</span><br>
                        <span class="list_item_desc"><code>' . $package . '</code> • par ' . $editor . '</span>
                    </td>
                </tr>
            </tbody>
        </table></a>
    </div>
</div>';
}

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
    <title>Liste des extensions · CMS Store · Minteck Projects CMS</title>
    <link rel="stylesheet" href="/styles/loader.css">
</head>
<body>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/tools/header.php"; ?>
    <div id="content-escape">
        <h1>Liste des extensions du CMS Store</h1>
        <p>Cette liste regroupe toutes les extensions présentes dans le CMS Store.</p>
        <h2>Sauter vers...</h2>
        <ul id="list_jump">
            <li><a href="#specialchars" class="link">#</a></li>
            <li><a href="#A" class="link">A</a></li>
            <li><a href="#B" class="link">B</a></li>
            <li><a href="#C" class="link">C</a></li>
            <li><a href="#D" class="link">D</a></li>
            <li><a href="#E" class="link">E</a></li>
            <li><a href="#F" class="link">F</a></li>
            <li><a href="#G" class="link">G</a></li>
            <li><a href="#H" class="link">H</a></li>
            <li><a href="#I" class="link">I</a></li>
            <li><a href="#J" class="link">J</a></li>
            <li><a href="#K" class="link">K</a></li>
            <li><a href="#L" class="link">L</a></li>
            <li><a href="#M" class="link">M</a></li>
            <li><a href="#N" class="link">N</a></li>
            <li><a href="#O" class="link">O</a></li>
            <li><a href="#P" class="link">P</a></li>
            <li><a href="#Q" class="link">Q</a></li>
            <li><a href="#R" class="link">R</a></li>
            <li><a href="#S" class="link">S</a></li>
            <li><a href="#T" class="link">T</a></li>
            <li><a href="#U" class="link">U</a></li>
            <li><a href="#V" class="link">V</a></li>
            <li><a href="#W" class="link">W</a></li>
            <li><a href="#X" class="link">X</a></li>
            <li><a href="#Y" class="link">Y</a></li>
            <li><a href="#Z" class="link">Z</a></li>
        </ul>
        <h2>Liste des extensions triées par ordre alphabétique</h2>
        <?php
        
        $extensions = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/data/packages.json"));

        ?>
        <h3 id="specialchars">#</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (
            !strtolower(substr($extension->name, 0, 1)) == "a"
            && !strtolower(substr($extension->name, 0, 1)) == "b"
            && !strtolower(substr($extension->name, 0, 1)) == "c"
            && !strtolower(substr($extension->name, 0, 1)) == "d"
            && !strtolower(substr($extension->name, 0, 1)) == "e"
            && !strtolower(substr($extension->name, 0, 1)) == "f"
            && !strtolower(substr($extension->name, 0, 1)) == "g"
            && !strtolower(substr($extension->name, 0, 1)) == "h"
            && !strtolower(substr($extension->name, 0, 1)) == "i"
            && !strtolower(substr($extension->name, 0, 1)) == "j"
            && !strtolower(substr($extension->name, 0, 1)) == "k"
            && !strtolower(substr($extension->name, 0, 1)) == "l"
            && !strtolower(substr($extension->name, 0, 1)) == "m"
            && !strtolower(substr($extension->name, 0, 1)) == "n"
            && !strtolower(substr($extension->name, 0, 1)) == "o"
            && !strtolower(substr($extension->name, 0, 1)) == "p"
            && !strtolower(substr($extension->name, 0, 1)) == "q"
            && !strtolower(substr($extension->name, 0, 1)) == "r"
            && !strtolower(substr($extension->name, 0, 1)) == "s"
            && !strtolower(substr($extension->name, 0, 1)) == "t"
            && !strtolower(substr($extension->name, 0, 1)) == "u"
            && !strtolower(substr($extension->name, 0, 1)) == "v"
            && !strtolower(substr($extension->name, 0, 1)) == "w"
            && !strtolower(substr($extension->name, 0, 1)) == "x"
            && !strtolower(substr($extension->name, 0, 1)) == "y"
            && !strtolower(substr($extension->name, 0, 1)) == "z"
            ) {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="A">A</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "a") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="B">B</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "b") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="C">C</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "c") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="D">D</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "d") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="E">E</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "e") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="F">F</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "f") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="G">G</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "g") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="H">H</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "h") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="I">I</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "i") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="J">J</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "j") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="K">K</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "k") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="L">L</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "l") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="M">M</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "m") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="O">O</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "o") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="P">P</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "p") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="Q">Q</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "q") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="R">R</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "r") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="S">S</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "s") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="T">T</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "t") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="U">U</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "u") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="V">V</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "v") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="W">W</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "w") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="X">X</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "x") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="Y">Y</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "y") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
        <h3 id="Z">Z</h3>
        <?php
        
        foreach ($extensions as $extension) {
            if (strtolower(substr($extension->name, 0, 1)) == "z") {
                echo(showExtension($extension->name, $extension->id, $extension->author, "/icon/default.png"));
            }
        }
        
        ?>
    </div>
</body>
</html>