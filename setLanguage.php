<?php

setcookie("lang", $_GET["lang"], time() + (86400 * 300) );
header("Location: " . $_SERVER['HTTP_REFERER']);