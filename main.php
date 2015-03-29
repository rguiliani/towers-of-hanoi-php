<?php
    define('DISC_COUNT', 10);
    define('STACK_COUNT', 3);
    define('DEBUG', TRUE);
    $log = [];
    function __autoload($classname) {
        $filename = "./". $classname .".php";
        include_once($filename);
    }

    function logsave($text) {
        if (DEBUG) {
            echo $text;
            $log[] = $text;
        }
    }
    $test = new TowerOfHanoi(STACK_COUNT, DISC_COUNT);
    $test->solve();

