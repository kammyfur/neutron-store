<div id="header">
    <div id="header_top">
        <span id="header_lastupdate"><span class="mobile_hide">Dernière mise à jour le</span> <?= file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/data/last_update_pretty") ?></span>
        <span id="header_branding"><span class="mobile_hide">Minteck Projects</span> CMS Store</span>
    </div>
    <div id="header_menu">
        <a href="/" class="header_link"><img id="header_home" src="/icon/home.png"></a><a href="/contributors" class="header_link">Contributeurs</a><a href="/list" class="header_link">Liste complète</a><!--<a href="/guide" class="header_link">Aide</a>--><!-- HELP: Comming soon! -->
    </div>
</div>

<link rel="preload" href="/style/header.css" as="style">
<link rel="preload" href="/style/loader.css" as="style">
<link rel="preload" href="/style/responsive.css" as="style">
<link rel="preload" href="/style/fonts.css" as="style">

<script>

window.onerror = function(error) {
    title = error.split(":")[0];
    if (title == "EvalError") {
        location.href = "/error/?id=JS_EVALERROR"
    }
    if (title == "InternalError") {
        location.href = "/error/?id=JS_INTERNALERROR"
    }
    if (title == "RangeError") {
        location.href = "/error/?id=JS_RANGEERROR"
    }
    if (title == "ReferenceError") {
        location.href = "/error/?id=JS_REFERENCEERROR"
    }
    if (title == "SyntaxError") {
        location.href = "/error/?id=JS_SYNTAXERROR"
    }
    if (title == "TypeError") {
        location.href = "/error/?id=JS_TYPEERROR"
    }
    if (title == "URIError") {
        location.href = "/error/?id=JS_URIERROR"
    }
    location.href = "/error/?id=JS_INTERNALERROR";
}

</script>