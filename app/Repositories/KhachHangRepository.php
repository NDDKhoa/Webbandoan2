<?php
namespace App\Repositories;

use App\Core\Database;
use App\Models\KhachHang;
use PDO;

class KhachHangRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findById(int $id): ?KhachHang
    {
        $stm = $this->db->prepare("SELECT * FROM khachhang WHERE MA_KH = ?");
        $stm->execute([$id]);
        $row = $stm->fetch(PDO::FETCH_ASSOC);

        return $row ? $this->mapToModel($row) : null;
    }

    public function findByPhone(string $phone): ?KhachHang
    {
        $stm = $this->db->prepare("SELECT * FROM khachhang WHERE SDT = ?");
        $stm->execute([$phone]);
        $row = $stm->fetch(PDO::FETCH_ASSOC);

        return $row ? $this->mapToModel($row) : null;
    }

    private function mapToModel(array $r): KhachHang
    {
        return new KhachHang(
            $r['MA_KH'],
            $r['TEN_KH'],
            $r['SDT'],
            $r['EMAIL'],
            $r['DIA_CHI'],
            $r['MAT_KHAU'],
            new \DateTime($r['NGAY_TAO'])
        );
    }
}
