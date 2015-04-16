<?php

use Tester\Assert ;
use Nette\Configurator ;

require __DIR__ . '/../bootstrap.php' ;


$configurator = new Configurator ;
$configurator->setTempDirectory(TEMP_DIR);
$configurator->addConfig(__DIR__ . '/config.neon');
$container = $configurator->createContainer();

$genderer = $container->getService('genderHelper.genderer') ;
Assert::type( 'Haltuf\Genderer\Genderer', $genderer ) ;

$helper = $container->getService('genderHelper.helper') ;
Assert::type( 'Haltuf\GenderHelper\Helper', $helper ) ;

$latte = $container->getByType('Nette\Bridges\ApplicationLatte\ILatteFactory')->create() ;
Assert::type( 'Latte\Engine', $latte ) ;
Assert::true( key_exists( 'oslov', $latte->getFilters() )) ;
Assert::true( key_exists( 'pohlavi', $latte->getFilters() )) ;