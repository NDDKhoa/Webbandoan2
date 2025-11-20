<?php
namespace App\Repositories;

use App\Core\Database;
use App\Models\DonHang;
use App\Models\ChiTietDonHang;
use PDO;

class DonHangRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function create(DonHang $dh): int
    {
        $stm = $this->db->prepare("
            INSERT INTO donhang (MA_KH, NGAY_DAT, TRANG_THAI, NGUOI_NHAN, DIA_CHI_NHAN, PHUONG_THUC)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        $stm->execute([
            $dh->toArray()['idKhachHang'],
            $dh->toArray()['ngayDat'],
            $dh->toArray()['trangThai'],
            $dh->toArray()['nguoiNhan'],
            $dh->toArray()['diaChiNhan'],
            $dh->toArray()['phuongThuc']
        ]);

        return $this->db->lastInsertId();
    }
}
