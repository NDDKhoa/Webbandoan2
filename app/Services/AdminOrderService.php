<?php
namespace App\Services;

use App\Repositories\DonHangRepository;
use App\Repositories\ChiTietDonHangRepository;

class AdminOrderService
{
    private DonHangRepository $dhRepo;
    private ChiTietDonHangRepository $ctdhRepo;

    public function __construct()
    {
        $this->dhRepo = new DonHangRepository();
        $this->ctdhRepo = new ChiTietDonHangRepository();
    }

    public function getAllOrders()
    {
        return $this->dhRepo->findAll();
    }

    public function getOrderDetail(int $idDH)
    {
        return [
            'order' => $this->dhRepo->findById($idDH),
            'items' => $this->ctdhRepo->findByDon($idDH)
        ];
    }

    public function updateStatus(int $idDH, string $newStatus)
    {
        return $this->dhRepo->updateStatus($idDH, $newStatus);
    }

    public function getRevenueByDate($date)
    {
        return $this->dhRepo->getRevenueByDate($date);
    }
}
