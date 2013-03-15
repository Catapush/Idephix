<?php

/**
 * Phar creator, build the phar package
 *
 * @example php phar_creator.php
 */

$phar = new Phar('idephix.phar');
$phar->buildFromDirectory('..', '/\.(php|dist)$/');

$stub = <<<ENDSTUB
#!/usr/bin/env php
<?php
Phar::mapPhar('idephix.phar');
require 'phar://idephix.phar/bin/do.php';
__HALT_COMPILER();
ENDSTUB;

$phar->setStub($stub);
