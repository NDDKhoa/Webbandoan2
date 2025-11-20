<?php
namespace App\Services;

use App\Repositories\MonAnRepository;
use App\Repositories\LoaiMonAnRepository;

class ProductService
{
    private MonAnRepository $monRepo;
    private LoaiMonAnRepository $loaiRepo;

    public function __construct()
    {
        $this->monRepo = new MonAnRepository();
        $this->loaiRepo = new LoaiMonAnRepository();
    }

    // ... Các hàm getAllActive, getById, getByLoai giữ nguyên ...

    public function getProductsForHomePage(array $filters, int $page, int $limit)
    {
        $products = $this->monRepo->search($filters, $limit, $page);
        $total = $this->monRepo->countSearch($filters);

        $totalPages = ($total > 0) ? ceil($total / $limit) : 1;

        return [
            'products' => $products,
            'total_records' => $total,
            'total_pages' => $totalPages
        ];
    }
}