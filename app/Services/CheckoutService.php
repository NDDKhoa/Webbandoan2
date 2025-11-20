<?php
namespace App\Services;

use App\Core\Database;
use App\Repositories\GioHangRepository;
use App\Repositories\ChiTietGioHangRepository;
use App\Repositories\DonHangRepository;
use App\Repositories\ChiTietDonHangRepository;

class CheckoutService
{
    private GioHangRepository $ghRepo;
    private ChiTietGioHangRepository $ctRepo;
    private DonHangRepository $dhRepo;
    private ChiTietDonHangRepository $ctdhRepo;

    public function __construct()
    {
        $this->ghRepo = new GioHangRepository();
        $this->ctRepo = new ChiTietGioHangRepository();
        $this->dhRepo = new DonHangRepository();
        $this->ctdhRepo = new ChiTietDonHangRepository();
    }

    public function checkout(int $idKH, string $nguoiNhan, string $diaChi, string $phuongThuc)
    {
        $db = Database::getConnection();
        $db->beginTransaction();

        try {
            $cart = $this->ghRepo->findActiveByKhachHang($idKH);
            $items = $this->ctRepo->getItems($cart->getMaGH());

            // 1. tạo đơn
            $idDH = $this->dhRepo->create($idKH, $nguoiNhan, $diaChi, $phuongThuc);

            // 2. copy items sang chi tiết đơn hàng
            foreach ($items as $item) {
                $this->ctdhRepo->addItem(
                    $idDH,
                    $item->getMaSP(),
                    $item->getSoLuong(),
                    $item->getGiaLucMua()
                );
            }

            // 3. xóa giỏ cũ
            $this->ctRepo->deleteByCart($cart->getMaGH());
            $this->ghRepo->delete($cart->getMaGH());

            // 4. tạo giỏ mới
            $this->ghRepo->createForKhachHang($idKH);

            $db->commit();
            return $idDH;

        } catch (\Exception $e) {
            $db->rollBack();
            throw $e;
        }
    }
}
