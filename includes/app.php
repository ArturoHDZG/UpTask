<?php

use Model\ActiveRecord;
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Imports
require_once 'funciones.php';
require_once 'database.php';

// DB Connection
ActiveRecord::setDB($db);
