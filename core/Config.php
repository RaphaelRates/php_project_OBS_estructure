<?php 

namespace Core;

class Config {
    private static $instance = null;

    private function __construct() {
        $this->loadEnv();
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

    private function loadEnv() {
        $lines = file(__DIR__ . '/../.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {

            if (strpos(trim($line), '#') === 0) continue;
            putenv(trim($line)); 
        }
    }
    public function get($key) {
        return getenv($key);
    }
}

Config::getInstance();

?>