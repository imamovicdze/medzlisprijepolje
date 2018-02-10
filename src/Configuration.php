<?php
/**
 * Created by PhpStorm.
 * User: imamo
 * Date: 2/10/2018
 * Time: 6:12 PM
 */
namespace MedzlisPrijepolje;

class Configuration {

    private $fullConfigPath;
    private $config;

    public function __construct($configPath)
    {
        $this->fullConfigPath = $configPath."/config.json";
        $this->config = json_decode(file_get_contents($this->fullConfigPath), true);
    }

    public function getDbConfig() {
        return $this->config['database'];
    }

    public function getPathToUpload(){
        return $this->config['path'];
    }
}