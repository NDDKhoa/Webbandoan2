<?php
session_start();

// 1. Autoload (Tự động nạp file)
require_once __DIR__ . '/../app/Core/autoload.php';

use App\Core\Router;

// 2. Khởi tạo Router
$router = new Router();

// --- ĐĂNG KÝ CÁC ĐƯỜNG DẪN (ROUTE MAP) ---

// Trang chủ
$router->get('/', 'HomeController@index');
$router->get('/views/home/index.php', 'HomeController@index'); // Fallback

// Giỏ hàng (Ví dụ cho các phần sau)
$router->get('/gio-hang', 'CartController@index');
$router->post('/gio-hang/them', 'CartController@add');

// --- KẾT THÚC ĐĂNG KÝ ---

// 3. Chạy Router
$router->dispatch();