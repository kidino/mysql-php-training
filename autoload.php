<?php

spl_autoload_register(function ($class) {
    // Convert namespace to file path
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';


    // Base directory for your own libraries
    $myLibBaseDir = __DIR__ . '/app';
   
    // Base directory for libraries downloaded from Packagist.org
    $packagistBaseDir = __DIR__ . '/vendor'; // Adjust this to your Packagist.org libraries directory
   
    // Check if the namespace starts with "App"
    if (strpos($class, 'App\\') === 0) {
        $filePath = $myLibBaseDir . DIRECTORY_SEPARATOR . substr($file,4); // trim the App\
    } else {
        $filePath = $packagistBaseDir . DIRECTORY_SEPARATOR . $file;
    }


    // Check if the file exists and include it
    if (file_exists($filePath)) {
        require_once $filePath;
    }
});
