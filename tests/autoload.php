<?php

spl_autoload_register(function ($class) {
    $parts = explode('\\', $class);
    require 'src/' . end($parts) . '.php';
});

spl_autoload_register(function ($class) {
    $parts = explode('\\', $class);
    require 'tests/' . end($parts) . '.php';
});

//TODO : register function to load PHPUnit classes