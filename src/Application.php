<?php

namespace MedzlisPrijepolje;

use MedzlisPrijepolje\Services\MainService;
use MedzlisPrijepolje\Services\DashboardService;

class Application extends \Cicada\Application
{
	public function __construct($configPath){
		parent::__construct();
        $this->configure($configPath);

        $this->configureDatabase();
		$this->setUpServices();

	}
    protected function configure($configPath) {
        $this['config'] = function () use ($configPath) {
            return new Configuration($configPath);
        };
    }

	protected function setUpServices(){
		$this['mainService'] = function (){
			return new mainService();
		};

		$this['dashboardService'] = function (){
		    return new dashboardService();
        };
	}

	protected function setUpControllers(){

    }

    protected function configureDatabase()
    {
        $dbConfig = $this['config']->getDbConfig();
        \ActiveRecord\Config::initialize(function (\ActiveRecord\Config $cfg) use ($dbConfig) {
            $cfg->set_model_directory('src/Models');
            $cfg->set_connections([
                'main' => sprintf('mysql://%s:%s@%s/%s',
                    $dbConfig['user'], $dbConfig['password'], $dbConfig['host'], $dbConfig['name']
                )
            ]);
            $cfg->set_default_connection('main');
        });
    }
}