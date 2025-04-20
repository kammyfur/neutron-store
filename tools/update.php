<?php

if (!isset($_SERVER['DOCUMENT_ROOT']) || trim($_SERVER['DOCUMENT_ROOT']) == "") {
    $root = dirname(getcwd());
} else {
    $root = $_SERVER['DOCUMENT_ROOT'];
}

$packages = file_get_contents("https://gitlab.com/minteck-projects/mpcms/plugins/raw/master/plugins.list");
$packageslist = explode("\n", $packages);
$packagesjson = new stdClass();
foreach ($packageslist as $package) {
    if (trim($package) != "") {
        $packagesjson->$package = new stdClass();
        try {
            $packageinfo = file_get_contents("https://gitlab.com/minteck-projects/mpcms/plugins/raw/master/" . $package . "/store.json");
            $packageinfojson = json_decode($packageinfo);
            $packagesjson->$package = $packageinfojson;
        } catch (Warning $err) {
            die("Erreur d'incorporation du packet " . $package . " lors de l'obtention ou le décodage du fichier store");
        }
    }
}
$blockedjson = (object)[];
$blockedjson->users = json_decode(file_get_contents("https://gitlab.com/minteck-projects/mpcms/plugins/raw/master/blocked-users.json"));
$blockedjson->packages = json_decode(file_get_contents("https://gitlab.com/minteck-projects/mpcms/plugins/raw/master/blocked-packages.json"));
file_put_contents($root . "/data/packages.json", json_encode($packagesjson, JSON_PRETTY_PRINT));
file_put_contents($root . "/data/blocked.json", json_encode($blockedjson, JSON_PRETTY_PRINT));
file_put_contents($root . "/data/last_update", date("Y-m-d-H"));
$month = date("m");
if ($month == "01") {
    $monthpretty = "janv.";
}
if ($month == "02") {
    $monthpretty = "fév.";
}
if ($month == "03") {
    $monthpretty = "mars";
}
if ($month == "04") {
    $monthpretty = "avril";
}
if ($month == "05") {
    $monthpretty = "mai";
}
if ($month == "06") {
    $monthpretty = "juin";
}
if ($month == "07") {
    $monthpretty = "juil.";
}
if ($month == "08") {
    $monthpretty = "août";
}
if ($month == "09") {
    $monthpretty = "sept.";
}
if ($month == "10") {
    $monthpretty = "oct.";
}
if ($month == "11") {
    $monthpretty = "nov.";
}
if ($month == "12") {
    $monthpretty = "déc.";
}
if (!isset($monthpretty)) {
    $monthpretty = $month;
}
file_put_contents($root . "/data/last_update_pretty", date("d ") . $monthpretty . date(" Y à H:i"));
