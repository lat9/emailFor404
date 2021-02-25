<?php
/**
 * Autoloader to instantiate observer class
 */
$autoLoadConfig[200][] = array(
    'autoType' => 'class',
    'loadFile' => 'observers/class.emailFor404.php'
);
$autoLoadConfig[200][] = array(
    'autoType' => 'classInstantiate',
    'className' => 'emailFor404',
    'objectName' => 'emailFor404'
);
