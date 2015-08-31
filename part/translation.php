<?php
$lang = "cz";
if (isset($_COOKIE["lang"])) {
    $lang = $_COOKIE["lang"];
}
include 'part/translation_' . $lang . '.php';