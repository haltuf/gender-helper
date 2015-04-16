<?php

use Tester\Assert ;
use Haltuf\Genderer\Genderer ;
use Haltuf\GenderHelper\Helper ;

require __DIR__ . '/../bootstrap.php' ;


$g = new Genderer ;
$h = new Helper( $g ) ;

Assert::same( 'Tomáši Vomáčko', $h->salute('Tomáš Vomáčka')) ;
Assert::same( 'm', $h->gender('Tomáš Vomáčka')) ;
Assert::same( 'muž', $h->gender('Tomáš Vomáčka', 'muž', 'žena')) ;

Assert::same( 'Magdaleno Rettigová', $h->salute('Magdalena Rettigová')) ;
Assert::same( 'f', $h->gender('Magdalena Rettigová')) ;
Assert::same( 'žena', $h->gender('Magdalena Rettigová', 'muž', 'žena' )) ;