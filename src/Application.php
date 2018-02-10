<?php

namespace MedzlisPrijepolje;

use MedzlisPrijepolje\Services\MainService;

class Application extends \Cicada\Application
{
    public $basePath;
	public function __construct($configPath){
		parent::__construct();
        $this->configure($configPath);

        $this->configureDatabase();
		$this->setUpServices();

        $this->basePath = $this['config']->getPathToUpload();
	}
    protected function configure($configPath) {
        $this['config'] = function () use ($configPath) {
            return new Configuration($configPath);
        };
    }

	protected function setUpServices(){
		$this['mainService'] = function(){
			return new mainService();
		};
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