<?php
namespace App\Controllers;

use App\Core\BaseController;
use App\Services\ProductService;

class HomeController extends BaseController
{
    private ProductService $productService;

    public function __construct()
    {
        $this->productService = new ProductService();
    }

    public function index()
    {
        // 1. Lấy tham số từ URL (Request)
        $page = isset($_GET['page']) ? max((int) $_GET['page'], 1) : 1;

        // Tạo mảng filters để hứng dữ liệu tìm kiếm
        $filters = [
            'keyword' => isset($_GET['keyword']) ? trim($_GET['keyword']) : '',
            'category' => isset($_GET['category']) ? trim($_GET['category']) : '',
            'Type' => isset($_GET['Type']) ? trim($_GET['Type']) : '',
            'min_price' => isset($_GET['min_price']) && is_numeric($_GET['min_price']) ? (int) $_GET['min_price'] : null,
            'max_price' => isset($_GET['max_price']) && is_numeric($_GET['max_price']) ? (int) $_GET['max_price'] : null,
            'sort' => isset($_GET['sort']) ? $_GET['sort'] : ''
        ];

        // 2. Gọi Service
        $limit = 12;
        $result = $this->productService->getProductsForHomePage($filters, $page, $limit);

        // 3. Kiểm tra biến isSearch
        $isSearch = !empty($filters['keyword']) || !empty($filters['category']) || !empty($filters['Type']) || isset($filters['min_price']) || isset($filters['max_price']);

        // 4. Đóng gói dữ liệu gửi sang View
        // QUAN TRỌNG: Các key ở đây ('products', 'filters'...) sẽ biến thành tên biến trong View ($products, $filters...)
        $data = [
            'products' => $result['products'],
            'totalPages' => $result['total_pages'],
            'currentPage' => $page,
            'totalProducts' => $result['total_records'], // View đang dùng biến này
            'filters' => $filters,                 // ĐÂY LÀ BIẾN BẠN ĐANG THIẾU -> Gây lỗi array_filter null
            'isSearch' => $isSearch
        ];

        // 5. Gọi View
        return $this->view('home/index', $data);
    }
}