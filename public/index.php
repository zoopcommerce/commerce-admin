<?php

set_time_limit(600);

if (isset($_GET['debug'])) {
    // show all errors
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}

chdir(dirname(__DIR__ . '/../../'));

// Setup autoloading
require 'vendor/autoload.php';

// Run the application!
Zend\Mvc\Application::init(include 'config/application.config.php')->run()->send();
