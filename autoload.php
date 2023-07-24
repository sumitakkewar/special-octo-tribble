<?php

spl_autoload_register(function ($class_name) {
    $file = str_replace('App/', '', str_replace('\\', DIRECTORY_SEPARATOR, $class_name)).'.php';
    if (file_exists($file)) {
        include_once $file;
        return true;
    }
    return false;
});