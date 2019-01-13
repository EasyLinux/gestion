<?php

function ErrorHandler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting, so let it fall
        // through to the standard PHP error handler
        return false;
    }

    switch ($errno) {
    case E_USER_ERROR:
        echo "<b>ERREUR</b> [$errno] $errstr<br />\n";
        echo "  Erreur faltale à la ligne $errline du fichier $errfile";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Abandon...<br />\n";
        exit(1);
        break;

    case E_USER_WARNING:
        echo "<b>ATTENTION</b> [$errno] $errstr<br />\n";
        break;

    case E_USER_NOTICE:
        echo "<b>NOTE</b> [$errno] $errstr<br />\n";
        break;

    default:
        echo "Type d'erreur indéfinie: [$errno] $errstr<br />\n";
        break;
    }

    /* Don't execute PHP internal error handler */
    return true;
}
