<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\LoginController;
use Controllers\TareaController;
use Controllers\DashboardController;

$router = new Router();

// Login
$router->get('/', [LoginController::class, 'login']);
$router->post('/', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

// Creación de Cuentas
$router->get('/create', [LoginController::class, 'create']);
$router->post('/create', [LoginController::class, 'create']);

// Formulario Restablecer Contraseñas
$router->get('/forget', [LoginController::class, 'forget']);
$router->post('/forget', [LoginController::class, 'forget']);

// Restablecer Contraseñas
$router->get('/restore', [LoginController::class, 'restore']);
$router->post('/restore', [LoginController::class, 'restore']);

// Confirmación de Cuentas
$router->get('/message', [LoginController::class, 'message']);
$router->get('/confirm', [LoginController::class, 'confirm']);

// Dashboard
$router->get('/dashboard', [DashboardController::class, 'index']);
$router->get('/new', [DashboardController::class, 'new']);
$router->post('/new', [DashboardController::class, 'new']);
$router->get('/project', [DashboardController::class, 'project']);
$router->get('/profile', [DashboardController::class, 'profile']);

//API tareas
$router->get('/api/tasks', [TareaController::class, 'index']);
$router->post('/api/task', [TareaController::class, 'new']);
$router->post('/api/task/edit', [TareaController::class, 'edit']);
$router->post('/api/task/delete', [TareaController::class, 'delete']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
