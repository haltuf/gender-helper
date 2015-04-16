<?php

namespace Haltuf\GenderHelper ;

use Haltuf\Genderer\Genderer ;


class Helper {
	
	/**
	 * @var Haltuf\Genderer\Genderer
	 */
	private $g ;

	
	public function __construct( Genderer $g ) {
		$this->g = $g ;
	}
	
	public function salute( $name ) {
		return $this->g->getVocative( $name ) ;
	}
	
	public function gender( $name, $male = 'm', $female = 'f' ) {
		
		$gender = $this->g->getGender( $name ) ;
		
		if( $gender == 'm' ) {
			return $male ;
		}
		
		if( $gender == 'f' ) {
			return $female ;
		}
		
		return '' ;
	}
}
