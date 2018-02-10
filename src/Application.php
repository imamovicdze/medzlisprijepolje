<?php

namespace MedzlisPrijepolje;

use MedzlisPrijepolje\Services\MainService;

class Application extends \Cicada\Application
{
	public function __construct(){
		parent::__construct();
		$this->setUpServices();
	}

	private function setUpServices(){
		$this['mainService'] = function(){
			return new mainService();
		}
	}
}