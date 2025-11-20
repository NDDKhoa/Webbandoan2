<?php
namespace App\Services;

use App\Repositories\DonHangRepository;
use App\Repositories\ChiTietDonHangRepository;

class OrderService
{
    private DonHangRepository $dhRepo;
    private ChiTietDonHangRepository $ctdhRepo;

    public function __construct()
    {
        $this->dhRepo = new DonHangRepository();
        $this->ctdhRepo = new ChiTietDonHangRepository();
    }

    public function getOrdersByKhach(int $idKH)
    {
        return $this->dhRepo->findByKhach($idKH);
    }

    public function getOrderDetail(int $idDH)
    {
        $don = $this->dhRepo->findById($idDH);
        $items = $this->ctdhRepo->findByDon($idDH);
        $don->setItems($items);

        return $don;
    }
}
