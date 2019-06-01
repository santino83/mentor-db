<?php

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$loader = require __DIR__ . "/../vendor/autoload.php";
/* @var $loader \Composer\Autoload\ClassLoader */
$loader->addPsr4('Santino83\\DB\\', __DIR__);

date_default_timezone_set('UTC');
/*
// autoload doctrine annotations
use Doctrine\Common\Annotations\AnnotationRegistry;

AnnotationRegistry::registerLoader(array($loader, 'loadClass'));
*/