<?php

define('BASE_PATH', realpath(dirname(__FILE__) . '/..'));
define('BASE_URL', '/tit');


session_start();

require_once BASE_PATH . '/models/model.php';


function checkAdminAccess() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header('Location: ' . BASE_URL . '/app/views/login.php');
        exit();
    }
}

function checkUserAccess($requiredRole) {
    if (!isset($_SESSION['user'])) {
        header('Location: ' . BASE_URL . '/app/views/login.php');
        exit();
    }

    switch ($requiredRole) {
        case 'admin':
            header('Location: ' . BASE_URL . '/app/views/admin/paneladmin.php');
            break;
        case 'worker':
            header('Location: ' . BASE_URL . '/app/views/worker/panelworker.php');
            break;
        case 'user':
            header('Location: ' . BASE_URL . '/app/views/user/paneluser.php');
            break;
        default:
            header('Location: ' . BASE_URL . '/app/views/login.php');
            break;
    }
    exit();
}