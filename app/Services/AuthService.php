<?php
namespace App\Services;

use App\Repositories\KhachHangRepository;
use App\Repositories\NhanVienRepository;

class AuthService
{
    private KhachHangRepository $khRepo;
    private NhanVienRepository $nvRepo;

    public function __construct()
    {
        $this->khRepo = new KhachHangRepository();
        $this->nvRepo = new NhanVienRepository();
    }

    public function loginKhachHang(string $sdt, string $password)
    {
        $kh = $this->khRepo->findBySDT($sdt);

        if (!$kh || $kh->getMatKhau() !== $password) {
            return false;
        }

        $_SESSION['khachhang'] = $kh->getMaKH();
        return true;
    }

    public function loginNhanVien(string $tk, string $password)
    {
        $nv = $this->nvRepo->findByTaiKhoan($tk);

        if (!$nv || $nv->getMatKhau() !== $password) {
            return false;
        }

        $_SESSION['nhanvien'] = $nv->getMaNV();
        return true;
    }

    public function logout()
    {
        session_destroy();
    }

    public function isLoggedIn(): bool
    {
        return isset($_SESSION['khachhang']) || isset($_SESSION['nhanvien']);
    }
}
