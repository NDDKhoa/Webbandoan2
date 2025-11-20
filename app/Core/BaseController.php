<?php
namespace App\Core;

class BaseController
{
    /**
     * Hàm gọi view và truyền dữ liệu
     * @param string $path Đường dẫn view (vd: 'home/index')
     * @param array $data Mảng dữ liệu (vd: ['products' => $arr])
     */
    protected function view($path, $data = [])
    {
        echo "<h1>DEBUG DATA</h1>";
        var_dump($data); // KIỂM TRA MẢNG $data CÓ CHỨA 'filters' và 'totalProducts' KHÔNG?
        echo "<hr>";
        // Giải nén mảng data thành các biến riêng biệt
        // Ví dụ: ['products' => ...] sẽ thành biến $products
        extract($data);

        // Đường dẫn file view thực tế
        $viewFile = __DIR__ . '/../../views/' . $path . '.php';

        if (file_exists($viewFile)) {
            require_once $viewFile;
        } else {
            echo "Lỗi: Không tìm thấy view: $viewFile";
        }
    }
}