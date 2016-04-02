<?php
spl_autoload_register(function ($class) {
    $parts = explode('\\', $class);
    require 'src/' . end($parts) . '.php';
});