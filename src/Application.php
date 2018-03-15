<?php

namespace MedzlisPrijepolje;

use MedzlisPrijepolje\Services\MainService;
use MedzlisPrijepolje\Services\DashboardService;
use MedzlisPrijepolje\Services\NewsService;
use MedzlisPrijepolje\Services\CategoryService;
use Twig_SimpleFunction;

class Application extends \Cicada\Application
{
	public function __construct($configPath){
		parent::__construct();
        $this->configure($configPath);

        $this->configureDatabase();
		$this->setUpServices();
		$this->setupTwig();

	}
    protected function configure($configPath) {
        $this['config'] = function () use ($configPath) {
            return new Configuration($configPath);
        };
    }

	protected function setUpServices(){
		$this['MainService'] = function (){
			return new mainService();
		};

        $this['NewsService'] = function (){
            return new NewsService();
        };
        $this['CategoryService'] = function (){
            return new CategoryService();
        };
	}
/*
	protected function setUpControllers(){

    }
*/
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
    private function setupTwig() {
        $this['twig'] = function() {
            $loader = new \Twig_Loader_Filesystem('front-end');
            $twig = new  \Twig_Environment($loader, array(//
//                'cache' => 'cache',
                'debug' => true
            ));
            $twig->addExtension(new \Twig_Extension_Debug());
            $pathFunction = function ($name, $params = []) {
                /** @var Route $route */
                $route = $this['router']->getRoute($name);
                return $route->getRealPath($params);
            };
            $twig->addFunction(new Twig_SimpleFunction('path', $pathFunction));

            return $twig;
        };
    }
}