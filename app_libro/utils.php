<?php

function classAutoLoader($class)
{
    $class = strtolower($class);
    $classFile = $_SERVER['DOCUMENT_ROOT'] . '/servidor/app_libro/clases' . $class . '.php';
    if (is_file($classFile) && !class_exists($class))
        include $classFile;
}