<?php
namespace App\Services;

use App\Repositories\MonAnRepository;
use App\Repositories\LoaiMonAnRepository;

class AdminProductService
{
    private MonAnRepository $monRepo;
    private LoaiMonAnRepository $loaiRepo;

    public function __construct()
    {
        $this->monRepo = new MonAnRepository();
        $this->loaiRepo = new LoaiMonAnRepository();
    }

    public function createMonAn($data)
    {
        return $this->monRepo->create($data);
    }

    public function updateMonAn($id, $data)
    {
        return $this->monRepo->update($id, $data);
    }

    public function deleteMonAn($id)
    {
        return $this->monRepo->setStatus($id, -1);
    }

    public function changeStatus($id, int $status)
    {
        return $this->monRepo->setStatus($id, $status);
    }
}
