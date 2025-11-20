<?php
namespace App\Services;

use App\Repositories\GioHangRepository;
use App\Repositories\ChiTietGioHangRepository;
use App\Repositories\MonAnRepository;

class CartService
{
    private GioHangRepository $ghRepo;
    private ChiTietGioHangRepository $ctRepo;
    private MonAnRepository $monRepo;

    public function __construct()
    {
        $this->ghRepo = new GioHangRepository();
        $this->ctRepo = new ChiTietGioHangRepository();
        $this->monRepo = new MonAnRepository();
    }

    public function getActiveCart(int $idKH)
    {
        $cart = $this->ghRepo->findActiveByKhachHang($idKH);

        if (!$cart) {
            $cart = $this->ghRepo->createForKhachHang($idKH);
        }

        $items = $this->ctRepo->getItems($cart->getMaGH());
        $cart->setItems($items);

        return $cart;
    }

    public function addToCart(int $idKH, int $idSP, int $soLuong)
    {
        $cart = $this->getActiveCart($idKH);
        return $this->ctRepo->addOrUpdate($cart->getMaGH(), $idSP, $soLuong);
    }

    public function updateQuantity(int $idKH, int $idSP, int $soLuong)
    {
        $cart = $this->getActiveCart($idKH);
        return $this->ctRepo->updateQuantity($cart->getMaGH(), $idSP, $soLuong);
    }

    public function removeItem(int $idKH, int $idSP)
    {
        $cart = $this->getActiveCart($idKH);
        return $this->ctRepo->removeItem($cart->getMaGH(), $idSP);
    }
}
