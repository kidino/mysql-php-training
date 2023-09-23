<?php
session_start();

// PSR-4 Autoloader
require_once '../autoload.php';

// PHP Plates Templating Engine
require_once '../templates.php';

// Database Settings and Connection
require_once '../database.php';

// URL Router and run the application
require_once '../routes.php';

