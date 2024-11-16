<?php
define("DS", DIRECTORY_SEPARATOR);
define("ROOT", dirname(__DIR__) . DS);
define("APP", ROOT . 'app' . DS);
define("CONFIG", APP . 'config' . DS);
define("CORE", APP . 'core' . DS);
define("CONTROLLERS", APP . 'controllers' . DS);
define("VIEW", APP . 'views' . DS);
define("MODEL", APP . 'models' . DS);

define("DOMAIN_NAME", "http://news.test");
define("CSS_PATH",DOMAIN_NAME."/");
define("PATH",DOMAIN_NAME."/");

//config
define("HOST", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "coderruha");
define("DATABASE_TYPE", "mysql");




require_once("../vendor/autoload.php");
$app = new MVC\core\app();
