<?php

namespace Haltuf\GenderHelper\DI ;

use Nette\DI\CompilerExtension ;


class Extension extends CompilerExtension {
	
	public $defaults = array(
		'salutationFilter' => 'salute',
		'genderFilter' => 'gender'
	);
	
	
	public function loadConfiguration() {
		
		$config = $this->getConfig( $this->defaults ) ;
		$builder = $this->getContainerBuilder() ;
		
		$genderer = $builder->addDefinition($this->prefix('genderer'))
			->setClass('Haltuf\Genderer\Genderer') ;
		
		$builder->addDefinition($this->prefix('helper'))
			->setClass('Haltuf\GenderHelper\Helper', array( $genderer )) ;
		

		if( $builder->hasDefinition('nette.latteFactory')) {
			
			$latte = $builder->getDefinition('nette.latteFactory') ;
			
			$latte->addSetup( 'addFilter', array( 
				$config['salutationFilter'],
				array( $this->prefix('@helper'), 'salute' )
			)) ;
			
			$latte->addSetup( 'addFilter', array( 
				$config['genderFilter'],
				array( $this->prefix('@helper'), 'gender' )
			)) ;
		}
	}
}