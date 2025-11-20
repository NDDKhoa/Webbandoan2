<?php
namespace App\Core;

class Router
{
    // Mảng lưu trữ tất cả các đường dẫn đã đăng ký
    // Ví dụ: ['GET' => ['/gio-hang' => 'CartController@index']]
    private array $routes = [];

    /**
     * Đăng ký method GET
     * @param string $path Đường dẫn (VD: /gio-hang)
     * @param string $handler Xử lý (VD: CartController@index)
     */
    public function get($path, $handler)
    {
        $this->routes['GET'][$path] = $handler;
    }

    /**
     * Đăng ký method POST (Xử lý form)
     */
    public function post($path, $handler)
    {
        $this->routes['POST'][$path] = $handler;
    }

    /**
     * Hàm điều phối (Quan trọng nhất)
     */
    public function dispatch()
    {
        // 1. Lấy URL hiện tại người dùng đang truy cập
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Nếu project nằm trong thư mục con (VD: localhost/ban-do-an/), cần loại bỏ phần prefix này
        // Giả sử base path là root, nếu không thì cần xử lý thêm trim
        // Ở đây mình giả định cấu hình server trỏ thẳng vào public

        // 2. Lấy Method hiện tại (GET hoặc POST)
        $method = $_SERVER['REQUEST_METHOD'];

        // 3. Tìm xem URL này có trong danh sách đã đăng ký không
        if (isset($this->routes[$method][$requestUri])) {

            $handler = $this->routes[$method][$requestUri];

            // Tách chuỗi "CartController@index" thành ['CartController', 'index']
            [$controller, $action] = explode('@', $handler);

            $controllerClass = "App\\Controllers\\$controller";

            // Kiểm tra file controller có tồn tại không
            if (class_exists($controllerClass)) {
                $ctr = new $controllerClass();

                if (method_exists($ctr, $action)) {
                    // CHẠY HÀM
                    $ctr->$action();
                } else {
                    echo "Lỗi: Method $action không tồn tại trong $controller";
                }
            } else {
                echo "Lỗi: Class $controllerClass không tồn tại";
            }
        } else {
            // Không tìm thấy đường dẫn -> 404
            http_response_code(404);
            echo "404 - Page Not Found (Không tìm thấy trang $requestUri)";
        }
    }
}