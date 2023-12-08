<?php

require 'Controllers/CategoryController.php';
require 'Controllers/ProductController.php';
require 'Controllers/AuthController.php';

$action = $_GET['action'] ?? 'index';

switch($action) {
    case 'index':
        (new CategoryController())->index();
        break;
    case 'store':
        (new CategoryController())->store();
        break;
    case 'edit':
        (new CategoryController())->edit();
        break;
    case 'update':
        (new CategoryController())->update();
        break;
    case 'delete':
        (new CategoryController())->delete();
        break;
    case 'productIndex':
        (new ProductController())->productIndex();
        break;
    case 'productStore':
        (new ProductController())->productStore();
        break;
    case 'productEdit':
        (new ProductController())->productEdit();
        break;
    case 'productUpdate':
        (new ProductController())->productUpdate();
        break;
    case 'productDelete':
        (new ProductController())->productDelete();
        break;
    case 'register':
        (new AuthController())->register();
        break;
    case 'storedUser':
        (new AuthController())->AddAccount();
        break;
    case 'login':
        (new AuthController())->Login();
        break;
    case 'logged':
        (new AuthController())->Logged();
        break;
    case 'logout':
        (new AuthController())->Logout();
        break;
    default:
        echo "Action not found";
        break;
}
