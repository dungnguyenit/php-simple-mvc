<?php
session_start();
// Load configuration
require_once('config/database.php');

// Autoload classes
require_once(__DIR__ . "/model/Database.php");
require_once(__DIR__ . "/model/ContactModel.php");
require_once(__DIR__ . "/controller/ContactController.php");

// Parse the URI
$uri = !empty($_GET['uri']) ? $_GET['uri'] : '';
$uri = rtrim($uri, '/'); // Remove trailing slashes
$uri_parts = explode('/', $uri);

// Define default controller and method
$controller_name = 'ContactController';
$method_name = 'index';
// Check if a specific controller and method are requested

if (!empty($uri_parts[0])) {
    $controller_name = ucfirst($uri_parts[0]) . 'Controller';
    if (!empty($uri_parts[1])) {
        $method_name = $uri_parts[1];
    }
}
// Check if the controller class exists
if (class_exists($controller_name)) {
    // Create an instance of the controller
    $controller = new $controller_name();

    // Check if the method exists in the controller
    if (method_exists($controller, $method_name)) {
        // Call the controller method with any additional URI segments as arguments
        call_user_func_array([$controller, $method_name], array_slice($uri_parts, 2));
    } else {
        // Method not found - handle appropriately (e.g., show a 404 page)
        echo "404 - Method not found";
    }
} else {
    // Controller not found - handle appropriately (e.g., show a 404 page)
    echo "404 - Controller not found";
}
