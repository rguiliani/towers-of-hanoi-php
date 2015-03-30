<?php
    define('DISC_COUNT', 12);
    define('STACK_COUNT', 3);
    define('DEBUG', TRUE);
    $loader = require '../vendor/autoload.php';
    //TODO add logging

    function logsave($text) {
        if (DEBUG) {
            echo $text;
        }
    }

