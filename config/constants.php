<?php 

session_start();

$dotenv->load();

// Define the constants
define('ROOT_URL', $_ENV['ROOT_URL']);
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASS', $_ENV['DB_PASS']);
define('DB_NAME', $_ENV['DB_NAME']);

?>