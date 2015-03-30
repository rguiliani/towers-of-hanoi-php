<?php
    require ("./bootstrap.php");
    $test = new Rossi\TowerOfHanoi(STACK_COUNT, DISC_COUNT);
    $test->solve();

